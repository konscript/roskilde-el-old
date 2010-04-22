<div class="roles view">
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $role['Role']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Navn'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $role['Role']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Oprettet'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $role['Role']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Redigeret'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $role['Role']['modified']; ?>
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
	<h3><?php printf(__('%s med denne Rolle', true), __('Brugere', true));?></h3>
	<?php
	
	$header = array(
		"id" => "ID",
		"title" => "Navn",
		"username" => "E-mail",
		"created" => "Oprettet",
		"modified" => "Redigeret",
		"actions" => "Handlinger"	
	);
	echo $this->Output->index($header, $role['User'], false, true, 'User');
	
	?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Output->add(null, array('controller' => 'users', 'action' => 'add')); ?>
			</li>
		</ul>
	</div>
</div>