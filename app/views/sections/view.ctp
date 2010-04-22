<div class="sections view">
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $section['Section']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Navn'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $section['Section']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sektionsleder'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($section['User']['username'], array('controller' => 'users', 'action' => 'view', $section['User']['id'])); ?>
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Oprettet'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $section['Section']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Redigeret'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $section['Section']['modified']; ?>
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

<div class="related">
	<h3><?php printf(__('Tilhørende %s', true), __('Grupper', true));?></h3>
	<?php
	
	$header = array(
		"id" => "ID",
		"title" => "Navn",
		"user_id" => "Gruppeleder",
		"created" => "Oprettet",
		"modified" => "Redigeret",
		"actions" => "Handlinger"	
	);
	echo $this->Output->index($header, $section['Group'], false, true, 'Group');
	
	?>
</div>