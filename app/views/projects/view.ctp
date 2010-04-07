<div class="projects view">
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Navn'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Beskrivelse'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['body']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Aktuelt Strømforbrug'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['total_power_usage']; ?>
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
	</dl>
</div>

<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('Rediger %s', true), __('', true)), array('action' => 'edit', $project['Project']['id']), array('class' => 'action_edit')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('Slet %s', true), __('', true)), array('action' => 'delete', $project['Project']['id']), array('class' => 'action_delete'), sprintf(__('Er du sikker på du vil slette #%s?', true), $project['Project']['id'])); ?> </li>
	</ul>
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
