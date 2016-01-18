<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Age'), ['action' => 'edit', $age->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Age'), ['action' => 'delete', $age->id], ['confirm' => __('Are you sure you want to delete # {0}?', $age->id)]) ?> </li>
<li><?= $this->Html->link(__('List Ages'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Age'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($age->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($age->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($age->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Min Age') ?></td>
            <td><?= $this->Number->format($age->min_age) ?></td>
        </tr>
        <tr>
            <td><?= __('Max Age') ?></td>
            <td><?= $this->Number->format($age->max_age) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Categories') ?></h3>
    </div>
    <?php if (!empty($age->categories)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Sex') ?></th>
                <th><?= __('Age Id') ?></th>
                <th><?= __('Distance Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($age->categories as $categories): ?>
                <tr>
                    <td><?= h($categories->id) ?></td>
                    <td><?= h($categories->sex) ?></td>
                    <td><?= h($categories->age_id) ?></td>
                    <td><?= h($categories->distance_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Categories', 'action' => 'view', $categories->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Categories', 'action' => 'edit', $categories->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Categories', 'action' => 'delete', $categories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categories->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Categories</p>
    <?php endif; ?>
</div>
