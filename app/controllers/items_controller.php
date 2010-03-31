<?php
class ItemsController extends AppController {

	var $name = 'Items';

	function index() {
		$this->set('title_for_layout', 'Alle Enhedsskabeloner');	
		$this->Item->recursive = 0;
		$this->set('items', $this->paginate());
	}

	function view($id = null) {
		$this->set('title_for_layout', 'Se Enhedsskabelon');	
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Ugyldig %s.', true), 'Enhedsskabelon'), 'default', array('class' => 'notice'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('item', $this->Item->read(null, $id));
	}

	function add() {
		$this->set('title_for_layout', 'Opret ny Enhedsskabelon');	
		if (!empty($this->data)) {
			$this->Item->create();
			if ($this->Item->save($this->data)) {
				$this->Session->setFlash(sprintf(__('%s er blevet gemt!', true), 'Enhedsskabelonen'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('%s kunne ikke gemmes. Forsøg igen.', true), 'Enhedsskabelonen'), 'default', array('class' => 'error'));
			}
		}
		$projects = $this->Item->Project->find('list');
		$this->set(compact('projects'));
	}

	function edit($id = null) {
		$this->set('title_for_layout', 'Rediger Enhedsskabelon');	
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Ugyldig %s.', true), 'enhedsskabelon'), 'default', array('class' => 'notice'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Item->save($this->data)) {
				$this->Session->setFlash(sprintf(__('%s er blevet gemt!', true), 'Enhedsskabelonen'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('%s kunne ikke gemmes. Forsøg igen.', true), 'Enhedsskabelonen'), 'default', array('class' => 'error'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Item->read(null, $id);
		}
		$projects = $this->Item->Project->find('list');
		$this->set(compact('projects'));
	}

	function delete($id = null) {
		$this->set('title_for_layout', 'Slet Enhedsskabelon');	
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Ugyldigt ID for %s.', true), 'enhedsskabelonen'), 'default', array('class' => 'notice'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Item->delete($id)) {
			$this->Session->setFlash(sprintf(__('%s er slettet.', true), 'Enhedsskabelonen'), 'default', array('class' => 'success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s kunne ikke slettes. Forsøg igen.', true), 'Enhedsskabelonen'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}
?>