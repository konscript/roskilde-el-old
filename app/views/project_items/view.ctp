<div class="projectItems view">
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectItem['ProjectItem']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Navn'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php if (!$projectItem['ProjectItem']['item_id']) { 
				echo $projectItem['ProjectItem']['title']; 
			} else {
				echo $projectItem['Item']['title']; 
			} ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Beskrivelse'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php if (!$projectItem['ProjectItem']['item_id']) { 
				echo $projectItem['ProjectItem']['description']; 
			} else {
				echo $projectItem['Item']['description']; 
			} ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Strømforbrug'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php if (!$projectItem['ProjectItem']['item_id']) { 
				echo $projectItem['ProjectItem']['power_usage']; 
			} else {
				echo $projectItem['Item']['power_usage']; 
			} ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Enhedsskabelon'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php if (!$projectItem['ProjectItem']['item_id']) { 
				echo "N/A";
			} else {
				echo $this->Html->link($projectItem['Item']['title'], array('controller' => 'items', 'action' => 'view', $projectItem['Item']['id']));
			} ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projekt'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($projectItem['Project']['title'], array('controller' => 'projects', 'action' => 'view', $projectItem['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Oprettet'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectItem['ProjectItem']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Redigeret'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectItem['ProjectItem']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('Rediger %s', true), __('', true)), array('action' => 'edit', $projectItem['ProjectItem']['id']), array('class' => 'action_edit')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('Slet %s', true), __('', true)), array('action' => 'delete', $projectItem['ProjectItem']['id']), array('class' => 'action_delete'), sprintf(__('Er du sikker på du vil slette #%s?', true), $projectItem['ProjectItem']['id'])); ?> </li>
	</ul>
</div>
