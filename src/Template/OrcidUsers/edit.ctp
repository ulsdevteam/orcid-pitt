<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrcidUser $orcidUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $orcidUser->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $orcidUser->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Orcid Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="orcidUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($orcidUser) ?>
    <fieldset>
        <legend><?= __('Edit Orcid User') ?></legend>
        <?php
            echo $this->Form->control('USERNAME');
            echo $this->Form->control('ORCID');
            echo $this->Form->control('TOKEN');
            echo $this->Form->control('CREATED', ['empty' => true]);
            echo $this->Form->control('MODIFIED', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
