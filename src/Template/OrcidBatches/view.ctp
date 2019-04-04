<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrcidBatch $orcidBatch
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Orcid Batch'), ['action' => 'edit', $orcidBatch->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Orcid Batch'), ['action' => 'delete', $orcidBatch->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $orcidBatch->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Orcid Batches'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orcid Batch'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orcidBatches view large-9 medium-8 columns content">
    <h3><?= h($orcidBatch->) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('NAME') ?></th>
            <td><?= h($orcidBatch->NAME) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SUBJECT') ?></th>
            <td><?= h($orcidBatch->SUBJECT) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FROM NAME') ?></th>
            <td><?= h($orcidBatch->FROM_NAME) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FROM ADDR') ?></th>
            <td><?= h($orcidBatch->FROM_ADDR) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('REPLY TO') ?></th>
            <td><?= h($orcidBatch->REPLY_TO) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($orcidBatch->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ORCID BATCH CREATOR ID') ?></th>
            <td><?= $this->Number->format($orcidBatch->ORCID_BATCH_CREATOR_ID) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('BODY') ?></h4>
        <?= $this->Text->autoParagraph(h($orcidBatch->BODY)); ?>
    </div>
</div>
