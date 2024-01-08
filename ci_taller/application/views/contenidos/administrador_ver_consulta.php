<main id="contenido">  
    <h1 id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito"> Datos de la Consulta </h1>
    <div class="col-md-12 col-md-offset-1 m-auto">
      <div class="btn-group" style="width: 100%">
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url("administrador_controler/consultas_usuarios");?>" >
        <span class="glyphicon glyphicon-trash">Listar Todas</span></a>
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url("administrador_controler/consultas_no_leidas");?>" >
        <span class="glyphicon glyphicon-trash">No Leidas</span></a>
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url("administrador_controler/consultas_archivadas");?>" >
        <span class="glyphicon glyphicon-trash">Archivo</span></a>
      </div>
    </div>

  <div class="col-md-12 col-md-offset-1 m-auto">
  <?php foreach($consulta as $row) { ?>
        <div class="img-carrito2 table-responsive bg-white mt-4">
      <table id="mytable" class="table table-bordred table-striped table-hover">
      
        <thead bgcolor="black">
          <th style="color:white">💁 Nombre </th>
          <th style="color:white">📧 Correo</th>
          <th style="color:white">🔘 Ciudad</th>
          <th style="color:white">🔘 Provincia</th>
        </thead>
      

        <tbody class="bg-white">
            <tr class="danger"> 
                <td style="color:black" class="text-capitalize"><?php echo $row->nombre.' '.$row->apellido; ?> </td>
                <td style="color:black"><?php echo $row->email; ?></td>
                <td style="color:black" class="text-capitalize"><?php echo $row->ciudad; ?></td>
                <td style="color:black" class="text-capitalize"><?php echo $row->provincia; ?></td>
            </tr>
        </tbody>
      </table>
    </div>
    <div class="img-carrito2 table-responsive bg-white mt-4">
      <table id="mytable" class="table table-bordred table-striped table-hover">
      
        <thead bgcolor="black">
          <th style="color:white">✱ Asunto</th>
          <th style="color:white">✉ Mensaje</th>
        </thead>
      

        <tbody class="bg-white">
            <tr class="danger text-capitalize"> 
                <td style="color:blue";><h4> <?php echo '"'.$row->asunto.'"'; ?> </h4></td>
                <td style="color:black";><strong> <?php echo $row->mensaje;?> </strong></td>
            </tr>
        </tbody>
      </table>
    </div>
    <div class="m-auto text-center">
    <a title="Marcar como no leido" class="img-carrito2 btn btn-secondary" href="<?php echo base_url("administrador_controler/leido_consulta/$row->id_consulta");?>" role="button">Marcar como no leido</a>
    <?php if ($row->archivo==1){?>
    <a title="Archivar Consulta" class="img-carrito2 btn btn-secondary" href="<?php echo base_url("administrador_controler/archivar_consulta/$row->id_consulta");?>" role="button">💾 Archivar</a>
    <?php }else{?>
    <a title="Quitar del Archivo" class="img-carrito2 btn btn-secondary" href="<?php echo base_url("administrador_controler/desarchivar_consulta/$row->id_consulta");?>" role="button">✘ Quitar del Archivo</a>
    <?php } ?>
    </div>
  <?php } ?>
  </div><br><br>
</main>