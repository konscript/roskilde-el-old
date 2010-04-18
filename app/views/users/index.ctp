<div class="users index">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Navn', 'title');?></th>
			<th><?php echo $this->Paginator->sort('E-mail', 'username');?></th>
			<th><?php echo $this->Paginator->sort('Rolle', 'role_id');?></th>
			<th><?php echo $this->Paginator->sort('Oprettet', 'created');?></th>
			<th><?php echo $this->Paginator->sort('Redigeret', 'modified');?></th>
			<th class="actions"><?php __('Handlinger');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $user['User']['id']; ?>&nbsp;</td>
		<td><?php echo $this->Html->link($user['User']['title'], array('action' => 'view', $user['User']['id'])); ?>&nbsp;</td>
		<td><?php echo $user['User']['username']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['Role']['title'], array('controller' => 'roles', 'action' => 'view', $user['Role']['id'])); ?>
		</td>
		<td><?php echo $user['User']['created']; ?>&nbsp;</td>
		<td><?php echo $user['User']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
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
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('User', true)), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Roles', true)), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Role', true)), array('controller' => 'roles', 'action' => 'add')); ?> </li>
	</ul>
</div>