<main id="contenido">
    <br>
  <div class="img-carrito2 m-auto tex-white text-center bg-dark" style="height: 40px; line-height: 40px; color: #fff; font-family: 'Gochi Hand', cursive;
  font-size:14px;"> 
    <strong>EDITAR MI CONTRASEÑA</strong>
  </div>
    <br>
    <?php echo form_open("super_controler/actualizar_usuario_contra/$id_usuario", ['class' => 'form-signin', 'role' => 'form']); ?>
    <div class="panel panel-default" style="margin-left: auto; margin right: auto; background-color:#e3e5e5; margin-top: 15px;"><br>
        <form class="form-horizontal" method="post" action="">
        <fieldset id="redondo" style="width: 80%; border-color: #3073E9; color: #3073E9;">
          <legend><strong>Elija Su Contraseña</strong></legend>
      <div>
        <h5 id="anim-text"><b class="mt-2">Contraseña Anterior</b></h5>     
        <?php
          $data = array(
            'name'  => 'contraseñaant',
            'id'  => 'sombraredondeada-super',
            'value' => set_value('contraseñaant'),
            'placeholder' => ' Contraseña Anterior'
          );
          echo form_password($data);
        ?>
        <span class="text-danger"><?php echo form_error('contraseñaant'); ?> </span>
      <div>
        <h5 id="anim-text"><b class="mt-2">Contraseña Nueva</b></h5>     
        <?php
          $data = array(
            'name'  => 'contraseña',
            'id'  => 'sombraredondeada-super',
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
            'id'  => 'sombraredondeada-super',
            'placeholder' => ' Repita Contraseña Nueva'
          );
          echo form_password($data);
        ?>
        <span class="text-danger"><?php echo form_error('password2'); ?> </span>
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