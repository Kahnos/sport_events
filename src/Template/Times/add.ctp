<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Times'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Individual Participations'), ['controller' => 'IndividualParticipations', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Individual Participation'), ['controller' => 'IndividualParticipations', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Team Participations'), ['controller' => 'TeamParticipations', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Team Participation'), ['controller' => 'TeamParticipations', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($time); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Time']) ?></legend>
    <?php
    echo $this->Form->input('time_1');
    echo $this->Form->input('time_2');
    echo $this->Form->input('time_3');
    echo $this->Form->input('time_4');
    echo $this->Form->input('individual_participation_id', ['options' => $individualParticipations]);
    echo $this->Form->input('team_participation_id', ['options' => $teamParticipations]);
    echo $this->Form->input('time_total');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>