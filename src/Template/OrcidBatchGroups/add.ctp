<div class="orcidBatchGroups form">
<?php echo $this->Form->create('OrcidBatchGroup'); ?>
	<fieldset>
		<legend><?php echo __('Add Group'); ?></legend>
		<div>Group members must match the Active Directory Filter (if provided) and must match one of the Central Directory Filters (if provided)</div>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('group_definition', array('label' => 'Active Directory Filter'));
	?>
		<fieldset>
			<legend><?php echo __('Central Directory Filters'); ?></legend>
	<?php
		echo $this->Form->input('student_definition', array('label' => 'Student'));
		echo $this->Form->input('employee_definition', array('label' => 'Employee'));
	?>
		</fieldset>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
