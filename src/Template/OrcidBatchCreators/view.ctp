<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrcidBatchCreator $orcidBatchCreator
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Orcid Batch Creator'), ['action' => 'edit', $orcidBatchCreator->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Orcid Batch Creator'), ['action' => 'delete', $orcidBatchCreator->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $orcidBatchCreator->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Orcid Batch Creators'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orcid Batch Creator'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orcidBatchCreators view large-9 medium-8 columns content">
    <h3><?= h($orcidBatchCreator->) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('NAME') ?></th>
            <td><?= h($orcidBatchCreator->NAME) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($orcidBatchCreator->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FLAGS') ?></th>
            <td><?= $this->Number->format($orcidBatchCreator->FLAGS) ?></td>
        </tr>
    </table>
</div>
