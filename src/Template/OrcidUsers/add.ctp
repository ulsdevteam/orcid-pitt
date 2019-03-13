<?php
$this->assign('title', __('Add ORCID User'));
?>
<div class="orcidUsers form">
<?php echo $this->Form->create('OrcidUser'); ?>
	<fieldset>
		<legend><?php echo $this->fetch('title'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('orcid');
		echo $this->Form->input('token');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List ORCID Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Find ORCID Users'), array('action' => 'find')); ?></li>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
