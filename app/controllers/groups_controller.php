<?php
class GroupsController extends AppController {

	var $name = 'Groups';
	var $components = array('SpecificAcl');

	function index() {
		$this->set('title_for_layout', 'Alle Grupper');	
		$this->Group->recursive = 0;
		$this->set('groups', $this->paginate());
	}

	function view($id = null) {
		$this->set('title_for_layout', 'Se Gruppe');	
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Ugyldig %s.', true), 'gruppe'), 'default', array('class' => 'notice'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('group', $this->Group->read(null, $id));
	}

	function add() {
		$this->set('title_for_layout', 'Opret ny Gruppe');	
		if (!empty($this->data)) {
			$this->Group->create();
			if ($this->Group->save($this->data)) {
		        // SPECIFICACL: Reassigns permission for the chosen group manager
				$this->SpecificAcl->allow("Group", $this->data);			
			
				$this->Session->setFlash(sprintf(__('%s er blevet gemt!', true), 'Gruppen'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('%s kunne ikke gemmes. Forsøg igen.', true), 'Gruppen'), 'default', array('class' => 'error'));
			}
		}
		$sections = $this->Group->Section->find('list');
		$users = $this->Group->User->find('list', array('fields' => array('User.id', 'User.username'), 'conditions' => array('User.role_id' => 3)));
		$this->set(compact('sections', 'users'));
	}

	function edit($id = null) {
		$this->set('title_for_layout', 'Rediger Gruppe');	
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Ugyldig %s.', true), 'gruppe'), 'default', array('class' => 'notice'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
	        // SPECIFICACL: Removes permission for the old group manager
			$this->SpecificAcl->deny("Group", $this->Group->read(null, $id));						
		
			if ($this->Group->save($this->data)) {
		        // SPECIFICACL: Reassigns permission for the chosen group manager
				$this->SpecificAcl->allow("Group", $this->data);			
			
				$this->Session->setFlash(sprintf(__('%s er blevet gemt!', true), 'Gruppen'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('%s kunne ikke gemmes. Forsøg igen.', true), 'Gruppen'), 'default', array('class' => 'error'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Group->read(null, $id);
		}
		$sections = $this->Group->Section->find('list');
		$users = $this->Group->User->find('list', array('fields' => array('User.id', 'User.username'), 'conditions' => array('User.role_id' => 3)));
		$this->set(compact('sections', 'users'));
	}

	function delete($id = null) {
		$this->set('title_for_layout', 'Slet Gruppe');	
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Ugyldigt ID for %s.', true), 'gruppen'), 'default', array('class' => 'notice'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Group->delete($id)) {
			$this->Session->setFlash(sprintf(__('%s er slettet.', true), 'Gruppen'), 'default', array('class' => 'success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s kunne ikke slettes. Forsøg igen.', true), 'Gruppen'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}
?>