<main id="contenido">
<div class="img-carrito2" id="titulo_pagina"><p class="text-center">Iniciar sesion</p></div>
<section class="caja-formulario">
        <?php if(!$this->session->userdata('login')){;?>
        <?php echo form_open('Sesion', ['role' => 'form1']); ?>
        <form class="form-horizontal" action="/action_page.php">
          <fieldset id="redondo" style="width: 55%">
            <div class="text-danger text-center mb-2"><h5><?php echo validation_errors(); ?> </h5></div>
            <br> <br>
            <legend><strong>Iniciar Sesión</strong></legend>
              <div id="imputs-sesion">
                <?php echo form_input(['name' => 'usuario', 'id' => 'sombraredondeada', 'class' => 'form-control bg-white','placeholder' => 'Ingrese su Email', 'autofocus'=>'autofocus', 'value'=>set_value('usuario_name')]); ?>
              </div><br>
              <div id="imputs-sesion">
               <?php echo form_input(['name' => 'usuario_password', 'id' => 'sombraredondeada', 'type' => 'password', 'class' => 'form-control bg-white','placeholder' => 'Ingrese Contraseña', 'value'=>set_value('usuario_password')]); ?>
              </div><br>
              <div id="abajo-sesion">
                <?php echo form_submit('Iniciar Sesion', 'Iniciar Sesion',"id='sombraredondeada-log'"); ?>
                <div id="texto-abajo-loguin">
                  <strong>¿No Estás Registrado?</strong>
                </div> 
                <div id="texto-abajo-loguin">
                  <a href="<?= base_url()?>Registrarse"><font class="negrito2 text-danger" ><b>Registrate Aqui</b></font></a>&nbsp;
                </div>
              </div>   
            <?php echo form_close(); ?>
            <?php } ;?>
          </fieldset>
        </form>
      </section>
</main>
 