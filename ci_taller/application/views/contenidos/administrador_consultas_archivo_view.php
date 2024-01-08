<main id="contenido">  
    <h1 id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito"> Archivo </h1>
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
    <div class="img-carrito2 table-responsive bg-white mt-4">
      <table id="mytable" class="table table-bordred table-striped table-hover">
      
        <thead bgcolor="black">
          <th style="color:white">💬 Estado</th>
          <th style="color:white">📧 Correo</th>
          <th style="color:white">✉ Mensaje</th>
          <th style="color:white">📂 Leer</th>
          <th style="color:white">✘ Quit</th>
        </thead>
      

        <tbody class="bg-white">
        <?php foreach($consultas as $row) { ?>
            <tr class="danger"> 
              <?php if($row->leido == 1){?>
                <td style="color:black";><a title="Marcar como no leido" class="btn btn-link" href="<?php echo base_url("administrador_controler/leido_consulta/$row->id_consulta");?>" role="button">leido</a></td>
                <td style="color:black"; title="<?php echo $row->email;?>"> <?php echo substr($row->email,0,12).'...'; ?> </td>
                <td style="color:black"; title="<?php echo $row->mensaje;?>"> <?php echo substr($row->mensaje,0,12).'...';?> </td>
                <td style="color:black";><a title="Leer Consulta" href="<?php echo base_url("administrador_controler/visualizar_consulta/$row->id_consulta");?>" class="img-carrito2 btn btn-outline-secondary">📂</a> </td>
                <td style="color:black";><a title="Quitar del Archivo" href="<?php echo base_url("administrador_controler/desarchivar_consulta/$row->id_consulta");?>" class="img-carrito2 btn btn-outline-secondary">✘</a></td>
              <?php } else {?>
                <td style="color:black";><strong> <?php echo '❶';?> </strong>
                </td>
                <td style="color:black"; title="<?php echo $row->email;?>"><strong> <?php echo substr($row->email,0,12).'...'; ?> </strong></td>
                <td style="color:black"; title="<?php echo $row->mensaje;?>"><strong> <?php echo substr($row->mensaje,0,12).'...';?> </strong></td>
                <td style="color:black";><strong><a title="Leer Consulta" href="<?php echo base_url("administrador_controler/visualizar_consulta/$row->id_consulta");?>" class="img-carrito2 btn btn-outline-secondary">📂</a></strong></td>
                <td style="color:black";><strong><a title="Quitar del archivo" href="<?php echo base_url("administrador_controler/desarchivar_consulta/$row->id_consulta");?>" class="img-carrito2 btn btn-outline-secondary">✘</a></strong></td>
               <?php } ?> 
            </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>

     <nav aria-label="Page navigation example" style=" width: 100%; height: auto; filter: grayscale(100%);">
      <ul class="img-carrito2 pagination justify-content-center bg-white mt-4 col-10 ml-auto mr-auto text-center">
        <div class="col-5 m-auto text-center"> <?php echo $this->pagination->create_links() ?> 
        </div>
      </ul>
    </nav>

  </div><br><br>
</main>
   