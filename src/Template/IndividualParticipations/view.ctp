<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Individual Participation'), ['action' => 'edit', $individualParticipation->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Individual Participation'), ['action' => 'delete', $individualParticipation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $individualParticipation->id)]) ?> </li>
<li><?= $this->Html->link(__('List Individual Participations'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Individual Participation'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Athletes'), ['controller' => 'Athletes', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Athlete'), ['controller' => 'Athletes', 'action' => 'add']) ?> </li>
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
        <h3 class="panel-title"><?= h($individualParticipation->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Athlete') ?></td>
            <td><?= $individualParticipation->has('athlete') ? $this->Html->link($individualParticipation->athlete->name, ['controller' => 'Athletes', 'action' => 'view', $individualParticipation->athlete->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Mode') ?></td>
            <td><?= $individualParticipation->has('mode') ? $this->Html->link($individualParticipation->mode->id, ['controller' => 'Modes', 'action' => 'view', $individualParticipation->mode->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Category') ?></td>
            <td><?= $individualParticipation->has('category') ? $this->Html->link($individualParticipation->category->id, ['controller' => 'Categories', 'action' => 'view', $individualParticipation->category->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Event') ?></td>
            <td><?= $individualParticipation->has('event') ? $this->Html->link($individualParticipation->event->name, ['controller' => 'Events', 'action' => 'view', $individualParticipation->event->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Position') ?></td>
            <td><?= $this->Number->format($individualParticipation->position) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($individualParticipation->id) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Times') ?></h3>
    </div>
    <?php if (!empty($individualParticipation->times)): ?>
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
            <?php foreach ($individualParticipation->times as $times): ?>
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
