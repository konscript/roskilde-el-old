<?php

$menu = array();

// all users
if($currentuser['role_id'] <= 4 && $currentuser['role_id'] != 0) {
	$menu[0] = "<li>".$this->Output->icon('170', 'small')."</li>";						
	$menu[1] = "<li>".$html->link("Projekter", array('controller'=>'projects', 'action' => 'index'))."</li>";
}

//group manager
if($currentuser['role_id'] <= 3 && $currentuser['role_id'] != 0) {
	$menu[4] = "<li>".$html->link("Brugere", array('controller'=>'users', 'action' => 'index'))."</li>";
}

// section managers and admins 					
if($currentuser['role_id'] <= 2 && $currentuser['role_id'] != 0) {
	$menu[2] = "<li>".$html->link("Enheder", array('controller' => 'items', 'action' => 'index'))."</li>";
	$menu[3] = "<li>".$this->Output->icon('041', 'small')."</li>";
	$menu[5] = "<li>".$html->link("Grupper", array('controller'=>'groups', 'action' => 'index'))."</li>";
}
// admins
if($currentuser['role_id'] <= 1 && $currentuser['role_id'] != 0) {
	$menu[6] = "<li>".$html->link("Sektioner", array('controller'=>'sections', 'action' => 'index'))."</li>";
	$menu[7] = "<li>".$html->link("Roller", array('controller'=>'roles', 'action' => 'index'))."</li>";	
}


ksort($menu);
foreach($menu as $point){
    echo $point;
}

?>		
