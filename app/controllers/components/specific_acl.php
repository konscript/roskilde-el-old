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

    function check($model, $id) {
    	$model = Inflector::camelize($model);
		if ($this->Acl->check($this->Auth->user(), array('model'=>$model,'foreign_key'=>$id))) {
			return true;
		} else {
			return false;
		}
    }

	function allow($model, $data) {
		if ($data[$model]['user_id'] != 0) {
			$user = array('model'=>'User','foreign_key'=>$data[$model]['user_id']);
			$element = array('model'=>$model,'foreign_key'=>$data[$model]['id']);
			$this->Acl->allow($user, $element);	
		}		
	}

	function deny($model, $data) {
		if ($data[$model]['user_id'] != 0) {
			$user = array('model'=>'User','foreign_key'=>$data[$model]['user_id']);
			$element = array('model'=>$model,'foreign_key'=>$data[$model]['id']);
			$this->Acl->deny($user, $element);
		}			
	}

}

?>
