<?php
class ItemsController extends AppController {

	var $name = 'Items';

	function index() {
		$this->Item->recursive = 0;
		$this->set('title_for_layout', 'Alle enheder');			
		$this->set('items', $this->paginate());
	}

	function view($id = null) {		
	
		if (!$id) {
			$this->Session->setFlash(__('Invalid item', true));
			$this->redirect(array('action' => 'index'));
		}
		

		//make HABTM binding to Projects
	    $this->Item->bindModel(array(
	        'hasAndBelongsToMany' => array('Project')
	    ));

        $this->Item->Behaviors->attach('Containable');	    
		$item = $this->Item->find("first", array(
		    "conditions"=>array("Item.id"=>$id),
		    'contain' => 'Project'
		));
		
	    $title_for_layout = "Se enhed";
		$this->set(compact('item', 'title_for_layout'));
	}
	
	
	
	function add($project_id = null) {
	
		if (!empty($this->data)) {	
				
			//if the item is not related to any project, don't make association. Therefore remove ItemsProject key
			if($this->data["ItemsProject"][0]["project_id"]==null){
			    unset($this->data["ItemsProject"]);
			}
			
			//remove validation for item_id to avoid errors
 	        unset($this->Item->ItemsProject->validate['item_id']);
 	        unset($this->Item->ItemsProject->validate['project_id']); 	        
 	        				
            //attempt to save item					
			$this->Item->create(); 		 	         	        
			if ($this->Item->saveAll($this->data, array('validate'=>'first'))) { //item successfully save								
		        $this->Session->setFlash(__('The item was saved and associated with the project', true));            	
		        
		        //redirect depends on referrer
		        $redirect = $project_id != null ? array('controller'=>'projects', 'action' => 'view', $project_id) : array('action'=>'index');		        
        		$this->redirect($redirect);
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.', true));
			}		
		}
    	
    	//if project_id isset, only fetch this project. Else fetch all projects
		$projects = isset($project_id) ? $this->Item->ItemsProject->Project->find('list', array("conditions"=>array("Project.id"=>$project_id))) : $this->Item->ItemsProject->Project->find('list');
		
		//pass data to view
		$this->set(compact('projects', 'hideQuantityField'));
	}
	

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Item->save($this->data)) {
				$this->Session->setFlash(__('The item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Item->read(null, $id);
		}
		$projects = $this->Item->ItemsProject->Project->find('list');
		$this->set(compact('projects'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for item', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Item->delete($id)) {
			$this->Session->setFlash(__('Item deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Item was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
