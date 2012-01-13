<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {
    
    public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session'
    );
    
    public $helpers = array('Html', 'Form', 'Session');
    
    public function beforeFilter() {
        // Temporariamente para permitir a criação de usuário sem logar
        //$this->Auth->allow('*');
        
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        
        $this->Auth->allow('display');
       
        
    }
}