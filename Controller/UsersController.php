<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

        public function beforeFilter() {
            
            //Quando a tabela aros_acos estiver vazia descomentar a linha abaixo
            // @TODO: Comentar quando o sistema estiver em produção
            $this->Auth->allow('regrasACL');
            
            //Libera acesso a action login para todos os usuarios, até mesmo nao logados
             $this->Auth->allow(array('login', 'logout', 'view')); //pode ser uma array
             
             return parent::beforeFilter();
        }
    
    
    
        public function login() {
            
            if ($this->Session->read('Auth.User')) {
                $this->Session->setFlash('Você já está logado!');
                $this->redirect('/', null, false);
                }
            
            
            if ($this->request->is('post')) {
                if ($this->Auth->login()) {
                    $this->redirect($this->Auth->redirect());
                } else {
                    $this->Session->setFlash('Login/Senha não conferem!');
                }
            }
        }

        
            
        public function logout(){
            $this->Session->setFlash('Você fez logout no sistema');
            $this->redirect($this->Auth->logout());
        }
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
       
        public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Usuário editado com sucesso!'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não foi possível editar o usuário. Por favor, tente novamente.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	//@TODO: Analisar a possibilidade de eliminar esse método
        public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
        
/**
 * mudarMinhaSenha method
 * Permite o próprio usuário mudar sua senha
 * @param string $id
 * @return void
 */
        //@TODO: Adicionar confirmação da tenha atual
        //@TODO: Adicionar campo repetir senha
	public function mudarMinhaSenha() {
		$id = AuthComponent::user('id');
                $this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Usuário editado com sucesso!'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não foi possível editar o usuário. Por favor, tente novamente.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}
        
        
        
        
        
        
        
        
        
        
        
        //Executar essa action sempre que novas regras forem criadas abaixo
        // em seguida rodar no console o comando cake AclExtras.AclExtras aco_update
        // caso tenha criado/editado/excluido um nome de action
        
        /**
         *  método regrasACL
         *  Método que deve ser executado sempre que novos métodos/grupos/usuários
         *  forem adicionados ao sistema.
         * @return void
         */
        
        public function regrasACL() {
            // 
            $group = $this->User->Group;
            
            // O número 1 é o id do grupo de Administradores do sistema
            $group->id = 1;
            $this->Acl->allow($group, 'controllers');
            
            // O número 2 é o id do grupo de Diretors
            $group->id = 2;
            $this->Acl->deny($group, 'controllers');
            $this->Acl->allow($group, 'controllers/Users/mudarMinhaSenha');

            //$this->Acl->allow($group, 'controllers/Posts/edit');
            
            echo 'Essa function não remove as actions que não existem mais';
            echo '<br> É recomendável limpar a tabela aros_acos antes';
            echo '<br> usar o comando cake AclExtras.AclExtras aco_sync no console
                para remover/adicionar as novas actions criadas';
            exit;
        }
}
