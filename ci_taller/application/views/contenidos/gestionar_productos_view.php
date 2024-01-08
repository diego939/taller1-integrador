<main id="contenido">
  <h1 id="titulo_pagina" id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito">  Gestion de Productos </h1>

    <div class="col-md-12 col-md-offset-1 m-auto">
      <div class="btn-group" style="width: 100%">
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url(); ?>EditarProductos" >
        <span class="glyphicon glyphicon-trash">Gestion</span></a>
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url("nuevoProducto_controler/gestionar_productos_bajo_stock");?>" >
        <span class="glyphicon glyphicon-trash">Bajo Stock</span></a>
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url("AgregarProducto");?>" >
        <span class="glyphicon glyphicon-trash">Agregar</span></a>
      </div>
    </div>


      <div class="col-lg-12 mb-4">
        <?php echo form_open('nuevoProducto_controler/gestionar_productos_por_nombre', 
                  ['class' => 'form-group', 'role' => 'form', 'id' => 'form_registro']); ?>
        <div id="cajasombra" class="input-group">
          <?php
          $data = array(
                  'name'  => 'nombre',
                  'class' => 'form-control',
                  'value' => set_value('nombre'),
                  'placeholder' => 'Nombre Del Producto o Codigo'
                );
          echo form_input($data);
        ?>
        <span class="input-group-btn"> 
          <?php echo form_submit('Buscar', '🔍', "class='btn btn-dark'"); ?>
        </span>
        <span class="text-danger"><?php echo form_error('nombre'); ?> </span>
        </div>
        <?php echo form_close(); ?>
      </div>

    <div class="col-md-12 col-md-offset-1 m-auto mt-4 mb-10 text-center">
      <select class="col-lg-12 mb-2" onChange="window.location.href=this.value" id="cajasombra" style="background-color: white; color: black; font-size: 20px;">
        <option>Categorias</option>
        <option value="<?php echo base_url(); ?>EditarProductos">Todos</option>
        <?php foreach($categorias as $row) { ?>
        <option name="categoria" value="<?php echo base_url("nuevoProducto_controler/gestionar_productos_categoria/$row->id_categoria") ;?>"><?php echo $row->descripcion;?></option>
        <?php } ?>
      </select>
    </div><br>

  <div class="col-md-12 col-md-offset-1 m-auto">
    <div class="img-carrito2 table-responsive bg-white">
      <table id="mytable" class="table table-bordred table-striped table-hover">
           <thead bgcolor="black">
                     <th style="color:white">Nombre</th>
                     <th style="color:white">Codigo</th>
                     <th style="color:white">💲Precio</th>
                     <th style="color:white">Stock</th>
                     <th style="color:white">Categoría</th>
                     <th style="color:white">🎬 Img</th>
                     <th style="color:white">✎Editar</th>
                     <th style="color:white; text-align: center">✓ / ✘</th>
           </thead>
      <tbody>
        
        <?php $i=0; foreach($productos as $row) { ?>
      
      <tr class="danger bg-white"> 
            <td style="color:black"><b><?php echo $row->nombre_producto;?></b></td>
            <td style="color:black" title="<?php echo 'Descripcion Del Producto: '.$row->descripcion_producto;?>"><?php echo $row->codigo_producto; ?></td>
            <td style="color:black">💲<?php echo $row->precio; ?> </td>
            <?php if ( ($row->stock) >= 10 ) { ?>
            <td style="color:black"> <?php echo $row->stock; ?> </td>
            <?php }  else { ?>
            <td style="color:#FF0000"><b>⚠ <?php echo $row->stock; ?></b></td>
            <?php  }  ?>
            <td style="color:black"> <?php echo $row->descripcion; ?> </td>
            <td style="color:black;"> <img style="border: black 1px solid;" id="cajasombra" src="<?php echo base_url("/assets/upload/$row->imagen");?>" width="70" heigh="70" ></td>
              
               
              <?php if ( ($row->stock) >= 10 ) { ?>
              <td> <a style="background-color: blue" class="img-carrito2 btn btn-dark" href="<?php echo base_url("EditarP/$row->id_producto");?>" ><span class="glyphicon glyphicon-edit">✎Editar</span> </a>
              </td>
              <?php }  else { ?>
              <td> <a style="background-color: #FF0000" class="img-carrito2 btn btn-dark" href="<?php echo base_url("EditarP/$row->id_producto");?>" > <span class="glyphicon glyphicon-edit">✎Editar</span> </a>
              </td>
              <?php  }  ?>
 
        <?php if ( ($row->estado) ==1 ) { ?>

             <td align="right"> <a class="img-carrito2 btn btn-danger" href="<?php echo base_url("nuevoProducto_controler/eliminar_productos/$row->id_producto");?>" >
                        <span class="glyphicon glyphicon-trash">✘Desactivar</span></a>
             </td>

        <?php }  else { ?>

             <td> <a class="img-carrito2 btn btn-success" href="<?php echo base_url("nuevoProducto_controler/activar_productos/$row->id_producto");?>" > 
             	       <span class="glyphicon glyphicon-ok-sign">✓Activar</span></a>
             </td>

        <?php  }  ?>

      </tr>

       <?php $i++;  }  ?>

      </tbody>
      </table>
   </div>
  </div>
<?php if ($i > 3) { ?>
<nav aria-label="Page navigation example" style=" width: 100%; height: auto; filter: grayscale(100%);">
  <ul class="img-carrito2 pagination justify-content-center bg-white mt-4 col-10 ml-auto mr-auto text-center">

      <div class="col-5 m-auto float-none"> <?php echo $this->pagination->create_links() ?> </div>

    </ul>
  </nav>
  <?php  }  ?>

</main>
<script src="<?php echo base_url("assets/js/vendor/popper.min.js"); ?>"></script>

