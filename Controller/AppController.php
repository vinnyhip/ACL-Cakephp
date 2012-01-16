<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {
    
    public $components = array(
        'Acl',
        'DebugKit.Toolbar',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            ),
            
            'authenticate' => array(
                'Form' => array(
                    'scope' => array('User.active' => true),
                    'fields' => array('username' => 'username')
                )
            ),
            //Action responsável por logar o usuário
            'loginAction' => array(
                'controller' => 'users',
                'action' => 'login'
            ),
            //Local que o usuário será redirecionado ao fazer o logoff do sistema
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login'
            )
            
        ),
        'Session'
    );
    
    public $helpers = array('Html', 'Form', 'Session');
    
    public function beforeFilter() {
        // Temporariamente para permitir a criação de usuário sem logar
        //$this->Auth->allow('*');
        
//        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
//        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        

        
        $this->Auth->allow('display');
       
        
    }
}