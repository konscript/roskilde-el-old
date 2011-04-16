<?php

class Project extends AppModel {

	var $name = 'Project';
	// Ties projects to ACL, so each time a new project is created, it's also added to the ACOS table	
	var $actsAs = array('Acl' => array('type' => 'controlled'), 'Containable', 'WhoDidIt');
	//var $recursive = 2;

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
				'allowEmpty' => false
			),
		),
		'total_power_allowance' => array(
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Tilladt strømforbrug skal være et tal',
				'allowEmpty' => false				
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
				'message' => 'Den pågældende bruger findes ikke',
				'allowEmpty' => true				
			)
		)
	);
	
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
	var $hasAndBelongsToMany = 'Item';

    // Defines hierachy in the ACL/ACO structure
	function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		$data = $this->data;
		if (empty($this->data)) {
			$data = $this->read();
		}
		if (!isset($data['Project']['group_id'])) {
			$groupdata = $this->read();
			$data['Project']['group_id'] = $groupdata['Project']['group_id'];
		}
		if (!$data['Project']['group_id']) {
			return null;
		} else {
			$this->Group->id = $data['Project']['group_id'];
			$groupNode = $this->Group->node();
			return array('Group' => array('id' => $groupNode[0]['Aco']['foreign_key']));
		}
	}
	
	// Updates the ACO entry if it's parent_id (Group) has been changed	
	function afterSave($created) {
        if (isset($data['Project']['group_id']) && !$created) {
            $parent = $this->parentNode();
            $parent = $this->node($parent);
            $node = $this->node();
            $aco = $node[0];
            $aco['Aco']['parent_id'] = $parent[0]['Aco']['id'];
            $this->Aco->save($aco);
        }
	}
		
}
?>
