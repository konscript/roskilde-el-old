<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php printf(__('Opret %s', true), __('Bruger', true)); ?></legend>
	<?php
		echo $this->Form->input('title', array('label' => 'Navn'));
		echo $this->Form->input('username', array('label' => 'E-mail'));
		echo $this->Form->input('role_id', array('label' => 'Rolle'));

        echo $this->Form->input('generatePassword', array('label' => 'Generer automatisk adgangskode og send velkomst e-mail', 'type' => 'checkbox', 'checked'=>'true', 'class'=>'toggleClass'));
        ?><div><?php
			echo "<i>Adgangskode vil blive automatisk genereret og brugeren vil modtage en velkomst e-mail med information og log ind oplysninger!</i>";	                
        ?></div><div><?php
			echo $this->Form->input('password', array('label' => 'Adgangskode', 'value' => ''));
	        echo "<i>Vær opmærksom på at brugeren <b>IKKE</b> modtager nogen velkomst e-mail og at adgangskoden ikke kan hentes senere</i>";
        ?></div>
	</fieldset>
<?php echo $this->Form->end(__('Opret', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Users', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Roles', true)), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Role', true)), array('controller' => 'roles', 'action' => 'add')); ?> </li>
	</ul>
</div>