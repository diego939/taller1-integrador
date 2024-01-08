<main id="contenido">

 
    <div class="row text-center text-white mt-2 mb-2 ml-2 mr-2" id="cajasombra">

      <div class="col-sm-12 text-center p-4">
       <p>
       <br>
       <b><h3>¡Bienvenido!</h3>
        <br>
       Somos una empresa dedicada a la venta y reparación de artefactos a gas natural.
       <br>
       ¡Disfruta de los mejores insumos con nosotros!.</b>
       </p>
      </div>

    </div>




<div class="img-carrito2 row text-center text-white bg-white mt-2 mb-2 ml-2 mr-2" style="">
<div id="carouselExampleInterval" class="carousel slide w-50  mt-2 mb-2 ml-auto mr-auto" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active col-14 m-auto" data-interval="10000">
      <div class="card m-auto bg-white" >
        <img src="<?= base_url()?>assets/imagenes/conexion completa galvanizada.jpg" class="img-carrito card-img-top img-fluid rounded-pill" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title"></h5>
          <p class="card-text text-dark">Conexion Completa Galvanizada</p>
        </div>
      </div>
          </div>
          <div class="carousel-item col-14 m-auto" data-interval="2000">
            <div class="card m-auto bg-white" >
        <img src="<?= base_url()?>assets/imagenes/tuerca epoxi.jpg" class="img-carrito card-img-top img-fluid rounded-pill" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title"></h5>
          <p class="card-text text-dark">Tuerca Epoxi 1/2' 3/4'</p>
        </div>
      </div>
      </div>
      <div class="carousel-item col-14 m-auto">
        <div class="card m-auto bg-white" >
          <img src="<?= base_url()?>assets/imagenes/tuerca simple.jpg" class="img-carrito card-img-top  img-fluid rounded-pill" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title"></h5>
          <p class="card-text text-dark">Tuerca Simple 1/2' 3/4'</p>
        </div>
      </div>
    </div>
    <a href="<?= base_url()?>logueadoControler/Catalogos" class="img-carrito btn btn-primary">Ir a productos</a>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>
</div>

  <article>
    <div class="img-carrito2 bg-white row text-center text-dark mt-2 mb-2 ml-2 mr-2">
    <div class="container">
      <h1><small>Informate con BrunoGas®</small></h1>
      <?php foreach($articulos as $row) { ?>
      <div id="accordion" role="tablist">
        <div class="card">
          <div class="card-header" role="tab" id="heading<?php echo $row->id_articulo;?>">
            <h5 class="mb-0">
              <a class="collapsed" data-toggle="collapse" href="#collapse<?php echo $row->id_articulo;?>" aria-expanded="false" aria-controls="collapse<?php echo $row->id_articulo;?>">
               <?php echo $row->titulo_articulo;?>
              </a>
            </h5>
          </div>

          <div id="collapse<?php echo $row->id_articulo;?>" class="collapse" data-parent="#accordion" role="tabpanel" aria-labelledby="heading<?php echo $row->id_articulo;?>">
            <div class="card-body">
              <div class="mb-4 mt-4 ml-2 mr-2 text-dark" style="width: 100%; border-radius: 10px;">
              <p class="float-right mt-3 mr-3"><?php echo date("d/m/Y", strtotime($row->fecha_articulo));?></p>
              <p class="float-left mt-3 ml-3">Articulo:</p>
              </div><br><br><br>
              <div class="mb-4 mt-4 text-center ml-2 mr-2 text-capitalize" style="width: 100%; color: black;">
              <h2 class="float-center"><u><?php echo $row->titulo_articulo;?></u></h2>
              </div>
              <p class="ml-4 mr-4 mb-4 mt-4"><?php echo $row->descripcion_articulo;?></p>
              <img class="img-carrito2 bg-white row text-dark mt-2 mb-2 ml-2 mr-2" src="<?php echo base_url("/assets/upload/$row->imagen");?>">
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      <br>
    </div>
  </div>
</article>

</main>
 

  
  