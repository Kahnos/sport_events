<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Athletes Team'), ['action' => 'edit', $athletesTeam->athlete_id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Athletes Team'), ['action' => 'delete', $athletesTeam->athlete_id], ['confirm' => __('Are you sure you want to delete # {0}?', $athletesTeam->athlete_id)]) ?> </li>
<li><?= $this->Html->link(__('List Athletes Teams'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Athletes Team'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Athletes'), ['controller' => 'Athletes', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Athlete'), ['controller' => 'Athletes', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($athletesTeam->athlete_id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Athlete') ?></td>
            <td><?= $athletesTeam->has('athlete') ? $this->Html->link($athletesTeam->athlete->name, ['controller' => 'Athletes', 'action' => 'view', $athletesTeam->athlete->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Team') ?></td>
            <td><?= $athletesTeam->has('team') ? $this->Html->link($athletesTeam->team->name, ['controller' => 'Teams', 'action' => 'view', $athletesTeam->team->id]) : '' ?></td>
        </tr>
    </table>
</div>

