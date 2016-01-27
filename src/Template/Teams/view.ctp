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
        <h3
           class="panel-title"><?= h($team->name) ?>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'edit', $team->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $team->id], ['confirm' => __('Are you sure you want to delete # {0}?', $team->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </h3>
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
            <?php
                $T_category = $categories->get($team->category_id);
                $T_category_distance = $distances->get($T_category->distance_id);

                if($T_category->age_id != NULL){
                    $T_category_age = $ages->get($T_category->age_id);
                    echo "<td>" . h($T_category_distance->name) . " - " . h($T_category_age->name) . "</td>";
                }
                else{
                    echo "<td>" . h($T_category_distance->name) . " - " . h($T_category->sex) . "</td>";
                }
            ?>
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
                <th><?= __('Mode Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Event Id') ?></th>
                <th><?= __('Fecha') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($team->team_participations as $teamParticipations): ?>
                <tr>
                    <?php
                        $TP_mode = $modes->get($teamParticipations->mode_id);
                        $TP_event = $events->get($teamParticipations->event_id);
                    ?>

                    <td><?= h($teamParticipations->position) ?></td>
                    <td><?= h($TP_mode->type) ?></td>
                    <?php
                        $TP_category = $categories->get($teamParticipations->category_id);
                        $TP_category_distance = $distances->get($TP_category->distance_id);

                        if($TP_category->age_id != NULL){
                            $TP_category_age = $ages->get($TP_category->age_id);
                            echo "<td>" . h($TP_category_distance->name) . " - " . h($TP_category_age->name) . "</td>";
                        }
                        else{
                            echo "<td>" . h($TP_category_distance->name) . " - " . h($TP_category->sex) . "</td>";
                        }
                    ?>
                    <td><?= h($TP_event->name) ?></td>
                    <td><?= h($TP_event->date->format('d-m-Y')) ?></td>

                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'TeamParticipations', 'action' => 'view', $teamParticipations->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
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
        <h3 class="panel-title"><?= __('Related Athletes') ?></h3>
    </div>
    <?php if (!empty($team->athletes)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('CI') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Sex') ?></th>
                <th><?= __('Date Of Birth') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($team->athletes as $athletes): ?>
                <tr>
                    <td><?= h($athletes->CI) ?></td>
                    <td><?= h($athletes->name) ?></td>
                    <td><?= h($athletes->sex) ?></td>
                    <td><?= h($athletes->date_of_birth->format('d-m-Y')) ?></td>

                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Athletes', 'action' => 'view', $athletes->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">Sin atletas</p>
    <?php endif; ?>
</div>
