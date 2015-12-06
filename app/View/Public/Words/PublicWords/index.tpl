{wrap_template file="plain" title="単語帳"}

{include_js  file="my.swatchbook.js"}
{include_css file="words"}

{* 渡す単語帳データの数だけdiv要素作成。ただし、めくるたびに直前のdiv要素を削除する *}
<div id="sb-container" class="sb-container">
	<div>
		<!-- インライン要素 -->
		<span class="sb-icon icon-cog"></span>
		<h4><span>START</span></h4>
	</div>
</div>

{* 問題出力 *}
<div id="qustion_frame" class="qustion_frame">
	<div style="text-align: left; margin: 5px auto 0px auto; width: 90%; height: 80px; background-color: green;">
		問題：数学
	</div>
	<ul style="list-style-type: none; background-color: pink;">
		<li>
			<input id="no_0" type="radio"><span name="ans">1番</span>
		</li>
		<li>
			<input id="no_1" type="radio"><span name="ans">2番</span>
		</li>
		<li>
			<input id="no_2" type="radio"><span name="ans">3番</span>
		</li>
		<li>
			<input id="no_3" type="radio"><span name="ans">4番</span>
		</li>
	</ul>
	<input id="submit" type="submit" class="submit" value="回答" onclick="main();">
</div>

<script type="text/javascript">
	function main(init) {
		$(function() {
			// 単語帳データ
			var data = '{$list}';
			// 問題の解答ステータス
			var ans_results = [];

			$('li').each(function( i ) {
				ans_results.push($("#no_" + i).prop('checked'));
			});

			// 独自jqueryプラグイン呼び出し
			$( '#sb-container' ).swatchbook( {
				speed : 500,
				easing : 'ease-out',
				// index of initial centered item
				center : 7,
				// number of degrees that is between each item
				angleInc : -25,
				// amount in degrees for the opened item's next sibling
				proximity : 40,
				// amount in degrees between the opened item's next siblings
				neighbor : 2
			}, data , ans_results, $('span[name=ans]'),init, document.getElementById("submit"), document.getElementById("qustion_frame"));
		});
	}

	main(true);
</script>