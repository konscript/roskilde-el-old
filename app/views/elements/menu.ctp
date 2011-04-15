<?php
// all users
if($currentuser['role_id'] <= 4 && $currentuser['role_id'] != 0) {
	echo "<li>".$this->Output->icon('170', 'small')."</li>";						
	echo "<li>".$html->link("Projekter", array('controller'=>'projects', 'action' => 'index'))."</li>";
}
// section managers and admins 					
if($currentuser['role_id'] <= 2 && $currentuser['role_id'] != 0) {
	echo "<li>".$html->link("Enheder", array('controller' => 'items', 'action' => 'index'))."</li>";
	echo "<li>".$this->Output->icon('041', 'small')."</li>";
	echo "<li>".$html->link("Brugere", array('controller'=>'users', 'action' => 'index'))."</li>";
	echo "<li>".$html->link("Grupper", array('controller'=>'groups', 'action' => 'index'))."</li>";
}
// admins
if($currentuser['role_id'] <= 1 && $currentuser['role_id'] != 0) {
	echo "<li>".$html->link("Sektioner", array('controller'=>'sections', 'action' => 'index'))."</li>";
	echo "<li>".$html->link("Roller", array('controller'=>'roles', 'action' => 'index'))."</li>";	
}
?>		
