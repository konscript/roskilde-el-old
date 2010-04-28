<?php
// user is logged in
if($currentuser) {
	echo "<span style='margin-right: 5px; font-weight: bold;'>" . $currentuser['username'] . "</span> ";
	/*echo "(";
	if ($currentuser['role_id'] == 1) { echo "Administrator"; } else
	if ($currentuser['role_id'] == 2) { echo "Sektionsleder"; } else
	if ($currentuser['role_id'] == 3) { echo "Gruppeleder"; } else
	if ($currentuser['role_id'] == 4) { echo "Projektleder"; }
	echo ") - "; */						
	echo $html->link("Min Profil", array('controller'=>'users', 'action'=>'profile'), array('class' => 'button_usermeta'));
	echo " ";
	echo $html->link("Log Ud", array('controller'=>'users', 'action'=>'logout'), array('class' => 'button_usermeta'));

// if not logged in
} else {
	echo $html->link("Log Ind", array('controller'=>'users', 'action'=>'login'), array('class' => 'button_usermeta'));
} 
?>
