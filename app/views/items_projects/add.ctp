<script>
$(document).ready(function(){
	$('div.toggle').not('div.toggle:first').hide();
		
    $(".toggleClass").click(function() {
    	$('div.toggle').hide();	  
		
        var chosen_div = $(this).val();        
        $("div.desc").hide();
        $(".toggle."+chosen_div).show();
    }); 
});
</script>

<div class="itemsProjects form">	
    <?php
    $options=array("template"=>'Tilknyt eksistende enhed',"new"=>'Opret og tilknyt ny enhed');
    $attributes=array('default'=>"template", 'class' => 'toggleClass');
    echo $this->Form->radio('toggleTemplate',$options,$attributes);
    ?>	
	<hr>
	<div class="toggle template">
		<?php echo $this->Form->create('ItemsProject', array('url' => array($this->params["pass"][0])));?>
			<fieldset>
				<legend><?php __('Add Items Project'); ?></legend>
				<?php
					echo $this->Form->input('item_id', array("label"=>"Enhed"));														
					echo $this->Form->input('quantity', array("label"=>"Antal enheder"));
					echo $this->Output->project_list("relational", $projects);
				?>
			</fieldset>
		<?php echo $this->Form->end(__('Submit', true));?>
	</div>
	
	
	<div class="toggle new">		
        <?php echo $this->Form->create('Item', array('url' => array('controller'=>'items_projects','action' => 'add', $this->params["pass"][0])));?>
        <fieldset>	
		    <?php		
			    echo $this->Form->input('title', array('label' => 'Navn'));
			    echo $this->Form->input('description', array('label' => 'Beskrivelse'));
			    echo $this->Form->input('power_usage', array('label' => 'Strømforbrug'));
				if ($currentuser['role_id'] <= 2) {       
		        	echo $this->Form->input('template', array('label' => 'Gem som enhedsskabelon'));
				}
				echo $this->Output->project_list("new", $projects);	      		        
		    ?>
        </fieldset>
        <?php echo $this->Form->end(__('Opret', true));?>		
	</div>	
</div>


