<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Athletes'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Individual Participations'), ['controller' => 'IndividualParticipations', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Individual Participation'), ['controller' => 'IndividualParticipations', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($athlete); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Athlete']) ?></legend>
    <?php
    echo $this->Form->input('CI');
    echo $this->Form->input('name');
    echo $this->Form->radio(
        'sex',
        [
            ['value' => 'M', 'text' => 'Masculino'],
            ['value' => 'F', 'text' => 'Femenino']
        ]
    );
    echo $this->Form->input('date_of_birth', ['minYear' => 1950 , 'maxYear' => 2010]);
    echo $this->Form->input('teams._ids', ['options' => $teams]);
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
