<h1>Editar Usuario</h1>
<?php
    echo $this->Form->create($user);
    echo $this->Form->input('username');
    echo $this->Form->input('password', ['disabled' => 'true']);
    echo $this->Form->input('role', [
        'options' => ['admin' => 'Admin', 'usuario' => 'Usuario']
        ,'class' => 'form-select'
    ]) ;
    echo $this->Form->input('estado', [
        'options' => ['1' => 'Activado', '0' => 'Desactivado'],
        'class' => 'form-select'
    ]) ;
   echo $this->Html->link("Atras", ['controller'=>'users','action' => 'main'], array( 'class' => 'btn btn-info'));
    echo $this->Form->button(__('Actualizar Usuario'), array( 'class' => 'btn btn-success')); 
    echo $this->Form->end();
?>

<script>
 var username="<?php echo $user_login['username']; ?>";

 document.getElementById('username').innerHTML =username;

</script>