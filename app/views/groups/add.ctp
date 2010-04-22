<div class="groups form">
<?php echo $this->Form->create('Group');?>
	<fieldset>
 		<legend><?php printf(__('Opret %s', true), __('Gruppe', true)); ?></legend>
	<?php
		echo $this->Form->input('title', array('label' => 'Navn'));
		echo $this->Form->input('section_id', array('label' => 'Sektion'));
		echo $this->Form->input('user_id', array('label' => 'Gruppeleder'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Opret', true));?>
</div>