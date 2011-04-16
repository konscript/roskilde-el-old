<?php
class ItemsProject extends AppModel {	

    var $displayField = 'quantity';
	var $belongsTo = array("Item", "Project");
	var $actsAs = array('WhoDidIt');
	var $validate = array(
		'item_id' => array(
			'numeric' => array(
				'rule' => array('numeric')
			),
            "unique"=>array( 
                    "rule"=>array("checkUnique", array("project_id", "item_id")), 
                    "message"=>"Enheden er allerede tilknyttet projektet. "
            ) 			
		),
		'project_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Your custom message here'
			),
		),
		'quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Indtast antallet af enheder, der skal tilknyttes projektet',
			),
		)	
	);	
	
        /** 
         * checks is the field value is unqiue in the table 
         * note: we are overriding the default cakephp isUnique test as the 
original appears to be broken 
         * 
         * @param string $data Unused ($this->data is used instead) 
         * @param mnixed $fields field name (or array of field names) to 
validate 
         * @return boolean true if combination of fields is unique 
         */ 	
        function checkUnique($data, $fields) { 
                if (!is_array($fields)) { 
                        $fields = array($fields); 
                } 
                foreach($fields as $key) { 
                        $tmp[$key] = $this->data[$this->name][$key]; 
                } 
                if (isset($this->data[$this->name][$this->primaryKey])) { 
                        $tmp[$this->primaryKey] = "<>".$this->data[$this->name][$this->primaryKey]; 
                } 
                return $this->isUnique($tmp, false); 
        } 	
}
?>
