<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrcidBatchTrigger[]|\Cake\Collection\CollectionInterface $orcidBatchTriggers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Orcid Batch Trigger'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orcidBatchTriggers index large-9 medium-8 columns content">
    <h3><?= __('Orcid Batch Triggers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('NAME') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ORCID_STATUS_TYPE_ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ORCID_BATCH_ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('TRIGGER_DELAY') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ORCID_BATCH_GROUP_ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('BEGIN_DATE') ?></th>
                <th scope="col"><?= $this->Paginator->sort('REQUIRE_BATCH_ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('REPEAT') ?></th>
                <th scope="col"><?= $this->Paginator->sort('MAXIMUM_REPEAT') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orcidBatchTriggers as $orcidBatchTrigger): ?>
            <tr>
                <td><?= $this->Number->format($orcidBatchTrigger->ID) ?></td>
                <td><?= h($orcidBatchTrigger->NAME) ?></td>
                <td><?= $this->Number->format($orcidBatchTrigger->ORCID_STATUS_TYPE_ID) ?></td>
                <td><?= $this->Number->format($orcidBatchTrigger->ORCID_BATCH_ID) ?></td>
                <td><?= $this->Number->format($orcidBatchTrigger->TRIGGER_DELAY) ?></td>
                <td><?= $this->Number->format($orcidBatchTrigger->ORCID_BATCH_GROUP_ID) ?></td>
                <td><?= h($orcidBatchTrigger->BEGIN_DATE) ?></td>
                <td><?= $this->Number->format($orcidBatchTrigger->REQUIRE_BATCH_ID) ?></td>
                <td><?= $this->Number->format($orcidBatchTrigger->REPEAT) ?></td>
                <td><?= $this->Number->format($orcidBatchTrigger->MAXIMUM_REPEAT) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orcidBatchTrigger->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orcidBatchTrigger->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orcidBatchTrigger->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $orcidBatchTrigger->ID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
