<div class="projects view">

	<h3><?php echo $project['Project']['title']; ?></h3><br />
	<?php echo $project['Project']['body']; ?><br /><br />
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Aktuelt Strømforbrug'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Output->powerUsage($project['Project']['total_power_usage'], $project['Project']['total_power_allowance']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tilladt Strømforbrug'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['total_power_allowance']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Byggestrøm, start'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $this->Time->format( 'd/m Y', $project['Project']['build_start']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Byggestrøm, slut'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $this->Time->format( 'd/m Y', $project['Project']['build_end']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Enhedsstrøm, start'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $this->Time->format( 'd/m Y', $project['Project']['items_start']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Enhedsstrøm, slut'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $this->Time->format( 'd/m Y', $project['Project']['items_end']); ?>		
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Output->status(true, $project['Project']['status']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Gruppe'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($project['Group']['title'], array('controller' => 'groups', 'action' => 'view', $project['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projektleder'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($project['User']['title'], array('controller' => 'users', 'action' => 'view', $project['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Oprettet'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['created']; ?>
			af <?php echo $this->Html->link($project['CreatedBy']['title'], array('controller' => 'users', 'action' => 'view', $project['CreatedBy']['id'])); ?>
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Redigeret'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['modified']; ?>
			af <?php echo $this->Html->link($project['ModifiedBy']['title'], array('controller' => 'users', 'action' => 'view', $project['ModifiedBy']['id'])); ?>
		</dd>		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kort'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php if ($project['Project']['file_path'] != '') {
				echo $html->link(
							//$html->image('/attachments/photos/thumb/'.$project['Project']['file_path'])				
							$this->Output->icon('020', 'large').'Se nuværende kort',
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
	<h3><?php __('Handlinger'); ?></h3>
	<ul>
		<li><?php echo $this->Output->edit(); ?></li>
		<li><?php echo $this->Output->delete(); ?></li>
		<li><?php echo $this->Output->export(); ?></li>		
	</ul>
</div>

<div class="related">
	<h3><?php printf(__('Tilknyttede %s', true), __('Enheder', true));?></h3>
	<?php
	
	$header = array(
		"title" => "Navn",
		"description" => "Beskrivelse",
		"power_usage" => "Strømforbrug",
		"quantity" => "Antal",
		"type" => "Type",
		"actions" => "Handlinger"	
	);
	
	debug($project_items);
	
	$data = array();
	foreach ($project_items as $key => $project_item) {
		$data[$key]['ProjectItem'] = array(
			"title" => $this->Html->link($project_item['ProjectItem']['title'], array('controller' => 'project_items', 'action' => 'view', $project_item['ProjectItem']['id'])),
			"description" => $project_item['ProjectItem']['description'],		
			"power_usage" => $project_item['ProjectItem']['power_usage'],
			"quantity" => $project_item['ProjectItem']['quantity'],
			"type" => "Egen",
			"actions" => $this->Output->edit(null, array('controller' => 'project_items', 'action' => 'edit', $project_item['ProjectItem']['id'], '?' => array('project_id' => $project['Project']['id']))).$this->Output->delete(null, array('controller' => 'project_items', 'action' => 'delete', $project_item['ProjectItem']['id']))	
		);
	}
	echo $this->Output->index($header, $data, true, false);
	
	?>
	<div class="actions">
		<ul>
			<li>
			<?php echo $this->Output->add('Opret ny Enhed', array('controller' => 'project_items', 'action' => 'add', '?' => array('project_id' => $project['Project']['id']))); ?>
			</li>
		</ul>
	</div>
</div>
