<div class="sections form">
<?php echo $this->Form->create('Section');?>
	<fieldset>
 		<legend><?php printf(__('Opret %s', true), __('Sektion', true)); ?></legend>
	<?php
		echo $this->Form->input('title', array('label' => 'Navn'));
		echo $this->Form->input('user_id', array('label' => 'Sektionsleder'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Opret', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Sections', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Groups', true)), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Group', true)), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>