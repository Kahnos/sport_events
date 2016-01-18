<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Category'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Ages'), ['controller' => 'Ages', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Age'), ['controller' => ' Ages', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Distances'), ['controller' => 'Distances', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Distance'), ['controller' => ' Distances', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List IndividualParticipations'), ['controller' => 'IndividualParticipations', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Individual Participation'), ['controller' => ' IndividualParticipations', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List TeamParticipations'), ['controller' => 'TeamParticipations', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Team Participation'), ['controller' => ' TeamParticipations', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Team'), ['controller' => ' Teams', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Winners'), ['controller' => 'Winners', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Winner'), ['controller' => ' Winners', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('age_id'); ?></th>
            <th><?= $this->Paginator->sort('distance_id'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= $this->Number->format($category->id) ?></td>
            <td>
                <?= $category->has('age') ? $this->Html->link($category->age->name, ['controller' => 'Ages', 'action' => 'view', $category->age->id]) : '' ?>
            </td>
            <td>
                <?= $category->has('distance') ? $this->Html->link($category->distance->name, ['controller' => 'Distances', 'action' => 'view', $category->distance->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $category->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $category->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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