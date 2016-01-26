<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $athlete->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $athlete->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Athletes'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Individual Participations'), ['controller' => 'IndividualParticipations', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Individual Participation'), ['controller' => 'IndividualParticipations', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($athlete); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Athlete']) ?></legend>
    <?php
    echo $this->Form->input('name');
    echo $this->Form->input('sex');
    echo $this->Form->input('date_of_birth');
    echo $this->Form->input('CI');
    echo $this->Form->input('teams._ids', ['options' => $teams]);
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>