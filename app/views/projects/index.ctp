<div class="projects index">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Navn', 'title');?></th>
			<th><?php echo $this->Paginator->sort('Aktuelt strømforbrug', 'total_power_usage');?></th>
			<th><?php echo $this->Paginator->sort('Tilladt strømforbrug', 'total_power_allowance');?></th>
			<th><?php echo $this->Paginator->sort('Status', 'status');?></th>
			<th><?php echo $this->Paginator->sort('Gruppe', 'group_id');?></th>
			<th><?php echo $this->Paginator->sort('Projektleder', 'user_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Handlinger');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($projects as $project):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $project['Project']['id']; ?>&nbsp;</td>
		<td><?php echo $this->Html->link($project['Project']['title'], array('action' => 'view', $project['Project']['id']));?>&nbsp;</td>
		<td><?php echo $project['Project']['total_power_usage']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['total_power_allowance']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['status']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($project['Group']['title'], array('controller' => 'groups', 'action' => 'view', $project['Group']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($users[$project['Project']['user_id']], array('controller' => 'users', 'action' => 'view', $project['User']['id'])); ?>
		</td>
		<td><?php echo $project['Project']['created']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $project['Project']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $project['Project']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $project['Project']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p class="meta">
	<?php echo $this->Paginator->counter(array('format' => __('Side %page% af %pages%, viser %current% elementer ud af i alt %count%', true))); ?>
	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('< '.__('forrige -', true), array(), null, array('class'=>'disabled'));?>
		<?php echo $this->Paginator->numbers();?>
		<?php echo $this->Paginator->next(__('- næste', true).' >', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Project', true)), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Groups', true)), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Group', true)), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Users', true)), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('User', true)), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Project Items', true)), array('controller' => 'project_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Project Item', true)), array('controller' => 'project_items', 'action' => 'add')); ?> </li>
	</ul>
</div>