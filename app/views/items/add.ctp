<div class="items form">
<?php echo $this->Form->create('Item');?>
	<fieldset>
		<legend><?php __('Add Item'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('power_usage');
		echo $this->Form->input('template');
		echo $this->Form->input('Project');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Items', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>