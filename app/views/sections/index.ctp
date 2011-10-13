<div class="sections index">
	<?php
	
	$header = array(
		"id" => "ID",
		"title" => "Navn",
		"user_id" => "Sektionsleder",
		"created" => "Oprettet",
		"modified" => "Redigeret",
		"actions" => "Handlinger"	
	);
	echo $this->Output->index($header, $sections);
	
	?>
</div>
<div class="actions">
	<h3><?php __('Handlinger'); ?></h3>
	<ul>
		<li><?php echo $this->Output->add(); ?></li>
	</ul>
</div>