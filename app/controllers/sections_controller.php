<?php
class SectionsController extends AppController {

	var $name = 'Sections';
	var $components = array('SpecificAcl');

	function index() {
		$this->Section->recursive = 0;
		$this->set('sections', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'section'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('section', $this->Section->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Section->create();
			if ($this->Section->save($this->data)) {
		        // SPECIFICACL: Reassigns permission for the chosen section manager
				$this->SpecificAcl->allow("Section", $this->data);			
			
				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'section'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'section'));
			}
		}
		$users = $this->Section->User->find('list', array('fields' => array('User.id', 'User.username'), 'conditions' => array('User.role_id' => 2)));
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'section'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
	        // SPECIFICACL: Removes permission for the old section manager
			$this->SpecificAcl->deny("Section", $this->Section->read(null, $id));						

			if ($this->Section->save($this->data)) {
		        // SPECIFICACL: Reassigns permission for the chosen section manager
				$this->SpecificAcl->allow("Section", $this->data);			

				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'section'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'section'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Section->read(null, $id);
		}
		$users = $this->Section->User->find('list', array('fields' => array('User.id', 'User.username'), 'conditions' => array('User.role_id' => 2)));
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid id for %s', true), 'section'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Section->delete($id)) {
			$this->Session->setFlash(sprintf(__('%s deleted', true), 'Section'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s was not deleted', true), 'Section'));
		$this->redirect(array('action' => 'index'));
	}
}
?>