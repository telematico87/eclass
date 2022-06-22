<div class="users form" style="margin-top:20px">
<?= $this->Form->create($user) ?>
   
        <legend><?= __('Nuevo Password') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password', ['value' =>'']);?>


<?= $this->Html->link("Atras", ['controller'=>'users','action' => 'main'], array( 'class' => 'btn btn-info')) ?>
<?= $this->Form->button(__('Guardar Contraseña'), array( 'class' => 'btn btn-success')); ?>
<?= $this->Form->end() ?>
</div>

<script>
 var username="<?php echo $user_login['username']; ?>";

 document.getElementById('username').innerHTML =username;

</script>