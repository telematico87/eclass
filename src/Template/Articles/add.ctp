<h1>Añadir Usuario</h1>
<?php
    echo $this->Form->create($article);
    echo $this->Form->input('usuario');
    echo $this->Form->input('password');
    echo $this->Form->input('estado');
    echo $this->Form->button(__('Guardar artículo'));
    echo $this->Form->end();
?>