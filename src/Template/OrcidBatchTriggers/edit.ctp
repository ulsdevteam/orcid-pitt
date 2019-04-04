<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrcidBatchTrigger $orcidBatchTrigger
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $orcidBatchTrigger->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $orcidBatchTrigger->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Orcid Batch Triggers'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="orcidBatchTriggers form large-9 medium-8 columns content">
    <?= $this->Form->create($orcidBatchTrigger) ?>
    <fieldset>
        <legend><?= __('Edit Orcid Batch Trigger') ?></legend>
        <?php
            echo $this->Form->control('NAME');
            echo $this->Form->control('ORCID_STATUS_TYPE_ID');
            echo $this->Form->control('ORCID_BATCH_ID');
            echo $this->Form->control('TRIGGER_DELAY');
            echo $this->Form->control('ORCID_BATCH_GROUP_ID');
            echo $this->Form->control('BEGIN_DATE', ['empty' => true]);
            echo $this->Form->control('REQUIRE_BATCH_ID');
            echo $this->Form->control('REPEAT');
            echo $this->Form->control('MAXIMUM_REPEAT');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
