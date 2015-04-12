<?php
CLASS SmartyView extends View {
    function __construct (&$controller) {
        parent::__construct($controller);
        if (is_object($controller)) {
            $count = count($this->_passedVars);
            for ($j = 0; $j < $count; $j++) {
                $var = $this->_passedVars[$j];
                $this->{$var} = $controller->{$var};
            }
        }

        // app/Vendor/Smarty/Smarty/smarty.CLASS.phpのSmarty.phpをロード
        if(!App::import('Vendor', 'Smarty', array('file' => 'smarty'.DS.'Smarty.CLASS.php')))
            die('error Loading Smarty CLASS');
        $this->Smarty = NEW Smarty();

        $this->subDir = 'smarty'.DS;

        $this->ext= '.tpl';
        //$this->Smarty->plugins_dir[] = VENDORS.DS.'smarty'.DS.'plugins';
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
        if ($caller === "element") parent::_render($___viewFn, $___dataForView);

        if (empty($___dataForView)) {
            $___dataForView = $this->viewVars;
        }

        extract($___dataForView, EXTR_SKIP);

        foreach($___dataForView as $data => $value) {
            if(!is_object($data)) {
                $this->Smarty->ASSIGN($data, $value);
            }
        }

        $this->Smarty->ASSIGN('View', NEW View(null));

        ob_start();
        $this->Smarty->display($___viewFn);
        RETURN ob_get_clean();
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