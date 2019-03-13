<?php
$this->assign('title', __('ORCID User'));
?>
<div class="orcidUsers view">
<h2><?php echo $this->fetch('title'); ?></h2>
	<dl>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($orcidUser['OrcidUser']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h(isset($orcidUser['Person']) ? $orcidUser['Person']['displayname'] : ''); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ORCID'); ?></dt>
		<dd>
			<?php echo h($orcidUser['OrcidUser']['orcid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Token'); ?></dt>
		<dd>
			<?php echo h($orcidUser['OrcidUser']['token']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($orcidUser['OrcidUser']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($orcidUser['OrcidUser']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h(isset($orcidUser['Person']) ? $orcidUser['Person']['mail'] : ''); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo h(isset($orcidUser['Person']) ? ($orcidUser['Person']['pittemployeerc'] ? 'RC ' . $orcidUser['Person']['pittemployeerc'] . ' / ' : '') . $orcidUser['Person']['department'] : ''); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Current Checkpoint'); ?></dt>
		<dd>
			<?php echo h(isset($orcidUser['CurrentOrcidStatus']['OrcidStatusType']) ? $orcidUser['CurrentOrcidStatus']['OrcidStatusType']['name'] : ''); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $orcidUser['OrcidUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Opt Out'), array('action' => 'optout', $orcidUser['OrcidUser']['id']), array(), __('Are you sure you want to opt out {0}?', $orcidUser['OrcidUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $orcidUser['OrcidUser']['id']), array(), __('Are you sure you want to delete {0}?', $orcidUser['OrcidUser']['id'])); ?> </li>
	</ul>
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List ORCID Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Find ORCID User'), array('action' => 'find')); ?></li>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Workflow Checkpoint History'); ?></h3>
	<?php if (!empty($orcidUser['AllOrcidStatus'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Workflow Checkpoint'); ?></th>
		<th><?php echo __('Timestamp'); ?></th>
	</tr>
	<?php foreach ($orcidUser['AllOrcidStatus'] as $orcidStatus): ?>
		<tr>
			<td><?php echo $orcidStatus['OrcidStatusType']['name']; ?></td>
			<td><?php echo $orcidStatus['status_timestamp']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>
	<h3><?php echo __('Scheduled Emails'); ?></h3>
	<?php if (!empty($orcidUser['OrcidEmail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ORCID Batch Email Template'); ?></th>
		<th><?php echo __('Queued'); ?></th>
		<th><?php echo __('Sent'); ?></th>
		<th><?php echo __('Cancelled'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($orcidUser['OrcidEmail'] as $orcidEmail): ?>
		<tr>
			<td><?php echo $this->Html->link($orcidEmail['OrcidBatch']['name'], array('controller' => 'OrcidBatches', 'action' => 'view', $orcidEmail['OrcidBatch']['id'])); ?></td>
			<td><?php echo $orcidEmail['queued']; ?></td>
			<td><?php echo $orcidEmail['sent']; ?></td>
			<td><?php echo $orcidEmail['cancelled']; ?></td>
			<td class="actions">
				<?php if ($orcidEmail['sent'] || $orcidEmail['cancelled']): ?>
				<?php echo $this->Form->postLink(__('Requeue'), array('controller' => 'OrcidEmails', 'action' => 'requeue', $orcidEmail['id']), array(), __('Are you sure you want to requeue "{0}"?', __($orcidEmail['OrcidBatch']['name']))); ?>
				<?php else: ?>
				<?php echo $this->Form->postLink(__('Cancel'), array('controller' => 'OrcidEmails', 'action' => 'cancel', $orcidEmail['id']), array(), __('Are you sure you want to cancel "{0}"?', __($orcidEmail['OrcidBatch']['name']))); ?>
				<?php echo $this->Form->postLink(__('Send'), array('controller' => 'OrcidEmails', 'action' => 'send', $orcidEmail['id']), array(), __('Are you sure you want to send "{0}" immediately?', __($orcidEmail['OrcidBatch']['name']))); ?>
				<?php endif; ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>
</div>
