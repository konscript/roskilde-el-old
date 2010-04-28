<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php printf(__('Opret %s', true), __('Bruger', true)); ?></legend>
	<?php
		echo $this->Form->input('title', array('label' => 'Navn'));
		echo $this->Form->input('username', array('label' => 'E-mail'));
		echo $this->Form->input('role_id', array('label' => 'Rolle'));

        //echo $this->Form->input('generatePassword', array('label' => 'Generer automatisk adgangskode og send velkomst e-mail', 'type' => 'checkbox', 'checked'=>'true', 'class'=>'toggleClass'));
        echo $this->Form->input('generatePassword', array('label' => 'Bestem foruddefineret adgangskode og send velkomst e-mail', 'type' => 'checkbox', 'checked'=>'true', 'class'=>'toggleClass'));        
        ?><div><?php
			//echo "<i>Adgangskode vil blive automatisk genereret og brugeren vil modtage en velkomst e-mail med information og log ind oplysninger!</i>";
		echo "<i>Der forsøges at sende en velkomst e-mail med information og log ind oplysninger til brugeren! Brugerens adgangskode er: <b>gurli123acdc</b></i>";
        ?></div><div><?php
			echo $this->Form->input('password', array('label' => 'Adgangskode', 'value' => ''));
	        echo "<i>Vær opmærksom på at brugeren <b>IKKE</b> modtager nogen velkomst e-mail og at adgangskoden ikke kan hentes senere</i>";
        ?></div>
	</fieldset>
<?php echo $this->Form->end(__('Opret', true));?>
</div>