<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	// public $viewClass = 'SmartyView.Smarty';

	// フォーム入力取得(GET or POST)
	protected function get_posted_params($key,$default=NULL)
	{
		// GET値取得
		if(isset($this->request->query[$key]))
		{
			if(is_string($this->request->query[$key]) && $this->request->query[$key]==="")
			{
				return $default;
			}

			return $this->request->query[$key];
		}
		// POST値取得
		if(isset($this->request->data[$key]))
		{
			if(is_string($this->request->data[$key]) && $this->request->data[$key]==="")
			{
				return $default;
			}

			return $this->request->data[$key];
		}

		return $default;
	}

	// 実行フラグチェック
	public function is_execute_mode()
	{
		if(isset($this->request->query['exec']))
		{
			return $this->request->query['exec']=='1';
		}
		// POST値取得
		if(isset($this->request->data['exec']))
		{
			return $this->request->data['exec']=='1';
		}

		return NULL;		
	}
}