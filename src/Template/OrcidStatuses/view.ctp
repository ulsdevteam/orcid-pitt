<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrcidStatus $orcidStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Orcid Status'), ['action' => 'edit', $orcidStatus->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Orcid Status'), ['action' => 'delete', $orcidStatus->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $orcidStatus->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Orcid Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orcid Status'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orcidStatuses view large-9 medium-8 columns content">
    <h3><?= h($orcidStatus->) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($orcidStatus->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ORCID USER ID') ?></th>
            <td><?= $this->Number->format($orcidStatus->ORCID_USER_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ORCID STATUS TYPE ID') ?></th>
            <td><?= $this->Number->format($orcidStatus->ORCID_STATUS_TYPE_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('STATUS TIMESTAMP') ?></th>
            <td><?= h($orcidStatus->STATUS_TIMESTAMP) ?></td>
        </tr>
    </table>
</div>
