<?php
    //if a project id is passed with get, also submit form to this id (6) eg. item/add/6
    $url = (isset($this->params["pass"][0])) ? array('url' => array($this->params["pass"][0])) : array();
?>
<div class="items form">
<?php echo $this->Form->create('Item', $url);?>
	<fieldset>
		<legend><?php __('Add Item'); ?></legend>
	<?php
	    echo $this->Form->input('title', array('label' => 'Navn'));
	    echo $this->Form->input('description', array('label' => 'Beskrivelse'));
	    echo $this->Form->input('power_usage', array('label' => 'Strømforbrug'));		    
	    if ($currentuser['role_id'] <= 2) {       
        	echo $this->Form->input('template', array('label' => 'Gem som skabelon'));
	    }		    
		echo "<hr><h2>Tilknyt enheden til et projekt</h2>";
		echo $this->Output->project_list("ItemsProject.0.project_id", $projects);
		
        //show quantity by default, if project_id is set
    	$hideQuantityField = (!empty($this->data['ItemsProject']["project_id"])) ? "" : "showOnChange";		
    	
		echo "<div class='<?php echo $hideQuantityField ?>'>".$this->Form->input('ItemsProject.0.quantity', array("label"=>"Antal enheder"))."</div>";
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
