<div class="itemsProjects form">
<?php echo $this->Form->create('ItemsProject');?>
	<fieldset>
		<legend><?php __('Edit Items Project'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('item_id');
		echo $this->Form->input('project_id');
		echo $this->Form->input('quantity');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ItemsProject.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ItemsProject.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Items Projects', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>