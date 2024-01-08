<main id="contenido">
  <?php foreach($articulos as $row) { ?>
  <h1 id="titulo_pagina" id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito">  Articulo  
              <?php if ( ($row->estado_articulo) ==1 ) { ?>
              <?php echo '(Activo)';?>
              <?php } else { ?>
              <?php echo '(Inactivo)';?>
              <?php } ?> 
  </h1>

    <div class="col-md-12 col-md-offset-1 m-auto">
      <div class="btn-group" style="width: 100%">
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url(); ?>administrador_controler/gestion_articulos" >
        <span class="glyphicon glyphicon-trash">Gestion</span></a>
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url("administrador_controler/nuevo_articulo");?>" >
        <span class="glyphicon glyphicon-trash">Publicar Articulo</span></a>
      </div>
    </div>

  <div class="img-carrito2 bg-white row text-dark mt-2 mb-2 ml-2 mr-2">
    <div class="mb-4 mt-4 ml-2 mr-2 bg-secondary text-white" style="width: 100%; border-radius: 10px;">
    <p class="float-right mt-3 mr-3"><?php echo date("d/m/Y", strtotime($row->fecha_articulo));?></p>
    <p class="float-left mt-3 ml-3">Articulo:</p>
    </div>
    <div class="mb-4 mt-4 text-center ml-2 mr-2 text-capitalize" style="width: 100%; color: black;">
    <h2 class="float-center"><u><?php echo $row->titulo_articulo;?></u></h2>
    </div>
    <p class="ml-4 mr-4 mb-4 mt-4"><?php echo $row->descripcion_articulo;?></p>
    <img class="img-carrito2 bg-white row text-dark mt-2 mb-2 ml-2 mr-2" src="<?php echo base_url("/assets/upload/$row->imagen");?>">
    <p class="ml-2 mr-2 mb-4 mt-4">Este Articulo se encuentra: 
      <?php if ( ($row->estado_articulo) ==1 ) { ?>
              <b class="text-primary"><?php echo 'Activo ';?><a id="cajasombra"  class="btn btn-danger bg-danger" href="<?php echo base_url("administrador_controler/desactivar_este_articulo/$row->id_articulo") ;?>">✘Desactivar</a></b>&nbsp;
              <?php } else { ?>
              <b class="text-danger"><?php echo 'Inactivo ';?><a id="cajasombra" class="btn btn-success bg-success" href="<?php echo base_url("administrador_controler/activar_este_articulo/$row->id_articulo") ;?>">✓Activar</a></b>&nbsp;
              <?php } ?>
              <a id="cajasombra" class="btn btn-primary bg-primary" href="<?php echo base_url("administrador_controler/editar_a_este_articulo/$row->id_articulo") ;?>">✎Editar</a>&nbsp;
              <a id="cajasombra" class="btn btn-dark bg-dark" href="<?php echo base_url("administrador_controler/confirmar_eliminacion_articulo/$row->id_articulo") ;?>">⭙Borrar</a>
               
    </p>
  </div>
  <?php  } ?>
</main>
<script src="<?php echo base_url("assets/js/vendor/popper.min.js"); ?>"></script>