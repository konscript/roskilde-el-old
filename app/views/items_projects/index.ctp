<div class="itemsProjects index">
	<h2><?php __('Items Projects');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('item_id');?></th>
			<th><?php echo $this->Paginator->sort('project_id');?></th>
			<th><?php echo $this->Paginator->sort('quantity');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($itemsProjects as $itemsProject):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $itemsProject['ItemsProject']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($itemsProject['Item']['title'], array('controller' => 'items', 'action' => 'view', $itemsProject['Item']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($itemsProject['Project']['title'], array('controller' => 'projects', 'action' => 'view', $itemsProject['Project']['id'])); ?>
		</td>
		<td><?php echo $itemsProject['ItemsProject']['quantity']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $itemsProject['ItemsProject']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $itemsProject['ItemsProject']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $itemsProject['ItemsProject']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $itemsProject['ItemsProject']['id'])); ?>
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
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Items Project', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>