
<main id="contenido">
<h1 id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito"> Editar producto </h1>
<div class="container">
               <!-- Page Heading/Breadcrumbs -->
           
<?php echo form_open_multipart("ActualizarProducto/$id_producto", ['class' => 'form-signin', 'role' => 'form']); ?>
  <div class="row m-2 p-2">
   <div class="row text-center border border-dark col-12 col-md-6 m-auto m-2 p-2">
              
                 <h1 id="titulo_pagina" class="img-carrito" style="width: 95%; filter: grayscale(100%);">Detalles del producto</h1><br>
            
  <div class="m-auto">
    <div><img src="<?php echo base_url("/assets/upload/$imagen");?>" class="img-carrito card-img-top img-fluid rounded-pill" width="250" heigh="150"></div><br>
    
    
   </div>
              <!--<p class="input-group input-group-lg">

               <label class="input-group-addon" id="sizing-addon1" ><span class="glyphicon glyphicon-picture" aria-hidden="true"></span></label>
                <?php //echo form_input(['name' => 'imagen', 'id' => 'imagen', 'class' => 'img-carrito2 form-control','placeholder' => 'Seleccione una Imagen', 'value' => "$imagen", 'type'  => 'file']); ?>
                 <br>
               </p>


       <br>
       <span class="text-danger"><?php //echo form_error('imagen'); ?> </span>-->

            <a style="filter: grayscale(100%);" class="img-carrito2 btn btn-danger btn-block" href="<?= base_url("nuevoProducto_controler/actualizar_img_prod/$id_producto")?>">Cambiar Imagen <span class="sr-only"></span></a>
</div>
             
        <br>
   
    <div id="loginbox" style="margin-top:10px;" class="mainbox m-auto col-md-6 col-md-offset-3 m-2 p-2 col-sm-8 col-sm-offset-2">
    <fieldset id="redondo" style="width: 95%; filter: grayscale(100%);">
      <legend><strong>Editar Campos</strong></legend>
    
     
        <label class="input-group-addon" id="sizing-addon1" ><span class="glyphicon glyphicon-usd" aria-hidden="true"></span>Nombre</label><br>
         <p class="input-group input-group-lg">
          <?php echo form_input(['name' => 'nombre', 'class' => 'img-carrito2 text-capitalize form-control','placeholder' => 'Ingrese Nombre del Producto', 'value'=>"$nombre_producto"]); ?>
        </p>
          <span class="text-danger"><?php echo form_error('nombre'); ?> </span>
        <br>

          <label class="input-group-addon" id="sizing-addon1" ><span class="glyphicon glyphicon-list-alt" aria-hidden="true">Descripcion</span></label><br>
         <p class="input-group input-group-lg">
          <?php echo form_input(['name' => 'descripcion', 'class' => 'img-carrito2 form-control','placeholder' => 'Ingrese Descripcion del Producto', 'value'=>"$descripcion_producto"]); ?>
        </p>
            <span class="text-danger"><?php echo form_error('descripcion'); ?> </span>
        <br>

        <label class="input-group-addon" id="sizing-addon1" ><span class="glyphicon glyphicon-list-alt" aria-hidden="true">Codigo</span></label><br>
         <p class="input-group input-group-lg">
          <?php echo form_input(['name' => 'codigo_producto', 'class' => 'img-carrito2 form-control','placeholder' => 'Ingrese Codigo Del Producto', 'value'=>"$codigo_producto"]); ?>
        </p>
            <span class="text-danger"><?php echo form_error('codigo_producto'); ?> </span>
        <br>

          <label class="input-group-addon" id="sizing-addon1" ><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true">Stock</span></label><br>
        <p class="input-group input-group-lg">
          <?php echo form_input(['name' => 'stock', 'class' => 'img-carrito2 form-control','placeholder' => 'Ingrese nuevo Stock', 'value'=>"$stock"]); ?>
        </p>
            <span class="text-danger"><?php echo form_error('stock'); ?> </span>
        <br>


        <label class="input-group-addon" id="sizing-addon1" ><span class="glyphicon glyphicon-usd" aria-hidden="true"></span>Precio (decimal: 00.00)</label><br>
        <p class="input-group input-group-lg">
          <?php echo form_input(['name' => 'precio', 'class' => 'img-carrito2 form-control','placeholder' => 'Ingrese Precio', 'value'=>"$precio"]); ?>
        </p>
          <span class="text-danger"><?php echo form_error('precio'); ?> </span>
        <br>

        <div>
          <label class="input-group-addon" id="sizing-addon1" ><span class="glyphicon glyphicon-usd" aria-hidden="true"></span>Categoria</label><br>

            <select name="categoria" class="img-carrito2 form-control">
                <option value="<?php echo $id_categoria; ?>" selected="selected"> <?php echo $descripcion; ?> </option>

                 <?php foreach($categorias as $categorias) { ?>
                  <?php if ( $id_categoria != $categorias->id_categoria ){ ?>
                <option value="<?php echo $categorias->id_categoria; ?>" > <?php echo $categorias->descripcion; ?> </option> 
                <?php } ?>
                 <?php } ?>
            </select>

          <span class="text-danger"><?php echo form_error('categoria'); ?> </span>
        </div>



        <div style="margin-top:10px" class="form-group">
                          <!-- Button -->
          
           <?php echo form_submit('Modificar', 'Modificar Producto',"class='img-carrito2 btn btn-danger btn-block'"); ?>
          
                    
        </div>
      
    </div>
  </fieldset>

   
  </div>
</div>
      <?php echo form_close();?>
</main>