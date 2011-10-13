<div class="projects form">
<?php echo $this->Form->create('');?>

	<?php
		echo $this->Form->input('Project.title', array('label' => 'Navn'));
		echo $this->Form->input('Project.body', array('label' => 'Beskrivelse'));
		//echo $this->Form->input('total_power_usage');
       	if ($currentuser['role_id'] <= 2) {
			echo $this->Form->input('Project.total_power_allowance', array('label' => 'Tilladt strømforbrug'));
		}
		//echo $this->Form->input('Project.build_start');
		//echo $this->Form->input('Project.build_end');
		//echo $this->Form->input('Project.items_start');
		//echo $this->Form->input('Project.items_end');
		//echo $this->Form->input('status');
		echo $this->Form->input('Project.group_id', array('label' => 'Gruppe', 'options' => array($allowed_groups)));
		
        $options=array("existing"=>'Tilknyt eksistende projektleder',"new"=>'Opret og tilknyt ny projektleder');
        $attributes=array('default'=>"existing", 'class' => 'radioToggle');
        echo $this->Form->radio('User.toggleUser',$options,$attributes);				
        ?>
        
        <div class="radioToggle existing">
            <?php echo $this->Form->input('User.user_id', array('label' => 'Tilknyt projektleder')); ?>
        </div>        
        
        <div class="radioToggle new"><?php
	        echo $this->Form->input('User.title', array('label' => 'Projektlederens navn'));
	        echo $this->Form->input('User.username', array('label' => 'Projektlederens e-mail'));
			//echo "<i>Adgangskode vil blive automatisk genereret og brugeren vil modtage en velkomst e-mail med information og log ind oplysninger!</i>";
			echo "<i>Der forsøges at sende en velkomst e-mail med information og log ind oplysninger til brugeren! Brugerens adgangskode er: <b>gurli123acdc</b></i>";
        ?></div>
        <?php //echo $this->Form->input('User.password');?>
	</fieldset>
<?php echo $this->Form->end(__('Opret', true));?>
</div>

