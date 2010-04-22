<div class="items form">
<?php echo $this->Form->create('Item');?>
	<fieldset>
 		<legend><?php printf(__('Opret %s', true), __('Enhedsskabelon', true)); ?></legend>
	<?php
		echo $this->Form->input('title', array('label' => 'Navn'));
		echo $this->Form->input('description', array('label' => 'Beskrivelse'));
		echo $this->Form->input('power_usage', array('label' => 'Strømforbrug'));
		echo $this->Form->input('Project', array('label' => 'Opret i følgende projekter', 'type' => 'select', 'multiple' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Opret', true));?>
</div>