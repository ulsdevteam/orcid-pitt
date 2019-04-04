<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrcidBatch $orcidBatch
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $orcidBatch->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $orcidBatch->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Orcid Batches'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="orcidBatches form large-9 medium-8 columns content">
    <?= $this->Form->create($orcidBatch) ?>
    <fieldset>
        <legend><?= __('Edit Orcid Batch') ?></legend>
        <?php
            echo $this->Form->control('NAME');
            echo $this->Form->control('SUBJECT');
            echo $this->Form->control('BODY');
            echo $this->Form->control('FROM_NAME');
            echo $this->Form->control('FROM_ADDR');
            echo $this->Form->control('REPLY_TO');
            echo $this->Form->control('ORCID_BATCH_CREATOR_ID');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
