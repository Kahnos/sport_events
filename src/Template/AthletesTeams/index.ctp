<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Athletes Team'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Athletes'), ['controller' => 'Athletes', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Athlete'), ['controller' => ' Athletes', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Team'), ['controller' => ' Teams', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('athlete_id'); ?></th>
            <th><?= $this->Paginator->sort('team_id'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($athletesTeams as $athletesTeam): ?>
        <tr>
            <td>
                <?= $athletesTeam->has('athlete') ? $this->Html->link($athletesTeam->athlete->name, ['controller' => 'Athletes', 'action' => 'view', $athletesTeam->athlete->id]) : '' ?>
            </td>
            <td>
                <?= $athletesTeam->has('team') ? $this->Html->link($athletesTeam->team->name, ['controller' => 'Teams', 'action' => 'view', $athletesTeam->team->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $athletesTeam->athlete_id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $athletesTeam->athlete_id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $athletesTeam->athlete_id], ['confirm' => __('Are you sure you want to delete # {0}?', $athletesTeam->athlete_id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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