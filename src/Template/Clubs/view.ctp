<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Club'), ['action' => 'edit', $club->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Club'), ['action' => 'delete', $club->id], ['confirm' => __('Are you sure you want to delete # {0}?', $club->id)]) ?> </li>
<li><?= $this->Html->link(__('List Clubs'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Club'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($club->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($club->name) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Teams') ?></h3>
    </div>
    <?php if (!empty($club->teams)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Name') ?></th>
                <th><?= __('Category Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($club->teams as $teams): ?>
                <tr>
                    <td><?= h($teams->name) ?></td>
                    <?php
                        $T_category = $categories->get($teams->category_id);
                        $T_category_distance = $distances->get($T_category->distance_id);

                        if($T_category->age_id != NULL){
                            $T_category_age = $ages->get($T_category->age_id);
                            echo "<td>" . h($T_category_distance->name) . " - " . h($T_category_age->name) . "</td>";
                        }
                        else{
                            echo "<td>" . h($T_category_distance->name) . " - " . h($T_category->sex) . "</td>";
                        }
                    ?>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Teams', 'action' => 'view', $teams->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Teams</p>
    <?php endif; ?>
</div>
