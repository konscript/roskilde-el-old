<?php
class ProjectItemsController extends AppController {

	var $name = 'ProjectItems';
	var $components = array('SpecificAcl');		

	function index() {
		$this->ProjectItem->recursive = 0;
		$this->set('projectItems', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'project item'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectItem', $this->ProjectItem->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectItem->create();
			if ($this->ProjectItem->save($this->data)) {
				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'project item'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'project item'));
			}
		}
		$items = $this->ProjectItem->Item->find('list');
		$projects = $this->ProjectItem->Project->find('list');
		$parameters = $this->params['url'];
		
		$allowed_project_ids = $this->SpecificAcl->index("Project", $this->ProjectItem->Project->find('all'));
		$allowed_projects = $this->ProjectItem->Project->find('list', array('conditions' => array('Project.id' => $allowed_project_ids))); 		
		
		$this->set(compact('items', 'projects', 'parameters', 'allowed_projects'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'project item'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectItem->save($this->data)) {
				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'project item'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'project item'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectItem->read(null, $id);
		}
		$items = $this->ProjectItem->Item->find('list');
		$projects = $this->ProjectItem->Project->find('list');
		$parameters = $this->params['url'];		

		$allowed_project_ids = $this->SpecificAcl->index("Project", $this->ProjectItem->Project->find('all'));
		$allowed_projects = $this->ProjectItem->Project->find('list', array('conditions' => array('Project.id' => $allowed_project_ids))); 		
	
		$this->set(compact('items', 'projects', 'parameters', 'allowed_projects'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid id for %s', true), 'project item'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectItem->delete($id)) {
			$this->Session->setFlash(sprintf(__('%s deleted', true), 'Project item'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s was not deleted', true), 'Project item'));
		$this->redirect(array('action' => 'index'));
	}
}
?>