<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Distance'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Category'), ['controller' => ' Categories', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('distance_1'); ?></th>
            <th><?= $this->Paginator->sort('distance_2'); ?></th>
            <th><?= $this->Paginator->sort('distance_3'); ?></th>
            <th><?= $this->Paginator->sort('distance_4'); ?></th>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($distances as $distance): ?>
        <tr>
            <td><?= $this->Number->format($distance->id) ?></td>
            <td><?= $this->Number->format($distance->distance_1) ?></td>
            <td><?= $this->Number->format($distance->distance_2) ?></td>
            <td><?= $this->Number->format($distance->distance_3) ?></td>
            <td><?= $this->Number->format($distance->distance_4) ?></td>
            <td><?= h($distance->name) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $distance->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $distance->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $distance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $distance->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>