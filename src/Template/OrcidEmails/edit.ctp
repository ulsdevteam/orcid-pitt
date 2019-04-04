<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrcidEmail $orcidEmail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $orcidEmail->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $orcidEmail->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Orcid Emails'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="orcidEmails form large-9 medium-8 columns content">
    <?= $this->Form->create($orcidEmail) ?>
    <fieldset>
        <legend><?= __('Edit Orcid Email') ?></legend>
        <?php
            echo $this->Form->control('ORCID_USER_ID');
            echo $this->Form->control('ORCID_BATCH_ID');
            echo $this->Form->control('QUEUED', ['empty' => true]);
            echo $this->Form->control('SENT', ['empty' => true]);
            echo $this->Form->control('CANCELLED', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
