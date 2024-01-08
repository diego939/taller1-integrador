<main id="contenido">
  <h1 class="img-carrito" id="titulo_pagina" style="filter: grayscale(100%);"> Pedidos</h1>
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
          <div class="col-md-12 m-auto text-center">
           <?php echo form_open('PedidosporFecha'); ?>
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
              <?php echo form_submit('buscar', '📆 Buscar por Fecha',"class='img-carrito2 btn btn-block btn-lg bg-dark text-white'"); ?>
              </div>
        </div>
              
            <?php echo form_close(); ?>
<br>

                 
<div class="container">

 <div class="col-md-12 col-md-offset-1 m-auto">
 <div class="img-carrito2 table-responsive bg-white">
  <table id="mytable" class="table table-bordred table-striped table-hover">
    
      <thead bgcolor="black">
        <th style="color:white">Nº Pedido</th>
        <th style="color:white">👤 Comprador</th>
        <th style="color:white">📆 Fecha de Compra</th>
        <th style="color:white">💳 Forma de Pago</th>
        <th style="color:white"> </th>
        <th style="color:white">📂 Detalle</th>    
      </thead>
    

    <tbody class="bg-white">
        
        <?php foreach($pedidos as $row) { ?>
      <tr class="danger"> 
              <td style="color:black";> <?php echo $row->id_pedido; ?> </td>
              <td style="color:black";> <?php echo $row->nombre; ?>  <?php echo $row->apellido; ?> </td>
              <td style="color:black";> <?php echo date("d-m-Y", strtotime($row->fecha)); ?> </td>
              <td style="color:black";> <?php echo $row->descripcion;?> </td>
              <td>
                <?php if($row->archivar_pedido == 1){ ?>
                  <a title="Quitar del archivo" href="<?php echo base_url("administrador_controler/quitar_pedido_archivo/$row->id_pedido");?>" class="img-carrito2 btn btn-secondary">✘</a>
                <?php //} else {?>
                  <!--<a title="Archivar Pedido" href="<?php //echo base_url("administrador_controler/archivar_pedido/$row->id_pedido");?>" class="img-carrito2 btn btn-secondary">💾</a>-->
                <?php } ?>
              </td>
              <td>
              <p align="right">
                <a class="img-carrito2 btn btn-dark" title="📂 Ver Detalle" href="<?php echo base_url("PedidosDetalles/$row->id_pedido");?>">📂</a>
              </p>
             </td>
       </tr>

    
      <?php } ?>
    </tbody>
  </table>
  </div>
 </div>
</div>
 <nav aria-label="Page navigation example" style=" width: 100%; height: auto; filter: grayscale(100%);">
  <ul class="img-carrito2 pagination justify-content-center bg-white mt-4 col-10 ml-auto mr-auto text-center">

      <div class="col-5 m-auto text-center"> <?php echo $this->pagination->create_links() ?> </div>

    </ul>
  </nav>
</main>
<script src="<?php echo base_url("assets/js/vendor/popper.min.js"); ?>"></script>