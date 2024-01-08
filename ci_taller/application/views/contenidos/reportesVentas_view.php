<main id="contenido">
<h1 id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito">Reportes</h1>
    <div class="col-md-12 col-md-offset-1 m-auto">
      <div class="btn-group" style="width: 100%">
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url(); ?>Pedidos" >
        <span class="glyphicon glyphicon-trash">Lista de Pedidos</span></a>
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url("administrador_controler/adminPedidos_archivados");?>" >
        <span class="glyphicon glyphicon-trash">Archivo</span></a>
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url(); ?>Reportes" >
        <span class="glyphicon glyphicon-trash">Ver Reportes</span></a>
      </div>
    </div>
    
    <div class="col-md-12 col-md-offset-1 m-auto mt-4 mb-10 text-center">
      <select class="col-lg-12 mb-2" onChange="window.location.href=this.value" id="cajasombra" style="background-color: white; color: black; font-size: 20px;">
        <option>Categorias</option>
        <option value="<?php echo base_url(); ?>Reportes">Todos</option>
        <?php foreach($categorias as $row) { ?>
        <option name="categoria" value="<?php echo base_url("administrador_controler/reportesVentas_categ/$row->id_categoria") ;?>"><?php echo $row->descripcion;?></option>
        <?php } ?>
      </select>
    </div><br>


    <div class="col-md-12 m-auto text-center">
           <?php echo form_open('administrador_controler/reportes_por_fecha'); ?>
           <label class="input-group-addon" id="sizing-addon1">Desde<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></label> 
              <p class="input-group input-group-lg" id="cajasombra" style="border: black 1px solid;"> 
               <?php echo form_input(['name' => 'fecha1', 'type' => 'date', 'class' => 'form-control','placeholder' => '', 
                               'required'=>'required', 'value'=>set_value('fecha1')]); ?>
              </p> 
              <label class="input-group-addon" id="sizing-addon1">Hasta<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></label>
              <p class="input-group input-group-lg" id="cajasombra" style="border: black 1px solid;"> 
               <?php echo form_input(['name' => 'fecha2', 'type' => 'date', 'class' => 'form-control','placeholder' => '', 
                               'required'=>'required', 'value'=>set_value('fecha2')]); ?>
              </p> 

              <div class="text-center m-auto"> 
              <?php echo form_submit('buscar', 'Buscar por Fecha',"class='img-carrito2 btn btn-danger btn-lg'"); ?>
              </div>
              <?php echo form_close(); ?>
          </div>
              



<div class="col-md-12 col-md-offset-1 p-2">

    <div class="row">
      <div class="col-lg-12 m-auto">
      <h3 class="img-carrito2 notaConsulta text-white text-center bg-dark">📈 Los productos mas vendidos (hasta 10)</h3>
      </div>
      </div> 

    <div class="img-carrito2 table-responsive text-center bg-white">
      <table id="mytable" class="table table-bordred table-striped table-hover">
           <thead bgcolor="#0000FF">
                     
             
                     <th class="border-dark" style="color:white">Nombre del Producto</th>
                      <th class="border-dark" style="color:white">Categoria</th>
                     <th class="border-dark" style="color:white">Precio</th>
                     <th class="border-dark" style="color:white">Vendidos</th>
                     <th class="border-dark" style="color:white">Subtotal</th>


                     
           </thead>
      
      <tbody>
        
        <?php foreach($vendidos as $row) { ?>
      
      <tr class="bg-dark text-white"> 
             
              <td class="bg-white" style="color:black";><b> <?php echo $row->nombre_producto; ?> </b></td>
              <td class="bg-primary" style="color:white";> <?php echo $row->descripcion; ?> </td>
              <td class="bg-white" style="color:black";> $ <?php echo $row->precio; ?> </td>
               <td class="bg-success" style="color:white";><b> <?php echo $row->cantidades; ?></b> </td>
               <td class="bg-white" style="color:black";> $ <?php echo $row->subtotales; ?> </td>

      </tr>

       <?php 
       } 
           ?>

      </tbody>
      </table>
   </div>
   </div>



   <div class="col-md-12 col-md-offset-1 p-2">

    <div class="row">
      <div class="col-lg-12 m-auto">
      <h3 class="img-carrito2 notaConsulta text-white text-center bg-dark">📉 Los Productos menos vendidos (hasta 10) </h3>
      </div>
      </div> 

    <div class="img-carrito2 table-responsive text-center bg-white">
      <table id="mytable" class="table table-bordred table-striped table-hover">
           <thead bgcolor="#FF0000">
                     
             
                     <th class="border-dark" style="color:white">Nombre del Producto</th>
                     <th class="border-dark" style="color:white">Categoria</th>
                     <th class="border-dark" style="color:white">Precio</th>
                     <th class="border-dark" style="color:white">Vendidos</th>
                     <th class="border-dark" style="color:white">Subtotal</th>
                     

                     
           </thead>
      
      <tbody>
        
        <?php foreach($vendidosmin as $row) { ?>
      
      <tr class="bg-dark text-white"> 
             
              <td class="bg-white" style="color:black";><b> <?php echo $row->nombre_producto; ?> </b></td>
              <td class="bg-secondary" style="color:white";> <?php echo $row->descripcion; ?> </td>
              <td class="bg-white" style="color:black";> $ <?php echo $row->precio; ?> </td>
              <td class="bg-danger" style="color:white";><b> <?php echo $row->cantidades; ?></b> </td>
              <td class="bg-white" style="color:black";> $ <?php echo $row->subtotales; ?> </td>
               

      </tr>

       <?php 
       } 
           ?>

      </tbody>
      </table>
   </div>
   </div>



  <div class="col-md-12 col-md-offset-1 p-2">
    <div class="row">
      <div class="col-lg-12 m-auto">
      <h3 class="img-carrito2 notaConsulta text-white text-center bg-dark"> Recaudacion </h3>
      </div>
      </div> 
      <?php $total= 0; foreach($totalr as $row) { ?>
      <?php $total = $total + $row->subtotales; ?> 
      <?php  } ?>
      <table id="mytable" class="table table-bordred table-striped" class="table-responsive">
        <tr class="img-carrito2 bg-dark">
           <td style="color:white;"><strong>Total Recaudado:💲 <?php echo number_format($total); ?></strong>      
           </td>
        </tr>
      </table>
   </div>
</main>
