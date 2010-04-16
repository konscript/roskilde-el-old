<div class="projects index">
<?php 
	if (isset($no_projects) && $no_projects == true) {
		if ($user_role == 4) {
			echo "<p class='icon_noprojects'>Du har ikke adgang til nogle projekter.</p><br />
			<p><i>Kontakt venligst din gruppeleder hvis du mener dette er en fejl</i></p>";
		} else if ($user_role <= 3) {
			echo "<p class='icon_noprojects'>Der er ingen projekter i din gruppe.</p><br />
			<p><i>Opret et ny projekt eller kontakt venligst administratoren hvis du mener dette er en fejl</i></p>";
		}
	} else { 
?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('Status', 'status');?></th>
		<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
		<th><?php echo $this->Paginator->sort('Navn', 'title');?></th>
		<th><?php echo $this->Paginator->sort('Strømforbrug', 'total_power_usage');?></th>
		<th><?php echo $this->Paginator->sort('Gruppe', 'group_id');?></th>
		<th><?php echo $this->Paginator->sort('Projektleder', 'user_id');?></th>
		<th><?php echo $this->Paginator->sort('Redigeret', 'modified');?></th>		
		<th class="actions"><?php __('Handlinger');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($projects as $project):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = 'altrow';
		}
	?>
	<tr<?php 
		echo " class='";
		echo "row_status_" .$project['Project']['status']. " ";
		echo $class. "'"; ?>>
		<td class="solid icon_status_<?php echo $project['Project']['status']; ?>"><?php echo $project['Project']['status']; ?>&nbsp;</td>
		<td class="solid"><?php echo $project['Project']['id']; ?>&nbsp;</td>
		<td><?php echo $this->Html->link($project['Project']['title'], array('action' => 'view', $project['Project']['id']));?>&nbsp;</td>
		<td class="solid"><span class="icon_powerusage_<?php
			 if ($project['Project']['total_power_allowance'] == 0) {
			 	echo "0";			 	
			 } else if ($project['Project']['total_power_usage'] < $project['Project']['total_power_allowance']) {
			 	echo "1";
			 } else if ($project['Project']['total_power_usage'] > $project['Project']['total_power_allowance']) {
			 	echo "2"; }
		?>"><?php echo $project['Project']['total_power_usage'] ."</span> (". $project['Project']['total_power_allowance']; ?>)</td>
		<td>
			<?php echo $this->Html->link($project['Group']['title'], array('controller' => 'groups', 'action' => 'view', $project['Group']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($project['User']['username'], array('controller' => 'users', 'action' => 'view', $project['User']['id'])); ?>
		</td>
		<td><?php echo $project['Project']['modified']; ?>&nbsp;</td>		
		<td class="actions">
			<?php $this->Output->edit(null, null, $project['Project']['id']); ?>
			<?php $this->Output->delete(null, null, $project['Project']['id']); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p class="meta">
	<?php echo $this->Paginator->counter(array('format' => __('Side %page% af %pages%, viser %current% elementer ud af i alt %count%', true))); ?>
	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('< '.__('forrige -', true), array(), null, array('class'=>'disabled'));?>
		<?php echo $this->Paginator->numbers();?>
		<?php echo $this->Paginator->next(__('- næste', true).' >', array(), null, array('class' => 'disabled'));?>
	</div>
<?php } ?>
</div>
<?php if ($user_role <= 3) { ?>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php $this->Output->add('Opret nyt Projekt'); ?></li>
	</ul>
</div>
<?php } ?>
