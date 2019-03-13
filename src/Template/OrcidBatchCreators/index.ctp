<?php
$this->assign('title', __('Administrators'));
?>
<div class="orcidBatchCreators index">
	<h2><?php $this->fetch('title'); ?></h2>
	<p><?php echo __('The following users are allowed to use this interface to administer email templates and triggers.'); ?></p>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('name', 'Username'); ?></th>
			<th><?php echo __('Name'); ?></th>
			<th><?php echo $this->Paginator->sort('Enabled'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($orcidBatchCreators as $orcidBatchCreator): ?>
	<tr>
		<td><?php echo h($orcidBatchCreator['OrcidBatchCreator']['name']); ?>&nbsp;</td>
		<td><?php echo h($orcidBatchCreator['Person']['displayname']); ?>&nbsp;</td>
		<td><?php echo __($orcidBatchCreator['OrcidBatchCreator']['flags'] & OrcidBatchCreator::FLAG_DISABLED ? 'No' : 'Yes'); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $orcidBatchCreator['OrcidBatchCreator']['id'])); ?>
			<?php 
				if ($orcidBatchCreator['OrcidBatchCreator']['flags'] & OrcidBatchCreator::FLAG_DISABLED) {
					echo $this->Form->postLink(__('Enable'), array('action' => 'enable', $orcidBatchCreator['OrcidBatchCreator']['id']), array(), __('Are you sure you want to enable # {0}?', $orcidBatchCreator['OrcidBatchCreator']['name']));
				} else {
					echo $this->Form->postLink(__('Disable'), array('action' => 'disable', $orcidBatchCreator['OrcidBatchCreator']['id']), array(), __('Are you sure you want to disable # {0}?', $orcidBatchCreator['OrcidBatchCreator']['name']));
				}
			?>
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
		<li><?php echo $this->Html->link(__('New Administrator'), array('action' => 'add')); ?></li>
	</ul>
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
