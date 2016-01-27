<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Mode'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List IndividualParticipations'), ['controller' => 'IndividualParticipations', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Individual Participation'), ['controller' => ' IndividualParticipations', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List TeamParticipations'), ['controller' => 'TeamParticipations', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Team Participation'), ['controller' => ' TeamParticipations', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Winners'), ['controller' => 'Winners', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Winner'), ['controller' => ' Winners', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Disciplines'), ['controller' => 'Disciplines', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Discipline'), ['controller' => ' Disciplines', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('type'); ?></th>
            <th><?= $this->Paginator->sort('number_of_disciplines'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($modes as $mode): ?>
        <tr>
            <td><?= h($mode->type) ?></td>
            <td><?= $this->Number->format($mode->number_of_disciplines) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $mode->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $mode->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $mode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mode->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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