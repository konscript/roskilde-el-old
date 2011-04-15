<?php
class Item extends AppModel {
    //var $actsAs = 'ExtendAssociations'; 
	var $name = 'Item';

	var $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Indtast enhedens navn ',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'power_usage' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Indtast det estimerede strømforbrug for enheden',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	var $hasAndBelongsToMany = array(
		'Project' => array(
			'className' => 'Project',
			'with'=>'ItemsProject'
		)
	);
	
	// Virtual field that concatenates title and power usage (used in dropdowns in views)
	var $virtualFields = array(
    	'details' => 'CONCAT(Item.title, " (", Item.power_usage, " watt)")'
	);	

}
?>
