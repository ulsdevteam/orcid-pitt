<?php
$this->assign('title', __('Batch Email Template'));
?>
<div class="orcidBatches view">
<h2><?php echo $this->fetch('title'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($orcidBatch['OrcidBatch']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creator'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orcidBatch['OrcidBatchCreator']['name'], array('controller' => 'orcid_batch_creators', 'action' => 'view', $orcidBatch['OrcidBatchCreator']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
	<hr />
	<dl>
		<dt><?php echo __('From'); ?></dt>
		<dd>
			<?php echo h($orcidBatch['OrcidBatch']['from_name']); ?> &lt; <?php echo h($orcidBatch['OrcidBatch']['from_addr']); ?> &gt;
		</dd>
		<dt><?php echo __('Reply To'); ?></dt>
		<dd>
			<?php echo h($orcidBatch['OrcidBatch']['reply_to']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subject'); ?></dt>
		<dd>
			<?php echo h($orcidBatch['OrcidBatch']['subject']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<iframe class="emailpreview" src="../preview/<?php echo $orcidBatch['OrcidBatch']['id']; ?>">
			</iframe>
		</dd>
	</dl>
	<div class="actions">
		<h3><?php echo __('Preview'); ?></h3>
		<?php
		echo $this->Form->create(false, array('url' => array('controller' => 'orcid_batches', 'action' => 'preview', $orcidBatch['OrcidBatch']['id'])));
		echo $this->Form->input('recipient', array('required' => true));
		echo $this->Form->end('Preview');
		?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $orcidBatch['OrcidBatch']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $orcidBatch['OrcidBatch']['id']), array(), __('Are you sure you want to delete # {0}?', $orcidBatch['OrcidBatch']['id'])); ?> </li>
	</ul>
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Batch Email Templates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Triggers Attached to this Template'); ?></h3>
	<?php if (!empty($orcidBatch['OrcidBatchTrigger'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Workflow Checkpoint'); ?></th>
		<th><?php echo __('Trigger Delay'); ?></th>
		<th><?php echo __('Group'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($orcidBatch['OrcidBatchTrigger'] as $orcidBatchTrigger): ?>
		<tr>
			<td><?php echo $orcidBatchTrigger['name']; ?></td>
			<td><?php echo $orcidBatchTrigger['OrcidStatusType']['name']; ?></td>
			<td><?php echo $orcidBatchTrigger['trigger_delay']; ?></td>
			<td><?php echo h($orcidBatchTrigger['OrcidBatchGroup']['name']); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orcid_batch_triggers', 'action' => 'view', $orcidBatchTrigger['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orcid_batch_triggers', 'action' => 'edit', $orcidBatchTrigger['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orcid_batch_triggers', 'action' => 'delete', $orcidBatchTrigger['id']), array(), __('Are you sure you want to delete # {0}?', $orcidBatchTrigger['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Trigger'), array('controller' => 'orcid_batch_triggers', 'action' => 'add', '?' => array('orcid_batch_id' => $orcidBatch['OrcidBatch']['id']))); ?> </li>
		</ul>
	</div>
</div>
