<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Mode'), ['action' => 'edit', $mode->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Mode'), ['action' => 'delete', $mode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mode->id)]) ?> </li>
<li><?= $this->Html->link(__('List Modes'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Mode'), ['action' => 'add']) ?> </li>
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

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($mode->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Type') ?></td>
            <td><?= h($mode->type) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($mode->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Number Of Disciplines') ?></td>
            <td><?= $this->Number->format($mode->number_of_disciplines) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related IndividualParticipations') ?></h3>
    </div>
    <?php if (!empty($mode->individual_participations)): ?>
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
            <?php foreach ($mode->individual_participations as $individualParticipations): ?>
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
        <p class="panel-body">Sin participaciones</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related TeamParticipations') ?></h3>
    </div>
    <?php if (!empty($mode->team_participations)): ?>
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
            <?php foreach ($mode->team_participations as $teamParticipations): ?>
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
        <p class="panel-body">Sin participaciones</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Winners') ?></h3>
    </div>
    <?php if (!empty($mode->winners)): ?>
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
            <?php foreach ($mode->winners as $winners): ?>
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
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Disciplines') ?></h3>
    </div>
    <?php if (!empty($mode->disciplines)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Sub Type') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($mode->disciplines as $disciplines): ?>
                <tr>
                    <td><?= h($disciplines->id) ?></td>
                    <td><?= h($disciplines->type) ?></td>
                    <td><?= h($disciplines->sub_type) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Disciplines', 'action' => 'view', $disciplines->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Disciplines', 'action' => 'edit', $disciplines->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Disciplines', 'action' => 'delete', $disciplines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $disciplines->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Disciplines</p>
    <?php endif; ?>
</div>
