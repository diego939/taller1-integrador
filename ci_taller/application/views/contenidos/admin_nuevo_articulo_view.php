<main id="contenido"> 
<h1 id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito">Publicar Articulo </h1> 
    <div class="col-md-12 col-md-offset-1 m-auto">
      <div class="btn-group" style="width: 100%">
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url(); ?>administrador_controler/gestion_articulos" >
        <span class="glyphicon glyphicon-trash">Gestion</span></a>
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url("administrador_controler/nuevo_articulo");?>" >
        <span class="glyphicon glyphicon-trash">Publicar Articulo</span></a>
      </div>
    </div>
  <?php echo form_open_multipart('administrador_controler/registrar_articulos', ['class' => 'form-signin', 'role' => 'form']); ?>

    <form class="form-horizontal" action="/action_page.php"><br>
      <fieldset id="redondo" style="width: 70%; filter: grayscale(90%);">
        <legend><strong>Datos del Articulo</strong></legend>
        <div>
          <h5 id="anim-text"><b class="mt-2">Titulo Del Articulo</b></h5>
            <?php
              $data = array(
                      'name'  => 'titulo_articulo',
                      'id'    => 'sombraredondeada',
                      'class' => 'text-capitalize bg-white',
                      'value' => set_value('titulo_articulo'),
                      'placeholder' => ' Ingrese Titulo del Articulo'
                    );
              echo form_input($data);
            ?>
          <span class="text-danger"><?php echo form_error('titulo_articulo'); ?> </span>
        </div>
        <div>
          <h5 id="anim-text"><b class="mt-2">Descripcion del Articulo</b></h5>
            <?php
              $data = array(
                      'name'  => 'descripcion_articulo',
                      'id'    => 'sombraredondeada',
                      'class' => 'text-capitalize bg-white',
                      'rows'        => '5',
                      'cols'        => '10',
                      'value' => set_value('descripcion_articulo'),
                      'placeholder' => ' Descripcion del Articulo'
                    );
              echo form_textarea($data);
            ?>
          <span class="text-danger"><?php echo form_error('descripcion_articulo'); ?> </span>
        </div>
        <div>
          <h5 id="anim-text"><b class="mt-2">Imagen</b></h5>
            <?php
              $data = array(
                      'name'  => 'imagen',
                      'type'  => 'file', 
                      'id'    => 'sombraredondeada',
                      'class' => 'text-capitalize bg-white',
                      'value' => set_value('imagen'),
                      'placeholder' => ' Seleccione una Imagen'
                    );;
              echo form_input($data);
            ?>
          <span class="text-danger"><?php echo form_error('imagen'); ?> </span>
        </div>
       <div class="mt-4">
         <?php echo form_submit('Publicar', 'Publicar ',"id='sombraredondeada-log'"); ?>
       </div>
       <div class="mt-3">
        <input type="reset" value="Limpiar Campos" id="sombraredondeada-log" title="Cancelar">
        <br>
      </div>
         <?php echo form_close();?>

    </fieldset>
  </form>
</main>