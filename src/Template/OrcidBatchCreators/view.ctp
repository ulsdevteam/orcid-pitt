<?php
$this->assign('title', __('Administrator'));
?>
<div class="orcidBatchCreators view">
<h2><?php echo $this->fetch('title'); ?></h2>
	<dl>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($orcidBatchCreator['OrcidBatchCreator']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($orcidBatchCreator['Person']['displayname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Disabled'); ?></dt>
		<dd>
			<?php echo $orcidBatchCreator['OrcidBatchCreator']['flags'] & OrcidBatchCreator::FLAG_DISABLED  ? __('Yes') : __('No'); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li>
			<?php 
				if ($orcidBatchCreator['OrcidBatchCreator']['flags'] & OrcidBatchCreator::FLAG_DISABLED) {
					echo $this->Form->postLink(__('Enable'), array('action' => 'enable', $orcidBatchCreator['OrcidBatchCreator']['id']), array(), __('Are you sure you want to enable # {0}?', $orcidBatchCreator['OrcidBatchCreator']['name']));
				} else {
					echo $this->Form->postLink(__('Disable'), array('action' => 'disable', $orcidBatchCreator['OrcidBatchCreator']['id']), array(), __('Are you sure you want to disable # {0}?', $orcidBatchCreator['OrcidBatchCreator']['name']));
				}
			?>
		</li>
	</ul>
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Administrators'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
