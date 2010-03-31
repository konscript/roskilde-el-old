<?php
// all users
if($user['role_id'] <= 4 && $user['role_id'] != 0) {						
	echo "<li>".$html->link("Projekter", array('controller'=>'projects', 'action' => 'index'))."</li>";
	echo "<li>".$html->link("Enheder", array('controller' => 'project_items', 'action' => 'index'))."</li>";
}
// section managers and admins 					
if($user['role_id'] <= 2 && $user['role_id'] != 0) {
	echo "<li>".$html->link("Brugere", array('controller'=>'users', 'action' => 'index'))."</li>";
	echo "<li>".$html->link("Grupper", array('controller'=>'groups', 'action' => 'index'))."</li>";
	echo "<li>".$html->link("Roller", array('controller'=>'roles', 'action' => 'index'))."</li>";
	echo "<li>".$html->link("Enhedsskabeloner", array('controller'=>'items', 'action' => 'index'))."</li>";					
}
// admins
if($user['role_id'] <= 1 && $user['role_id'] != 0) {
	echo "<li>".$html->link("Sektioner", array('controller'=>'sections', 'action' => 'index'))."</li>";
}
?>		