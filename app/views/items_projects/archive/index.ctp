<div class="ItemsProject index">
	<?php	
	
	$header = array(
		"id" => "ID",
		"title" => "Navn",
		"power_usage" => "Strømforbrug",
		"quantity" => "Antal",
		"actions" => "Handlinger"	
	);
	echo $this->Output->index($header, $ItemsProject);
	
	?>
</div>
<div class="actions">
	<h3><?php __('Handlinger'); ?></h3>
	<ul>
		<li><?php echo $this->Output->add(); ?></li>
	</ul>
</div>
