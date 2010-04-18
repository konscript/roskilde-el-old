<div class="projectItems form">
<?php echo $this->Form->create('ProjectItem');?>
	<fieldset>
 		<legend><?php printf(__('Opret %s', true), __('Enhed', true)); ?></legend>
		<?php
        echo $this->Form->input('useTemplate', array('label' => 'Benyt en eksisterende Enhedsskabelon', 'type' => 'checkbox', 'checked' => 'false', 'class' => 'toggleClass'));
		?><div><?php		
			echo $this->Form->input('item_id', array('label' => 'Vælg enhedsskabelonen', 'options' => $items));
		?></div><?php
		?><div><?php		
			echo $this->Form->input('title', array('label' => 'Navn'));
			echo $this->Form->input('description', array('label' => 'Beskrivelse'));
			echo $this->Form->input('power_usage', array('label' => 'Strømforbrug'));           
		?></div><?php
        echo $this->Form->input('quantity', array('label' => 'Antal'));
		// echo $this->Form->select('item_id', array('options' => $items, 'empty' => 'Custom'), null, array(), 1);
		// echo $this->Form->input('item_id');
		if (isset($parameters['project_id'])) {
            echo "<strong>Tilknyttet til følgende projekt:</strong> ".$projects[$parameters['project_id']] ." (".$parameters['project_id'].")";
            echo $this->Form->input('project_id', array('label' => 'Projekt', 'type'=>'hidden', 'value' => $parameters['project_id']));
		} else {
			echo $this->Form->input('project_id', array('label' => 'Projekt', 'options' => array($allowed_projects)));
		}	
	?>
	</fieldset>
<?php echo $this->Form->end(__('Opret', true));?>
</div>