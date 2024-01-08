<main id="contenido">
<h1 id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito">Detalle del pedido</h1>
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

<?php foreach($cabecera as $row) { ?>
<?php echo form_open("administrador_controler/descargar_pdf/$row->id_pedido", ['class' => 'form-group', 'role' => 'form']); ?>
<?php } ?>
<div class="col-md-12 col-md-offset-1 m-auto">

 <div class="img-carrito2 table-responsive bg-white">
    <table id="mytable" class="table table-bordred table-striped table-hover">
    
      <p><thead bgcolor="black">
        <th style="color:white">Nº Pedido</th>
        <th style="color:white">📆 Fecha de Compra</th>
        <th style="color:white">💳 Forma de Pago</th>
        <th style="color:white">🚚 Envio</th>     
      </thead>
    </p>

    <tbody class="bg-white">
        <?php foreach($cabecera as $row) { ?>
      <tr class="danger"> 
              <td style="color:black";> <?php echo $row->id_pedido; ?> </td>
              <td style="color:black";> <?php echo date("d-m-Y", strtotime($row->fecha)); ?> </td>
              <td style="color:black";> <?php echo $row->descripcion;?> </td>
              <td style="color:black";> Sin cargo </td>
       </tr>

    
      <?php } ?>
    </tbody>
  </table>
</div><br><br>

 <div class="img-carrito2 table-responsive bg-white">
      <table id="mytable" class="table table-bordred table-striped table-hover">
    
      <thead bgcolor="black">
        <th style="color:white"><?php echo '👤 Vendedor' ?> </th>
        <th style="color:white"><?php echo '📧 Correo' ?></th>
        <th style="color:white"><?php echo '🏠 Direccion' ?></th>
        <th style="color:white"><?php echo '☏ Telefono' ?></th>      
      </thead>
      <tbody class="bg-white">
        <tr>
          <td>
            <?php echo $this->session->userdata('nombre') ?> 
            <?php echo $this->session->userdata('apellido') ?> 
          </td>
        <td>
          <?php echo $this->session->userdata('email') ?> 
        </td>
        <td>
          <?php echo $this->session->userdata('direccion') ?> 
          </td>
          <td>
            <?php echo $this->session->userdata('telefono') ?> 
          </td>
        </tr>
      </tbody>
    </table>
 </div><br><br>

<div class="img-carrito2 table-responsive bg-white">
    <table id="mytable" class="table table-bordred table-striped table-hover">
    
      <thead bgcolor="black">
        <th style="color:white">👤 Comprador</th>
        <th style="color:white">📧 Correo</th>
        <th style="color:white">🏠 Direccion</th>
        <th style="color:white">☏ Telefono</th>
               
      </thead>
    

    <tbody class="bg-white">
        <?php foreach($cabecera as $row) { ?>
      <tr class="danger"> 
              <td style="color:black";> <?php echo $row->nombre; ?>  <?php echo $row->apellido; ?> </td>
              <td style="color:black";> <?php echo $row->email; ?> </td>
              <td style="color:black";> <?php echo $row->direccion; ?> </td>
              <td style="color:black";> <?php echo $row->telefono;?> </td>

       </tr>

    
      <?php } ?>
    </tbody>
  </table>
</div><br><br>

  <div class="img-carrito2 table-responsive bg-white">
  <table id="mytable" class="table table-bordred table-striped table-hover m-auto">
    
      <thead bgcolor="black">
        <th style="color:white">Nombre de Producto</th>
        <th style="color:white">💲 Precio</th>
        <th style="color:white">⭗ Cantidad</th>
        <th style="color:white">💲 Subtotal </th>  
        
               
      </thead>
    

    <tbody>
        
       <?php
   
    
    $total= 0;
    ?>
        <?php foreach($detalle as $row) { ?>
      <tr class="bg-white danger"> 
              <td style="color:black";> <?php echo $row->descripcion_producto; ?> </td>
              <td style="color:black";>💲 <?php echo $row->precio; ?> </td>
              <td style="color:black";> <?php echo $row->cantidad; ?> </td>
              <td style="color:black";>💲 <?php echo number_format($item['subtotal'] =$row->precio*$row->cantidad); ?>  </td>
             <?php ($total= $total + $item['subtotal']); ?>         
     </tr>
      
      <?php } ?>

    </tbody>
  </table>
    <table id="mytable" class="table table-bordred table-striped" class="table-responsive">
    <tr class="bg-dark">
       <td style="color:white;"><strong> El Total de la Compra es:💲 <?php echo number_format($total); ?></strong>      
       </td>

    </tr>

  </table>
</table>
</div>

<!--<div class="table-responsive">
  <table id="mytable" class="table table-bordred table-striped" class="table-responsive">
    <tr class="bg-white">
       <td style="color:"><strong>Fecha de emision de la fectura: <?php echo date("d-m-Y");?> </strong>       
       </td>
       <?php $fecha_actual = date("d-m-Y");?>
       <td style="color:"><strong>Fecha de vencimiento: <?php echo date("d-m-Y",strtotime($fecha_actual."+ 1 month"));?></strong>      
       </td>
    </tr>
  </table>
</div>
</div>-->

<div class="col-md-14 col-md-offset-1 m-auto">
<div class="img-carrito2 bg-white mb-4">
    <div style="font-family: Arial, Helvetica, sans-serif;font-size:17px;"><br>
      <!--<div class="m-auto" id="marca-admin"></div>
      <div class="mt-2 mb-2 panel panel-default" style=""><br>
        <p align="center">Av España esq. San Martin</p>
        <p align="center">Corrientes, Argentina.</p>
        <p align="center">Consultas: <a href="" style="text-decoration:none; font-style: italic">brunogas_455@hotmail.com</a></p>
        <p align="center">Facebook: <a href="https://www.facebook.com/GasNaturalFenosaArgentina" style="text-decoration:none; font-style: italic">https://www.facebook.com/GasNaturalFenosaArgentina</a></p>
        <p align="center">Twitter: <a href="https://twitter.com/gnf_ar?lang=es" style="text-decoration:none; font-style: italic">https://twitter.com/gnf_ar?lang=es</a></p>
        <p align="center" style="font-style:italic">© Copyright Bruno Gas.</p>
      </div>-->
  <div class="table-responsive bg-white" style="border-radius: 8px;">
    <table id="mytable" class="table table-bordred table-striped table-hover m-auto">
      <tr class="bg-dark">
       <td style="color:white;"><strong> CODIGO QR</strong>      
       </td>

    </tr>
      <div class="text-center"> 
          <a download="<?php echo $img ?>" href="<?php echo base_url() . "/assets/upload/qr_code/" . $img ?>" title="<?php echo $img ?>">
            <?php foreach($cabecera as $row) { ?>
            <img class="ml-0 mr-0" src="<?php echo base_url("/assets/upload/qr_code/qr_"."$row->id_pedido".".png");?>" />
            <?php } ?>
          </a>
      </div>
    </table>
  </div>
    </div>
  </div>
</div>


<div align="center" class="m-2 p-2" style="filter: grayscale(100%);">
<input type="submit" value="📥 IMPRIMIR FACTURA" id="sombraredondeada-log" title="Los pedidos Facturados se guardan en el archivo Automaticamente">
</div>
      <?php echo form_close();?>
      
</main>
