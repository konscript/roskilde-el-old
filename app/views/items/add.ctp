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
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Items', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Projects', true)), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Project', true)), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>