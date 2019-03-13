<div class="home view">
<h2><?php echo __('Administration'); ?></h2>
<p>This site allows for maintenance and administration of the ORCID @ Pitt data and communications workflow.</p>
<h3>Users</h3>
<p>Manage Pitt users, ORCID identifiers, and Tokens (permissions granted by ORCID users).</p>
<h3>Checkpoints</h3>
<p>View checkpoints within the workflow, and the users at those checkpoints.</p>
<h3>Emails</h3>
<p>Manage batch email communication via automated messages to groups of users. <strong>Templates</strong> describe a standard email to be sent to a group of users. <strong>Triggers</strong> describe a set of conditions used to send an email template. <strong>Groups</strong> define Exchange or CDS criteria used to affect a trigger.</p>
<h3>Administrators</h3>
<p>Administer the staff allowed to create and change templates and triggers in this interface.</p>
</div>
<div class="actions">
	<h3><?php echo __('ORCID Users'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List ORCID Users'), array('controller' => 'orcid_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Find ORCID User'), array('controller' => 'orcid_users', 'action' => 'find')); ?> </li>
	</ul>
	<h3><?php echo __('Workflow Checkpoints'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Workflow Checkpoints'), array('controller' => 'orcid_status_types', 'action' => 'index')); ?> </li>
	</ul>
	<h3><?php echo __('Email Batches'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Batch Email Templates'), array('controller' => 'orcid_batches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Email Triggers'), array('controller' => 'orcid_batch_triggers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'orcid_batch_groups', 'action' => 'index')); ?> </li>
	</ul>
	<h3><?php echo __('Administrators'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Administrators'), array('controller' => 'orcid_batch_creators', 'action' => 'index')); ?> </li>
	</ul>
</div>
