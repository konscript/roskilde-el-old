<?php

class Project extends AppModel {

	var $name = 'Project';
	var $actsAs = array('Acl' => array('type' => 'controlled')); //controlled type is of type ACO  = Object to get

    //Defines hierachy in the ACL/ACO structure
	function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		$data = $this->data;
		if (empty($this->data)) {
			$data = $this->read();
		} 
		if (!$data['Project']['group_id']) {
			return null;
		} else {
                        //
			$this->Group->id = $data['Project']['group_id'];
			$groupNode = $this->Group->node();
			return array('Group' => array('id' => $groupNode[0]['Aco']['foreign_key']));
		}
	}
	
	function afterSave($created) {
		// Updates the ACO entry if it's parent_id (Group) has been changed
        if (!$created) {
            $parent = $this->parentNode();
            $parent = $this->node($parent);
            $node = $this->node();
            $aco = $node[0];
            $aco['Aco']['parent_id'] = $parent[0]['Aco']['id'];
            $this->Aco->save($aco);
        }
	}	
		
	var $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Navnet på projektet må ikke være tomt',
				'allowEmpty' => false
			),
		),
		'total_power_usage' => array(
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Aktuelt strømforbrug skal være et tal',
				'allowEmpty' => true
			),
		),
		'total_power_allowance' => array(
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Tilladt strømforbrug skal være et tal',
				'allowEmpty' => true				
			),
		),
		'status' => array(
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Status angives som talkode og må ikke være tomt (benyt 0 som standard)',
				'allowEmpty' => false
			),
		),
		'group_id' => array(
			'numeric' => array(
				'rule' => 'numeric',
				'allowEmpty' => true
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Den pågældende bruger findes ikke'
			)
		)
	);
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => array('User.role_id' => '4'),
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'ProjectItem' => array(
			'className' => 'ProjectItem',
			'foreignKey' => 'project_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>