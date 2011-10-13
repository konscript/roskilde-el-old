<div class="itemsProjects view">
<h2><?php  __('Items Project');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $itemsProject['ItemsProject']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Item'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($itemsProject['Item']['title'], array('controller' => 'items', 'action' => 'view', $itemsProject['Item']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Project'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($itemsProject['Project']['title'], array('controller' => 'projects', 'action' => 'view', $itemsProject['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Quantity'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $itemsProject['ItemsProject']['quantity']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Items Project', true), array('action' => 'edit', $itemsProject['ItemsProject']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Items Project', true), array('action' => 'delete', $itemsProject['ItemsProject']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $itemsProject['ItemsProject']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Items Projects', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Items Project', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
