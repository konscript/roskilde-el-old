<div class="projects view">

	<h3><?php echo $project['Project']['title']; ?></h3><br />
	<?php echo $project['Project']['body']; ?><br /><br />
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Aktuelt Strømforbrug'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<span class="icon_powerusage_<?php
				 if ($project['Project']['total_power_allowance'] == 0) {
				 	echo "0";			 	
				 } else if ($project['Project']['total_power_usage'] < $project['Project']['total_power_allowance']) {
				 	echo "1";
				 } else if ($project['Project']['total_power_usage'] > $project['Project']['total_power_allowance']) {
				 	echo "2"; }
			?>"><?php echo $project['Project']['total_power_usage'] ."</span>"; ?>			
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tilladt Strømforbrug'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['total_power_allowance']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Byggestrøm, start'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['build_start']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Byggestrøm, slut'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['build_end']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Enhedsstrøm, start'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['items_start']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Enhedsstrøm, slut'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['items_end']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<div class="icon_status_<?php echo $project['Project']['status']; ?>" style="float: left; width: 20px;">&nbsp;</div>
			<?php
			 if ($project['Project']['status'] == 0) {
			 	echo "Igangværende";			 	
			 } else if ($project['Project']['status'] == 1) {
			 	echo "Godkendt";
			 } else if ($project['Project']['status'] == 2) {
			 	echo "Afvist"; }
			?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Gruppe'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($project['Group']['title'], array('controller' => 'groups', 'action' => 'view', $project['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projektleder'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($project['User']['username'], array('controller' => 'users', 'action' => 'view', $project['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Oprettet'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Redigeret'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['modified']; ?>
			&nbsp;
		</dd>		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kort'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php if ($project['Project']['file_path'] != '') {
				echo $html->link(
							$html->image('/attachments/photos/thumb/'.$project['Project']['file_path']),
							'/attachments/photos/default/'.$project['Project']['file_path'],
							array('escape'=>false)); 
			} else {
				echo "<i>Der er endnu ikke vedhæftet noget kort til projektet</i>";
			}
			?>
		</dd>
	</dl>
</div>

<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php $this->Output->edit(); ?></li>
		<li><?php $this->Output->delete(); ?></li>
		<li><?php $this->Output->export(); ?></li>		
	</ul>
</div>

<div class="related">
	<h3><?php printf(__('%s', true), __('Enheder', true));?></h3>
	<?php if (!empty($project['ProjectItem'])) { ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Navn'); ?></th>
		<th><?php __('Beskrivelse'); ?></th>
		<th><?php __('Strømforbrug'); ?></th>
        <th><?php __('Antal'); ?></th>
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
                <td><?php echo $project_item['quantity'];?></td>
				<td><?php __('Egen'); ?></td>
			<?php // generic item
			} else { ?>
				<td><?php echo $this->Html->link($project_item['Item']['title'], array('controller' => 'project_items', 'action' => 'view', $project_item['id']));?></td>
				<td><?php echo $project_item['Item']['description'];?></td>
				<td><?php echo $project_item['Item']['power_usage'];?></td>
                <td><?php echo $project_item['Item']['quantity'];?></td>
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
