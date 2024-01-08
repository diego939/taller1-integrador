<main id="contenido">
  <h1 id="titulo_pagina" id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito">  Gestion de Articulos </h1>

    <div class="col-md-12 col-md-offset-1 m-auto">
      <div class="btn-group" style="width: 100%">
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url(); ?>administrador_controler/gestion_articulos" >
        <span class="glyphicon glyphicon-trash">Gestion</span></a>
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url("administrador_controler/nuevo_articulo");?>" >
        <span class="glyphicon glyphicon-trash">Publicar Articulo</span></a>
      </div>
    </div>
  <div class="col-md-12 col-md-offset-1 m-auto">
    <div class="img-carrito2 table-responsive bg-white">
      <table id="mytable" class="table table-bordred table-striped table-hover">
           <thead bgcolor="black">
                     <th style="color:white">Titulo</th>
                     <th style="color:white">Articulo</th>
                     <th style="color:white">🎬 Img</th>
                     <th style="color:white">Estado</th>
                     <th style="color:white">Opcion</th>
           </thead>
      
      <tbody>
        
        <?php foreach($articulos as $row) { ?>
      
      <tr class="danger bg-white"> 
            <td style="color:black" title="<?php echo $row->titulo_articulo;?>"><b><?php echo substr($row->titulo_articulo,0,10).'...';?></b></td>
            <td style="color:black" title="<?php echo $row->descripcion_articulo;?>"><?php echo substr($row->descripcion_articulo,0,10).'...'; ?></td>
            <td style="color:black;"> <img style="border: black 1px solid;" id="cajasombra" src="<?php echo base_url("/assets/upload/$row->imagen");?>" width="70" heigh="70" ></td>
            <td>
              <?php if ( ($row->estado_articulo) ==1 ) { ?>
              <b class="text-primary"><?php echo 'Activo';?></b>
              <?php } else { ?>
              <b class="text-danger"><?php echo 'Inactivo';?></b>
              <?php } ?>
            </td>
            <td class="nav-item dropdown">
              <select onChange="window.location.href=this.value" id="cajasombra" style="background-color: #17202A; color: white;">
                    <option>Ver Opciones...</option>
                    <option value="<?php echo base_url("administrador_controler/visualizar_articulo/$row->id_articulo") ;?>">📂 Ver</option>
                    <option value="<?php echo base_url("administrador_controler/editar_articulos/$row->id_articulo") ;?>">✎Editar</option>
                    <?php if ( ($row->estado_articulo) ==1 ) { ?>
                    <option value="<?php echo base_url("administrador_controler/desactivar_articulos/$row->id_articulo") ;?>">✘Desactivar</option>
                    <?php } else { ?>
                    <option value="<?php echo base_url("administrador_controler/activar_articulos/$row->id_articulo") ;?>">✓Activar</option>
                    <?php } ?>
                    <option value="<?php echo base_url("administrador_controler/confirmar_eliminacion_articulo/$row->id_articulo") ;?>">⭙Borrar</option>
                </select>
              </div>
            </td>
      </tr>

       <?php 
       } 
           ?>

      </tbody>
      </table>
   </div>
  </div>

<nav aria-label="Page navigation example" style=" width: 100%; height: auto; filter: grayscale(100%);">
  <ul class="img-carrito2 pagination justify-content-center bg-white mt-4 col-10 ml-auto mr-auto text-center">

      <div class="col-5 m-auto text-center"> <?php echo $this->pagination->create_links() ?> </div>

    </ul>
  </nav>
</main>
<script src="<?php echo base_url("assets/js/vendor/popper.min.js"); ?>"></script>