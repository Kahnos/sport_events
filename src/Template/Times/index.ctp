<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Time'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List IndividualParticipations'), ['controller' => 'IndividualParticipations', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Individual Participation'), ['controller' => ' IndividualParticipations', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List TeamParticipations'), ['controller' => 'TeamParticipations', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Team Participation'), ['controller' => ' TeamParticipations', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('time_1'); ?></th>
            <th><?= $this->Paginator->sort('time_2'); ?></th>
            <th><?= $this->Paginator->sort('time_3'); ?></th>
            <th><?= $this->Paginator->sort('time_4'); ?></th>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('individual_participation_id'); ?></th>
            <th><?= $this->Paginator->sort('team_participation_id'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($times as $time): ?>
        <tr>
            <td><?= h($time->time_1) ?></td>
            <td><?= h($time->time_2) ?></td>
            <td><?= h($time->time_3) ?></td>
            <td><?= h($time->time_4) ?></td>
            <td><?= $this->Number->format($time->id) ?></td>
            <td>
                <?= $time->has('individual_participation') ? $this->Html->link($time->individual_participation->id, ['controller' => 'IndividualParticipations', 'action' => 'view', $time->individual_participation->id]) : '' ?>
            </td>
            <td>
                <?= $time->has('team_participation') ? $this->Html->link($time->team_participation->id, ['controller' => 'TeamParticipations', 'action' => 'view', $time->team_participation->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $time->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $time->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $time->id], ['confirm' => __('Are you sure you want to delete # {0}?', $time->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>