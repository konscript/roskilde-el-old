<div class="users index">
	<?php
	
	$header = array(
		"id" => "ID",
		"title" => "Navn",
		"username" => "E-mail",
		"role_id" => "Rolle",
		"modified" => "Redigeret",
		"actions" => "Handlinger"	
	);
	echo $this->Output->index($header, $users);
	
	?>
</div>
<div class="actions">
	<h3><?php __('Handlinger'); ?></h3>
	<ul>
		<li><?php echo $this->Output->add(); ?></li>
	</ul>
</div>