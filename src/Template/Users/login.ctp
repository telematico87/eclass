
<div class="login-container" >
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>

        <legend><?= __('Usuarios y Contraseña') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
    
<?= $this->Form->button(__('Login'),['class'=>'btn btn-primary']); ?>
<?= $this->Form->end() ?>
</div>