<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrcidStatusType[]|\Cake\Collection\CollectionInterface $orcidStatusTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Orcid Status Type'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orcidStatusTypes index large-9 medium-8 columns content">
    <h3><?= __('Orcid Status Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('NAME') ?></th>
                <th scope="col"><?= $this->Paginator->sort('SEQ') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orcidStatusTypes as $orcidStatusType): ?>
            <tr>
                <td><?= $this->Number->format($orcidStatusType->ID) ?></td>
                <td><?= h($orcidStatusType->NAME) ?></td>
                <td><?= $this->Number->format($orcidStatusType->SEQ) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orcidStatusType->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orcidStatusType->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orcidStatusType->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $orcidStatusType->ID)]) ?>
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
