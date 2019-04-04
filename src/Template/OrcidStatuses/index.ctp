<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrcidStatus[]|\Cake\Collection\CollectionInterface $orcidStatuses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Orcid Status'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orcidStatuses index large-9 medium-8 columns content">
    <h3><?= __('Orcid Statuses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ORCID_USER_ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ORCID_STATUS_TYPE_ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('STATUS_TIMESTAMP') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orcidStatuses as $orcidStatus): ?>
            <tr>
                <td><?= $this->Number->format($orcidStatus->ID) ?></td>
                <td><?= $this->Number->format($orcidStatus->ORCID_USER_ID) ?></td>
                <td><?= $this->Number->format($orcidStatus->ORCID_STATUS_TYPE_ID) ?></td>
                <td><?= h($orcidStatus->STATUS_TIMESTAMP) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orcidStatus->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orcidStatus->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orcidStatus->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $orcidStatus->ID)]) ?>
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
