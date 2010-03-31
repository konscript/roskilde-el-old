<div class="items form">
<?php echo $this->Form->create('Item');?>
	<fieldset>
 		<legend><?php printf(__('Rediger %s', true), __('Enhedsskabelon', true)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('label' => 'Navn'));
		echo $this->Form->input('description', array('label' => 'Beskrivelse'));
		echo $this->Form->input('power_usage', array('label' => 'Strømforbrug'));
		echo $this->Form->input('Project', array('label' => 'Projekter'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Gem', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Item.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Item.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Items', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Projects', true)), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Project', true)), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>