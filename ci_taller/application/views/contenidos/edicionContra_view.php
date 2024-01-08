<main id="contenido">
    <br>
    <h1 id="titulo_pagina"class="img-carrito">Cambiar conteaseña</h1>
    <br>
    <?php echo form_open("logueadoControler/actualizar_usuario_contra/$id_usuario", ['class' => 'form-signin', 'role' => 'form']); ?>
    <div class="panel panel-default" style="margin-left: auto; margin right: auto; background-color:#e3e5e5; margin-top: 15px;"><br>
        <form class="form-horizontal" method="post" action="">
        <fieldset id="redondo" style="width: 80%;">
          <legend><strong>Elija Su Contraseña</strong></legend>
      <div>
        <h5 id="anim-text"><b class="mt-2">Contraseña anterior</b></h5>     
        <?php
          $data = array(
            'name'  => 'contraseñaant',
            'id'  => 'sombraredondeada',
            'class' => 'bg-white',
            'value' => set_value('contraseñaant'),
            'placeholder' => ' Contraseña Anterior'
          );
          echo form_password($data);
        ?>
        <span class="text-danger"><?php echo form_error('contraseñaant'); ?> </span>
      </div>
      <div>
        <h5 id="anim-text"><b class="mt-2">Contraseña Nueva</b></h5>     
        <?php
          $data = array(
            'name'  => 'contraseña',
            'id'  => 'sombraredondeada',
            'class' => 'bg-white',
            'value' => set_value('contraseña'),
            'placeholder' => ' Contraseña Nueva'
          );
          echo form_password($data);
        ?>
        <span class="text-danger"><?php echo form_error('contraseña'); ?> </span>
      </div> 
      <div>
        <h5 id="anim-text"><b class="mt-2">Repita Contraseña</b></h5>                    
        <?php
          $data = array(
            'name'  => 'password2',
            'id'  => 'sombraredondeada',
            'class' => 'bg-white',
            'placeholder' => ' Repita Contraseña Nueva'
          );
          echo form_password($data);
        ?>
        <span class="text-danger"><?php echo form_error('password2'); ?> </span>
      </div>
      <div class="mt-4">
        <button type="submit" value="ACEPTAR" id="sombraredondeada-log" class="btn btn-secondary btn-lg btn-block" title="Aceptar">ACEPTAR</button>
      </div>
        <div class="mt-4">
        <a href="<?= base_url()?>logueadoControler/Perfil" type="button" id="sombraredondeada-log" class="btn btn-secondary btn-lg btn-block">CANCELAR</a>
        <br>
      </div>
    </fieldset>
    </form>
    <br>
    </div>
    <?php echo form_close(); ?>
</main>