<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Disciplines'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Modes'), ['controller' => 'Modes', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Mode'), ['controller' => 'Modes', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($discipline); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Discipline']) ?></legend>
    <?php
    echo $this->Form->input('type');
    echo $this->Form->input('sub_type');
    echo $this->Form->input('modes._ids', ['options' => $modes]);
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>