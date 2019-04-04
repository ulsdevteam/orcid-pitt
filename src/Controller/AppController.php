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
namespace app\Controller;

use Cake\Controller\Controller;
use Datasources\Model\Datasource\LdapSource;
use Cake\Event\Event;


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
	//public $components = array('Auth' => array('unauthorizedRedirect' => false, 'authenticate' => array('EnvAuth.Env' => array('userModel' => 'OrcidBatchCreator', 'fields' => array('username' => 'name'), 'scope' => array('MOD(OrcidBatchCreator.flags, 2)' => 0), 'DROP_SCOPE' => true, 'FORCE_LOWERCASE' => true))));
//	public $helpers = array('Js' => array('Jquery'), 'TinyMCE.TinyMCE' => array('script' => '/TinyMCE/js/tiny_mce4/tinymce.min.js'));
//
//	public function beforeFilter(Event $event) {
//		//AuthComponent::$sessionKey = false;
//	}

}
