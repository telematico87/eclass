<div class="users form" style="margin-top:20px">
<?= $this->Form->create($user) ?>
   
        <legend><?= __('Crear usuario') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
        <?= $this->Form->input('role',[
            'options' => [ 'usuario' => 'Usuario','admin' => 'Admin'],
            array( 'style' => 'height:150px' )]) ?>
         <?= $this->Form->input('estado', [
            'options' => ['1' => 'Activado', '0' => 'Desactivado'],
            'class' => 'form-select'
        ]) ?>

<?= $this->Html->link("Atras", ['controller'=>'users','action' => 'main'], array( 'class' => 'btn btn-info')) ?>
<?= $this->Form->button(__('Crear'), array( 'class' => 'btn btn-success')); ?>
<?= $this->Form->end() ?>
</div>
<script>
 var username="<?php echo $user_login['username']; ?>";

 document.getElementById('username_').innerHTML =username;
 $("#username").val("");

</script>