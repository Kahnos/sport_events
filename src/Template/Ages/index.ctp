<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Age'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Category'), ['controller' => ' Categories', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>

            <th><?= $this->Paginator->sort('min_age'); ?></th>
            <th><?= $this->Paginator->sort('max_age'); ?></th>
            <th><?= $this->Paginator->sort('name'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ages as $age): ?>
        <tr>

            <td><?= $this->Number->format($age->min_age) ?></td>
            <td><?= $this->Number->format($age->max_age) ?></td>
            <td><?= h($age->name) ?></td>
            
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