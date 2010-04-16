<div class="projects form">
<?php echo $this->Form->create('Project', array('type' => 'file'));?>
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
       	} ?>
       	<div>
			<?php if ($project['Project']['file_path'] != '') { ?>
	       		<label>Nuværende vedhæftede kort:</label>
				<?php echo $html->link(
							$html->image('/attachments/photos/thumb/'.$project['Project']['file_path']),
							'/attachments/photos/default/'.$project['Project']['file_path'],
							array('escape'=>false)); 
			} else {
				echo "<i>Der er endnu ikke vedhæftet noget kort til projektet</i>";
			}
			?>
       	</div>
		<?php
        echo $this->Form->input('uploadAttachment', array('label' => 'Upload nyt kort', 'type' => 'checkbox', 'checked' => 'false', 'class'=>'toggleClass'));
        ?><div><?php
	        echo $form->file('Attachment');
			echo "<br /><br /><i>Følgende filtyper er tilladt: JPEG, PNG og GIF. Billedet vil automatisk blive beskæret og skaleret.</i>";	                
        ?></div><div></div>
	</fieldset>
<?php echo $this->Form->end(__('Gem', true));?>
</div>

<div class="related">
	<h3><?php printf(__('%s', true), __('Enheder', true));?></h3>
	<?php if (!empty($project['ProjectItem'])) { ?>
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
		foreach ($project['ProjectItem'] as $project_item):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<?php // custom item
            if (!$project_item['item_id']) { ?>
				<td><?php echo $this->Html->link($project_item['title'], array('controller' => 'project_items', 'action' => 'view', $project_item['id']));?></td>
				<td><?php echo $project_item['description'];?></td>
				<td><?php echo $project_item['power_usage'];?></td>
				<td><?php __('Egen'); ?></td>
			<?php // generic item
			} else { ?>
				<td><?php echo $this->Html->link($project_item['Item']['title'], array('controller' => 'project_items', 'action' => 'view', $project_item['id']));?></td>
				<td><?php echo $project_item['Item']['description'];?></td>
				<td><?php echo $project_item['Item']['power_usage'];?></td>
				<td><?php __('Skabelon'); ?></td>
			<?php } ?>
			<td class="actions">
				<?php $this->Output->edit(null, array('controller' => 'project_items', 'action' => 'edit', $project_item['id'], '?' => array('project_id' => $project['Project']['id']))); ?>
				<?php $this->Output->delete(null, array('controller' => 'project_items', 'action' => 'delete', $project_item['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php } else { ?>
	<p>Der er endnu ikke tilknyttet nogen enheder til projektet</P>
<?php } ?>
	<div class="actions">
		<ul>
			<li>
			<?php $this->Output->add('Opret ny Enhed', array('controller' => 'project_items', 'action' => 'add', '?' => array('project_id' => $project['Project']['id']))); ?>
			</li>
		</ul>
	</div>
</div>