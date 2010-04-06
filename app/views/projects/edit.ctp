<div class="projects form">
<?php echo $this->Form->create('Project');?>
	<fieldset>
 		<legend><?php printf(__('Rediger %s', true), __('Projekt', true)); ?></legend>
	<?php
		echo $this->Form->input('id');

		echo $this->Form->input('title', array('label' => 'Navn'));
		echo $this->Form->input('body', array('label' => 'Beskrivelse'));
		//echo $this->Form->input('total_power_usage');
        if($role_id<=2){
            echo $this->Form->input('total_power_allowance', array('label' => 'Tilladt strømforbrug'));
        }
		//echo $datePicker->picker('build_start');
        echo $datePicker->picker('build_start', array('label' => 'Byggestrøm, start'));
		echo $datePicker->picker('build_end', array('label' => 'Byggestrøm, slut'));
		echo $datePicker->picker('items_start', array('label' => 'Enhedsstrøm, start'));
		echo $datePicker->picker('items_end', array('label' => 'Enhedsstrøm, slut'));
        if($role_id<=2){
            echo $this->Form->input('status', array('label' => 'Status'));
            echo $this->Form->input('group_id', array('label' => 'Gruppe'));
            echo $this->Form->input('user_id', array('label' => 'Projektleder'));
        }
	?>
	</fieldset>
<?php echo $this->Form->end(__('Gem', true));?>
</div>

<div class="related">
	<h3><?php printf(__('%s', true), __('Enheder', true));?></h3>
	<?php if (!empty($project['ProjectItem'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Navn'); ?></th>
		<th><?php __('Beskrivelse'); ?></th>
		<th><?php __('Strømforbrug'); ?></th>
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

			<?php /* custom item */
                        if (!$projectItem['item_id']) { ?>
				<td><?php echo $projectItem['title'];?></td>
				<td><?php echo $projectItem['description'];?></td>
				<td><?php echo $projectItem['power_usage'];?></td>
				<td>Custom</td>
                <?php $editButton = $this->Html->link(__('Edit', true), array('controller' => 'project_items', 'action' => 'edit', $projectItem['id'], '?' => array('project_id' => $project['Project']['id']))); ?>
			<?php } else { 
				foreach ($items as $item): 
					if ($item['Item']['id'] == $projectItem['item_id']) { ?>
						<td><?php echo $item['Item']['title'];?></td>
						<td><?php echo $item['Item']['description'];?></td>
						<td><?php echo $item['Item']['power_usage'];?></td>
						<td>Generisk</td>
                        <?php $editButton = ''; ?>
					<?php } ?> 							
				<?php endforeach; ?>
			<?php } ?>
			<td class="actions">
				<?php //echo $this->Html->link(__('View', true), array('controller' => 'project_items', 'action' => 'view', $projectItem['id'])); ?>
				<?php echo $editButton; ?>
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

