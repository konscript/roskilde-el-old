<div class="items index">
	<?php
	
	$header = array(
		"id" => "ID",
		"title" => "Navn",
		"power_usage" => "Strømforbrug",
		"modified" => "Redigeret",
		"actions" => "Handlinger"	
	);
	echo $this->Output->index($header, $items);
	
	?>
</div>
<div class="actions">
	<h3><?php __('Handlinger'); ?></h3>
	<ul>
		<li><?php echo $this->Output->add(); ?></li>
	</ul>
</div>