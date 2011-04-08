<?php

class SpecificAclComponent extends Object {

	var $components = array('Acl', 'Auth');

	function initialize(&$controller, $settings = array()) {
		// saving the controller reference for later use
		$this->controller =& $controller;
	}
	
	/**
 	* Used for printing out which elements the current user is allowed to see on an index page
 	*
 	* @param string $model Name of current model, in camelcase like "Project"
 	* @param array $elements An array with the current data as obtained with $this->paginate()
 	* @return array List of element IDs that the current user is allowed to see
 	* @access public
 	*/
    function index($model, $elements) {

    	$allowed_ids = array();
		$i = 0;
		foreach($elements as $element) {
			if ($this->check($model, $element[$model]['id'])) {
				$allowed_ids[$i] = $element[$model]['id'];
				$i++;
			}
		}
		return $allowed_ids; 
    }
    
	/**
 	* Check the if the current user has access to a specific id in a model (Project, Group, Section)
 	*
 	* @param string $model Name of current model, in camelcase like "Project"
 	* @param int $id The row-specific id number to check up on
 	* @return boolean
 	* @access public
 	*/
    function check($model, $id) {
    	$model = Inflector::camelize($model);
    	
		if ($this->Acl->check($this->Auth->user(), array('model'=>$model,'foreign_key'=>$id))) {
			return true;
		} else {
			return false;
		}
    }
    
    
    /** get all the rows the user has permission to see at once**/
    function checkMany($modelName){                   
    
        //make sure modelname is singular (Project, not projects)
        $modelName = Inflector::singularize($modelName);                
        $model = ClassRegistry::init($modelName);
        
        //do custom query to get interval for allowed acos
        $interval = $model->query("
            SELECT lft, rght FROM acos WHERE id = ( 
                SELECT aco_id FROM  aros_acos  WHERE aro_id = ( 
                    SELECT id FROM aros WHERE foreign_key = ".$this->Auth->user("id")." && model =  'User' ))
         "); 
                  
         //get projects within interval (allowed projects)
         $project_ids = ClassRegistry::init('acos')->find("list", array(
            "conditions"=>array("acos.lft BETWEEN ? AND ?" => array($interval[0]["acos"]["lft"], $interval[0]["acos"]["rght"])),
            'fields' => array('acos.foreign_key')
         ));       
        
        //get entries that belongs to allowed projects, and to the current model (eg. ProjectItem)
		$allowed_entry_ids = $model->find("list", array( 
		    'conditions' => array('ProjectItem.project_id' => $project_ids),
		    'recursive'=>-1
	    ));                     

        //only return the ids of the allowed entries
        return array_keys($allowed_entry_ids);
        
    }

	function allow($model, $data) {
		if (isset($data[$model]['user_id']) && $data[$model]['user_id'] != 0) {
			$user = array('model'=>'User','foreign_key'=>$data[$model]['user_id']);
			$element = array('model'=>$model,'foreign_key'=>$data[$model]['id']);
			$this->Acl->allow($user, $element);	
		}		
	}

	function deny($model, $data) {
		if (isset($data[$model]['user_id']) && $data[$model]['user_id'] != 0) {
			$user = array('model'=>'User','foreign_key'=>$data[$model]['user_id']);
			$element = array('model'=>$model,'foreign_key'=>$data[$model]['id']);
			$this->Acl->deny($user, $element);
		}			
	}

}
?>
