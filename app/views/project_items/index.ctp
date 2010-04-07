<div class="projectItems index">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Navn', 'title');?></th>
			<th><?php echo $this->Paginator->sort('Beskrivelse', 'description');?></th>
			<th><?php echo $this->Paginator->sort('Strømforbrug', 'power_usage');?></th>
			<th><?php echo $this->Paginator->sort('Type', 'type');?></th>
			<th><?php echo $this->Paginator->sort('Skabelon', 'item_id');?></th>
			<th><?php echo $this->Paginator->sort('Projekt', 'project_id');?></th>
			<th class="actions"><?php __('Handlinger');?></th>
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
			<td><?php echo $this->Html->link($projectItem['ProjectItem']['title'], array('action' => 'view', $projectItem['ProjectItem']['id']));?></td>
			<td><?php echo $projectItem['ProjectItem']['description'];?></td>
			<td><?php echo $projectItem['ProjectItem']['power_usage'];?></td>
			<td>Custom</td>
			<td>N/A</td>
		<?php } else { ?>
			<td><?php echo $this->Html->link($projectItem['Item']['title'], array('action' => 'view', $projectItem['ProjectItem']['id']));?></td>
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
		<td class="actions">
			<?php echo $this->Html->link(__('Rediger', true), array('action' => 'edit', $projectItem['ProjectItem']['id']), array('class' => 'action_edit')); ?>
			<?php echo $this->Html->link(__('Slet', true), array('action' => 'delete', $projectItem['ProjectItem']['id']), array('class' => 'action_delete'), sprintf(__('Are you sure you want to delete # %s?', true), $projectItem['ProjectItem']['id'])); ?>
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
		<li><?php echo $this->Html->link(sprintf(__('Opret ny %s', true), __('Enhed', true)), array('action' => 'add'), array('class' => 'action_new')); ?></li>
	</ul>
</div>