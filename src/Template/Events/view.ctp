<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </li>
<li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Individual Participations'), ['controller' => 'IndividualParticipations', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Individual Participation'), ['controller' => 'IndividualParticipations', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Team Participations'), ['controller' => 'TeamParticipations', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Team Participation'), ['controller' => 'TeamParticipations', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Winners'), ['controller' => 'Winners', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Winner'), ['controller' => 'Winners', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($event->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($event->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($event->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Date') ?></td>
            <td><?= h($event->date) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related IndividualParticipations') ?></h3>
    </div>
    <?php if (!empty($event->individual_participations)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Position') ?></th>
                <th><?= __('Id') ?></th>
                <th><?= __('Athlete Id') ?></th>
                <th><?= __('Mode Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Event Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($event->individual_participations as $individualParticipations): ?>
                <tr>
                    <td><?= h($individualParticipations->position) ?></td>
                    <td><?= h($individualParticipations->id) ?></td>
                    <td><?= h($individualParticipations->athlete_id) ?></td>
                    <td><?= h($individualParticipations->mode_id) ?></td>
                    <td><?= h($individualParticipations->category_id) ?></td>
                    <td><?= h($individualParticipations->event_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'IndividualParticipations', 'action' => 'view', $individualParticipations->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'IndividualParticipations', 'action' => 'edit', $individualParticipations->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'IndividualParticipations', 'action' => 'delete', $individualParticipations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $individualParticipations->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
        <h3 class="panel-title"><?= __('Related TeamParticipations') ?></h3>
    </div>
    <?php if (!empty($event->team_participations)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Position') ?></th>
                <th><?= __('Id') ?></th>
                <th><?= __('Team Id') ?></th>
                <th><?= __('Mode Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Event Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($event->team_participations as $teamParticipations): ?>
                <tr>
                    <td><?= h($teamParticipations->position) ?></td>
                    <td><?= h($teamParticipations->id) ?></td>
                    <td><?= h($teamParticipations->team_id) ?></td>
                    <td><?= h($teamParticipations->mode_id) ?></td>
                    <td><?= h($teamParticipations->category_id) ?></td>
                    <td><?= h($teamParticipations->event_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'TeamParticipations', 'action' => 'view', $teamParticipations->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'TeamParticipations', 'action' => 'edit', $teamParticipations->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'TeamParticipations', 'action' => 'delete', $teamParticipations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teamParticipations->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related TeamParticipations</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Winners') ?></h3>
    </div>
    <?php if (!empty($event->winners)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Gold Id') ?></th>
                <th><?= __('Silver Id') ?></th>
                <th><?= __('Bronze Id') ?></th>
                <th><?= __('Mode Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Event Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($event->winners as $winners): ?>
                <tr>
                    <td><?= h($winners->gold_id) ?></td>
                    <td><?= h($winners->silver_id) ?></td>
                    <td><?= h($winners->bronze_id) ?></td>
                    <td><?= h($winners->mode_id) ?></td>
                    <td><?= h($winners->category_id) ?></td>
                    <td><?= h($winners->event_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Winners', 'action' => 'view', $winners->mode_id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Winners', 'action' => 'edit', $winners->mode_id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Winners', 'action' => 'delete', $winners->mode_id], ['confirm' => __('Are you sure you want to delete # {0}?', $winners->mode_id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Winners</p>
    <?php endif; ?>
</div>
