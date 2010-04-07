<?php
class Group extends AppModel {

	var $name = 'Group';
	var $actsAs = array('Acl' => array('type' => 'controlled'));

	function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		$data = $this->data;
		if (empty($this->data)) {
			$data = $this->read();
		} 
		if (!$data['Group']['section_id']) {
			return null;
		} else {
			$this->Section->id = $data['Group']['section_id'];
			$sectionNode = $this->Section->node();
			return array('Section' => array('id' => $sectionNode[0]['Aco']['foreign_key']));
		}
	}
	
	function afterSave($created) {
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
				'message' => 'Navnet på gruppen må ikke være tom',
				'allowEmpty' => false
			),
		),
		'section_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Der skal angives en projektleder',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Section' => array(
			'className' => 'Section',
			'foreignKey' => 'section_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => array('User.role_id' => '3'),
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'group_id',
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