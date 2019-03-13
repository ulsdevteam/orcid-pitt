<?php
$this->assign('title', __('ORCID Users'));
?>
<div class="orcidUsers index">
	<h2><?php echo $this->fetch('title'); ?></h2>
	<p>The following users are within the ORCID process.  View the user to see details, including the current and historic checkpoints as well as scheduled email communication.</p>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('orcid', 'ORCID'); ?></th>
			<th><?php echo $this->Paginator->sort('token'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($orcidUsers as $orcidUser): ?>
	<tr>
		<td><?php echo h($orcidUser['OrcidUser']['username']); ?>&nbsp;</td>
		<td><?php echo h($orcidUser['OrcidUser']['orcid']); ?>&nbsp;</td>
		<td><?php echo h($orcidUser['OrcidUser']['token']); ?>&nbsp;</td>
		<td><?php echo h($orcidUser['OrcidUser']['created']); ?>&nbsp;</td>
		<td><?php echo h($orcidUser['OrcidUser']['modified']); ?>&nbsp;</td>
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
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New ORCID User'), array('action' => 'add')); ?></li>
	</ul>
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Find ORCID User'), array('action' => 'find')); ?></li>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
