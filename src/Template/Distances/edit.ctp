<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $distance->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $distance->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Distances'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($distance); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Distance']) ?></legend>
    <?php
    echo $this->Form->input('distance_1');
    echo $this->Form->input('distance_2');
    echo $this->Form->input('distance_3');
    echo $this->Form->input('distance_4');
    echo $this->Form->input('name');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>