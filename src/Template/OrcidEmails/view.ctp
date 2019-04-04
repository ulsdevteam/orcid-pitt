<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrcidEmail $orcidEmail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Orcid Email'), ['action' => 'edit', $orcidEmail->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Orcid Email'), ['action' => 'delete', $orcidEmail->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $orcidEmail->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Orcid Emails'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orcid Email'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orcidEmails view large-9 medium-8 columns content">
    <h3><?= h($orcidEmail->) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($orcidEmail->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ORCID USER ID') ?></th>
            <td><?= $this->Number->format($orcidEmail->ORCID_USER_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ORCID BATCH ID') ?></th>
            <td><?= $this->Number->format($orcidEmail->ORCID_BATCH_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('QUEUED') ?></th>
            <td><?= h($orcidEmail->QUEUED) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SENT') ?></th>
            <td><?= h($orcidEmail->SENT) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CANCELLED') ?></th>
            <td><?= h($orcidEmail->CANCELLED) ?></td>
        </tr>
    </table>
</div>
