<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Search $search
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Search'), ['action' => 'edit', $search->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Search'), ['action' => 'delete', $search->id], ['confirm' => __('Are you sure you want to delete # {0}?', $search->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Searches'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Search'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="searches view large-9 medium-8 columns content">
    <h3><?= h($search->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Term') ?></th>
            <td><?= h($search->term) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($search->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Results') ?></th>
            <td><?= $this->Number->format($search->results) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($search->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($search->modified) ?></td>
        </tr>
    </table>
</div>
