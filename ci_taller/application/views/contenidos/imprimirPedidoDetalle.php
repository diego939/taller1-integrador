<main id="contenido">
<p align="right"><a><img style="width: 280px; height: 80px;" class="ml-0 mr-0" src="<?php echo base_url("/assets/imagenes/logopagina2.png");?>" /></a></p>
<h2 id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito">Datos del pedido</h2>

<?php foreach($cabecera as $row) { ?>
<?php echo form_open("administrador_controler/descargar_pdf/$row->id_pedido", ['class' => 'form-group', 'role' => 'form']); ?>
<?php } ?>
<div class="col-md-12 col-md-offset-1 m-auto">

 <div class="table-responsive bg-white">
    <table id="mytable" class="table table-bordred table-striped table-hover">

    <tbody class="bg-white">
        <?php foreach($cabecera as $row) { ?>
      <tr class="danger"> 
              <td style="color:black";><strong><?php echo 'Nº de Pedido: '?></strong> <?php echo $row->id_pedido; ?> </td>
              <td style="color:black";><strong><?php echo 'Fecha de compra: '?></strong> <?php echo date("d-m-Y", strtotime($row->fecha)); ?> </td>
              <td style="color:black";><strong><?php echo 'Forma de pago: '?></strong> <?php echo $row->descripcion;?> </td>
              <td style="color:black";><strong><?php echo 'Envio: '?></strong> Sin cargo </td>
       </tr>

    
      <?php } ?>
    </tbody>
  </table>
</div><br><br>

<h2 id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito">Vendedor</h2>
 <div class="table-responsive bg-white">
      <table id="mytable" class="table table-bordred table-striped table-hover">
      <tbody class="bg-white">
        <tr>
          <td>
            <strong><?php echo 'Nombre del Vendedor: ' ?></strong>
            <?php echo $this->session->userdata('nombre') ?> 
            <?php echo $this->session->userdata('apellido') ?> 
          </td>
        <td>
          <strong><?php echo 'Correo: ' ?></strong>
          <?php echo $this->session->userdata('email') ?> 
        </td>
        <td>
          <strong><?php echo 'Dirección: ' ?></strong>
          <?php echo $this->session->userdata('direccion') ?> 
          </td>
          <td>
            <strong><?php echo 'Telefono: ' ?></strong>
            <?php echo $this->session->userdata('telefono') ?> 
          </td>
        </tr>
      </tbody>
    </table>
 </div><br><br>

<h2 id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito">Cliente </h2>
<div class="table-responsive bg-white">
    <table id="mytable" class="table table-bordred table-striped table-hover">
    

    <tbody class="bg-white">
        <?php foreach($cabecera as $row) { ?>
      <tr class="danger"> 
              <td style="color:black";><strong><?php echo 'Nombre del Comprador: ' ?></strong> <?php echo $row->nombre; ?>  <?php echo $row->apellido; ?> </td>
              <td style="color:black";><strong><?php echo 'Correo: ' ?></strong> <?php echo $row->email; ?> </td>
              <td style="color:black";><strong><?php echo 'Dirección: ' ?></strong> <?php echo $row->direccion; ?> </td>
              <td style="color:black";><strong><?php echo 'Telefono: ' ?></strong> <?php echo $row->telefono;?> </td>

       </tr>

    
      <?php } ?>
    </tbody>
  </table>
</div><br><br>

<h2 id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito">Detalle del pedido </h2>

  <div class="table-responsive bg-white">
  <table id="mytable" class="table table-bordred table-striped table-hover m-auto">

    <tbody>
        
      <tr class="bg-white danger"> 
        <td><strong><?php echo 'Nombre del Producto: ' ?></strong></td>
        <td><strong><?php echo 'Precio del Producto: ' ?></strong></td>
        <td><strong><?php echo 'Cantidad de Productos: ' ?></strong></td>
        <td><strong><?php echo 'Subtotal del Producto: ' ?></strong></td>
      </tr> 
       <?php
   
    
    $total= 0;
    ?>
        <?php foreach($detalle as $row) { ?>
      <tr class="bg-white danger"> 
              <td style="color:black";> <?php echo $row->descripcion_producto; ?> </td>
              <td style="color:black";>$ <?php echo $row->precio; ?> </td>
              <td style="color:black";> <?php echo $row->cantidad; ?> </td>
              <td style="color:black";>$ <?php echo number_format($item['subtotal'] =$row->precio*$row->cantidad); ?>  </td>
             <?php ($total= $total + $item['subtotal']); ?>         
     </tr>
      
      <?php } ?>

    </tbody>
  </table>
</div>
<div class="table-responsive bg-white">
  <table id="mytable" class="table table-bordred table-striped" class="table-responsive">
    <tr >
       <td style="color:black";>
        <strong><?php echo 'El Total de la Compra es: $ ' ?><?php echo number_format($total); ?></strong>      
       </td>

    </tr>

  </table>
</table>
</div><br><br>

<div class="table-responsive">
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
</div>

<div class="col-md-12 col-md-offset-1 m-auto">
<div class="bg-white mb-4">
    <div style="font-family: Arial, Helvetica, sans-serif;"><br>
      <div class="mt-2 mb-2 panel panel-default" style=""><br>
        <p align="center">Av España esq. San Martin</p>
        <p align="center">Corrientes, Argentina.</p>
        <p align="center">Consultas: <a href="" style="text-decoration:none; font-style: italic">brunogas_455@hotmail.com</a></p>
        <p align="center">Facebook: <a href="https://www.facebook.com/GasNaturalFenosaArgentina" style="text-decoration:none; font-style: italic">https://www.facebook.com/GasNaturalFenosaArgentina</a></p>
        <p align="center">Twitter: <a href="https://twitter.com/gnf_ar?lang=es" style="text-decoration:none; font-style: italic">https://twitter.com/gnf_ar?lang=es</a></p>
      </div>
      <div class="text-center" style="margin-left: auto; margin-right: auto;"> 
          <p align="center">
            <a download="<?php echo $img ?>" href="<?php echo base_url() . "/assets/upload/qr_code/" . $img ?>" title="<?php echo $img ?>">
            <?php foreach($cabecera as $row) { ?>
            <img class="ml-0 mr-0" src="<?php echo base_url("/assets/upload/qr_code/qr_"."$row->id_pedido".".png");?>" />
            <?php } ?>
          </a>
        </p>
        <p align="center" style="font-style:italic">© Copyright Bruno Gas.</p>
      </div>
    </div>
  </div>
</div>
      <?php echo form_close();?>
      
</main>