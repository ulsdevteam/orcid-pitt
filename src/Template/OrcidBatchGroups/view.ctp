<div class="orcidBatchGroups view">
<h2><?php echo __('Group'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($orcidBatchGroup['OrcidBatchGroup']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active Directory Filter'); ?></dt>
		<dd>
			<?php echo h($orcidBatchGroup['OrcidBatchGroup']['group_definition']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Central Directory Filters'); ?></dt>
		<dd>
			<dl>
				<dt><?php echo __('Employee'); ?></dt>
				<dd>
					<?php echo h($orcidBatchGroup['OrcidBatchGroup']['employee_definition']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Student'); ?></dt>
				<dd>
					<?php echo h($orcidBatchGroup['OrcidBatchGroup']['student_definition']); ?>
					&nbsp;
				</dd>
			</dl>
		</dd>
		<dt><?php echo __('Cached'); ?></dt>
		<dd>
			<?php echo h($orcidBatchGroup['OrcidBatchGroup']['cache_creation_date']).( $orcidBatchGroup['OrcidBatchGroupCache'] ? ' ('.count($orcidBatchGroup['OrcidBatchGroupCache']).' '._('records').')' : ''); ?>
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $orcidBatchGroup['OrcidBatchGroup']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $orcidBatchGroup['OrcidBatchGroup']['id']), array(), __('Are you sure you want to delete "{0}"?', $orcidBatchGroup['OrcidBatchGroup']['name'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'orcid_users', 'action' => 'find', '?' => 'g='.$orcidBatchGroup['OrcidBatchGroup']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Expire Cache'), array('action' => 'recache', $orcidBatchGroup['OrcidBatchGroup']['id'])); ?> </li>
	</ul>
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
