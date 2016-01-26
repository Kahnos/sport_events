<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Discipline'), ['action' => 'edit', $discipline->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Discipline'), ['action' => 'delete', $discipline->id], ['confirm' => __('Are you sure you want to delete # {0}?', $discipline->id)]) ?> </li>
<li><?= $this->Html->link(__('List Disciplines'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Discipline'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Modes'), ['controller' => 'Modes', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Mode'), ['controller' => 'Modes', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($discipline->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Type') ?></td>
            <td><?= h($discipline->type) ?></td>
        </tr>
        <tr>
            <td><?= __('Sub Type') ?></td>
            <td><?= h($discipline->sub_type) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($discipline->id) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Modes') ?></h3>
    </div>
    <?php if (!empty($discipline->modes)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Number Of Disciplines') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($discipline->modes as $modes): ?>
                <tr>
                    <td><?= h($modes->id) ?></td>
                    <td><?= h($modes->type) ?></td>
                    <td><?= h($modes->number_of_disciplines) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Modes', 'action' => 'view', $modes->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Modes', 'action' => 'edit', $modes->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Modes', 'action' => 'delete', $modes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modes->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Modes</p>
    <?php endif; ?>
</div>
