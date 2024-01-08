<main id="contenido">
<h1 id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito"> Editar Imagen </h1>
<?php echo form_open_multipart("administrador_controler/actualizar_esta_imagen_articulo/$id_articulo", ['class' => 'form-signin', 'role' => 'form']); ?>
<div class="row text-center border border-dark col-12 col-md-6 m-auto m-2 p-2">
            
  <div class="m-auto">
    <div><img src="<?php echo base_url("/assets/upload/$imagen");?>" class="img-carrito card-img-top img-fluid rounded-pill" width="250" heigh="150"></div><br>
    
    
   </div>
              <p class="input-group input-group-lg">

               <label class="input-group-addon" id="sizing-addon1" ><span class="glyphicon glyphicon-picture" aria-hidden="true"></span></label>
                <?php echo form_input(['name' => 'imagen', 'id' => 'imagen', 'class' => 'img-carrito2 form-control','placeholder' => 'Seleccione una Imagen', 'value' => "$imagen", 'type'  => 'file']); ?>
               </p>


       <br>
       <span class="text-danger"><?php echo form_error('imagen'); ?> </span>
		<?php echo form_submit('Modificar', 'Modificar Imagen',"class='img-carrito2 btn btn-secondary btn-block'"); ?>


       <a class="img-carrito2 btn btn-danger btn-block" href="<?php echo base_url("administrador_controler/editar_articulos/$id_articulo");?>" > <span class="glyphicon glyphicon-edit">Cancelar</span> </a>

</div>
<?php echo form_close();?>
<br>
</main>