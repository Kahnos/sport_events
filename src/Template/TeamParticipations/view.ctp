<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Team Participation'), ['action' => 'edit', $teamParticipation->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Team Participation'), ['action' => 'delete', $teamParticipation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teamParticipation->id)]) ?> </li>
<li><?= $this->Html->link(__('List Team Participations'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Team Participation'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Modes'), ['controller' => 'Modes', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Mode'), ['controller' => 'Modes', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Times'), ['controller' => 'Times', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Time'), ['controller' => 'Times', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($teamParticipation->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Team') ?></td>
            <td><?= $teamParticipation->has('team') ? $this->Html->link($teamParticipation->team->name, ['controller' => 'Teams', 'action' => 'view', $teamParticipation->team->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Mode') ?></td>
            <td><?= $teamParticipation->has('mode') ? $this->Html->link($teamParticipation->mode->id, ['controller' => 'Modes', 'action' => 'view', $teamParticipation->mode->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Category') ?></td>
            <td><?= $teamParticipation->has('category') ? $this->Html->link($teamParticipation->category->id, ['controller' => 'Categories', 'action' => 'view', $teamParticipation->category->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Event') ?></td>
            <td><?= $teamParticipation->has('event') ? $this->Html->link($teamParticipation->event->name, ['controller' => 'Events', 'action' => 'view', $teamParticipation->event->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Position') ?></td>
            <td><?= $this->Number->format($teamParticipation->position) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($teamParticipation->id) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Times') ?></h3>
    </div>
    <?php if (!empty($teamParticipation->times)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Time 1') ?></th>
                <th><?= __('Time 2') ?></th>
                <th><?= __('Time 3') ?></th>
                <th><?= __('Time 4') ?></th>
                <th><?= __('Id') ?></th>
                <th><?= __('Individual Participation Id') ?></th>
                <th><?= __('Team Participation Id') ?></th>
                <th><?= __('Time Total') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($teamParticipation->times as $times): ?>
                <tr>
                    <td><?= h($times->time_1) ?></td>
                    <td><?= h($times->time_2) ?></td>
                    <td><?= h($times->time_3) ?></td>
                    <td><?= h($times->time_4) ?></td>
                    <td><?= h($times->id) ?></td>
                    <td><?= h($times->individual_participation_id) ?></td>
                    <td><?= h($times->team_participation_id) ?></td>
                    <td><?= h($times->time_total) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Times', 'action' => 'view', $times->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Times', 'action' => 'edit', $times->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Times', 'action' => 'delete', $times->id], ['confirm' => __('Are you sure you want to delete # {0}?', $times->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Times</p>
    <?php endif; ?>
</div>
