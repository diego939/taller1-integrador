<main id="contenido">
    <br>
    <h1 id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito">Editar mis datos</h1>
    <br>
    <?php echo form_open("administrador_controler/actualizar_usuario/$id_usuario", ['class' => 'form-signin', 'role' => 'form']); ?>
    <div class="panel panel-default" style="margin-left: auto; margin right: auto; background-color:#e3e5e5; margin-top: 15px;"><br>
        <form class="form-horizontal" method="post" action="">
        <fieldset id="redondo" style="width: 80%; border-color: black; color: black; filter: grayscale(100%);">
          <legend><strong>Datos Personales</strong></legend>
      <div>
        <h5 id="anim-text"><b class="mt-2">Nombre</b></h5>
        <?php
          $data = array(
                  'name'  => 'nombre',
                  'id'    => 'sombraredondeada-super',
                  'class' => 'text-capitalize bg-white',
                  'value' => "$nombre",
                  'placeholder' => ' Ingrese nombre'
                );
          echo form_input($data);
        ?>
        <span class="text-danger"><?php echo form_error('nombre'); ?> </span>
      </div>
      <div>
        <h5 id="anim-text"><b class="mt-2">Apellido</b></h5>       
        <?php
          $data = array(
                  'name'  => 'apellido',
                  'id'    => 'sombraredondeada-super',
                  'class' => 'text-capitalize bg-white',
                  'value' => "$apellido",
                  'placeholder' => ' Ingrese Apellido'
                );
          echo form_input($data);
        ?>
        <span class="text-danger"><?php echo form_error('apellido'); ?> </span>
      </div>
       <div>
        <h5 id="anim-text"><b class="mt-2">Correo</b></h5>      
        <?php
          $data = array(
                  'name'  => 'email',
                  'id'    => 'sombraredondeada-super',
                  'class' => 'bg-white',
                  'value' => "$email",
                  'placeholder' => ' Mail ej: brunogas@hotmail.com'
                );
          echo form_input($data);
        ?>
        <span class="text-danger"><?php echo form_error('email'); ?> </span>
      </div>
      <div>
        <h5 id="anim-text"><b class="mt-2">Telefono</b></h5>      
        <?php
          $data = array(
                  'name'  => 'telefono',
                  'id'    => 'sombraredondeada-super',
                  'class' => 'bg-white',
                  'value' => "$telefono",
                  'placeholder' => 'sin guiones ni + ej: 3794333333'
                );
          echo form_input($data);
        ?>
        <span class="text-danger"><?php echo form_error('telefono'); ?> </span>
      </div>
      <div>
        <h5 id="anim-text"><b class="mt-2">Direccion</b></h5>      
        <?php
          $data = array(
                  'name'  => 'direccion',
                  'id'    => 'sombraredondeada-super',
                  'class' => 'text-capitalize bg-white',
                  'value' => "$direccion",
                  'rows'  => '5',
                  'cols'  => '10',
                  'placeholder' => ' Ingrese su direccion...'
                );
          echo form_textarea($data);
        ?>
        <span class="text-danger"><?php echo form_error('direccion'); ?> </span>
      </div>
      <div class="mt-4">
        <button type="submit" value="ACEPTAR" id="sombraredondeada-log" class="btn btn-secondary btn-lg btn-block" title="Aceptar">ACEPTAR</button>
      </div>
        <div class="mt-4">
        <a href="<?= base_url()?>administrador_controler/ver_perfil" type="button" id="sombraredondeada-log" class="btn btn-secondary btn-lg btn-block">CANCELAR</a>
        <br>
      </div>
    </fieldset>
    </form>
    <br>
    </div>
    <?php echo form_close(); ?>
</main>