<?php
$this->assign('title', __('Add Administrator'));
?>
<div class="orcidBatchCreators form">
<?php echo $this->Form->create('OrcidBatchCreator'); ?>
	<fieldset>
		<legend><?php echo $this->fetch('title'); ?></legend>
	<p><?php echo __('Enter the University Computer Account name to create an new administrative user.'); ?></p>
	<?php
		echo $this->Form->input('name', array('label' => 'Username'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Administrators'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
