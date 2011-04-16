<div class="itemsProjects form">	
    <?php
    $options=array("template"=>'Tilknyt eksistende enhed',"new"=>'Opret og tilknyt ny enhed');
    $attributes=array('default'=>"template", 'class' => 'radioToggle');
    echo $this->Form->radio('toggleTemplate',$options,$attributes);
    ?>	
	<hr>
	<div class="radioToggle template">
		<?php echo $this->Form->create('ItemsProject', array('url' => array($this->params["pass"][0])));?>
			<fieldset>
				<legend><?php __('Add Items Project'); ?></legend>
				<?php
					echo $this->Form->input('item_id', array("label"=>"Enhed"));														
					echo $this->Form->input('quantity', array("label"=>"Antal enheder"));
					echo $this->Output->project_list("project_id", $projects);
				?>
			</fieldset>
		<?php echo $this->Form->end(__('Submit', true));?>
	</div>
	
	
	<div class="radioToggle new">		
        <?php echo $this->element('itemAddNew'); ?>
	</div>	
</div>


