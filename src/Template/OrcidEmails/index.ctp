<?php
$this->assign('title', __('Scheduled Emails'));
?>
<div class="orcidEmails index">
	<h2><?php echo $this->fetch('title'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('orcid_user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('orcid_batch_id'); ?></th>
			<th><?php echo $this->Paginator->sort('queued'); ?></th>
			<th><?php echo $this->Paginator->sort('sent'); ?></th>
			<th><?php echo $this->Paginator->sort('cancelled'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($orcidEmails as $orcidEmail): ?>
	<tr>
		<td><?php echo h($orcidEmail['OrcidEmail']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($orcidEmail['OrcidUser']['username'], array('controller' => 'orcid_users', 'action' => 'view', $orcidEmail['OrcidUser']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($orcidEmail['OrcidBatch']['name'], array('controller' => 'orcid_batches', 'action' => 'view', $orcidEmail['OrcidBatch']['id'])); ?>
		</td>
		<td><?php echo h($orcidEmail['OrcidEmail']['queued']); ?>&nbsp;</td>
		<td><?php echo h($orcidEmail['OrcidEmail']['sent']); ?>&nbsp;</td>
		<td><?php echo h($orcidEmail['OrcidEmail']['cancelled']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $orcidEmail['OrcidEmail']['id'])); ?>
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
