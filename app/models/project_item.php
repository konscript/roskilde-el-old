<?php
class ProjectItem extends AppModel {

	var $name = 'ProjectItem';

	/* var $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'power_usage' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	); */
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Item' => array(
			'className' => 'Item',
			'foreignKey' => 'item_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	// Finds a projects attached project items and sum the values which it returns
	function SumByProject($project_id) {
		$generic = $this->find('all', array('conditions' => array('ProjectItem.project_id' => $project_id, 'ProjectItem.item_id !=' => null), 'fields' => array('SUM(Item.power_usage) as summed_power_usage')));
		$custom = $this->find('all', array('conditions' => array('ProjectItem.project_id' => $project_id, 'ProjectItem.item_id =' => null), 'fields' => array('SUM(ProjectItem.power_usage) as summed_power_usage')));		
		$total = $generic[0][0]['summed_power_usage'] + $custom[0][0]['summed_power_usage'];
		return $total; 	
	}	

	// Updates the corresponding projects DB field with the a calculated total power usage of attached project items
	function afterSave() {
		$project_id = $this->data['ProjectItem']['project_id'];
		$total = $this->SumByProject($project_id);
		$this->Project->id = $project_id;
		$this->Project->saveField('total_power_usage', $total);
		// $data = array('Project' => array('id' => $project_id, 'total_power_usage'=> $total));
		// $this->Project->save($data, false, array('Project.total_power_usage'));
	}

	// Updates the corresponding projects DB field with the a calculated total power usage of attached project items
	/* function afterDelete() {
		$data = $this->ProjectItem->read(null, $this->id);
		$project_id = $data['ProjectItem']['project_id'];
		die(print_r($data));
		$total = $this->SumByProject($project_id);
		$this->Project->id = $project_id;
		$this->Project->saveField('total_power_usage', $total);
		// $data = array('Project' => array('id' => $project_id, 'total_power_usage'=> $total));
		// $this->Project->save($data, false, array('Project.total_power_usage'));
	} */
	
}
?>