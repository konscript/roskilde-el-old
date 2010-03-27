<div class="projects form">
<?php echo $this->Form->create('Project');?>
	<fieldset>
 		<legend><?php printf(__('Edit %s', true), __('Project', true)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('body');
		echo $this->Form->input('total_power_usage');
		echo $this->Form->input('total_power_allowance');
		echo $this->Form->input('build_start');
		echo $this->Form->input('build_end');
		echo $this->Form->input('items_start');
		echo $this->Form->input('items_end');
		echo $this->Form->input('status');
		echo $this->Form->input('group_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Project.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Project.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Projects', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Groups', true)), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Group', true)), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Users', true)), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('User', true)), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Project Items', true)), array('controller' => 'project_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Project Item', true)), array('controller' => 'project_items', 'action' => 'add', '?' => array('project_id' => $project['Project']['id']))); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php printf(__('Related %s', true), __('Project Items', true));?></h3>
	<?php if (!empty($project['ProjectItem'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Title'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Power Usage'); ?></th>
		<th><?php __('Type'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($project['ProjectItem'] as $projectItem):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<?php if (!$projectItem['item_id']) { ?>
				<td><?php echo $projectItem['title'];?></td>
				<td><?php echo $projectItem['description'];?></td>
				<td><?php echo $projectItem['power_usage'];?></td>
				<td>Custom</td>
			<?php } else { 
				foreach ($items as $item): 
					if ($item['Item']['id'] == $projectItem['item_id']) { ?>
						<td><?php echo $item['Item']['title'];?></td>
						<td><?php echo $item['Item']['description'];?></td>
						<td><?php echo $item['Item']['power_usage'];?></td>
						<td>Generic</td>	
					<?php } ?> 							
				<?php endforeach; ?>
			<?php } ?>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'project_items', 'action' => 'view', $projectItem['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'project_items', 'action' => 'edit', $projectItem['id'], '?' => array('project_id' => $project['Project']['id']))); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'project_items', 'action' => 'delete', $projectItem['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li>
			<?php echo $this->Html->link(sprintf(__('New %s', true), __('Project Item', true)), array('controller' => 'project_items', 'action' => 'add', '?' => array('project_id' => $project['Project']['id'])));?>
			</li>
		</ul>
	</div>
</div>
