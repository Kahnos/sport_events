<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Team'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Club'), ['controller' => ' Clubs', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Category'), ['controller' => ' Categories', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List TeamParticipations'), ['controller' => 'TeamParticipations', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Team Participation'), ['controller' => ' TeamParticipations', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Athletes'), ['controller' => 'Athletes', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Athlete'), ['controller' => ' Athletes', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<h2>Equipos</h2>

</br>
</br>
<?php
    //$catArray = array(range(1, 90));
    $catArray = array();
    foreach ($categoriesSearch as $category){
        $category_distance = $distances->get($category->distance_id);
        if($category->age_id != NULL){
            $category_age = $ages->get($category->age_id);
            array_push($catArray, h($category_distance->name) . " - " . h($category_age->name) );
        }
        else{
            array_push($catArray, h($category_distance->name) . " - " . h($category->sex) );
        }
    }           
    $catArray = array_combine(range(1, count($catArray)), array_values($catArray));

    echo $this->Form->create($teams);

    echo $this->Form->input('name', ['label' => 'Nombre del equipo:', 'required' => false]);
    echo $this->Form->input('category_id', ['label' => 'Categoría:', 'required' => false, 'options' => $catArray, 'empty' => 'Todas']);

    echo $this->Form->submit('Buscar');

    $this->Form->end();
?>
</br>
</br>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th><?= $this->Paginator->sort('club_id'); ?></th>
            <th><?= $this->Paginator->sort('category_id'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($teams as $team): ?>
        <tr>
            <td><?= h($team->name) ?></td>
            <td>
                <?= $team->has('club') ? $this->Html->link($team->club->name, ['controller' => 'Clubs', 'action' => 'view', $team->club->id]) : '' ?>
            </td>

            <?php
                $T_category = $categories->get($team->category_id);
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
                <?= $this->Html->link('', ['action' => 'view', $team->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $team->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $team->id], ['confirm' => __('Are you sure you want to delete # {0}?', $team->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
