<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Individual Participation'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Athletes'), ['controller' => 'Athletes', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Athlete'), ['controller' => ' Athletes', 'action' => 'add']); ?></li>
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
            <th><?= $this->Paginator->sort('athlete_id'); ?></th>
            <th><?= $this->Paginator->sort('mode_id'); ?></th>
            <th><?= $this->Paginator->sort('category_id'); ?></th>
            <th><?= $this->Paginator->sort('event_id'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($individualParticipations as $individualParticipation): ?>
        <tr>
            <td><?= $this->Number->format($individualParticipation->position) ?></td>
            <td><?= $this->Number->format($individualParticipation->id) ?></td>
            <td>
                <?= $individualParticipation->has('athlete') ? $this->Html->link($individualParticipation->athlete->name, ['controller' => 'Athletes', 'action' => 'view', $individualParticipation->athlete->id]) : '' ?>
            </td>
            <td>
                <?= $individualParticipation->has('mode') ? $this->Html->link($individualParticipation->mode->id, ['controller' => 'Modes', 'action' => 'view', $individualParticipation->mode->id]) : '' ?>
            </td>
            <td>
                <?= $individualParticipation->has('category') ? $this->Html->link($individualParticipation->category->id, ['controller' => 'Categories', 'action' => 'view', $individualParticipation->category->id]) : '' ?>
            </td>
            <td>
                <?= $individualParticipation->has('event') ? $this->Html->link($individualParticipation->event->name, ['controller' => 'Events', 'action' => 'view', $individualParticipation->event->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $individualParticipation->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $individualParticipation->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $individualParticipation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $individualParticipation->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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