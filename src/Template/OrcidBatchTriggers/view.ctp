<?php
$this->assign('title', __('Trigger'));
?>
<div class="orcidBatchTriggers view">
<h2><?php echo $this->fetch('title'); ?></h2>
		<div>The User must be at the Workflow Checkpoint for Trigger Delay days and not have already been sent the Email Batch (or must have been sent the Email Batch at least Repeat Every days ago if Repeat Every is non-zero).  The User must match the Group criteria (if provided), and the User must have already received a prior email as specified by Require Prior Batch.  Today's date must be after the Begin Date (if provided).   The number of times this Email Batch has been sent to this user must not repeat more than Repeat Limit times (if provided).</div>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($orcidBatchTrigger['OrcidBatchTrigger']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orcidBatchTrigger['OrcidBatchGroup']['name'], array('controller' => 'orcid_batch_groups', 'action' => 'view', $orcidBatchTrigger['OrcidBatchGroup']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Workflow Checkpoint'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orcidBatchTrigger['OrcidStatusType']['name'], array('controller' => 'orcid_status_types', 'action' => 'view', $orcidBatchTrigger['OrcidStatusType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email Batch'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orcidBatchTrigger['OrcidBatch']['name'], array('controller' => 'orcid_batches', 'action' => 'view', $orcidBatchTrigger['OrcidBatch']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trigger Delay'); ?></dt>
		<dd>
			<?php echo h($orcidBatchTrigger['OrcidBatchTrigger']['trigger_delay'] . ' ' . __($orcidBatchTrigger['OrcidBatchTrigger']['trigger_delay'] == 1 ? 'day' : 'days')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Repeat Every'); ?></dt>
		<dd>
			<?php echo $orcidBatchTrigger['OrcidBatchTrigger']['repeat'] ? h($orcidBatchTrigger['OrcidBatchTrigger']['repeat'] . ' ' . __($orcidBatchTrigger['OrcidBatchTrigger']['repeat'] == 1 ? 'day' : 'days')) : __('No'); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Repeat Limit'); ?></dt>
		<dd>
			<?php echo $orcidBatchTrigger['OrcidBatchTrigger']['maximum_repeat'] ? h($orcidBatchTrigger['OrcidBatchTrigger']['maximum_repeat'] . ' ' . __($orcidBatchTrigger['OrcidBatchTrigger']['maximum_repeat'] == 1 ? 'time' : 'times')) : __('Unlimited'); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Begin Date'); ?></dt>
		<dd>
			<?php echo h($this->Time->format($orcidBatchTrigger['OrcidBatchTrigger']['begin_date'], '%d-%h-%Y')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Require Prior Batch'); ?></dt>
		<dd>
			<?php echo __($orcidBatchTrigger['OrcidBatchTrigger']['require_batch_id'] ? 'Yes' : 'No'); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $orcidBatchTrigger['OrcidBatchTrigger']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $orcidBatchTrigger['OrcidBatchTrigger']['id']), array(), __('Are you sure you want to delete "{0}"?', $orcidBatchTrigger['OrcidBatchTrigger']['name'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Execute'), array('action' => 'execute', $orcidBatchTrigger['OrcidBatchTrigger']['id']), array(), __('Are you sure you want to execute "{0}"?', $orcidBatchTrigger['OrcidBatchTrigger']['name'])); ?> </li>
	</ul>
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Triggers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
