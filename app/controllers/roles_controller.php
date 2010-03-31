<?php
class RolesController extends AppController {

	var $name = 'Roles';

	function index() {
		$this->set('title_for_layout', 'Alle Roller');	
		$this->Role->recursive = 0;
		$this->set('roles', $this->paginate());
	}

	function view($id = null) {
		$this->set('title_for_layout', 'Se Rolle');	
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'role'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('role', $this->Role->read(null, $id));
	}

	function add() {
		$this->set('title_for_layout', 'Opret ny Rolle');	
		if (!empty($this->data)) {
			$this->Role->create();
			if ($this->Role->save($this->data)) {
				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'role'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'role'));
			}
		}
	}

	function edit($id = null) {
		$this->set('title_for_layout', 'Rediger Rolle');	
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'role'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Role->save($this->data)) {
				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'role'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'role'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Role->read(null, $id);
		}
	}

	function delete($id = null) {
		$this->set('title_for_layout', 'Slet Rolle');	
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid id for %s', true), 'role'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Role->delete($id)) {
			$this->Session->setFlash(sprintf(__('%s deleted', true), 'Role'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s was not deleted', true), 'Role'));
		$this->redirect(array('action' => 'index'));
	}
}
?>