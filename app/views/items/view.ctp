<div class="items view">
<h2><?php  __('Item');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Power Usage'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['power_usage']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Template'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['template']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Item', true), array('action' => 'edit', $item['Item']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Item', true), array('action' => 'delete', $item['Item']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $item['Item']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Items', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Projects');?></h3>
	<?php if (!empty($item['Project'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Body'); ?></th>
		<th><?php __('Total Power Usage'); ?></th>
		<th><?php __('Total Power Allowance'); ?></th>
		<th><?php __('Build Start'); ?></th>
		<th><?php __('Build End'); ?></th>
		<th><?php __('Items Start'); ?></th>
		<th><?php __('Items End'); ?></th>
		<th><?php __('Status'); ?></th>
		<th><?php __('File Path'); ?></th>
		<th><?php __('Group Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Created By'); ?></th>
		<th><?php __('Modified By'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($item['Project'] as $project):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $project['id'];?></td>
			<td><?php echo $project['title'];?></td>
			<td><?php echo $project['body'];?></td>
			<td><?php echo $project['total_power_usage'];?></td>
			<td><?php echo $project['total_power_allowance'];?></td>
			<td><?php echo $project['build_start'];?></td>
			<td><?php echo $project['build_end'];?></td>
			<td><?php echo $project['items_start'];?></td>
			<td><?php echo $project['items_end'];?></td>
			<td><?php echo $project['status'];?></td>
			<td><?php echo $project['file_path'];?></td>
			<td><?php echo $project['group_id'];?></td>
			<td><?php echo $project['user_id'];?></td>
			<td><?php echo $project['created'];?></td>
			<td><?php echo $project['modified'];?></td>
			<td><?php echo $project['created_by'];?></td>
			<td><?php echo $project['modified_by'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'projects', 'action' => 'view', $project['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'projects', 'action' => 'edit', $project['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'projects', 'action' => 'delete', $project['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $project['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
