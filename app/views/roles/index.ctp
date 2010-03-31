<div class="roles index">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($roles as $role):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $role['Role']['id']; ?>&nbsp;</td>
		<td><?php echo $role['Role']['title']; ?>&nbsp;</td>
		<td><?php echo $role['Role']['created']; ?>&nbsp;</td>
		<td><?php echo $role['Role']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $role['Role']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $role['Role']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $role['Role']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $role['Role']['id'])); ?>
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
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Role', true)), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Users', true)), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('User', true)), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>