<div class="projects index">

<?php
if (empty($projects)) {
	if ($currentuser['role_id'] == 4) {
		echo "<p class='icon_noprojects'>Du har ikke adgang til nogle projekter.</p><br />
		<p><i>Kontakt venligst din gruppeleder hvis du mener dette er en fejl</i></p>";
	} else if ($currentuser['role_id'] <= 3) {
		echo "<p class='icon_noprojects'>Der er ingen projekter i din gruppe.</p><br />
		<p><i>Opret et ny projekt eller kontakt venligst administratoren hvis du mener dette er en fejl</i></p>";
	}
} else { 

	$header = array(
		"title" => "Navn",
		"total_power_usage" => "Strømforbrug",
		"group_id" => "Gruppe / Projektleder",
		"modified" => "Redigeret",
		"actions" => "Handlinger"	
	);
	foreach ($projects as $key => $project) {
		$data[$key]['Project'] = array(
			"title" => 
				$this->Output->status(false, $project['Project']['status']).
				$this->Html->link($project['Project']['title'], array('action' => 'view', $project['Project']['id'])),
			"total_power_usage" => 
				$this->Output->powerUsage($project['Project']['total_power_usage'], $project['Project']['total_power_allowance'])." (".
				$project['Project']['total_power_allowance'].")",
			"group_id" => 
				$this->Output->icon('group', 'small').
				$this->Html->link($project['Group']['title'], array('controller' => 'groups', 'action' => 'view', $project['Group']['id'])).'<br />'.
				$this->Output->icon('user', 'small').
				$this->Html->link($project['User']['title'], array('controller' => 'users', 'action' => 'view', $project['User']['id'])),
			"modified" => $project['Project']['modified'],
			"actions" => 
				$this->Output->edit(null, null, $project['Project']['id']).
				$this->Output->delete(null, null, $project['Project']['id']).
				$this->Output->add('Ny Enhed', array('controller' => 'project_items', 'action' => 'add', '?' => array('project_id' => $project['Project']['id'])))
		);
	}
	echo $this->Output->index($header, $data, true, false);
} ?>

</div>
<?php if ($currentuser['role_id'] <= 3) { ?>
<div class="actions">
	<h3><?php __('Handlinger'); ?></h3>
	<ul>
		<li><?php echo $this->Output->add('Opret nyt Projekt'); ?></li>
	</ul>
</div>
<?php } ?>