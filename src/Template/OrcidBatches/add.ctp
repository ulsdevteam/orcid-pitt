<?php
$this->assign('title', __('Add Batch Email Template'));
?>
<div class="orcidBatches form">
<?php echo $this->Form->create('OrcidBatch'); ?>
	<fieldset>
		<legend><?php echo $this->fetch('title'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label' => 'Email Description'));
		echo $this->Form->input('from_name');
		echo $this->Form->input('from_addr', array('label' => 'From Address'));
		echo $this->Form->input('subject');
		echo $this->Form->input('body');
		echo $this->Form->input('reply_to');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Batch Email Templates'), array('action' => 'index')); ?></li>
	</ul>
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
