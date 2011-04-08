<?php
class ProjectItemsController extends AppController {

	var $name = 'ProjectItems';
	var $components = array('SpecificAcl');		
    var $helpers = array('Output');
    var $paginate = array(
        'limit' => 25,
        'order' => array(
            'ProjectItem.title' => 'asc'
        )
    );


	function index() {
		$this->set('title_for_layout', 'Alle Enheder');	
		$this->ProjectItem->recursive = 0;


        $allowed_projectitem_ids = $this->SpecificAcl->checkMany("ProjectItems");
       

		// setup pagination for allowed projects only
	    //$allowed_projectitems = $this->paginate = array('conditions' => array('ProjectItem.project_id' => $allowed_projectitem_ids), 'limit' => 20);

	    $allowed_projects = $this->paginate('ProjectItem', array('ProjectItem.id' => $allowed_projectitem_ids));		
		$this->set('projectItems', $allowed_projects);

		
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
		
        if (isset($this->params['url']['project_id'])) {
	        // SPECIFICACL: Project-based permission check
			if (!$this->SpecificAcl->check("Project", $this->params['url']['project_id'])) {
				$this->Session->setFlash('Du har ikke adgang til projektet du forsøger at oprette enhed til', 'default', array('class' => 'error'));
				$this->redirect(array('controller' => 'projects', 'action' => 'index'));
			}		
		}
					
		$this->set('title_for_layout', 'Opret ny Enhed');	
		if (!empty($this->data)) {
			$this->ProjectItem->create();

            //create new item
            if(!$this->data['ProjectItem']['useTemplate']){
	            $this->data['ProjectItem']['item_id'] = null;
            } else {                                 
	            $this->data['ProjectItem']['title'] = "";
	            $this->data['ProjectItem']['description'] = "";
	            $this->data['ProjectItem']['power_usage'] = "";	            	            
            }

			if ($this->ProjectItem->save($this->data)) {
				$this->Session->setFlash(sprintf(__('%s er blevet gemt!', true), 'Enheden'), 'default', array('class' => 'success'));
                $this->redirect(array('controller' => 'projects', 'action' => 'view', $this->data['ProjectItem']['project_id']));				
			} else {
				$this->Session->setFlash(sprintf(__('%s kunne ikke gemmes. Forsøg igen.', true), 'Enheden'), 'default', array('class' => 'error'));
				
			}
		}
		$items = $this->ProjectItem->Item->find('list', array('fields' => array('Item.id', 'Item.details')));
		$parameters = $this->params['url'];
		
		$allowed_project_ids = $this->SpecificAcl->index("Project", $this->ProjectItem->Project->find('all'));
		$allowed_projects = $this->ProjectItem->Project->find('list', array('conditions' => array('Project.id' => $allowed_project_ids))); 		
		
		$this->set(compact('items', 'parameters', 'allowed_projects'));
	}

	function edit($id = null) {
		$this->set('title_for_layout', 'Rediger Enhed');	
		
        if (isset($this->params['url']['project_id'])) {
	        // SPECIFICACL: Project-based permission check
			if (!$this->SpecificAcl->check("Project", $this->params['url']['project_id'])) {
				$this->Session->setFlash('Du har ikke adgang til det projekt som enheden er knyttet til', 'default', array('class' => 'error'));
				$this->redirect(array('controller' => 'projects', 'action' => 'index'));
			}		
		}		
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Ugyldig %s.', true), 'enhed'), 'default', array('class' => 'notice'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectItem->save($this->data)) {
				$this->Session->setFlash(sprintf(__('%s er blevet gemt!', true), 'Enheden'), 'default', array('class' => 'success'));
                $this->redirect(array('controller' => 'projects', 'action' => 'view', $this->data['ProjectItem']['project_id']));				
			} else {
				$this->Session->setFlash(sprintf(__('%s kunne ikke gemmes. Forsøg igen.', true), 'Enheden'), 'default', array('class' => 'error'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectItem->read(null, $id);
		}
		$items = $this->ProjectItem->Item->find('list', array('fields' => array('Item.id', 'Item.details')));
		$parameters = $this->params['url'];		

		$allowed_project_ids = $this->SpecificAcl->index("Project", $this->ProjectItem->Project->find('all'));
		$allowed_projects = $this->ProjectItem->Project->find('list', array('conditions' => array('Project.id' => $allowed_project_ids))); 		
	
		$this->set(compact('items', 'parameters', 'allowed_projects'));
	}

	function delete($id = null) {
		$this->set('title_for_layout', 'Slet Enhed');	

		if (!$id) {
			$this->Session->setFlash(sprintf(__('Ugyldigt ID for %s.', true), 'enheden'), 'default', array('class' => 'notice'));			
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectItem->read(null, $id);
		}
		if ($this->ProjectItem->delete($id)) {
			$this->Session->setFlash(sprintf(__('%s er slettet.', true), 'Enheden'), 'default', array('class' => 'success'));
            $this->redirect(array('controller' => 'projects', 'action' => 'view', $this->data['ProjectItem']['project_id']));				
		}
		$this->Session->setFlash(sprintf(__('%s kunne ikke slettes. Forsøg igen.', true), 'Enheden'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}
?>
