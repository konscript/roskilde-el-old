<h2>Frontpage</h2><br />

<?php 
	echo "Currently logged in as: <strong>";
	echo $session->read('Auth.User.username'); 
?><br />
<?php echo $html->link("login", array('controller'=>'users', 'action'=>'login')); ?> /
<?php echo $html->link("logout", array('controller'=>'users', 'action'=>'logout')); ?><br /><br />

<?php echo $html->link("Users", array('controller'=>'users', 'action' => 'index')); ?> <br />
<?php echo $html->link("Groups", array('controller'=>'groups', 'action' => 'index')); ?> <br />
<?php echo $html->link("Sections", array('controller'=>'sections', 'action' => 'index')); ?> <br />
<?php echo $html->link("Roles", array('controller'=>'roles', 'action' => 'index')); ?> <br /><br />

<?php echo $html->link("Projects", array('controller'=>'projects', 'action' => 'index')); ?> <br />
<?php echo $html->link("Project Items", array('controller' => 'project_items', 'action' => 'index')); ?> <br />
<?php echo $html->link("Items", array('controller'=>'items', 'action' => 'index')); ?> <br />
