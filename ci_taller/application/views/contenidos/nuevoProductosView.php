<main id="contenido"> 
<h1 id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito"> Agregar Productos </h1> 
    <div class="col-md-12 col-md-offset-1 m-auto">
      <div class="btn-group" style="width: 100%">
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url(); ?>EditarProductos" >
        <span class="glyphicon glyphicon-trash">Gestion</span></a>
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url("AgregarProducto");?>" >
        <span class="glyphicon glyphicon-trash">Agregar producto</span></a>
      </div>
    </div>
  <?php echo form_open_multipart('administrador_controler/registrar_productos', ['class' => 'form-signin', 'role' => 'form']); ?>

    <form class="form-horizontal" action="/action_page.php"><br>
      <fieldset id="redondo" style="width: 70%; filter: grayscale(90%);">
        <legend><strong>Datos del Producto</strong></legend>
        <div>
          <h5 id="anim-text"><b class="mt-2">Nombre</b></h5>
            <?php
              $data = array(
                      'name'  => 'nombre',
                      'id'    => 'sombraredondeada',
                      'class' => 'text-capitalize bg-white',
                      'value' => set_value('nombre'),
                      'placeholder' => ' Ingrese nombre Del Producto'
                    );
              echo form_input($data);
            ?>
          <span class="text-danger"><?php echo form_error('nombre'); ?> </span>
        </div>
        <div>
          <h5 id="anim-text"><b class="mt-2">Descripcion</b></h5>
            <?php
              $data = array(
                      'name'  => 'descripcion',
                      'id'    => 'sombraredondeada',
                      'class' => 'text-capitalize bg-white',
                      'value' => set_value('descripcion'),
                      'placeholder' => ' Descripcion del Producto'
                    );
              echo form_input($data);
            ?>
          <span class="text-danger"><?php echo form_error('descripcion'); ?> </span>
        </div>
        <div>
          <h5 id="anim-text"><b class="mt-2">Codigo</b></h5>
            <?php
              $data = array(
                      'name'  => 'codigo_producto',
                      'id'    => 'sombraredondeada',
                      'class' => 'text-capitalize bg-white',
                      'value' => set_value('codigo_producto'),
                      'placeholder' => 'Codigo Del Prodcto'
                    );
              echo form_input($data);
            ?>
          <span class="text-danger"><?php echo form_error('codigo_producto'); ?> </span>
        </div>
        <div>
          <h5 id="anim-text"><b class="mt-2">Precio Decimal (00.00)</b></h5>
            <?php
              $data = array(
                      'name'  => 'precio',
                      'id'    => 'sombraredondeada',
                      'class' => 'text-capitalize bg-white',
                      'value' => set_value('precio'),
                      'placeholder' => ' Precio del Producto'
                    );
              echo form_input($data);
            ?>
          <span class="text-danger"><?php echo form_error('precio'); ?> </span>
        </div>
        <div>
          <h5 id="anim-text"><b class="mt-2">Stock</b></h5>
            <?php
              $data = array(
                      'name'  => 'stock',
                      'id'    => 'sombraredondeada',
                      'class' => 'text-capitalize bg-white',
                      'value' => set_value('stock'),
                      'placeholder' => ' Stock del Producto'
                    );
              echo form_input($data);
            ?>
          <span class="text-danger"><?php echo form_error('stock'); ?> </span>
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
        <div>
          <h5 id="anim-text"><b class="mt-2">Categoria</b></h5>
            <select name="categoria" id="sombraredondeada" class="bg-white">
                <option value="ninguno" selected="selected"> Seleccione categoria </option>
                 <?php foreach($categorias as $categorias) { ?>

                <option value="<?php echo $categorias->id_categoria; ?>" > <?php echo $categorias->descripcion; ?> </option> 
                 <?php } ?>
            </select>
          <span class="text-danger"><?php echo form_error('categoria'); ?> </span>
        </div>
       <div class="mt-4">
         <?php echo form_submit('Agregar', 'Agregar ',"id='sombraredondeada-log'"); ?>
       </div>
       <div class="mt-3">
        <input type="reset" value="Limpiar Campos" id="sombraredondeada-log" title="Cancelar">
        <br>
      </div>
         <?php echo form_close();?>

    </fieldset>
  </form>
</main>