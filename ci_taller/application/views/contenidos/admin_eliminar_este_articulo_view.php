<main id="contenido">
  <?php foreach($articulos as $row) { ?>
  <h1 id="titulo_pagina" id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito">Eliminar Este Articulo
  </h1>

    <div class="col-md-12 col-md-offset-1 m-auto">
      <div class="btn-group" style="width: 100%">
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url(); ?>administrador_controler/gestion_articulos" >
        <span class="glyphicon glyphicon-trash">Gestion</span></a>
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url("administrador_controler/nuevo_articulo");?>" >
        <span class="glyphicon glyphicon-trash">Publicar Articulo</span></a>
      </div>
    </div>

  <div class="img-carrito2 bg-white mt-2 mb-2 ml-2 mr-2">
    <h1><b style="color: #D50922;">¿ Desea Eliminar ?</b></h1>
    <br>
    <h2 class="mb-4 mt-4 text-center ml-2 mr-2"><?php echo $row->titulo_articulo;?></h2><br>
    <div class="col-md-12 col-md-offset-1 m-auto mb-4">
      <a class="img-carrito2 btn btn-dark bg-dark text-white" Onclick="confirmarEliminacion();">⭙Confirmar</a>
      
      <a class="img-carrito2 btn btn-dark bg-dark" href="<?php echo base_url("administrador_controler/visualizar_articulo/$row->id_articulo") ;?>">Cancelar</a>
      <br>
    </div>     
  </div>
  <script type="text/javascript">
              function confirmarEliminacion()
              {
                 if (window.confirm("Desea eliminar el Articulo?") == true)
                    {
                       window.location = "http://localhost/ci_taller/administrador_controler/delete_articulo/"+<?php echo $row->id_articulo;?>;
                    }
              else
                 {
                    alert("Se cancelo la eliminacion");
                    window.location ="http://localhost/ci_taller/administrador_controler/visualizar_articulo/"+<?php echo $row->id_articulo;?>;
                 }
              }
              </script>
  <?php  } ?>
</main>
<script src="<?php echo base_url("assets/js/vendor/popper.min.js"); ?>"></script>