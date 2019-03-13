<?php
$this->assign('title', __('Edit ORCID User'));
?>
<div class="orcidUsers form">
<?php echo $this->Form->create('OrcidUser'); ?>
	<fieldset>
		<legend><?php echo $this->fetch('title'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('orcid', array('label' => 'ORCID'));
		echo $this->Form->input('token');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('View'), array('controller' => 'orcid_users', 'action' => 'view', $this->Form->value('OrcidUser.id'))); ?> </li>
		<li><?php echo $this->Form->postLink(__('Opt Out'), array('action' => 'optout', $this->Form->value('OrcidUser.id')), array(), __('Are you sure you want to opt out {0}?', $this->Form->value('OrcidUser.username'))); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OrcidUser.id')), array(), __('Are you sure you want to delete {0}?', $this->Form->value('OrcidUser.username'))); ?></li>
	</ul>
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List ORCID Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Find ORCID User'), array('action' => 'find')); ?></li>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
