<?php
$this->assign('title', __('Batch Email Templates'));
?>
<div class="orcidBatches index">
	<h2><?php echo $this->fetch('title'); ?></h2>
	<p>An email template will be used to send a message to a user based on one or more triggers. Each email template can be sent to any user only once, unless manually re-queued.</p>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('from_name'); ?></th>
			<th><?php echo $this->Paginator->sort('from_addr', 'From Address'); ?></th>
			<th><?php echo $this->Paginator->sort('subject'); ?></th>
			<th><?php echo $this->Paginator->sort('reply_to'); ?></th>
			<th><?php echo $this->Paginator->sort('orcid_batch_creator_id', 'Creator'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($orcidBatches as $orcidBatch): ?>
	<tr>
		<td><?php echo h($orcidBatch['OrcidBatch']['name']); ?>&nbsp;</td>
		<td><?php echo h($orcidBatch['OrcidBatch']['from_name']); ?>&nbsp;</td>
		<td><?php echo h($orcidBatch['OrcidBatch']['from_addr']); ?>&nbsp;</td>
		<td><?php echo h($orcidBatch['OrcidBatch']['subject']); ?>&nbsp;</td>
		<td><?php echo h($orcidBatch['OrcidBatch']['reply_to']); ?>&nbsp;</td>
		<td><?php echo h($orcidBatch['OrcidBatchCreator']['name']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $orcidBatch['OrcidBatch']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $orcidBatch['OrcidBatch']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $orcidBatch['OrcidBatch']['id']), array(), __('Are you sure you want to delete # {0}?', $orcidBatch['OrcidBatch']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Batch Email Template'), array('action' => 'add')); ?></li>
	</ul>
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
