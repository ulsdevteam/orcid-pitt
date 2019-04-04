<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrcidUser[]|\Cake\Collection\CollectionInterface $orcidUsers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Orcid User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orcidUsers index large-9 medium-8 columns content">
    <h3><?= __('Orcid Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('USERNAME') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ORCID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('TOKEN') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CREATED') ?></th>
                <th scope="col"><?= $this->Paginator->sort('MODIFIED') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orcidUsers as $orcidUser): ?>
            <tr>
                <td><?= h($orcidUser->USERNAME) ?></td>
                <td><?= h($orcidUser->ORCID) ?></td>
                <td><?= h($orcidUser->TOKEN) ?></td>
                <td><?= h($orcidUser->CREATED) ?></td>
                <td><?= h($orcidUser->MODIFIED) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orcidUser->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orcidUser->ID]) ?>
                    <?= $this->Form->postLink(__('Opt Out'), ['action' => 'optout', $orcidUser->ID], ['confirm' => __('Are you sure you want to opt out # {0}?', $orcidUser->USERNAME)]) ?>                    
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orcidUser->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $orcidUser->USERNAME)]) ?>
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
