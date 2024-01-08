<main id="contenido">  
  <h1 class="img-carrito2" id="titulo_pagina"> contacto </h1>
  <section id="caja_pagina">
    <article class="img-carrito2" id="caja-mapa">
      <iframe style="border-radius: 12px; box-shadow: 5px 5px 5px black; border: black 1px solid;" src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d3539.960552782028!2d-58.8316465848453!3d-27.470487423313507!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x94456ca00dce4f5f%3A0x6d96da078b313ed!2sEspa%C3%B1a+%26+San+Mart%C3%ADn%2C+W3400+Corrientes!3m2!1d-27.4704922!2d-58.829457899999994!5e0!3m2!1ses!2sar!4v1507557939902"></iframe>
    </article>
    <article class="img-carrito2" id="caja-botones1">
      <a href="https://plus.google.com/+GasNaturalFenosaAr" title="siguenos en Google+" target="_blank"><div id="botones-contacto">siguenos en Google+</div></a>
      <a href="https://twitter.com/gnf_ar?lang=es" title="siguenos en Twitter" target="_blank"><div id="botones-contacto">siguenos en Twitter</div></a>
      <a href="https://www.youtube.com/user/GasNaturalFenosaAr" title="Canal de youtube" target="_blank"><div id="botones-contacto">Suscribite a youtube</div></a>
      <a href="https://www.facebook.com/GasNaturalFenosaArgentina" title="siguenos en facebook" target="_blank"><div id="botones-contacto">siguenos en facebook</div></a>
      <a href="https://accounts.google.com/SignUp?hl=es" title="Enviar correo" target="_blank"><div id="botones-contacto">Correo Electronico</div></a>
    </article>
  </section>
  <h1 class="img-carrito2" id="titulo_pagina"> consultas</h1>
  <section id=""> 
    <?php echo form_open('Mensaje', ['class' => 'form1', 'role' => 'form1']); ?>
    <form class="form-horizontal" ><br>
      <fieldset id="redondo" style="width: 70%">
        <legend><strong>Ingrese su Consulta</strong></legend>
          <div>
            <h5 id="anim-text"><b class="mt-2">Nombre</b></h5>
            <?php
              $data = array(
                      'name'  => 'nombre',
                      'id'    => 'sombraredondeada',
                      'class' => 'text-capitalize bg-white',
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
                      'id'    => 'sombraredondeada',
                      'class' => 'text-capitalize bg-white',
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
                      'id'    => 'sombraredondeada',
                      'class' => 'bg-white',
                      'value' => set_value('email'),
                      'placeholder' => ' Mail ej: brunogas@hotmail.com'
                    );
              echo form_input($data);
            ?>
            <span class="text-danger"><?php echo form_error('email'); ?> </span>
          </div>
          <div>
            <h5 id="anim-text"><b class="mt-2">Ciudad</b></h5>      
            <?php
              $data = array(
                      'name'  => 'ciudad',
                      'id'    => 'sombraredondeada',
                      'class' => 'text-capitalize bg-white',
                      'value' => set_value('ciudad'),
                      'placeholder' => 'Ingrese Su Ciudad'
                    );
              echo form_input($data);
            ?>
            <span class="text-danger"><?php echo form_error('ciudad'); ?> </span>
          </div>
          <div>
            <h5 id="anim-text"><b class="mt-2">Provincia</b></h5>      
            <?php
              $data = array(
                      'name'  => 'provincia',
                      'id'    => 'sombraredondeada',
                      'class' => 'text-capitalize bg-white',
                      'value' => set_value('provincia'),
                      'placeholder' => 'Ingrese Su Provincia'
                    );
              echo form_input($data);
            ?>
            <span class="text-danger"><?php echo form_error('provincia'); ?> </span>
          </div>
          <div>
            <h5 id="anim-text"><b class="mt-2">Asunto</b></h5>      
            <?php
              $data = array(
                      'name'  => 'asunto',
                      'id'    => 'sombraredondeada',
                      'class' => 'text-capitalize bg-white',
                      'value' => set_value('asunto'),
                      'placeholder' => 'Ingrese Su Asunto o Cuestion'
                    );
              echo form_input($data);
            ?>
            <span class="text-danger"><?php echo form_error('asunto'); ?> </span>
          </div>
          <div>
            <h5 id="anim-text"><b class="mt-2">Consulta</b></h5>      
            <?php
              $data = array(
                      'name'  => 'mensaje',
                      'id'    => 'sombraredondeada',
                      'class' => 'bg-white',
                      'value' => set_value('mensaje'),
                      'rows'        => '5',
                      'cols'        => '10',
                      'placeholder' => 'Ingrese Su Consulta....'
                    );
              echo form_textarea($data);
            ?>
            <span class="text-danger"><?php echo form_error('mensaje'); ?> </span>
          </div>

        <div class="col-sm-12 controls mt-4">
          <?php echo form_submit('Enviar Consulta', 'Enviar Consulta', "id='sombraredondeada-log'"); ?>
          <a title="Limpiar Campos" href="<?= base_url()?>Contacto" id="sombraredondeada-log" class="btn btn-block mt-4" >Limpiar Campos</a>
        </div> 
        <?php echo form_close(); ?>
      </fieldset>
    </form>
  </section>
</main>

 