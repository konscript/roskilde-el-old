<div class="projectItems index">
	<?php
	
	$header = array(
		"id" => "ID",
		"title" => "Navn",
		"power_usage" => "Strømforbrug",
		"quantity" => "Antal",		
		"item_id" => "Skabelon",
		"project_id" => "Projekt",
		"actions" => "Handlinger"	
	);
	echo $this->Output->index($header, $projectItems);
	
	?>
</div>
<div class="actions">
	<h3><?php __('Handlinger'); ?></h3>
	<ul>
		<li><?php echo $this->Output->add(); ?></li>
	</ul>
</div>