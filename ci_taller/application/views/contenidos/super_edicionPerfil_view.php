<main id="contenido">
    <br>
  <div class="img-carrito2 m-auto tex-white text-center bg-dark" style="height: 40px; line-height: 40px; color: #fff; font-family: 'Gochi Hand', cursive;
  font-size:14px;"> 
    <strong>EDITAR MIS DATOS</strong>
  </div>
    <br>
    <?php echo form_open("super_controler/actualizar_usuario/$id_usuario", ['class' => 'form-signin', 'role' => 'form']); ?>
    <div class="panel panel-default" style="margin-left: auto; margin right: auto; background-color:#e3e5e5; margin-top: 15px;"><br>
        <form class="form-horizontal" method="post" action="">
        <fieldset id="redondo" style="width: 80%; border-color: #3073E9; color: #3073E9;">
          <legend><strong>Datos Personales</strong></legend>
      <div>
        <h5 id="anim-text"><b class="mt-2">Nombre</b></h5>
        <?php
          $data = array(
                  'name'  => 'nombre',
                  'id'    => 'sombraredondeada-super',
                  'class' => 'text-capitalize',
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
                  'class' => 'text-capitalize',
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
                  'class' => 'text-capitalize',
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
        <button type="submit" value="ACEPTAR" id="sombraredondeada-log-super" class="btn btn-secondary btn-lg btn-block" title="Aceptar">ACEPTAR</button>
      </div>
        <div class="mt-4">
        <a href="<?= base_url()?>super_controler/ver_perfil" type="button" id="sombraredondeada-log-super" class="btn btn-secondary btn-lg btn-block">CANCELAR</a>
        <br>
      </div>
    </fieldset>
    </form>
    <br>
    </div>
    <?php echo form_close(); ?>
</main>