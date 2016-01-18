<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Time'), ['action' => 'edit', $time->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Time'), ['action' => 'delete', $time->id], ['confirm' => __('Are you sure you want to delete # {0}?', $time->id)]) ?> </li>
<li><?= $this->Html->link(__('List Times'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Time'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Individual Participations'), ['controller' => 'IndividualParticipations', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Individual Participation'), ['controller' => 'IndividualParticipations', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Team Participations'), ['controller' => 'TeamParticipations', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Team Participation'), ['controller' => 'TeamParticipations', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($time->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Individual Participation') ?></td>
            <td><?= $time->has('individual_participation') ? $this->Html->link($time->individual_participation->id, ['controller' => 'IndividualParticipations', 'action' => 'view', $time->individual_participation->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Team Participation') ?></td>
            <td><?= $time->has('team_participation') ? $this->Html->link($time->team_participation->id, ['controller' => 'TeamParticipations', 'action' => 'view', $time->team_participation->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($time->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Time 1') ?></td>
            <td><?= h($time->time_1) ?></td>
        </tr>
        <tr>
            <td><?= __('Time 2') ?></td>
            <td><?= h($time->time_2) ?></td>
        </tr>
        <tr>
            <td><?= __('Time 3') ?></td>
            <td><?= h($time->time_3) ?></td>
        </tr>
        <tr>
            <td><?= __('Time 4') ?></td>
            <td><?= h($time->time_4) ?></td>
        </tr>
        <tr>
            <td><?= __('Time Total') ?></td>
            <td><?= h($time->time_total) ?></td>
        </tr>
    </table>
</div>

