<?php
$this->assign('title', __('Workflow Checkpoint'));
?>
<div class="orcidStatusTypes view">
<h2><?php echo $this->fetch('title'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($orcidStatusType['OrcidStatusType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seq'); ?></dt>
		<dd>
			<?php echo h($orcidStatusType['OrcidStatusType']['seq']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Workflow Checkpoints'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Users at this Checkpoint'); ?></h3>
	<?php if (!empty($orcidStatusType['CurrentOrcidStatus'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ORCID User'); ?></th>
		<th><?php echo __('Status Timestamp'); ?></th>
		<th><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($orcidStatusType['CurrentOrcidStatus'] as $orcidStatus): ?>
		<tr>
			<td><?php echo $orcidStatus['OrcidUser']['username']; ?></td>
			<td><?php echo $orcidStatus['status_timestamp']; ?></td>
			<td class="actions"><?php echo $this->Html->link(__('View'), array('controller' => 'orcid_users', 'action' => 'view', $orcidStatus['orcid_user_id'])); ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
