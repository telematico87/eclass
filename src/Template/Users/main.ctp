<h1>Mantenedor de Usuarios</h1>
<p><?= $this->Html->link("crear usuario", ['controller'=>'users','action' => 'add'], array( 'class' => 'btn btn-success')) ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Usuario</th>
        <th>Password</th>
        <th>Rol</th>
        <th>Estado</th>
        <th>Action</th>
    </tr>

<!-- Aquí es donde iteramos nuestro objeto de consulta $articles, mostrando en pantalla la información del artículo -->

<?php 


foreach ($users as $user): ?>
    <tr>
        <td><?= $user->id ?></td>
        <td>
        <?= $user->username ?>
        </td>
        <td>
        <?= $user->password ?>
        </td>
        <td>
            <?= $user->role ?>
        </td>
        <td>

            <?php if($user->estado==1):
                    echo "Habilitado";
                  elseif($user->estado==0):
                  echo "Deshabilitado";
                    endif;?>
        </td>

        <td>
            <?= $this->Form->postLink(
                'Eliminar',
                ['controller'=>'users','action' => 'delete', $user->id],
                [ 'class' => 'btn btn-danger'],
                ['confirm' => '¿Estás seguro?'])
            ?>
            <?= $this->Html->link('Editar', 
            ['controller'=>'users','action' => 'edit', $user->id],
            array( 'class' => 'btn btn-warning')
            ) ?>
            <?= $this->Html->link('Reset password', 
            ['controller'=>'users','action' => 'change', $user->id],
            array( 'class' => 'btn btn-primary')
            ) ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>

<script>
 var username="<?php echo $user_login['username']; ?>";

 document.getElementById('username').innerHTML =username;

</script>
