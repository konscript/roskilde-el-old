<div class="groups index">
	<?php
	
	$header = array(
		"id" => "ID",
		"title" => "Navn",
		"section_id" => "Sektion",
		"user_id" => "Gruppeleder",
		"created" => "Oprettet",
		"modified" => "Redigeret",
		"actions" => "Handlinger"	
	);
	echo $this->Output->index($header, $groups);
	
	?>
</div>
<div class="actions">
	<h3><?php __('Handlinger'); ?></h3>
	<ul>
		<li><?php echo $this->Output->add(); ?></li>
	</ul>
</div>