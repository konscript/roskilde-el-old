<div class="items form">
<?php echo $this->Form->create('Item');?>
	<fieldset>
 		<legend><?php printf(__('Rediger %s', true), __('Enhedsskabelon', true)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('label' => 'Navn'));
		echo $this->Form->input('description', array('label' => 'Beskrivelse'));
		echo $this->Form->input('power_usage', array('label' => 'Strømforbrug'));
		echo $this->Form->input('Project', array('label' => 'Oprettet i følgende projekter', 'type' => 'select', 'multiple' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Gem', true));?>
</div>