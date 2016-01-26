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
            <td><?= h($athlete->date_of_birth->format('d-m-Y')) ?></td>
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
                <th><?= __('Mode Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Event Id') ?></th>
                <th><?= __('Fecha') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($athlete->individual_participations as $individualParticipations): ?>
                <tr>
                    <?php
                        $IP_mode = $modes->get($individualParticipations->mode_id);
                        $IP_event = $events->get($individualParticipations->event_id);
                    ?>

                    <td><?= h($individualParticipations->position) ?></td>
                    <td><?= h($IP_mode->type) ?></td>
                    <?php
                        $IP_category = $categories->get($individualParticipations->category_id);
                        $IP_category_distance = $distances->get($IP_category->distance_id);

                        if($IP_category->age_id != NULL){
                            $IP_category_age = $ages->get($IP_category->age_id);
                            echo "<td>" . h($IP_category_distance->name) . " - " . h($IP_category_age->name) . "</td>";
                        }
                        else{
                            echo "<td>" . h($IP_category_distance->name) . " - " . h($IP_category->sex) . "</td>";
                        }
                    ?>
                    <td><?= h($IP_event->name) ?></td>
                    <td><?= h($IP_event->date->format('d-m-Y')) ?></td>
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
                <th><?= __('Name') ?></th>
                <th><?= __('Club Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($athlete->teams as $teams): ?>
                <tr>
                    <td><?= h($teams->name) ?></td>
                    <?php
                        $T_club = $clubs->get($teams->club_id);
                        $T_category = $categories->get($teams->category_id);
                        $T_category_distance = $distances->get($T_category->distance_id);

                        echo "<td>" . h($T_club->name) . "</td>";

                        if($IP_category->age_id != NULL){
                            $IP_category_age = $ages->get($IP_category->age_id);
                            echo "<td>" . h($T_category_distance->name) . " - " . h($T_category_age->name) . "</td>";
                        }
                        else{
                            echo "<td>" . h($T_category_distance->name) . " - " . h($T_category->sex) . "</td>";
                        }
                    ?>
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
