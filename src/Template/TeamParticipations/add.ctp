<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Team Participations'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Modes'), ['controller' => 'Modes', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Mode'), ['controller' => 'Modes', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Times'), ['controller' => 'Times', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Time'), ['controller' => 'Times', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($teamParticipation); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Team Participation']) ?></legend>
    <?php
    echo $this->Form->input('position');
    echo $this->Form->input('team_id', ['options' => $teams]);
    echo $this->Form->input('mode_id', ['options' => $modes]);
    echo $this->Form->input('category_id', ['options' => $categories]);
    echo $this->Form->input('event_id', ['options' => $events]);
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>