<div class="roles index">
	<?php
	
	$header = array(
		"id" => "ID",
		"title" => "Navn",
		"created" => "Oprettet",
		"modified" => "Redigeret",
		"actions" => "Handlinger"	
	);
	echo $this->Output->index($header, $roles);
	
	?>
</div>
<div class="actions">
	<h3><?php __('Handlinger'); ?></h3>
	<ul>
		<li><?php echo $this->Output->add(); ?></li>
	</ul>
</div>