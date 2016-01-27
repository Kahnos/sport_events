<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Event'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List IndividualParticipations'), ['controller' => 'IndividualParticipations', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Individual Participation'), ['controller' => ' IndividualParticipations', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List TeamParticipations'), ['controller' => 'TeamParticipations', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Team Participation'), ['controller' => ' TeamParticipations', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Winners'), ['controller' => 'Winners', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Winner'), ['controller' => ' Winners', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th><?= $this->Paginator->sort('date'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($events as $event): ?>
        <tr>
            <td><?= h($event->name) ?></td>
            <td><?= h($event->date->format('d-m-Y')) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $event->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $event->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
