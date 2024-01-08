<main id="contenido">
  <h1 class="img-carrito" id="titulo_pagina">Mis Pedidos</h1>

      <div class="col-md-12 m-auto text-center">
           <?php echo form_open('logueadoControler/mis_pedidos_porfecha'); ?>
           <label class="input-group-addon" id="sizing-addon1">Desde<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></label> 
              <p class="input-group input-group-lg"  > 
               <?php echo form_input(['name' => 'fecha1', 'type' => 'date', 'class' => 'img-carrito2 form-control','placeholder' => '', 
                               'required'=>'required', 'value'=>set_value('fecha1')]); ?>
              </p> 
              <label class="input-group-addon" id="sizing-addon1">Hasta<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></label>
              <p class="input-group input-group-lg"  > 
               <?php echo form_input(['name' => 'fecha2', 'type' => 'date', 'class' => 'img-carrito2 form-control','placeholder' => '', 
                               'required'=>'required', 'value'=>set_value('fecha2')]); ?>
              </p> 

              <div class="text-center m-auto">
              <?php echo form_submit('buscar', '📆 Buscar por Fecha',"class='img-carrito2 btn btn-primary btn-lg'"); ?>
              </div>
              <?php echo form_close(); ?>
          </div>              
<div class="container">
 <div class="col-md-12 col-md-offset-1 m-auto">
 <div class="img-carrito2 table-responsive bg-white">
  <table id="mytable" class="table table-bordred table-striped table-hover">
      <thead bgcolor="blue">
        <th style="color:white">Nº Pedido</th>
        <th style="color:white">📆 Fecha de Compra</th>
        <th style="color:white">💳 Forma de Pago</th>
        <th style="color:white">📂 Detalle</th>    
      </thead>
    <tbody class="bg-white">  
      <?php foreach($pedidos as $row) { ?>
      <tr class="danger"> 
              <td style="color:black";> <?php echo $row->id_pedido; ?> </td>
              <td style="color:black";> <?php echo date("d-m-Y", strtotime($row->fecha)); ?> </td>
              <td style="color:black";> <?php echo $row->descripcion;?> </td>
              <td>
              <p align="right">
                <a style="background-color: blue" class="img-carrito2 btn btn-dark" title="📂 Ver Detalle" href="<?php echo base_url("logueadoControler/pedidosDetalles/$row->id_pedido");?>">📂</a>
              </p>
             </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </div>
 </div>
</div>

 <nav aria-label="Page navigation example" style=" width: 100%; height: auto;">
  <ul class="img-carrito2 pagination justify-content-center bg-white mt-4 col-10 ml-auto mr-auto text-center">

      <div class="col-5 m-auto text-center"> <?php echo $this->pagination->create_links() ?> </div>

    </ul>
  </nav>
</main>
<script src="<?php echo base_url("assets/js/vendor/popper.min.js"); ?>"></script>