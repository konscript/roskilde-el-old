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
    function allowedProjects(){                   
    
        //model arbitratily chosen (does it matter?)
        $model = ClassRegistry::init("Project");
        
        //get allowed projects
        $query = $model->query("
SELECT distinct foreign_key FROM acos a INNER JOIN
    (
        SELECT lft, rght
        FROM acos
        WHERE
            id IN ( 
                SELECT aco_id
                FROM aros_acos
                WHERE
                    (aro_id = (
                        SELECT parent_id
                        FROM aros
                        WHERE foreign_key = ".$this->Auth->user("id")." && model =  'User'
                    )
                    OR aro_id = (
                        SELECT id
                        FROM aros
                        WHERE foreign_key = ".$this->Auth->user("id")." && model =  'User'
                    ))
                    AND _read = '1'
            )
    ) i ON a.lft>=i.lft AND a.rght<=i.rght WHERE a.model='Project'");     
  
        //flatten array
        $allowed_project_ids = array();
        foreach($query as $key=>$value){
            $allowed_project_ids[] = $value["a"]["foreign_key"];
        }        
         
       return $allowed_project_ids;               
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
