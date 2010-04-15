<div class="projects form">
<?php echo $this->Form->create('Project');?>
	<fieldset>
 		<legend><?php printf(__('Rediger %s', true), __('Projekt', true)); ?></legend>
	<?php
		echo $this->Form->input('id');

		echo $this->Form->input('title', array('label' => 'Navn'));
		echo $this->Form->input('body', array('label' => 'Beskrivelse'));
		// echo $this->Form->input('total_power_usage');
        if ($role_id <= 2) {
            echo $this->Form->input('total_power_allowance', array('label' => 'Tilladt strømforbrug'));
        }
		//echo $datePicker->picker('build_start');
        echo $datePicker->picker('build_start', array('label' => 'Byggestrøm, start'));
		echo $datePicker->picker('build_end', array('label' => 'Byggestrøm, slut'));
		echo $datePicker->picker('items_start', array('label' => 'Enhedsstrøm, start'));
		echo $datePicker->picker('items_end', array('label' => 'Enhedsstrøm, slut'));
        if ($role_id <= 2) {
            echo $this->Form->input('status', array('label' => 'Status', 'options' => array(
            	'0'=>'Igangværende',
            	'1'=>'Godkendt',
            	'2'=>'Afvist')));
            echo $this->Form->input('group_id', array('label' => 'Gruppe'));
        }
       	if ($role_id <= 3) {
			echo $this->Form->input('user_id', array('label' => 'Projektleder'));       	
       	}

        
        //echo "Billede: ". $html->image('/attachments/photos/med/'.$project['Project']['file_path']);
	?>

	</fieldset>
<?php echo $this->Form->end(__('Gem', true));?>
</div>

<?php
//upload form
//echo $form->create('Project', array('type' => 'file'));
//echo $form->file('Attachment');
?>

<div class="related">
	<h3><?php printf(__('%s', true), __('Enheder', true));?></h3>
	<?php if (!empty($project['ProjectItem'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Navn'); ?></th>
		<th><?php __('Beskrivelse'); ?></th>
		<th><?php __('Strømforbrug'); ?></th>
		<th><?php __('Type'); ?></th>
		<th class="actions"><?php __('Handlinger');?></th>
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

			<?php
            // custom item
            if (!$projectItem['item_id']) { ?>
				<td><?php echo $this->Html->link($projectItem['title'], array('controller' => 'project_items', 'action' => 'view', $projectItem['id']));?></td>
				<td><?php echo $projectItem['description'];?></td>
				<td><?php echo $projectItem['power_usage'];?></td>
				<td>Custom</td>
			<?php
			// generic item
			} else { 
				foreach ($items as $item): 
					if ($item['Item']['id'] == $projectItem['item_id']) { ?>
						<td><?php echo $this->Html->link($item['Item']['title'], array('controller' => 'project_items', 'action' => 'view', $projectItem['id']));?></td>
						<td><?php echo $item['Item']['description'];?></td>
						<td><?php echo $item['Item']['power_usage'];?></td>
						<td>Generisk</td>
					<?php } ?> 							
				<?php endforeach; ?>
			<?php } ?>
			<td class="actions">
				<?php echo $this->Html->link(__('Rediger', true), array('controller' => 'project_items', 'action' => 'edit', $projectItem['id'], '?' => array('project_id' => $project['Project']['id'])), array('class' => 'action_edit')); ?>
				<?php echo $this->Html->link(__('Slet', true), array('controller' => 'project_items', 'action' => 'delete', $projectItem['id']), array('class' => 'action_delete'), sprintf(__('Are you sure you want to delete # %s?', true), $projectItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li>
			<?php echo $this->Html->link(sprintf(__('Opret ny %s', true), __('Enhed', true)), array('controller' => 'project_items', 'action' => 'add', '?' => array('project_id' => $project['Project']['id'])), array('class' => 'action_new'));?>
			</li>
		</ul>
	</div>
</div>
