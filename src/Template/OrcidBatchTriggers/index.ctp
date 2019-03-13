<?php
$this->assign('title', __('Triggers'));
?>
<div class="orcidBatchTriggers index">
	<h2><?php echo $this->fetch('title'); ?></h2>
	<p>Each trigger has the potential to queue an email to a user based on the criteria specified in the trigger.</p>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('orcid_batch_group', 'Group'); ?></th>
			<th><?php echo $this->Paginator->sort('orcid_status_type_id', 'Workflow Checkpoint'); ?></th>
			<th><?php echo $this->Paginator->sort('orcid_batch_id', 'Email Batch'); ?></th>
			<th><?php echo $this->Paginator->sort('trigger_delay'); ?></th>
			<th><?php echo $this->Paginator->sort('repeat'); ?></th>
			<th><?php echo $this->Paginator->sort('maximum_repeat', 'Repeat Limit'); ?></th>
			<th><?php echo $this->Paginator->sort('begin_date'); ?></th>
			<th><?php echo $this->Paginator->sort('require_batch_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($orcidBatchTriggers as $orcidBatchTrigger): ?>
	<tr>
		<td><?php echo h($orcidBatchTrigger['OrcidBatchTrigger']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($orcidBatchTrigger['OrcidBatchGroup']['name'], array('controller' => 'orcid_batch_groups', 'action' => 'view', $orcidBatchTrigger['OrcidBatchGroup']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($orcidBatchTrigger['OrcidStatusType']['name'], array('controller' => 'orcid_status_types', 'action' => 'view', $orcidBatchTrigger['OrcidStatusType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($orcidBatchTrigger['OrcidBatch']['name'], array('controller' => 'orcid_batches', 'action' => 'view', $orcidBatchTrigger['OrcidBatch']['id'])); ?>
		</td>
		<td><?php echo h($orcidBatchTrigger['OrcidBatchTrigger']['trigger_delay'] . ' ' . __($orcidBatchTrigger['OrcidBatchTrigger']['trigger_delay'] == 1 ? 'day' : 'days')); ?></td>
		<td><?php echo $orcidBatchTrigger['OrcidBatchTrigger']['repeat'] ? h($orcidBatchTrigger['OrcidBatchTrigger']['repeat'] . ' ' . __($orcidBatchTrigger['OrcidBatchTrigger']['repeat'] == 1 ? 'day' : 'days')) : __('No'); ?></td>
		<td><?php echo $orcidBatchTrigger['OrcidBatchTrigger']['maximum_repeat'] ? h($orcidBatchTrigger['OrcidBatchTrigger']['maximum_repeat'] . ' ' . __($orcidBatchTrigger['OrcidBatchTrigger']['maximum_repeat'] == 1 ? 'time' : 'times')) : __('No'); ?></td>
		<td><?php echo h($this->Time->format($orcidBatchTrigger['OrcidBatchTrigger']['begin_date'], '%d-%h-%Y')); ?></td>
		<td><?php echo __($orcidBatchTrigger['OrcidBatchTrigger']['require_batch_id'] ? 'Yes' : 'No'); ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $orcidBatchTrigger['OrcidBatchTrigger']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $orcidBatchTrigger['OrcidBatchTrigger']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $orcidBatchTrigger['OrcidBatchTrigger']['id']), array(), __('Are you sure you want to delete "{0}"?', $orcidBatchTrigger['OrcidBatchTrigger']['name'])); ?>
			<?php echo $this->Form->postLink(__('Execute'), array('action' => 'execute', $orcidBatchTrigger['OrcidBatchTrigger']['id']), array(), __('Are you sure you want to run "{0}"?', $orcidBatchTrigger['OrcidBatchTrigger']['name'])); ?>
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
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Trigger'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Form->postLink(__('Execute All Triggers'), array('action' => 'executeAll'), array(), __('Are you sure you want to execute all triggers?')); ?></li>
		<li><?php echo $this->Form->postLink(__('Send All Emails'), array('controller' => 'OrcidEmails', 'action' => 'sendAll'), array(), __('Are you sure you want to send all Triggered Emails?')); ?></li>
	</ul>
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'orcid_batch_groups', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
