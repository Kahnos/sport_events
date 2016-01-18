<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $age->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $age->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Ages'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($age); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Age']) ?></legend>
    <?php
    echo $this->Form->input('min_age');
    echo $this->Form->input('max_age');
    echo $this->Form->input('name');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>