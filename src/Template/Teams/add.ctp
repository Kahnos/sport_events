<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>

    <li><?= $this->Html->link(__('List Teams'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Team Participations'), ['controller' => 'TeamParticipations', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Team Participation'), ['controller' => 'TeamParticipations', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Athletes'), ['controller' => 'Athletes', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Athlete'), ['controller' => 'Athletes', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($team); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Team']) ?></legend>
    <?php
    $catArray = array();
    foreach ($categories as $category){
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
    echo $this->Form->input('name');
    echo $this->Form->input('clubs._ids', ['options' => $clubs]);
    echo $this->Form->input('category_id', ['options' => $catArray]);
    echo $this->Form->input('athletes._ids', ['options' => $athletes]);
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
