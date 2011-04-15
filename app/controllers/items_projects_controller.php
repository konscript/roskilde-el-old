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
		    	$project_ids = $this->data["ItemsProject"]["project_id"];
		    	
	        	//add to multiple projects	
		    	if(is_array($project_ids)){
					foreach($project_ids as $id){
						$record = $this->data;
						$record["ItemsProject"]["project_id"] = $id;
						 
						$this->ItemsProject->create();						
		                $success = $this->ItemsProject->save($record);						
					}		    		
		    	//add to single project
		    	}else{
		    	...
		    	}
		    	
		    		
		    	--------view helper-------
				/ ** assign to specific project ** /
                  	if (isset($this->params["pass"][0])) {		    
					              
				    / ** choose project(s) from list ** /   
                    } else {                    		
                        $project_value = array('type' => 'select', 'multiple' => 'checkbox');
                            $assigned_to_project_string = "";
                    }					    		    
	 */
	
	function add($project_id) {
		if (!empty($this->data)) {
			
			//Create new item (cake creates relation automagically)
		    if(isset($this->data["Item"])){
		    	
		        $this->data["Item"]["id"] = null; //set item_id to null, to be sure a new record is created
                $this->ItemsProject->Item->create();
                $success = $this->ItemsProject->Item->save($this->data);                               
                
            //Use existing item (Only create relation)  
		    }elseif(isset($this->data["ItemsProject"])){		    
		    	$this->ItemsProject->create();
	            $success = $this->ItemsProject->save($this->data);		    	
		    }else{
		    	$success = false;
		    }			
			
			if ($success) {
				$this->Session->setFlash(__('The items project has been saved', true));
				$this->redirect(array('controller'=>'projects', 'action' => 'view', $project_id));
			} else {
				$this->Session->setFlash(__('The items project could not be saved. Please, try again.', true));
			}
		}
		$items = $this->ItemsProject->Item->find('list', array(
			"conditions" => array("Item.template"=>1)
		));
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