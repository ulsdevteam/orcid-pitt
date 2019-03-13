<?php
$this->assign('title', __('Edit Workflow Checkpoint'));
?>
<div class="orcidStatusTypes form">
<?php echo $this->Form->create('OrcidStatusType'); ?>
	<fieldset>
		<legend><?php echo $this->fetch('title'); ?></legend>
		<p><?php echo __('Warning: You are editing a Checkpoint; the Workflow code will need to be modified for this to be effective if changing something other than the display name.'); ?></p>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('seq');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OrcidStatusType.id')), array(), __('Are you sure you want to delete # {0}?', $this->Form->value('OrcidStatusType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Workflow Checkpoints'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
