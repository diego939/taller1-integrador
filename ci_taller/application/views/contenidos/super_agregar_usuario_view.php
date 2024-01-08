<main id="contenido">
<section>
    <br>
  <div class="img-carrito2 m-auto tex-white text-center bg-dark" style="height: 40px; line-height: 40px; color: #fff; font-family: 'Gochi Hand', cursive;
  font-size:14px;"> 
    <strong>AGREGAR USUARIOS CLIENTES</strong>
  </div>
    <br><br><br>
    <?php $this->form_validation->set_error_delimiters('<div class="error" style="color: #F1032B; margin-left: auto; margin-right: auto; width: 100%; text-align: center; ">', '</div>'); ?>
    <!--<?php //echo validation_errors(); ?>-->
    <?php echo form_open('super_controler/guardar_cuenta', 
                  ['class' => 'form-group', 'role' => 'form', 'id' => 'form_registro']); ?>
        <form class="form-horizontal" method="post" action="">
        <fieldset id="redondo" style="width: 70%; border-color: #3073E9; color: #3073E9;">
          <legend><strong>Agregar Cliente</strong></legend>
      <div>
        <h5 id="anim-text"><b class="mt-2">Nombre</b></h5>
        <?php
          $data = array(
                  'name'  => 'nombre',
                  'id'    => 'sombraredondeada-super',
                  'class' => 'text-capitalize',
                  'value' => set_value('nombre'),
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
                  'value' => set_value('apellido'),
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
                  'value' => set_value('email'),
                  'placeholder' => ' Mail ej: brunogas@hotmail.com'
                );
          echo form_input($data);
        ?>
        <span class="text-danger"><?php echo form_error('email'); ?> </span>
      </div>
      <div>
        <h5 id="anim-text"><b class="mt-2">Contraseña</b></h5>     
        <?php
          $data = array(
            'name'  => 'contraseña',
            'id'  => 'sombraredondeada-super',
            'value' => set_value('contraseña'),
            'placeholder' => ' Contraseña'
          );
          echo form_password($data);
        ?>
        <span class="text-danger"><?php echo form_error('contraseña'); ?> </span>
      </div> 
      <div>
        <h5 id="anim-text"><b class="mt-2">Contraseña</b></h5>                    
        <?php
          $data = array(
            'name'  => 'password2',
            'id'  => 'sombraredondeada-super',
            'placeholder' => ' Repita Contraseña'
          );
          echo form_password($data);
        ?>
        <span class="text-danger"><?php echo form_error('password2'); ?> </span>
      </div>
      <div>
        <h5 id="anim-text"><b class="mt-2">Telefono</b></h5>      
        <?php
          $data = array(
                  'name'  => 'telefono',
                  'id'    => 'sombraredondeada-super',
                  'value' => set_value('telefono'),
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
                  'value' => set_value('direccion'),
                  'rows'        => '5',
              'cols'        => '10',
              'placeholder' => ' Ingrese direccion del usuario...'
                );
          echo form_textarea($data);
        ?>
        <span class="text-danger"><?php echo form_error('direccion'); ?> </span>
      </div>
      <div class="mt-3">
        <input type="submit" value="ACEPTAR" id="sombraredondeada-log-super" title="Aceptar">
      </div>
      <div class="mt-3">
        <input type="reset" value="CANCELAR" id="sombraredondeada-log-super" title="Cancelar">
        <br>
      </div>
    </fieldset>
    </form>
    <br>
    <?php echo form_close(); ?>
</section>
</main>