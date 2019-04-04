<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrcidUser $orcidUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Orcid User'), ['action' => 'edit', $orcidUser->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Orcid User'), ['action' => 'delete', $orcidUser->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $orcidUser->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Orcid Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orcid User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orcidUsers view large-9 medium-8 columns content">
    <h3><?= h($orcidUser->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('USERNAME') ?></th>
            <td><?= h($orcidUser->USERNAME) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ORCID') ?></th>
            <td><?= h($orcidUser->ORCID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TOKEN') ?></th>
            <td><?= h($orcidUser->TOKEN) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($orcidUser->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CREATED') ?></th>
            <td><?= h($orcidUser->CREATED) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MODIFIED') ?></th>
            <td><?= h($orcidUser->MODIFIED) ?></td>
        </tr>
    </table>
</div>
