<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Modes'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Individual Participations'), ['controller' => 'IndividualParticipations', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Individual Participation'), ['controller' => 'IndividualParticipations', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Team Participations'), ['controller' => 'TeamParticipations', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Team Participation'), ['controller' => 'TeamParticipations', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Winners'), ['controller' => 'Winners', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Winner'), ['controller' => 'Winners', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Disciplines'), ['controller' => 'Disciplines', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Discipline'), ['controller' => 'Disciplines', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($mode); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Mode']) ?></legend>
    <?php
    echo $this->Form->input('type');
    echo $this->Form->input('number_of_disciplines');
    echo $this->Form->input('disciplines._ids', ['options' => $disciplines]);
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>