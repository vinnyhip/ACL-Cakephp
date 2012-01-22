<?php
App::uses('AppController', 'Controller');
/**
 * Avatars Controller
 *
 * @property Avatar $Avatar
 */
class AvatarsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Avatar->recursive = 0;
		$this->set('avatars', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Avatar->id = $id;
		if (!$this->Avatar->exists()) {
			throw new NotFoundException(__('Invalid avatar'));
		}
		$this->set('avatar', $this->Avatar->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Avatar->create();
			if ($this->Avatar->save($this->request->data)) {
				$this->Session->setFlash(__('The avatar has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The avatar could not be saved. Please, try again.'));
			}
		}
		$profiles = $this->Avatar->Profile->find('list');
		$this->set(compact('profiles'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Avatar->id = $id;
		if (!$this->Avatar->exists()) {
			throw new NotFoundException(__('Invalid avatar'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Avatar->save($this->request->data)) {
				$this->Session->setFlash(__('The avatar has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The avatar could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Avatar->read(null, $id);
		}
		$profiles = $this->Avatar->Profile->find('list');
		$this->set(compact('profiles'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Avatar->id = $id;
		if (!$this->Avatar->exists()) {
			throw new NotFoundException(__('Invalid avatar'));
		}
		if ($this->Avatar->delete()) {
			$this->Session->setFlash(__('Avatar deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Avatar was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
