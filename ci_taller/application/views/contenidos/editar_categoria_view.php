<main id="contenido">
<h1 id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito"> Editar esta Categoria </h1>
    <div class="col-md-12 col-md-offset-1 m-auto">
      <div class="btn-group" style="width: 100%">
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url(); ?>administrador_controler/gestionar_categorias" >
        <span class="glyphicon glyphicon-trash">Gestion</span></a>
        <a class="img-carrito2 btn btn-secondary" href="<?= base_url()?>administrador_controler/nueva_categoria" >
        <span class="glyphicon glyphicon-trash">Agregar Categoria</span></a>
      </div>
    </div> 
    <?php foreach($categorias as $row) { ?>
    <?php echo form_open("administrador_controler/actualizar_esta_categoria/$row->id_categoria", ['class' => 'form-signin', 'role' => 'form']); ?>
    <div class="" style="margin-left: auto; margin right: auto; margin-top: 15px;"><br>
        <form class="form-horizontal" method="post" action="">
        <fieldset id="redondo" style="width: 80%; filter: grayscale(90%);">
          <legend><strong>Datos de Categoria</strong></legend>
      <div>
        <h5 id="anim-text"><b class="mt-2">Nombre</b></h5>
        <?php
          $data = array(
                  'name'  => 'descripcion',
                  'id'    => 'sombraredondeada',
                  'class' => 'text-capitalize bg-white',
                  'value' => "$row->descripcion",
                  'placeholder' => ' Ingrese nombre'
                );
          echo form_input($data);
        ?>
        <span class="text-danger"><?php echo form_error('descripcion'); ?> </span>
      </div>
      <div class="mt-4">
        <button type="submit" value="ACEPTAR" id="sombraredondeada-log" class="btn btn-secondary btn-lg btn-block" title="Aceptar">ACEPTAR</button>
      </div>
        <div class="mt-4">
        <a href="<?php echo base_url(); ?>administrador_controler/gestionar_categorias" type="button" id="sombraredondeada-log" class="btn btn-secondary btn-lg btn-block">CANCELAR</a>
        <br>
      </div>
    </fieldset>
    </form>
    <br>
    </div>
    <?php echo form_close(); ?>
    <?php } ?>
</main>