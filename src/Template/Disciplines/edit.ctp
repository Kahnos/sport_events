<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $discipline->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $discipline->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Disciplines'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Modes'), ['controller' => 'Modes', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Mode'), ['controller' => 'Modes', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($discipline); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Discipline']) ?></legend>
    <?php
    echo $this->Form->input('type');
    echo $this->Form->input('sub_type');
    echo $this->Form->input('modes._ids', ['options' => $modes]);
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>