<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Athlete'), ['action' => 'edit', $athlete->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Athlete'), ['action' => 'delete', $athlete->id], ['confirm' => __('Are you sure you want to delete # {0}?', $athlete->id)]) ?> </li>
<li><?= $this->Html->link(__('List Athletes'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Athlete'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Individual Participations'), ['controller' => 'IndividualParticipations', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Individual Participation'), ['controller' => 'IndividualParticipations', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3
           class="panel-title"><?= h($athlete->name) ?>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'edit', $athlete->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $athlete->id], ['confirm' => __('Are you sure you want to delete # {0}?', $athlete->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('CI') ?></td>
            <td><?= $this->Number->format($athlete->CI) ?></td>
        </tr>
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($athlete->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Sex') ?></td>
            <td><?= h($athlete->sex) ?></td>
        </tr>
        <tr>
            <td><?= __('Date Of Birth') ?></td>
            <td><?= h($athlete->date_of_birth) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related IndividualParticipations') ?></h3>
    </div>
    <?php if (!empty($athlete->individual_participations)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Position') ?></th>
                <th><?= __('Athlete Id') ?></th>
                <th><?= __('Mode Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Event Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($athlete->individual_participations as $individualParticipations): ?>
                <tr>
                    <td><?= h($individualParticipations->position) ?></td>
                    <td><?= h($individualParticipations->athlete_id) ?></td>
                    <td><?= h($individualParticipations->mode_id) ?></td>
                    <td><?= h($individualParticipations->category_id) ?></td>
                    <td><?= h($individualParticipations->event_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'IndividualParticipations', 'action' => 'view', $individualParticipations->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related IndividualParticipations</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Teams') ?></h3>
    </div>
    <?php if (!empty($athlete->teams)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Club Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($athlete->teams as $teams): ?>
                <tr>
                    <td><?= h($teams->id) ?></td>
                    <td><?= h($teams->name) ?></td>
                    <td><?= h($teams->club_id) ?></td>
                    <td><?= h($teams->category_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Teams', 'action' => 'view', $teams->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Teams</p>
    <?php endif; ?>
</div>
