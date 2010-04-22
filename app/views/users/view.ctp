<div class="users view">
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Navn'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('E-mail'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['username']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rolle'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($user['Role']['title'], array('controller' => 'roles', 'action' => 'view', $user['Role']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Oprettet'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Redigeret'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="actions">
	<h3><?php __('Handlinger'); ?></h3>
	<ul>
		<li><?php echo $this->Output->edit(); ?></li>
		<li><?php echo $this->Output->delete(); ?></li>
	</ul>
</div>

<?php if (!empty($user['Section'])) { ?>
<div class="related">
	<h3><?php printf(__('Sektionsleder', true), __('', true));?></h3>
	<?php
	
	$header = array(
		"id" => "ID",
		"title" => "Navn",
		"created" => "Oprettet",
		"modified" => "Redigeret",		
		"actions" => "Handlinger"	
	);
	echo $this->Output->index($header, $user['Section'], false, true, 'Section');
	
	?>
</div>
<?php } ?>
<?php if (!empty($user['Group'])) { ?>
<div class="related">
	<h3><?php printf(__('Gruppeleder', true), __('', true));?></h3>
	<?php
	
	$header = array(
		"id" => "ID",
		"title" => "Navn",
		"section_id" => "Sektion",
		"created" => "Oprettet",
		"modified" => "Redigeret",		
		"actions" => "Handlinger"	
	);
	echo $this->Output->index($header, $user['Group'], false, true, 'Group');
	
	?>
</div>
<?php } ?>
<?php if (!empty($user['Project'])) { ?>
<div class="related">
	<h3><?php printf(__('Projektleder', true), __('', true));?></h3>
	<?php
	
	$header = array(
		"id" => "ID",
		"title" => "Navn",
		"total_power_usage" => "Strømforbrug",		
		"group_id" => "Gruppe",
		"created" => "Oprettet",
		"modified" => "Redigeret",		
		"actions" => "Handlinger"	
	);
	echo $this->Output->index($header, $user['Project'], false, true, 'Project');
	
	?>
</div>
<?php } ?>