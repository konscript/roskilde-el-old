<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $title_for_layout; ?></title>

     	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <?php
	        //echo $this->Html->meta('icon');

	        //echo $this->Html->css('cake.generic');
	        echo $this->Html->css('style.css');
	        echo $this->Html->css('datePicker.css');

	        //echo $this->Html->css('fancyForm.css');
	        //echo $this->Html->script('mootools.js');
	        //echo $this->Html->script('moo.fancyForm.js');			
			
	        echo $this->Html->script('global.js');
	        echo $this->Html->script('date.js');
	        echo $this->Html->script('jquery.datePicker.js');
	        echo $this->Html->script('cake.datePicker.js');

	        echo $scripts_for_layout;
        ?>
</head>
<body>
	<div id="container">
		<div id="header">
			<div class="inside">
				<h1 style="float: left;">
					<?php echo $html->image('logo.png', array('alt' => "Roskilde Festival - EL Booking", 'border' => "0", 'url' => "/"));?>
				</h1>
				<div id="user" style="float: right">
					<?php echo $this->element('usermeta'); ?>
				</div>
				<ul id="menu" style="float: right; clear: right;">
					<?php echo $this->element('menu'); ?>
				</ul>
			</div>
		</div>
		<div id="subheader">
			<div class="inside">
				<h2 style="float: left;">
					<?php echo $title_for_layout; ?>
				</h2>
				<div style="float: right">
					<?php echo $this->Session->flash(); ?>
					<?php echo $this->Session->flash('auth'); ?>

					<?php 
					//if($this->params['action'] == 'add' || $this->params['action'] == 'edit') { 
					//	echo $html->link("Annuller", array('controller'=>$this->params['controller'], 'action' => 'index'));
					//} else if($this->params['action'] != 'index') {
					//	echo $html->link("Gå tilbage", array('controller'=>$this->params['controller'], 'action' => 'index')); 
					//} ?>
				</div>
			</div>
		</div>
		<div id="content">
			<div class="inside">
	
				<?php echo $content_for_layout; ?>
			</div>
		</div>
		<div id="footer">
			<div class="inside">
				<span style="float: left;">El Booking for Roskilde Festival 2010</span>
				<span style="float: right;">Beta v1.2 'AC/DC'</span>
			</div>
		</div>
	<?php echo $this->element('sql_dump'); ?>
		
	</div>

</body>
</html>
