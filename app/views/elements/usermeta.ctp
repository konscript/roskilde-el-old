<?php
// user is logged in
if($user) {
	echo "<em><strong>" . $user['username'] . "</strong></em> ";
	echo "(";
	if ($user['role_id'] == 1) { echo "Administrator"; } else
	if ($user['role_id'] == 2) { echo "Sektionsleder"; } else
	if ($user['role_id'] == 3) { echo "Gruppeleder"; } else
	if ($user['role_id'] == 4) { echo "Projektleder"; }
	echo ") - ";						
	echo $html->link("Min Profil", array('controller'=>'users', 'action'=>'profile'));
	echo " - ";
	echo $html->link("Log Ud", array('controller'=>'users', 'action'=>'logout'));

// if not logged in
} else {
	echo $html->link("Log Ind", array('controller'=>'users', 'action'=>'login'));
} 
?>
