<?php
CLASS SmartyView extends View {

    /**
     * True when the view has been rendered.
     *
     * @var boolean
     */
    public $hasWrapRendered = false;


    function __construct (&$controller) {
        parent::__construct($controller);
        if (is_object($controller)) {
            $count = count($this->_passedVars);
            for ($j = 0; $j < $count; $j++) {
                // viewのget呼ぶ
                $var = $this->_passedVars[$j];
                // viewのset呼ぶ
                $this->{$var} = $controller->{$var};
            }
        }

        // app/Vendor/Smarty/Smarty/smarty.CLASS.phpのSmarty.phpをロード
        if(!App::import('Vendor', 'Smarty', array('file' => 'smarty'.DS.'Smarty.CLASS.php')))
            die('error Loading Smarty CLASS');
        /*
            @params
                smartyで使うpluginなどロード
        */
        $this->Smarty = NEW Smarty();

        // $this->subDir = 'smarty'.DS;

        $this->ext = '.tpl';
        //$this->Smarty->plugins_dir[] = VENDORS.DS.'smarty'.DS.'plugins';
        // add dirs
        /*
            @params
                setterを呼んでいる
        */
        $this->Smarty->webroot = $this->request->webroot;
        $this->Smarty->parts_template_dir = TEMPLATE.'admin'.DS.'parts'.DS;
        $this->Smarty->wrap_template_dir = TEMPLATE.'admin'.DS.'wrap'.DS;
        $this->Smarty->compile_dir = TMP.'smarty'.DS.'compile'.DS;
        $this->Smarty->cache_dir = TMP.'smarty'.DS.'cache'.DS;
        $this->Smarty->error_reporting = 'E_ALL & ~E_NOTICE';
        $this->Smarty->debugging = true;
        $this->Smarty->compile_check = true;
        $this->viewVars['params'] = $this->params;

        // 親で同じことやってるので、意味ないかもと思って消した(2015/04/11)
        // $this->Helpers = NEW HelperCollection($this);
    }

    protected function _render($___viewFn, $___dataForView = array()) {
        $trace = debug_backtrace();
        $caller = array_shift($trace);

        // debug("[smartyView] render_start");
        // debug("[SmartyView] template = ".$___viewFn);

        if ($caller === "element") parent::_render($___viewFn, $___dataForView);

        if (empty($___dataForView)) {
            $___dataForView = $this->viewVars;
        }

        extract($___dataForView, EXTR_SKIP);

        foreach($___dataForView as $data => $value) {
            if(!is_object($data)) {
                // debug($value);
                $this->Smarty->ASSIGN($data, $value);
            }
        }

        $this->Smarty->ASSIGN('View', NEW View(null));

        // debug("[SmartyView] wrap_template = ".$this->Smarty->wrap_template);

        // すぐ出力させないで、後で出力させるためにバッファに退避させている可能性あり
        ob_start();
        // レンダリング
        // $this->Smarty->display($___viewFn);


        // ラッパーレンダリング
        echo $this->wrap_render($___viewFn);//追加

        // if(!$this->hasWrapRendered)
        // {
        // }
        return ob_get_clean();
    }

    //　追加
    public function wrap_render($template_file) {

        // // ラッパーテンプレートレンダリング済み
        // TODO:レンダリング方法が少し曖昧
        ob_start();
        $output = "";
        for ($i=0; $i < 3 ; $i++) { 

            // ラッパーテンプレートレンダリング
            $output = $this->Smarty->fetch($template_file);

            // ラッパーテンプレート指定がなければ終了
            if(is_null($this->Smarty->wrap_template))
            {
                debug("Not Wrap Template, exit ...");
                break;
            }

            if($this->Smarty->wrap_params)
            {
                $this->Smarty->ASSIGN('local',$this->Smarty->wrap_params);
                $this->Smarty->wrap_params = null;
            }

            $template_file = $this->Smarty->wrap_template;
            $this->Smarty->wrap_template = null;

            $this->Smarty->inner_template = $output;
        }
        ob_end_clean();
        // TODO:ここでechoすると正常動作するが、なぜかはわからない
        // echo $output;

        $this->hasWrapRendered = true;

        return $output;
    }

    public function loadHelpers() {

        // $this->helpersは呼び出したコントローラで設定しているグローバル変数
        $helpers = HelperCollection::normalizeObjectArray($this->helpers);
        foreach ($helpers as $name => $properties) {
            list($plugin, $CLASS) = pluginSplit($properties['class']);
            $this->{$CLASS} = $this->Helpers->load($properties['class'], $properties['settings']);
            $this->Smarty->ASSIGN($name, $this->{$CLASS});
        }
        $this->_helpersLoaded = true;
    }
}

?>