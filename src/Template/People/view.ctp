<div class="peoples view">
<h2><?php echo __('User');?></h2>
<dl>
<dt><?php echo __('User Name'); ?></dt>
<dd>
<?php echo h($people['Person']['cn']); ?>
</dd>
<dt><?php echo __('Name'); ?></dt>
<dd>
<?php echo h($people['Person']['displayname']); ?>
</dd>
<dt><?php echo __('Employee Number'); ?></dt>
<dd>
<?php echo h($people['Person']['employeenumber']); ?>
</dd>
<dt><?php echo __('CDS Id'); ?></dt>
<dd>
<?php echo h($people['Person']['pittcdsid']); ?>
</dd>
<dt><?php echo __('Email'); ?></dt>
<dd>
<?php echo h($people['Person']['mail']); ?>
</dd>
</dl>
</div>