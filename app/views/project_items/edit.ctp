<div class="projectItems form">
<?php echo $this->Form->create('ProjectItem');?>
	<fieldset>
 		<legend><?php printf(__('Rediger %s', true), __('Enhed', true)); ?></legend>
	<?php
		if (!$projectItem['ProjectItem']['item_id']) {
			echo $this->Form->input('title', array('label' => 'Navn'));
			echo $this->Form->input('description', array('label' => 'Beskrivelse'));
			echo $this->Form->input('power_usage', array('label' => 'Strømforbrug'));
            echo $this->Form->input('quantity', array('label' => 'Antal'));
		} else {
			echo $this->Form->input('item_id', array('label' => 'Enhedsskabelon', 'options' => $items));
            echo $this->Form->input('quantity', array('label' => 'Antal'));
		}
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
<?php echo $this->Form->end(__('Gem', true));?>
</div>