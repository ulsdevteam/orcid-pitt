<?php
$this->assign('title', __('Workflow Checkpoints'));
?>
<div class="orcidStatusTypes index">
	<h2><?php echo $this->fetch('title'); ?></h2>
	<p>These checkpoints represent different stages of completion within the workflow, ordered in sequence.  View a checkpoint to see a list of users at this status in the workflow.</p>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('seq'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($orcidStatusTypes as $orcidStatusType): ?>
	<tr>
		<td><?php echo h($orcidStatusType['OrcidStatusType']['name']); ?>&nbsp;</td>
		<td><?php echo h($orcidStatusType['OrcidStatusType']['seq']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $orcidStatusType['OrcidStatusType']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
