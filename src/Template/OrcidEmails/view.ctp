<?php
$this->assign('title', __('Scheduled Email'));
?>
<div class="orcidEmails view">
<h2><?php echo $this->fetch('title'); ?></h2>
	<dl>
		<dt><?php echo __('ORCID User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orcidEmail['OrcidUser']['username'], array('controller' => 'orcid_users', 'action' => 'view', $orcidEmail['OrcidUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ORCID Batch'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orcidEmail['OrcidBatch']['name'], array('controller' => 'orcid_batches', 'action' => 'view', $orcidEmail['OrcidBatch']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Queued'); ?></dt>
		<dd>
			<?php echo h($orcidEmail['OrcidEmail']['queued']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sent'); ?></dt>
		<dd>
			<?php echo h($orcidEmail['OrcidEmail']['sent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cancelled'); ?></dt>
		<dd>
			<?php echo h($orcidEmail['OrcidEmail']['cancelled']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php if ($orcidEmail['OrcidEmail']['sent'] || $orcidEmail['OrcidEmail']['cancelled']): ?>
		<li><?php echo $this->Form->postLink(__('Requeue'), array('action' => 'requeue', $orcidEmail['OrcidEmail']['id']), array(), __('Are you sure you want to requeue this email?')); ?></li>
		<?php else: ?>
		<li><?php echo $this->Form->postLink(__('Cancel'), array('action' => 'cancel', $orcidEmail['OrcidEmail']['id']), array(), __('Are you sure you want to cancel this email?')); ?></li>
		<li><?php echo $this->Form->postLink(__('Send'), array('action' => 'send', $orcidEmail['OrcidEmail']['id']), array(), __('Are you sure you want to send this email immediately?')); ?></li>
		<?php endif; ?>
	</ul>
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('View ORCID User'), array('controller' => 'orcid_users', 'action' => 'view', $orcidEmail['OrcidUser']['id'])); ?></li>
	</ul>
</div>
