<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $search->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $search->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Searches'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="searches form large-9 medium-8 columns content">
    <?= $this->Form->create($search) ?>
    <fieldset>
        <legend><?= __('Edit Search') ?></legend>
        <?php
            echo $this->Form->control('term');
            echo $this->Form->control('results');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
