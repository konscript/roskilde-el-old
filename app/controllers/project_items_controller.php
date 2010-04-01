<?php
class ProjectItemsController extends AppController {

	var $name = 'ProjectItems';
	var $components = array('SpecificAcl');		

	function index() {
		$this->set('title_for_layout', 'Alle Enheder');	
		$this->ProjectItem->recursive = 0;
		$this->set('projectItems', $this->paginate());
	}

	function view($id = null) {
		$this->set('title_for_layout', 'Se Enhed');	
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Ugyldig %s.', true), 'enhed'), 'default', array('class' => 'notice'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectItem', $this->ProjectItem->read(null, $id));
	}

	function add() {
		$this->set('title_for_layout', 'Opret ny Enhed');	
		if (!empty($this->data)) {
			$this->ProjectItem->create();

            //create new user
            if($this->data['ProjectItem']['createNew']){
	            $this->data['ProjectItem']['item_id'] = null;
            } else {                                 
	            $this->data['ProjectItem']['title'] = "";
	            $this->data['ProjectItem']['description'] = "";
	            $this->data['ProjectItem']['power_usage'] = "";	            	            
            }

			if ($this->ProjectItem->save($this->data)) {
				$this->Session->setFlash(sprintf(__('%s er blevet gemt!', true), 'Enheden'), 'default', array('class' => 'success'));
				
				//$this->redirect(array('action' => 'index'));
                                $this->redirect('/projects/edit/'.$this->data['ProjectItem']['project_id']);
			} else {
				$this->Session->setFlash(sprintf(__('%s kunne ikke gemmes. Forsøg igen.', true), 'Enheden'), 'default', array('class' => 'error'));
				
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
		$this->set('title_for_layout', 'Rediger Enhed');	
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Ugyldig %s.', true), 'enhed'), 'default', array('class' => 'notice'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectItem->save($this->data)) {
				$this->Session->setFlash(sprintf(__('%s er blevet gemt!', true), 'Enheden'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('%s kunne ikke gemmes. Forsøg igen.', true), 'Enheden'), 'default', array('class' => 'error'));
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

		$projectItem = $this->ProjectItem->read(null, $id);
	
		$this->set(compact('items', 'projects', 'parameters', 'allowed_projects', 'projectItem'));
	}

	function delete($id = null) {
		$this->set('title_for_layout', 'Slet Enhed');	
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Ugyldigt ID for %s.', true), 'enheden'), 'default', array('class' => 'notice'));
			
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectItem->delete($id)) {
			$this->Session->setFlash(sprintf(__('%s er slettet.', true), 'Enheden'), 'default', array('class' => 'success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s kunne ikke slettes. Forsøg igen.', true), 'Enheden'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}
?>