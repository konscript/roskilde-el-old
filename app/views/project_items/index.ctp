<div class="projectItems index">
	<h2><?php __('Project Items');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('power_usage');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('item_id');?></th>
			<th><?php echo $this->Paginator->sort('project_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($projectItems as $projectItem):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $projectItem['ProjectItem']['id'];?></td>	
		<?php if (!$projectItem['ProjectItem']['item_id']) { ?>
			<td><?php echo $projectItem['ProjectItem']['title'];?></td>
			<td><?php echo $projectItem['ProjectItem']['description'];?></td>
			<td><?php echo $projectItem['ProjectItem']['power_usage'];?></td>
			<td>Custom</td>
			<td>N/A</td>
		<?php } else { ?>
			<td><?php echo $projectItem['Item']['title'];?></td>
			<td><?php echo $projectItem['Item']['description'];?></td>
			<td><?php echo $projectItem['Item']['power_usage'];?></td>
			<td>Generic</td>	
			<td>
				<?php echo $this->Html->link($projectItem['Item']['title'], array('controller' => 'items', 'action' => 'view', $projectItem['Item']['id'])); ?>
			</td>
		<?php } ?>	
		<td>
			<?php echo $this->Html->link($projectItem['Project']['title'], array('controller' => 'projects', 'action' => 'view', $projectItem['Project']['id'])); ?>
		</td>
		<td><?php echo $projectItem['ProjectItem']['created']; ?>&nbsp;</td>
		<td><?php echo $projectItem['ProjectItem']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $projectItem['ProjectItem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $projectItem['ProjectItem']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $projectItem['ProjectItem']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectItem['ProjectItem']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Project Item', true)), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Items', true)), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Item', true)), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Projects', true)), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Project', true)), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>