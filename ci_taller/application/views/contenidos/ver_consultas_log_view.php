<main id="contenido">
  <h1 id="titulo_pagina" class="img-carrito2">MIS CONSULTAS</h1>
<div class="img-carrito2 bg-white row text-center text-whithe mt-2 mb-2 ml-2 mr-2">
  <?php $i=0; foreach($consultas as $row) { ?>
    <div class="img-carrito2 row text-center mt-4 mb-4 ml-auto mr-auto" style="background-color: blue;">
      <h4 class="ml-auto mr-auto" style="color:#fff;" >Asunto: "<?php echo $row->asunto;?>"</h4>
      <b class="img-carrito2 bg-white ml-2 mr-2 mb-4"><br> Consulta: <?php echo $row->mensaje;?><br><br></b>
      <?php if (is_null($row->respuesta)) { ?>
      <b class="ml-auto mr-auto mb-2" style="color:#fff;"><?php echo 'Esperando Respuesta';?></b>
      <?php }else{ ?>
      <b class="img-carrito2 bg-warning ml-2 mr-2 mb-4"><br> Respuesta: <?php echo $row->respuesta;?><br><br></b>
      <?php } ?>
    </div>
  <?php $i++; } ?>
  <?php if ($i == 0) { ?>
  <div class="text-center mt-4 mb-4 ml-auto mr-auto" style="">
    <br>
    <h1 class="m-auto" style="color:black;" >Sin Consultas</h1><br>
    <h3 class="m-auto" style="color:blue;" >Para Realizar una consulta hacerlo mediante el sitio de <a href="<?= base_url()?>UsuarioContacto">Contacto</a></h3>
    <br>
  </div>
  <?php } ?>
</div>
</main>