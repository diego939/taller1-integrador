<style type="text/css">
  .img-prod{
  }
  .img-prod:hover{
    height: 103%;
    width: 103%;
  }

</style>
<main id="contenido">
<h1 class="img-carrito2" id="titulo_pagina">Listado de Productos</h1>
<section class="container-fluid p-2 ">

 
	<div class="row">

    <?php  if ($this->session->userdata('login')){?>

    <div class="col-12 col-md-4 float-left m-auto mb-3 pb-3">
           <h5 class="text-center bg-primary p-1">Ver todos</h5>
                <a class="img-carrito btn bg-dark col text-white rounded-pill mt-2 pt-0" href="<?= base_url()?>Catalogo">
                  <h5 class="mt-2">Todos los Productos</h5></a>
                
             
      </div>
   <?php  } else {?>

    <div class="col-12 col-md-4 float-left m-auto mb-3 pb-3">
              <h5 class="text-center bg-primary p-1">Ver todos</h5>
                <a class="img-carrito btn bg-dark col text-white rounded-pill mt-2 pt-0" href="<?= base_url()?>Productos">
                  <h5 class="mt-2">Todos los Productos</h5></a>
    </div>
            <?php  } ?>

	

		  <div class="col-12 col-md-4 mb-2">
        <?php  if ($this->session->userdata('login')){
               echo form_open('porCategoria');
             } else {
                echo form_open('porcategoria');
           }?>
				    <p class="input-group input-group-lg">
               
    
       <select name="categoria" class="img-carrito form-control">
          <option value="ninguno" selected="selected"> Categoria </option>
          
           <?php foreach($categorias as $categorias) { ?>

          <option value="<?php echo $categorias->id_categoria; ?>" > <?php echo $categorias->descripcion; ?> </option> 
           <?php } ?>
       </select>
       </p>
      
           <span class="text-danger"><?php echo form_error('categoria'); ?> </span>
           <h5>
           <?php echo form_submit('Buscar', '🔍 Categoria',"class='img-carrito btn btn-dark col text-white rounded-pill mt-0 pt-0'");
                echo form_close();?>
          </h5>
		  </div>
      <div class="col-12 col-md-4 float-right">
              <h5 class="text-center bg-primary p-1 mb-4">Filtrar por</h5>
                
                <a style="border-radius: 10px; border: #040D69 1px solid; box-shadow: 7px 7px 7px black;" class="btn bg-dark col-5 p-1 float-left m-auto rounded-pill text-white" 
                <?php  if ($this->session->userdata('login')){?>
                  href="<?= base_url()?>MayorPrecio"
                  <?php } else {?> 
                  href="<?= base_url()?>mayorPrecio"<?php }?>>

                  <h6>Mayor Precio</h6></a>
                
                
                  <a style="border-radius: 10px; border: #040D69 1px solid; box-shadow: 7px 7px 7px black;" class="btn bg-dark col-5 p-1 float-right m-auto rounded-pill text-white" 
                <?php  if ($this->session->userdata('login')){?>
                  href="<?= base_url()?>MenorPrecio"
                  <?php } else {?> 
                  href="<?= base_url()?>menorPrecio"<?php }?>>

                  <h6>Menor Precio</h6></a>
                
             
      </div>

		
	</div>




		
    
 
        <!-- Page Heading/Breadcrumbs -->                     
                
        		


 
<div class="container"> 
    
    	<div class="row bg-white"> 

    	<?php foreach($productos as $row) { ?> 

 
		<div class="col-8 col-md-4 col-lg-3 mb-1 pb-1 m-auto">
		 	<div class="img-carrito2 card text-center "> 
		 		<img class="card-img-top p-2 img-prod" src="<?php echo base_url(); ?>assets/upload/<?php echo $row->imagen; ?>"  alt="Card image cap">
		 		    <div class="card-body">
		 		        <h5 class="card-title">
		 		        	<?php  echo $row->nombre_producto; ?></h5>
		 		        	   	<p class="card-text"><?php  echo $row->descripcion_producto; ?> </p>
		 		        	   	<p class="card-text text-d"><b><?php echo "$";  echo $row->precio; ?> </b></p>
		 		        	   	<hr> 
 					</div>
 					
          <?php  if ($this->session->userdata('login')){           
                echo form_open('carritoControler/agregar_carrito');
                echo form_hidden('id', $row->id_producto);
                echo form_hidden('titulo', $row->nombre_producto);
                echo form_hidden('img', $row->imagen);
                echo form_hidden('precio', $row->precio);
                echo form_hidden('stock', $row->stock); 
                if ($row->stock == 0) { ?>
                <div class="img-carrito2 bg-danger text-white">
                  <b> Sin Stock</b>
                </div>
                <?php }else{
                echo form_submit('Cargar al Carrito', 'Cargar al Carrito',"class='img-carrito btn btn-primary text-white'");
                }
                echo form_close();

           }?>
             
 			</div>
 			 

          
             
 		</div> 
 
     	<?php } ?> 
 
  		</div>

     

 	</div> 



 <nav aria-label="Page navigation example" style=" width: 100%; height: auto;">
  <ul class="img-carrito2 pagination justify-content-center bg-white mt-4 col-10 ml-auto mr-auto text-center">

      <div class="col-5 m-auto p-2 text-center"> <?php echo $this->pagination->create_links() ?> </div>

    </ul>
  </nav>


  
</section>
</main>
 