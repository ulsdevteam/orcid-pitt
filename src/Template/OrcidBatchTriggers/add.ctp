<?php
$this->assign('title', __('Add Trigger'));
?>
<div class="orcidBatchTriggers form">
<?php echo $this->Form->create('OrcidBatchTrigger'); ?>
	<fieldset>
		<legend><?php echo $this->fetch('title'); ?></legend>
		<div>The User must be at the Workflow Checkpoint for Trigger Delay days and not have already been sent the Email Batch (or must have been sent the Email Batch at least Repeat Every days ago if Repeat Every is non-zero).  The User must match the Group criteria (if provided), and the User must have already received a prior email as specified by Require Prior Batch.  Today's date must be after the Begin Date (if provided).  The number of times this Email Batch has been sent to this user must not repeat more than Repeat Limit times (if provided).</div>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('orcid_batch_group_id', array('label' => 'Group', 'empty' => array(0 => '')));
		echo $this->Form->input('orcid_status_type_id', array('label' => 'Workflow Checkpoint'));
		echo $this->Form->input('orcid_batch_id', array('label' => 'Email Batch'));
		echo $this->Form->input('trigger_delay', array('label' => 'Trigger Delay (in days)', 'default' => 0));
		echo $this->Form->input('repeat', array('label' => 'Repeat Every (in days, 0 for never)', 'default' => 0));
		echo $this->Form->input('maximum_repeat', array('label' => 'Repeat Limit (in times, 0 for no limit)', 'default' => 0));
		echo $this->Form->input('begin_date', array('class' => 'datepicker', 'type' => 'text'));
		echo $this->Form->input('require_batch_id', array('label' => 'Require Prior Batch', 'options' => $reqBatches));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Triggers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
