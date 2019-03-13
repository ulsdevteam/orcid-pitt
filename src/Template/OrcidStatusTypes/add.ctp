<?php
$this->assign('title', __('Add Workflow Checkpoint'));
?>
<div class="orcidStatusTypes form">
<?php echo $this->Form->create('OrcidStatusType'); ?>
	<fieldset>
		<legend><?php echo $this->fetch('title'); ?></legend>
		<p><?php echo __('Warning: You are adding a Checkpoint; the Workflow code will need to be modified for this to be effective.'); ?></p>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('seq');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Workflow Checkpoints'), array('action' => 'index')); ?></li>
	</ul>
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
