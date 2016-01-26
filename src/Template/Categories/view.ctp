<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
<li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Ages'), ['controller' => 'Ages', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Age'), ['controller' => 'Ages', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Distances'), ['controller' => 'Distances', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Distance'), ['controller' => 'Distances', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Individual Participations'), ['controller' => 'IndividualParticipations', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Individual Participation'), ['controller' => 'IndividualParticipations', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Team Participations'), ['controller' => 'TeamParticipations', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Team Participation'), ['controller' => 'TeamParticipations', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Winners'), ['controller' => 'Winners', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Winner'), ['controller' => 'Winners', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($category->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Sex') ?></td>
            <td><?= h($category->sex) ?></td>
        </tr>
        <tr>
            <td><?= __('Age') ?></td>
            <td><?= $category->has('age') ? $this->Html->link($category->age->name, ['controller' => 'Ages', 'action' => 'view', $category->age->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Distance') ?></td>
            <td><?= $category->has('distance') ? $this->Html->link($category->distance->name, ['controller' => 'Distances', 'action' => 'view', $category->distance->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related IndividualParticipations') ?></h3>
    </div>
    <?php if (!empty($category->individual_participations)): ?>
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
            <?php foreach ($category->individual_participations as $individualParticipations): ?>
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
    <?php if (!empty($category->team_participations)): ?>
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
            <?php foreach ($category->team_participations as $teamParticipations): ?>
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
        <h3 class="panel-title"><?= __('Related Teams') ?></h3>
    </div>
    <?php if (!empty($category->teams)): ?>
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
            <?php foreach ($category->teams as $teams): ?>
                <tr>
                    <td><?= h($teams->id) ?></td>
                    <td><?= h($teams->name) ?></td>
                    <td><?= h($teams->club_id) ?></td>
                    <td><?= h($teams->category_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Teams', 'action' => 'view', $teams->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Teams', 'action' => 'edit', $teams->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Teams', 'action' => 'delete', $teams->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teams->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Teams</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Winners') ?></h3>
    </div>
    <?php if (!empty($category->winners)): ?>
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
            <?php foreach ($category->winners as $winners): ?>
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
