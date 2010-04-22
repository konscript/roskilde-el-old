<div class="projects form">
<?php echo $this->Form->create('Project', array('type' => 'file'));?>
	<fieldset>
 		<legend><?php printf(__('Rediger %s', true), __('Projekt', true)); ?></legend>
	<?php
		echo $this->Form->input('id');

		echo $this->Form->input('title', array('label' => 'Navn'));
		echo $this->Form->input('body', array('label' => 'Beskrivelse'));
		// echo $this->Form->input('total_power_usage');
        if ($currentuser['role_id'] <= 2) {
            echo $this->Form->input('total_power_allowance', array('label' => 'Tilladt strømforbrug'));
        }
		//echo $datePicker->picker('build_start');
        echo $datePicker->picker('build_start', array('label' => 'Byggestrøm, start'));
		echo $datePicker->picker('build_end', array('label' => 'Byggestrøm, slut'));
		echo $datePicker->picker('items_start', array('label' => 'Enhedsstrøm, start'));
		echo $datePicker->picker('items_end', array('label' => 'Enhedsstrøm, slut'));
        if ($currentuser['role_id'] <= 2) {
            echo $this->Form->input('status', array('label' => 'Status', 'options' => array(
            	'0'=>'Igangværende',
            	'1'=>'Godkendt',
            	'2'=>'Afvist')));
            echo $this->Form->input('group_id', array('label' => 'Gruppe'));
        }
       	if ($currentuser['role_id'] <= 3) {
			echo $this->Form->input('user_id', array('label' => 'Projektleder'));       	
       	} ?>
       	<div>
			<?php if ($project['Project']['file_path'] != '') { ?>
	       		<label>Nuværende vedhæftede kort:</label>
				<?php echo $html->link(
							$html->image('/attachments/photos/thumb/'.$project['Project']['file_path']),
							'/attachments/photos/default/'.$project['Project']['file_path'],
							array('escape' => false)); 
			} else {
				echo "<i>Der er endnu ikke vedhæftet noget kort til projektet</i>";
			}
			?>
       	</div>
		<?php
        echo $this->Form->input('uploadAttachment', array('label' => 'Upload nyt kort', 'type' => 'checkbox', 'checked' => 'false', 'class'=>'toggleClass'));
        ?><div><?php
	        echo $form->file('Attachment');
			echo "<br /><br /><i>Følgende filtyper er tilladt: JPEG, PNG og GIF. Billedet vil automatisk blive beskæret og skaleret.</i>";	                
        ?></div><div></div>
	</fieldset>
<?php echo $this->Form->end(__('Gem', true));?>
</div>