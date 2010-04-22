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