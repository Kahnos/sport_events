<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Team Participation'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Team'), ['controller' => ' Teams', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Modes'), ['controller' => 'Modes', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Mode'), ['controller' => ' Modes', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Category'), ['controller' => ' Categories', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Event'), ['controller' => ' Events', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Times'), ['controller' => 'Times', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Time'), ['controller' => ' Times', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('position'); ?></th>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('team_id'); ?></th>
            <th><?= $this->Paginator->sort('mode_id'); ?></th>
            <th><?= $this->Paginator->sort('category_id'); ?></th>
            <th><?= $this->Paginator->sort('event_id'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($teamParticipations as $teamParticipation): ?>
        <tr>
            <td><?= $this->Number->format($teamParticipation->position) ?></td>
            <td><?= $this->Number->format($teamParticipation->id) ?></td>
            <td>
                <?= $teamParticipation->has('team') ? $this->Html->link($teamParticipation->team->name, ['controller' => 'Teams', 'action' => 'view', $teamParticipation->team->id]) : '' ?>
            </td>
            <td>
                <?= $teamParticipation->has('mode') ? $this->Html->link($teamParticipation->mode->id, ['controller' => 'Modes', 'action' => 'view', $teamParticipation->mode->id]) : '' ?>
            </td>
            <td>
                <?= $teamParticipation->has('category') ? $this->Html->link($teamParticipation->category->id, ['controller' => 'Categories', 'action' => 'view', $teamParticipation->category->id]) : '' ?>
            </td>
            <td>
                <?= $teamParticipation->has('event') ? $this->Html->link($teamParticipation->event->name, ['controller' => 'Events', 'action' => 'view', $teamParticipation->event->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $teamParticipation->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $teamParticipation->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $teamParticipation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teamParticipation->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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