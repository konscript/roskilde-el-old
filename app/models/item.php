<?php
class Item extends AppModel {

	var $name = 'Item';
	var $actsAs = array('WhoDidIt');
	var $hasMany = "ItemsProject";
	var $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Indtast enhedens navn '
			),
		),
		'power_usage' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Indtast det estimerede strømforbrug for enheden'
			),
		),
	);
	
	// Virtual field that concatenates title and power usage (used in dropdowns in views)
	var $virtualFields = array(
    	'details' => 'CONCAT(Item.title, " (", Item.power_usage, " watt)")'
	);	

}
?>
