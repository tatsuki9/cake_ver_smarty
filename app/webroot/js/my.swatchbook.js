/**
 * Created by nyoronyoro-kun on 2015/11/01.
 */
/*
    ・プラグインの関数のスコープ内では、thisは呼び出されたプラグインのjQueryオブジェクトを参照する。
    なので、以下スコープ内で、$(this)をやってはだめ。やると、$($('#sb-container'))となってしまう。

 */

// クロージャ形式で即時関数呼び出し
(function($, window) {

    // 関数API
    $.SwatchBook = function( options, data, candicates, questionframe_ele, element ) {
        // sb-containerのDOM要素取得
        this.$el  = $( element );
        // 単語帳データ取得
        this.data = JSON.parse(data);
        // 問題回答候補
        this.candicates = candicates;

        this.$questionframe_ele = $(questionframe_ele);

        this._init( options );
    };

    $.SwatchBook.defaults = {
        center : 6,
        angleInc : 8,
        speed : 700,
        easing : 'ease',
        proximity : 45,
        neighbor : 4,
        onLoadAnim : true,
        initclosed : false,
        closeIdx : -1,
        openAt : -1
    };

        $.SwatchBook.prototype = {
        _init : function( options ) {
            // 配列をマージ(デフォルト値とオリジナル値)
            this.options    = $.extend( true, {}, $.SwatchBook.defaults, options);
            // 指定セレクタの全子要素を抽出
            this.$items     = this.$el.children( 'div' );
            // 子要素divの数
            this.itemsCount = this.$items.length;
            this.current    = -1;
            // 問題回答数
            this.ans_num = 0;
            // 問題開始フラグ
            this.question_start = false;
            this.cache      = [];

            // アニメーション許可判定
            if( this.options.onLoadAnim ) {
                // アニメーション準備(transition属性セット)
                this._setTransition();
            }

            // 初期状態が閉じているか
            if( this.options.isClosed ) {
                this.isClosed = true;
            }

            // イベント初期化
            this._initEvents();
        },
        _initEvents : function() {
            var self = this;

            // カードにイベント設定
            $(this.$items[0]).on( 'click', function( event ) {
                self._openItem($(this));
            });
        },
        _checkAnswered : function(ans_results) {
            for(var i = 0; i < ans_results.length; i++) {
                if( ans_results[i] ) {
                    return true;
                }
            }
            return false;
        },
        _setTransition : function() {
            this.$items.css( { 'transition' : 'all ' + this.options.speed + 'ms ' + this.options.easing } );
        },
        _progress : function(ans_results) {
            // 問題を開始し、回答にチェックしたか
            if(this.question_start && this._checkAnswered(ans_results)) {
                this._openItem($(this.$items[0]));
            }
        },
        // $item : 一意のDOM要素
        _openItem : function( $item ) {
            // 子要素生成
            var $child_01 = $("<span/>").addClass("sb-icon icon-flight");
            var $child_02 = $("<h4/>").append($("<span/>").text(this.data[this.ans_num]['word']));
            var $children = [$child_01,$child_02];

            // 親要素生成
            var $creatediv = $("<div/>");
            // 親に子要素をappend
            for(var i = 0; i < $children.length; ++i) {
                $creatediv.append($children[i]);
            }
            // 大親に親をprepend
            this.$el.prepend($creatediv);

            // クリックイベントとtransition更新
            this.$items = this.$el.children( 'div' );
            this._setTransition();

            // タッチした要素を回転させる
            this._rotateSiblings( $item );

            // スタートボタン押したかどうか
            if(!this.question_start) {
                // 問題回答候補テキスト更新
                this._viewCandicate();
                // 回答数更新
                this.ans_num++;
                // 問題枠表示
                this.$questionframe_ele.css( {'visibility' : 'visible'} );
                // イベントハンドラ解除
                $(this.$items).unbind();
                this.question_start = true;
                return;
            } else {
                // 問題回答候補テキスト更新
                this._viewCandicate();
                // 回答数更新
                this.ans_num++;
            }
        },
        _viewCandicate : function() {
            $candicates_text = this.data[this.ans_num]['candicates'].split(',');

            for(var i = 0; i < this.candicates.length; i++) {
                this.candicates[i].innerHTML = $candicates_text[i];
            }
        },
        _openclose : function() {
            // 選択したDOMが
            // 閉じている : 回転アニメーション
            // 開いている : 全てのDOMを0度に回転
            this.isClosed ? this._center( this.options.center, true ) : this.$items.css( { 'transform' : 'rotate(0deg)' } );
            // DOMの開閉状態を更新
            this.isClosed = !this.isClosed;
        },
        _nextItem : function() {

        },
        _setCurrent : function( $el ) {
            // 現在選択しているDOMを更新
            this.current = $el ? $el.index() : -1;
            this.$items.removeClass( 'ff-active' );
            if( $el ) {
                $el.addClass( 'ff-active' );
            }
        },
        // 中央に配置するアニメーション
        _center : function( idx, anim ) {

            var self = this;

            this.$item.each( function( i ) {
                var transformStr = 'rotate(' + ( self.options.angleInc * ( i - idx)) + 'deg)';
                $( this ).css( {'transform' : transformStr } );
            });
        },
        _rotateSiblings : function( $item ) {

            var transformStr = 'rotate(-90deg)';
            $item.css({'transform' : transformStr});
        },
    };

    // {{{ メソッドAPI
    $.fn.swatchbook = function( options, data, ans_results, candicates,init, submit_ele, questionframe_ele ) {
        // submit要素にヒモづいているswatchbookというキーのデータ取得
        var instance = $.data( submit_ele, 'swatchbook' );

        if(init) {
            try {
                // submit要素にヒモづいているswatchbookというキーにデータ格納
                instance = $.data( submit_ele, 'swatchbook', new $.SwatchBook( options, data, candicates, questionframe_ele, this ) );

            } catch(e) {
                throw new("Swatchbookオブジェクトが生成できませんでした.");
            }
        } else {
            // 回答ボタン押した後
            instance._progress(ans_results);
        }

        return instance;
    };
    // }}}
})(jQuery, window);