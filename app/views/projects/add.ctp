<div class="projects form">
<?php echo $this->Form->create('');?>
	<fieldset>
 		<legend><?php printf(__('Opret %s', true), __('Projekt', true)); ?></legend>
	<?php
		echo $this->Form->input('Project.title', array('label' => 'Navn'));
		echo $this->Form->input('Project.body', array('label' => 'Beskrivelse'));
		//echo $this->Form->input('total_power_usage');
		echo $this->Form->input('Project.total_power_allowance', array('label' => 'Tilladt strømforbrug'));
		//echo $this->Form->input('Project.build_start');
		//echo $this->Form->input('Project.build_end');
		//echo $this->Form->input('Project.items_start');
		//echo $this->Form->input('Project.items_end');
		//echo $this->Form->input('status');
		echo $this->Form->input('Project.group_id', array('label' => 'Gruppe', 'options' => array($allowed_groups)));
        echo $this->Form->input('User.createNew', array('label' => 'Opret ny projektleder ', 'type' => 'checkbox', 'checked'=>'true', 'class'=>'toggleClass'));
        ?><div><?php
	        echo $this->Form->input('User.title', array('label' => 'Projektlederens navn'));
	        echo $this->Form->input('User.username', array('label' => 'Projektlederens e-mail'));
			echo "<i>Adgangskode vil blive automatisk genereret og brugeren vil modtage en velkomst e-mail med information og log ind oplysninger!</i>";	                
        ?></div><div><?php
	        echo $this->Form->input('User.user_id', array('label' => 'Tilknyt en eksisterende projektleder'));
        ?></div><?php
        //echo $this->Form->input('User.password');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Opret', true));?>
</div>