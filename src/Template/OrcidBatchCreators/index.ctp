<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrcidBatchCreator[]|\Cake\Collection\CollectionInterface $orcidBatchCreators
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Orcid Batch Creator'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orcidBatchCreators index large-9 medium-8 columns content">
    <h3><?= __('Orcid Batch Creators') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('NAME') ?></th>
                <th scope="col"><?= $this->Paginator->sort('FLAGS') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orcidBatchCreators as $orcidBatchCreator): ?>
            <tr>
                <td><?= $this->Number->format($orcidBatchCreator->ID) ?></td>
                <td><?= h($orcidBatchCreator->NAME) ?></td>
                <td><?= $this->Number->format($orcidBatchCreator->FLAGS) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orcidBatchCreator->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orcidBatchCreator->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orcidBatchCreator->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $orcidBatchCreator->ID)]) ?>
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
