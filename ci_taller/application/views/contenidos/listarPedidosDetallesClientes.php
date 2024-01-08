<main id="contenido">
<h1 id="titulo_pagina" class="img-carrito2">Detalle del pedido</h1>
    <div class="col-md-12 col-md-offset-1 m-auto">
      <div class="btn-group" style="width: 100%">
        <a style="background-color: blue" class="img-carrito2 btn btn-secondary" href="<?php echo base_url("logueadoControler/mis_pedidos"); ?>" >
        <span class="glyphicon glyphicon-trash">Volver a Pedidos</span></a>
      </div>
    </div>

<?php foreach($cabecera as $row) { ?>
<?php echo form_open("administrador_controler/descargar_pdf/$row->id_pedido", ['class' => 'form-group', 'role' => 'form']); ?>
<?php } ?>
<div class="col-md-12 col-md-offset-1 m-auto">

 <div class="img-carrito2 table-responsive bg-white">
    <table id="mytable" class="table table-bordred table-striped table-hover">
    
      <p><thead bgcolor="blue">
        <th style="color:white">Nº Pedido</th>
        <th style="color:white">📆 Fecha de Compra</th>
        <th style="color:white">💳 Forma de Pago</th>    
      </thead>
    </p>

    <tbody class="bg-white">
        <?php foreach($cabecera as $row) { ?>
      <tr class="danger"> 
              <td style="color:black";> <?php echo $row->id_pedido; ?> </td>
              <td style="color:black";> <?php echo date("d-m-Y", strtotime($row->fecha)); ?> </td>
              <td style="color:black";> <?php echo $row->descripcion;?> </td>
       </tr>

    
      <?php } ?>
    </tbody>
  </table>
</div><br><br>

<div class="img-carrito2 table-responsive bg-white">
    <table id="mytable" class="table table-bordred table-striped table-hover">
    
      <thead bgcolor="blue">
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
    
      <thead bgcolor="blue">
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
       <td style="color:white; background-color: blue"><strong> El Total de la Compra es:💲 <?php echo number_format($total); ?></strong>      
       </td>

    </tr>

  </table>
</table>
</div>



      <?php echo form_close();?>
      
</main>
