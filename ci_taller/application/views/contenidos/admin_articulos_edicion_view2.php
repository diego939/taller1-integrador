<main id="contenido">
<h1 id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito"> Edicion Articulos </h1>
<div class="container">
               <!-- Page Heading/Breadcrumbs -->
           
<?php echo form_open_multipart("administrador_controler/actualizar_este_articulo/$id_articulo", ['class' => 'form-signin', 'role' => 'form']); ?>
  <div class="row m-2 p-2">
   <div class="row text-center border border-dark col-12 col-md-6 m-auto m-2 p-2">
              
                 <h1 id="titulo_pagina" class="img-carrito" style="width: 95%; filter: grayscale(100%);">Detalles del Articulo</h1><br>
            
  <div class="m-auto">
    <div><img src="<?php echo base_url("/assets/upload/$imagen");?>" class="img-carrito card-img-top img-fluid rounded-pill" width="250" heigh="150"></div><br>
    
    
   </div>


            <a style="filter: grayscale(100%);" class="img-carrito2 btn btn-danger btn-block" href="<?= base_url("administrador_controler/actualizar_img_este_art/$id_articulo")?>">Cambiar Imagen <span class="sr-only"></span></a>
</div>
             
        <br>
   
    <div id="loginbox" style="margin-top:10px;" class="mainbox m-auto col-md-6 col-md-offset-3 m-2 p-2 col-sm-8 col-sm-offset-2">
    <fieldset id="redondo" style="width: 95%; filter: grayscale(100%);">
      <legend><strong>Editar Articulo</strong></legend>
    
     
        <label class="input-group-addon" id="sizing-addon1" ><span class="glyphicon glyphicon-usd" aria-hidden="true"></span>Titulo</label><br>
         <p class="input-group input-group-lg">
          <?php echo form_input(['name' => 'titulo_articulo', 'class' => 'img-carrito2 text-capitalize form-control','placeholder' => 'Ingrese Titulo del Articulo', 'value'=>"$titulo_articulo"]); ?>
        </p>
          <span class="text-danger"><?php echo form_error('titulo_articulo'); ?> </span>
        <br>

          <label class="input-group-addon" id="sizing-addon1" ><span class="glyphicon glyphicon-list-alt" aria-hidden="true">Descripcion</span></label><br>
         <p class="input-group input-group-lg">
          <?php echo form_textarea(['name' => 'descripcion_articulo', 'rows'        => '10', 'cols' => '15', 'class' => 'img-carrito2 form-control','placeholder' => 'Ingrese Descripcion del Articulo', 'value'=>"$descripcion_articulo"]); ?>
        </p>
            <span class="text-danger"><?php echo form_error('descripcion_articulo'); ?> </span>
        <br>


        <div style="margin-top:10px" class="form-group">
                          <!-- Button -->
          
           <?php echo form_submit('Modificar', 'Modificar Articulo',"class='img-carrito2 btn btn-danger btn-block'"); ?>
          
                    
        </div>
      
    </div>
  </fieldset>

   
  </div>
</div>
      <?php echo form_close();?>
</main>