<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Team'), ['action' => 'edit', $team->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Team'), ['action' => 'delete', $team->id], ['confirm' => __('Are you sure you want to delete # {0}?', $team->id)]) ?> </li>
<li><?= $this->Html->link(__('List Teams'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Team'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Team Participations'), ['controller' => 'TeamParticipations', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Team Participation'), ['controller' => 'TeamParticipations', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Athletes'), ['controller' => 'Athletes', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Athlete'), ['controller' => 'Athletes', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($team->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($team->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Club') ?></td>
            <td><?= $team->has('club') ? $this->Html->link($team->club->name, ['controller' => 'Clubs', 'action' => 'view', $team->club->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Category') ?></td>
            <td><?= $team->has('category') ? $this->Html->link($team->category->id, ['controller' => 'Categories', 'action' => 'view', $team->category->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($team->id) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related TeamParticipations') ?></h3>
    </div>
    <?php if (!empty($team->team_participations)): ?>
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
            <?php foreach ($team->team_participations as $teamParticipations): ?>
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
        <h3 class="panel-title"><?= __('Related Athletes') ?></h3>
    </div>
    <?php if (!empty($team->athletes)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Sex') ?></th>
                <th><?= __('Date Of Birth') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($team->athletes as $athletes): ?>
                <tr>
                    <td><?= h($athletes->id) ?></td>
                    <td><?= h($athletes->name) ?></td>
                    <td><?= h($athletes->sex) ?></td>
                    <td><?= h($athletes->date_of_birth) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Athletes', 'action' => 'view', $athletes->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Athletes', 'action' => 'edit', $athletes->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Athletes', 'action' => 'delete', $athletes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $athletes->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Athletes</p>
    <?php endif; ?>
</div>
