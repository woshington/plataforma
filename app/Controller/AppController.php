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
    var $ano;
	public $helpers = array('Html', 'Form', 'Session');    
	public $components = array(
		//'DebugKit.Toolbar',
		'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            ),            
            'logoutRedirect' => array('controller' => 'users','action' => 'login','plugin'=>null),
            'authError' => 'Voce nao tem autorizacao!'
        ),
        'Session'
	);	

	public function beforeFilter(){
        $this->layout = 'bootstrap';  

        $this->Auth->loginError = "Wrong credentials. Please provide a valid username and password.";
        $this->Auth->authError = "You don't have sufficient privilege to access this resource.";
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'index');

        $this->Auth->allow('login','logout', 'edit');
        $this->ano = date('Y');
        if(isset($_SESSION['ano'])){            
            $this->ano = $_SESSION['ano'];
        }
        $this->set('ano', $this->ano);
    }    
}
