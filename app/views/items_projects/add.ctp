


<div class="itemsProjects form">
	<?php echo $this->Form->input('useTemplate', array('label' => 'Benyt en eksisterende Enhedsskabelon', 'type' => 'checkbox', 'checked' => 'false', 'class' => 'toggleClass')); ?>
	<div>
		<?php echo $this->Form->create('ItemsProject');?>
			<fieldset>
				<legend><?php __('Add Items Project'); ?></legend>
				<?php
					echo $this->Form->input('item_id');	
					echo $this->Output->project_list("relational", $projects);									
					echo $this->Form->input('quantity');
				?>
			</fieldset>
		<?php echo $this->Form->end(__('Submit', true));?>
	</div>
	
	
	
		<div>		
        <?php echo $this->Form->create('Item',  array('url' => array('controller'=>'items_projects','action' => 'add')));?>
        <fieldset>	
		    <?php		
			    echo $this->Form->input('title', array('label' => 'Navn'));
			    echo $this->Form->input('description', array('label' => 'Beskrivelse'));
			    echo $this->Form->input('power_usage', array('label' => 'Strømforbrug'));       
		        echo $this->Form->input('template', array('label' => 'Gem som enhedsskabelon'));
				echo $this->Output->project_list("new", $projects);	      		        
		    ?>
        </fieldset>
        <?php echo $this->Form->end(__('Opret', true));?>		
		</div>	
</div>


