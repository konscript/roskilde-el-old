<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $title_for_layout; ?></title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <?php
                echo $this->Html->meta('icon');
                echo $this->Html->css('cake.generic');
                echo $this->Html->css('style.css');
                echo $this->Html->script('global.js');
                echo $scripts_for_layout;
        ?>
</head>
<body>
    <div id="container">
    	<div id="wrapper">
	        <div id="header">

				<h1 style="float: left;"><?php echo $this->Html->link(__('Roskilde Festival - El Booking', true), '/'); ?></h1>
				<div style="float:right">
					<em><?php echo $session->read('Auth.User.username'); ?></em> - 
					<?php echo $html->link("login", array('controller'=>'users', 'action'=>'login')); ?>
					<?php echo " / "; ?> 
					<?php echo $html->link("logout", array('controller'=>'users', 'action'=>'logout')); ?>
				</div>

			</div>
			<div id="content">
	
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->Session->flash('auth'); ?>
	
				<?php echo $content_for_layout; ?>
	
			</div>
			<div id="footer">
			</div>
    	</div>
    </div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>