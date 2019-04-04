<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrcidStatusType $orcidStatusType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Orcid Status Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="orcidStatusTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($orcidStatusType) ?>
    <fieldset>
        <legend><?= __('Add Orcid Status Type') ?></legend>
        <?php
            echo $this->Form->control('NAME');
            echo $this->Form->control('SEQ');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
