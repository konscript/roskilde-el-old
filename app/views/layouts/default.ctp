<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $title_for_layout; ?> - Roskilde Festival El-system</title>

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
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22779835-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>        
</head>
<body>
	<div id="container">
		<div id="header">
			<div class="inside">
				<h1 style="float: left; margin-top: 3px;">
					<?php echo $html->image('logo.png', array('alt' => "Roskilde Festival - EL Booking", 'border' => "0", 'url' => "/"));?>
				</h1>
				<div id="user" style="float: right; margin-right: -5px;">
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
					<?php 
					echo $this->Session->flash();
					if ($this->params['action'] == 'login' && $this->Session->flash('auth')) { 
						echo
							'<div id="flashMessage" class="notice" style="display: none; ">
							Log ind i systemet herunder for at få adgang til dine projekter.</div>';
					} else {
						echo $this->Session->flash('auth');
					}
					?>
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
				<div style="float: left;">
					<div id="footer_object" class="button_beta" style="float: left;">beta<br />v1.4</div>
					<div id="footer_text" style="float: left;">Roskilde Festival El-system 2010</div>
				</div>
				<div style="float: right;">
					<div id="footer_object" style="float: right;"><?php echo $html->image('konscript-icon.png', array('alt' => "Konscript", 'border' => "0", 'url' => "http://konscript.com", 'class' => 'konscript-icon'));?></div>
					<div id="footer_text" style="float: right;">Juiced by</div>
				</div>
			</div>
		</div>
	<?php //echo $this->element('sql_dump'); ?>
		
	</div>

</body>
</html>
