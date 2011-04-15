<?php
class ItemsProjectsController extends AppController {

	var $name = 'ItemsProjects';

	function index() {
		$this->ItemsProject->recursive = 0;
		$this->set('itemsProjects', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid items project', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('itemsProject', $this->ItemsProject->read(null, $id));
	}

/**
  	function add($project_id = null) {
		$this->set('title_for_layout', 'Opret ny Enhedsskabelon');	
		
		if (!empty($this->data)) {
		    
		    debug($this->data);
            exit();

            //If model "Item" is set, there is no template. Insert new Item entry
		    if(isset($this->data["Item"])){
		        $this->data["Item"]["id"] = null; //set item_id to null, to be sure a new record is created
                $this->Item->create();
                $success = $this->Item->save($this->data);
            //when using a template (a previous item), save to ItemsProject model (only saving the relation - no item is saved!)
		    }else{
                $success = $this->Item->ItemsProject->save($this->data);
		    }
		
			if ($success) {
				$this->Session->setFlash(sprintf(__('%s er blevet gemt!', true), 'Enhedsskabelonen'), 'default', array('class' => 'success'));
				
                //redirect: if saving an item related to a project, return to project. Else return to Item/index
			    $redirectArray = $project_id != null ? array('controller'=>'projects', 'action' => 'view', $project_id) : array('action' => 'index');
    		    $this->redirect($redirectArray);
    		    
			} else {
				$this->Session->setFlash(sprintf(__('%s kunne ikke gemmes. Forsøg igen.', true), 'Enhedsskabelonen'), 'default', array('class' => 'error'));
			}

		}
		
		//Set project id to view
		if($project_id != null){
		    $this->data["Project"]["id"] = $project_id;
		}
		
		$items = $this->Item->find('list');
		$projects = $this->Item->Project->find('list');		
		$this->set(compact('projects', 'items', 'project_id'));
	}
 */	
	
	function add() {
		if (!empty($this->data)) {
			
			//Create new item (cake creates relation automagically)
		    if(isset($this->data["Item"])){
		    	
		        $this->data["Item"]["id"] = null; //set item_id to null, to be sure a new record is created
                $this->ItemsProject->Item->create();
                $success = $this->ItemsProject->Item->save($this->data);                               
                
            //Use existing item (Only create relation)  
		    }elseif(isset($this->data["ItemsProject"])){		    
		    	$project_ids = $this->data["ItemsProject"]["project_id"];
		    	
	        	//add to multiple projects	
		    	if(is_array($project_ids)){
					foreach($project_ids as $project_id){
						$record = $this->data;
						$record["ItemsProject"]["project_id"] = $project_id;
						 
						$this->ItemsProject->create();						
		                $success = $this->ItemsProject->save($record);						
					}		    		
		    	//add to single project
		    	}else{		    	
			    	$this->ItemsProject->create();
	                $success = $this->ItemsProject->save($this->data);
		    	}
		    	
		    }else{
		    	$success = false;
		    }			
			
			if ($success) {
				$this->Session->setFlash(__('The items project has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The items project could not be saved. Please, try again.', true));
			}
		}
		$items = $this->ItemsProject->Item->find('list');
		$projects = $this->ItemsProject->Project->find('list');
		$this->set(compact('items', 'projects'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid items project', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ItemsProject->save($this->data)) {
				$this->Session->setFlash(__('The items project has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The items project could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ItemsProject->read(null, $id);
		}
		$items = $this->ItemsProject->Item->find('list');
		$projects = $this->ItemsProject->Project->find('list');
		$this->set(compact('items', 'projects'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for items project', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ItemsProject->delete($id)) {
			$this->Session->setFlash(__('Items project deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Items project was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>