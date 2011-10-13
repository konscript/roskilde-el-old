<div class="roles form">
<?php echo $this->Form->create('Role');?>
	<fieldset>
 		<legend><?php printf(__('Rediger %s', true), __('Rolle', true)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('label' => 'Navn'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Gem', true));?>
</div>