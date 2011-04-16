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
		$this->set('item', $this->Item->read(null, $id));
	}
	
	
	
	function add($project_id = null) {
	

		if (!empty($this->data)) {	
				
			$this->Item->create(); //attempt to save item	
 	        unset($this->Item->ItemsProject->validate['item_id']);
			if ($this->Item->saveAll($this->data, array('validate'=>'first'))) { //item successfully save								
		        $this->Session->setFlash(__('The item was saved and associated with the project', true));            	
		        $this->redirect(array('action' => 'index'));							
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.', true));
			}		
		} //save end
		
        $project_value = array('type'=>'hidden', 'value'=>$project_id);			       
    	
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
		$projects = $this->Item->Project->find('list');
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
