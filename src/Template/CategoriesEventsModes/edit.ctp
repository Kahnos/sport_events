<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $categoriesEventsMode->mode_id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $categoriesEventsMode->mode_id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Categories Events Modes'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Modes'), ['controller' => 'Modes', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Mode'), ['controller' => 'Modes', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($categoriesEventsMode); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Categories Events Mode']) ?></legend>
    <?php
    echo $this->Form->input('hour');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>