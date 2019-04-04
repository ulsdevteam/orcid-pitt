<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrcidBatchTrigger $orcidBatchTrigger
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Orcid Batch Trigger'), ['action' => 'edit', $orcidBatchTrigger->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Orcid Batch Trigger'), ['action' => 'delete', $orcidBatchTrigger->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $orcidBatchTrigger->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Orcid Batch Triggers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orcid Batch Trigger'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orcidBatchTriggers view large-9 medium-8 columns content">
    <h3><?= h($orcidBatchTrigger->) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('NAME') ?></th>
            <td><?= h($orcidBatchTrigger->NAME) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($orcidBatchTrigger->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ORCID STATUS TYPE ID') ?></th>
            <td><?= $this->Number->format($orcidBatchTrigger->ORCID_STATUS_TYPE_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ORCID BATCH ID') ?></th>
            <td><?= $this->Number->format($orcidBatchTrigger->ORCID_BATCH_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TRIGGER DELAY') ?></th>
            <td><?= $this->Number->format($orcidBatchTrigger->TRIGGER_DELAY) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ORCID BATCH GROUP ID') ?></th>
            <td><?= $this->Number->format($orcidBatchTrigger->ORCID_BATCH_GROUP_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('REQUIRE BATCH ID') ?></th>
            <td><?= $this->Number->format($orcidBatchTrigger->REQUIRE_BATCH_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('REPEAT') ?></th>
            <td><?= $this->Number->format($orcidBatchTrigger->REPEAT) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MAXIMUM REPEAT') ?></th>
            <td><?= $this->Number->format($orcidBatchTrigger->MAXIMUM_REPEAT) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BEGIN DATE') ?></th>
            <td><?= h($orcidBatchTrigger->BEGIN_DATE) ?></td>
        </tr>
    </table>
</div>
