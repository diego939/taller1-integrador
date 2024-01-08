<main id="contenido">
<h1 id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito"> Responder Consulta </h1>

    <div class="col-md-12 col-md-offset-1 m-auto">
      <div class="btn-group" style="width: 100%">
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url("administrador_controler/consultas_usuarios_clientes");?>" >
        <span class="glyphicon glyphicon-trash">Listar Todas</span></a>
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url("administrador_controler/consultas_no_leidas_clientes");?>" >
        <span class="glyphicon glyphicon-trash">No Leidas</span></a>
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url("administrador_controler/consultas_archivadas_clientes");?>" >
        <span class="glyphicon glyphicon-trash">Archivo</span></a>
      </div>
    </div>


<div class="container" style="width: 100%;">
<?php echo form_open_multipart("administrador_controler/actualizar_respuesta_consulta/$id_consulta", ['class' => 'form-signin', 'role' => 'form']); ?>
   
    <div id="loginbox" style="margin-top:10px;" class="col-sm-12">
    <?php foreach ($consulta as $row) { ?>
    <div class="img-carrito2 bg-warning col-sm-11 ml-auto mr-auto mt-4" style="text-align: center;">
      <h5 class="mt-4">Para: "<b><?php echo $row->email; ?>" </b></h5><br> 
      <h5 class="mt-4">Consulta: <b class="text-capitalize"><?php echo $row->mensaje;?> </b></h5><br>
    </div> 
    <?php } ?>
    <fieldset id="redondo" style="width: 95%; filter: grayscale(100%);">
      <legend><strong>Responder Consulta</strong></legend>
      <div><br>    
        <?php
          $data = array(
                  'name'  => 'respuesta',
                  'id'    => 'sombraredondeada',
                  'class' => 'bg-white',
                  'value' => "$respuesta",
                  'rows'  => '5',
                  'cols'  => '10',
                  'placeholder' => 'Ingrese Su Respuesta....'
                );
          echo form_textarea($data);
        ?>
        <span class="text-danger"><?php echo form_error('respuesta'); ?> </span>
      </div>

        <div class="col-sm-12 controls mt-4">
          <?php echo form_submit('Enviar Respuesta 📨', 'Enviar Respuesta 📨', "id='sombraredondeada-log'"); ?>
          <br>
          <a id="sombraredondeada-log" title="Cancelar" href="<?php echo base_url("administrador_controler/visualizar_consulta_clientes/$row->id_consulta");?>" class="btn btn-outline-secondary mt-4">Cancelar</a>
        </div> 
  </fieldset>
  </div>
      <?php echo form_close();?>
</div>
</main>