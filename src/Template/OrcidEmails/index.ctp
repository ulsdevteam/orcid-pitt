<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrcidEmail[]|\Cake\Collection\CollectionInterface $orcidEmails
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Orcid Email'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orcidEmails index large-9 medium-8 columns content">
    <h3><?= __('Orcid Emails') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ORCID_USER_ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ORCID_BATCH_ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('QUEUED') ?></th>
                <th scope="col"><?= $this->Paginator->sort('SENT') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CANCELLED') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orcidEmails as $orcidEmail): ?>
            <tr>
                <td><?= $this->Number->format($orcidEmail->ID) ?></td>
                <td><?= $this->Number->format($orcidEmail->ORCID_USER_ID) ?></td>
                <td><?= $this->Number->format($orcidEmail->ORCID_BATCH_ID) ?></td>
                <td><?= h($orcidEmail->QUEUED) ?></td>
                <td><?= h($orcidEmail->SENT) ?></td>
                <td><?= h($orcidEmail->CANCELLED) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orcidEmail->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orcidEmail->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orcidEmail->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $orcidEmail->ID)]) ?>
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
