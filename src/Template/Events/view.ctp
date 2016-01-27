<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </li>
<li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Individual Participations'), ['controller' => 'IndividualParticipations', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Individual Participation'), ['controller' => 'IndividualParticipations', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Team Participations'), ['controller' => 'TeamParticipations', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Team Participation'), ['controller' => 'TeamParticipations', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Winners'), ['controller' => 'Winners', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Winner'), ['controller' => 'Winners', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($event->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($event->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Date') ?></td>
            <td><?= h($event->date->format('d-m-Y')) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Winners') ?></h3>
    </div>
    <?php if (!empty($event->winners)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Gold Id') ?></th>
                <th><?= __('Silver Id') ?></th>
                <th><?= __('Bronze Id') ?></th>
                <th><?= __('Mode Id') ?></th>
                <th><?= __('Category Id') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($event->winners as $winners): ?>
                <tr>
                    <?php
                        $W_mode = $modes->get($winners->mode_id);
                        
                        if($winners->mode_id <= 5){
                            $gold = $athletes->get($winners->gold_id);
                            $silver = $athletes->get($winners->silver_id);
                            $bronze = $athletes->get($winners->bronze_id);

                            $gold_str = $gold->CI . " - " . $gold->name;
                            $silver_str = $silver->CI . " - " . $silver->name;
                            $bronze_str = $bronze->CI . " - " . $bronze->name;
                        }
                        else{
                            $gold = $teams->get($winners->gold_id);
                            $silver = $teams->get($winners->silver_id);
                            $bronze = $teams->get($winners->bronze_id);
                            
                            $gold_str = $gold->name;
                            $silver_str = $silver->name;
                            $bronze_str = $bronze->name;
                        }
                        
                    ?>
                    <td><?= h($gold_str) ?></td>
                    <td><?= h($silver_str) ?></td>
                    <td><?= h($bronze_str) ?></td>
                    <td><?= h($W_mode->type) ?></td>
                    <?php
                        $W_category = $categories->get($winners->category_id);
                        $W_category_distance = $distances->get($W_category->distance_id);

                        if($W_category->age_id != NULL){
                            $W_category_age = $ages->get($W_category->age_id);
                            echo "<td>" . h($W_category_distance->name) . " - " . h($W_category_age->name) . "</td>";
                        }
                        else{
                            echo "<td>" . h($W_category_distance->name) . " - " . h($W_category->sex) . "</td>";
                        }
                    ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">Sin ganadores relacionados</p>
    <?php endif; ?>
</div>
