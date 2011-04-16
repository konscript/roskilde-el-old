<div class="items view">
<h3><?php echo $item['Item']['title']; ?></h3>
	<dl><?php $i = 0; $class = ' class="altrow"';?>

			<?php echo $item['Item']['description']; ?>
			&nbsp;

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
	</ul>
</div>
<div class="related">
	<h3><?php __('Projekter hvor enheden benyttes');?></h3>
	<?php if (!empty($item['Project'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Title'); ?></th>
		<th><?php __('Body'); ?></th>
		<th><?php __('Total Power Usage'); ?></th>
		<th><?php __('Total Power Allowance'); ?></th>

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
			<td><?php echo $this->Html->link($project['title'], array('controller' => 'projects', 'action' => 'view', $project['id'])); ?></td>
			<td><?php echo $project['body'];?></td>
			<td><?php echo $project['total_power_usage'];?></td>
			<td><?php echo $project['total_power_allowance'];?></td>
	
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
