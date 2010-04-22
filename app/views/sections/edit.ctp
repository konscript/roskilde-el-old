<div class="sections form">
<?php echo $this->Form->create('Section');?>
	<fieldset>
 		<legend><?php printf(__('Rediger %s', true), __('Sektion', true)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('label' => 'Navn'));
		echo $this->Form->input('user_id', array('label' => 'Sektionsleder'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Gem', true));?>
</div>