<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php printf(__('Rediger %s', true), __('Profil', true)); ?></legend>
	<?php
		echo $this->Form->input('title', array('label' => 'Dit navn'));
		echo $this->Form->input('username', array('label' => 'Din e-mail (dette anvendes som dit login)'));

        echo $this->Form->input('changePassword', array('label' => 'Skift adgangskode', 'type' => 'checkbox', 'checked'=> 'false', 'class'=>'toggleClass'));
        ?>
        <div>
        <?php echo $this->Form->input('password', array('label' => 'Din adgangskode', 'value' => '')); ?>
        <?php echo $this->Form->password('password_confirm', array('label' => 'Din adgangskode', 'value' => '')); ?>
        </div>
	</fieldset>
<?php echo $this->Form->end(__('Gem', true));?>
</div>
