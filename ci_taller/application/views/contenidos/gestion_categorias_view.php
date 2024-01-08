<main id="contenido">
  <h1 id="titulo_pagina" id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito">  Gestion de Categorias </h1>

    <div class="col-md-12 col-md-offset-1 m-auto">
      <div class="btn-group" style="width: 100%">
        <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url(); ?>administrador_controler/gestionar_categorias" >
        <span class="glyphicon glyphicon-trash">Gestion</span></a>
        <a class="img-carrito2 btn btn-secondary" href="<?= base_url()?>administrador_controler/nueva_categoria" >
        <span class="glyphicon glyphicon-trash">Agregar Categoria</span></a>
      </div>
    </div>
  <div class="col-md-12 col-md-offset-1 m-auto">
    <div class="img-carrito2 table-responsive bg-white">
      <table id="mytable" class="table table-bordred table-striped table-hover">
           <thead bgcolor="black">
                     <th style="color:white; text-align: center;">Nº categoria</th>
                     <th style="color:white; text-align: center;">Descripción</th>
                     <th style="color:white; text-align: center;">✎Editar</th>
           </thead>
      
      <tbody>
        
        <?php foreach($categorias as $row) { ?>
      
      <tr class="danger bg-white"> 
            <td style="color:black; text-align: center;"><b><?php echo $row->id_categoria;?></b></td>
            <td style="color:black; text-align: center; text-transform: capitalize; background-color: #E9EBF7;" title="<?php echo $row->descripcion;?>"><b><?php echo $row->descripcion; ?></b></td>
            <td> <a style="background-color: #335BFF; text-align: center;" class="img-carrito2 btn btn-dark" href="<?php echo base_url("administrador_controler/editar_categoria/$row->id_categoria");?>" > 
               	           <span class="glyphicon glyphicon-edit">✎Editar</span> </a>
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
