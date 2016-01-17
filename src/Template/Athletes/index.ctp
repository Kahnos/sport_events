<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Athlete'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List IndividualParticipations'), ['controller' => 'IndividualParticipations', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Individual Participation'), ['controller' => ' IndividualParticipations', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Team'), ['controller' => ' Teams', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th><?= $this->Paginator->sort('date_of_birth'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($athletes as $athlete): ?>
        <tr>
            <td><?= $this->Number->format($athlete->id) ?></td>
            <td><?= h($athlete->name) ?></td>
            <td><?= h($athlete->date_of_birth) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $athlete->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $athlete->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $athlete->id], ['confirm' => __('Are you sure you want to delete # {0}?', $athlete->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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