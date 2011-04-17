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
				'message' => 'Du skal vælge et projekt, som du vil tilknytte enheden til.'
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
        

	// Finds a projects attached project items and sum the values which it returns
	function SumByProject() {
	
	    $project_id = $this->data["ItemsProject"]["project_id"];   
		$total = $this->find('first', array(
		    'conditions' => array('ItemsProject.project_id' => $project_id), 
		    'fields' => array('SUM(Item.power_usage*ItemsProject.quantity) as total')
	    ));
	    
	    if(!$total[0]["total"]){
	        $total[0]["total"] = 0;
	    }
	    
		$this->Project->id = $project_id;
		$this->Project->saveField('total_power_usage', $total[0]["total"]);	  
	}	

	// Updates the corresponding projects DB field with the a calculated total power usage of attached project items
	function AfterSave() {
		$this->SumByProject();
	}
	
	function beforeDelete(){
        	if(!isset($this->data["ItemsProject"]["project_id"])){
                $ItemsProject = $this->find("first", array(
                    "conditions" => array("ItemsProject.id" => $this->id),
                    "fields" => "ItemsProject.project_id"
                ));
                   
                $this->data["ItemsProject"]["project_id"] = $ItemsProject["ItemsProject"]["project_id"];
            }
            return true;
	}
		
	function afterDelete() {
		$this->SumByProject();
	}	           
}
?>
