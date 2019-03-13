<?php
$this->assign('title', __('Edit Batch Email Template'));
?>
<div class="orcidBatches form">
<?php echo $this->Form->create('OrcidBatch'); ?>
	<fieldset>
		<legend><?php echo $this->fetch('title'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('from_name');
		echo $this->Form->input('from_addr', array('label' => 'From Address'));
		echo $this->Form->input('subject');
		echo $this->Form->input('body');
		echo $this->Form->input('reply_to');
		echo $this->Form->input('orcid_batch_creator_id', array('label' => 'Template Owner'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('View'), array('action' => 'view', $this->Form->value('OrcidBatch.id'))); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OrcidBatch.id')), array(), __('Are you sure you want to delete # {0}?', $this->Form->value('OrcidBatch.id'))); ?></li>
	</ul>
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Batch Email Templates'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
