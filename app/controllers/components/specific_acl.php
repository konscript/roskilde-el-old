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
    function allowedProjects($modelName){                   
    
        //make sure modelname is singular (Project, not projects)
        $modelName = Inflector::singularize($modelName);                
        $model = ClassRegistry::init($modelName);
        
        //get user perms.
        $interval = $model->query("
            SELECT lft, rght FROM acos WHERE id IN ( 
                SELECT aco_id FROM  aros_acos  WHERE 
                aro_id = (SELECT parent_id FROM aros WHERE foreign_key = ".$this->Auth->user("id")." && model =  'User' )
                OR aro_id = (SELECT id FROM aros WHERE foreign_key = ".$this->Auth->user("id")." && model =  'User' )
                )
         ");     
     
        /*         
         $lft = $interval[0][0]["lft"];
         $rght = $interval[0][0]["rght"];          
        
        //get role perms
        $interval_role = $model->query("
            SELECT min(lft) as lft, max(rght) as rght FROM acos WHERE id IN ( 
                SELECT aco_id FROM  aros_acos  WHERE aro_id = ( 
                    SELECT parent_id FROM aros WHERE foreign_key = ".$this->Auth->user("id")." && model =  'User' ))
         ");                   
                 
         //both role and user permissions
         if(!empty($interval_role) && !empty($interval_user)){
             //the lowest gets assigned
             $lft = $interval_user[0]["acos"]["lft"] > $interval_role[0][0]["lft"] ? $interval_role[0][0]["lft"] : $interval_user[0]["acos"]["lft"];

             //the highest gets assigned
             $rght = $interval_user[0]["acos"]["rght"] < $interval_role[0][0]["rght"] ? $interval_role[0][0]["rght"] : $interval_user[0]["acos"]["rght"];

        //only role permissions
         }elseif(!empty($interval_role)){
             $lft = $interval_role[0][0]["lft"];
             $rght = $interval_role[0][0]["rght"];         
             
         //only user permissions
         }else{
             $lft = $interval_user[0]["acos"]["lft"];
             $rght = $interval_user[0]["acos"]["rght"];                  
         }    
        */
        
 //( SELECT aco_id FROM aros_acos WHERE aro_id = (SELECT parent_id FROM aros WHERE foreign_key = 47 && model = 'User' ) OR aro_id = (SELECT id FROM aros WHERE foreign_key = 47 && model = 'User' ) )        
        
         //get projects within interval (allowed projects)
         $project_ids = ClassRegistry::init('acos')->find("list", array(
            "conditions"=>array("acos.lft BETWEEN ? AND ?" => array($lft, $rght)),
            'fields' => array('acos.foreign_key')
         ));       
         
       return $project_ids;               
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
