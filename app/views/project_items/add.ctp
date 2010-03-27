<div class="projectItems form">
<?php echo $this->Form->create('ProjectItem');?>
	<fieldset>
 		<legend><?php printf(__('Add %s', true), __('Project Item', true)); ?></legend>
	<?php
	
        echo $this->Form->input('', array('label' => 'Opret en ny enhed', 'type' => 'checkbox', 'checked' => 'true', 'class' => 'toggleClass'));
		?><div><?php		
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('power_usage');
		?></div><?php
		?><div><?php		
		echo $this->Form->input('item_id', array('options' => $items, 'empty' => 'Custom'));
		?></div><?php
		// echo $this->Form->select('item_id', array('options' => $items, 'empty' => 'Custom'), null, array(), 1);
		// echo $this->Form->input('item_id');
		if (isset($parameters['project_id'])) {			
			echo $this->Form->input('project_id', array('options' => array($parameters['project_id'] => $projects[$parameters['project_id']])));
		} else {
			echo $this->Form->input('project_id', array('options' => array($allowed_projects)));
		}	
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Project Items', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Items', true)), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Item', true)), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Projects', true)), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Project', true)), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>