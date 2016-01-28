<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Categories Events Mode'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Modes'), ['controller' => 'Modes', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Mode'), ['controller' => ' Modes', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Category'), ['controller' => ' Categories', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Event'), ['controller' => ' Events', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('mode_id'); ?></th>
            <th><?= $this->Paginator->sort('category_id'); ?></th>
            <th><?= $this->Paginator->sort('event_id'); ?></th>
            <th><?= $this->Paginator->sort('hour'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categoriesEventsModes as $categoriesEventsMode): ?>
        <tr>
            <td>
                <?= $categoriesEventsMode->has('mode') ? $this->Html->link($categoriesEventsMode->mode->id, ['controller' => 'Modes', 'action' => 'view', $categoriesEventsMode->mode->id]) : '' ?>
            </td>
            <td>
                <?= $categoriesEventsMode->has('category') ? $this->Html->link($categoriesEventsMode->category->id, ['controller' => 'Categories', 'action' => 'view', $categoriesEventsMode->category->id]) : '' ?>
            </td>
            <td>
                <?= $categoriesEventsMode->has('event') ? $this->Html->link($categoriesEventsMode->event->name, ['controller' => 'Events', 'action' => 'view', $categoriesEventsMode->event->id]) : '' ?>
            </td>
            <td><?= h($categoriesEventsMode->hour->format('H:m')) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $categoriesEventsMode->mode_id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $categoriesEventsMode->mode_id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $categoriesEventsMode->mode_id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoriesEventsMode->mode_id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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