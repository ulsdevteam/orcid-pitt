<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrcidStatus $orcidStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $orcidStatus->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $orcidStatus->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Orcid Statuses'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="orcidStatuses form large-9 medium-8 columns content">
    <?= $this->Form->create($orcidStatus) ?>
    <fieldset>
        <legend><?= __('Edit Orcid Status') ?></legend>
        <?php
            echo $this->Form->control('ORCID_USER_ID');
            echo $this->Form->control('ORCID_STATUS_TYPE_ID');
            echo $this->Form->control('STATUS_TIMESTAMP');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
