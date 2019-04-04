<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrcidBatchCreator $orcidBatchCreator
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $orcidBatchCreator->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $orcidBatchCreator->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Orcid Batch Creators'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="orcidBatchCreators form large-9 medium-8 columns content">
    <?= $this->Form->create($orcidBatchCreator) ?>
    <fieldset>
        <legend><?= __('Edit Orcid Batch Creator') ?></legend>
        <?php
            echo $this->Form->control('NAME');
            echo $this->Form->control('FLAGS');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
