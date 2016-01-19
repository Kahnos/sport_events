<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Categories Events Mode'), ['action' => 'edit', $categoriesEventsMode->mode_id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Categories Events Mode'), ['action' => 'delete', $categoriesEventsMode->mode_id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoriesEventsMode->mode_id)]) ?> </li>
<li><?= $this->Html->link(__('List Categories Events Modes'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Categories Events Mode'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Modes'), ['controller' => 'Modes', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Mode'), ['controller' => 'Modes', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($categoriesEventsMode->mode_id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Mode') ?></td>
            <td><?= $categoriesEventsMode->has('mode') ? $this->Html->link($categoriesEventsMode->mode->id, ['controller' => 'Modes', 'action' => 'view', $categoriesEventsMode->mode->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Category') ?></td>
            <td><?= $categoriesEventsMode->has('category') ? $this->Html->link($categoriesEventsMode->category->id, ['controller' => 'Categories', 'action' => 'view', $categoriesEventsMode->category->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Event') ?></td>
            <td><?= $categoriesEventsMode->has('event') ? $this->Html->link($categoriesEventsMode->event->name, ['controller' => 'Events', 'action' => 'view', $categoriesEventsMode->event->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Hour') ?></td>
            <td><?= h($categoriesEventsMode->hour) ?></td>
        </tr>
    </table>
</div>

