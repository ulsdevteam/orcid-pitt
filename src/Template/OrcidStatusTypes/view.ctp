<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrcidStatusType $orcidStatusType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Orcid Status Type'), ['action' => 'edit', $orcidStatusType->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Orcid Status Type'), ['action' => 'delete', $orcidStatusType->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $orcidStatusType->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Orcid Status Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orcid Status Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orcidStatusTypes view large-9 medium-8 columns content">
    <h3><?= h($orcidStatusType->) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('NAME') ?></th>
            <td><?= h($orcidStatusType->NAME) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($orcidStatusType->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SEQ') ?></th>
            <td><?= $this->Number->format($orcidStatusType->SEQ) ?></td>
        </tr>
    </table>
</div>
