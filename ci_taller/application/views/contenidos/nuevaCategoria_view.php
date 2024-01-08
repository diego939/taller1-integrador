<section id="contenido">
<br>
<h1 id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito"> Agregar Nueva Categoria </h1>

    <div class="col-md-12 col-md-offset-1 m-auto">
      <div class="btn-group" style="width: 100%">
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url(); ?>administrador_controler/gestionar_categorias" >
        <span class="glyphicon glyphicon-trash">Gestion</span></a>
        <a class="img-carrito2 btn btn-secondary" href="<?= base_url()?>administrador_controler/nueva_categoria" >
        <span class="glyphicon glyphicon-trash">Agregar Categoria</span></a>
      </div>
    </div> 

   <?php echo form_open_multipart("nuevoProducto_controler/nueva_categoria", ['class' => 'form-group', 'role' => 'form']); ?>

       <form class="form-horizontal" method="post" action="">
        <fieldset id="redondo" style="width: 70%; filter: grayscale(90%);">
          <legend><strong>Categoria</strong></legend>
            

      <div>   
        <?php
          $data = array(
                  'name'  => 'descripcion',
                  'id'    => 'sombraredondeada',
                  'class'    => 'bg-white',
                  'value' => set_value('descripcion'),
                  'rows'        => '5',
              'cols'        => '10',
              'placeholder' => ' Ingrese la nueva categoria...'
                );
          echo form_input($data);
        ?>
      
      <span class="text-danger"><?php echo form_error('descripcion'); ?> </span>
      </div><br><br>
       


        

        <div style="margin-top:10px" class="form-group m-auto">
                          <!-- Button -->
          
           <?php echo form_submit('AGREGAR', 'AGREGAR',"id='sombraredondeada-log'"); ?>
          
                    
        </div>
      <div class="mt-4">
        <a href="<?php echo base_url(); ?>administrador_controler/gestionar_categorias" type="button" id="sombraredondeada-log" class="btn">CANCELAR</a>
        <br>
      </div>
      </fieldset>
    </form>
      <?php echo form_close();?>
 

   
      
      </section>