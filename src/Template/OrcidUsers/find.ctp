<?php
$this->assign('title', __('Find ORCID Users'));
?>
<div class="orcidUsers index">
	<h2><?php echo $this->fetch('title'); ?></h2>
	<p>Find a user by username or ORCID ID.</p>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		<td colspan="7" class="searchbar">
			<?php
			echo $this->Form->create(false, array('type' => 'get'));
			echo $this->Form->input('s', array('div' => false, 'label' => false, 'options' => $findTypes, 'value' => $this->request->query('s')));
			echo $this->Form->input('q', array('div' => false, 'label' => false, 'value' => $this->request->query('q')));
			echo $this->Form->input('g', array('div' => false, 'label' => 'within Group', 'empty' => '', 'options' => $orcidBatchGroups, 'value' => $this->request->query('g')));
			echo $this->Form->submit('Search', array('div' => false));
			echo $this->Form->end();
			?>
		</td>
	</tr>
	<tr>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('orcid', 'ORCID'); ?></th>
			<th><?php echo __('Name'); ?></th>
			<th><?php echo __('RC'); ?></th>
			<th><?php echo __('Department'); ?></th>
			<th><?php echo $this->Paginator->sort('CurrentOrcidStatus.orcid_status_type_id', 'Current Checkpoint'); ?></th>
			<th><?php echo $this->Paginator->sort('CurrentOrcidStatus.status_timestamp', 'As Of'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($orcidUsers as $orcidUser): ?>
	<tr>
		<td><?php echo h($orcidUser['OrcidUser']['username']); ?>&nbsp;</td>
		<td><?php echo h($orcidUser['OrcidUser']['orcid']); ?>&nbsp;</td>
		<td><?php echo h($orcidUser['Person']['displayname']); ?>&nbsp;</td>
		<td><?php echo h($orcidUser['Person']['pittemployeerc']); ?>&nbsp;</td>
		<td><?php echo h($orcidUser['Person']['department']); ?>&nbsp;</td>
		<td><?php echo h($orcidStatusTypes[$orcidUser['CurrentOrcidStatus']['orcid_status_type_id']]); ?>&nbsp;</td>
		<td><?php echo h($orcidUser['CurrentOrcidStatus']['status_timestamp']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $orcidUser['OrcidUser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $orcidUser['OrcidUser']['id'])); ?>
			<?php echo $this->Form->postLink(__('Opt Out'), array('action' => 'optout', $orcidUser['OrcidUser']['id']), array(), __('Are you sure you want to opt out {0}?', $orcidUser['OrcidUser']['username'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $orcidUser['OrcidUser']['id']), array(), __('Are you sure you want to delete {0}?', $orcidUser['OrcidUser']['username'])); ?>
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
	<div class="actions">
		<?php if ($orcidUsers) { echo $this->Html->link(__('Download CSV'), array('action' => 'report', '?' => $this->request->query)); } ?>
	</div>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New ORCID User'), array('action' => 'add')); ?></li>
	</ul>
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List ORCID Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
