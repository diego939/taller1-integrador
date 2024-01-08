<section>
<title>Listado Administrador</title>
 <div class="container">
          <!-- Page Heading/Breadcrumbs -->
     
      <br>
      <div align="center"> <img src="../assets/img/simb_escudo.gif" class="img-responsive" width="12%" height="25%"  alt="Tienda River Plate"> </div>
      <br><br>
      


<div class="container">

         <div class="col-md-4">
        <?php echo form_open('administrador_controler/buscarAdmin'); ?>
           <p class="input-group input-group-lg">
            <label class="input-group-addon" id="sizing-addon1" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
              <select name="categoria" class="form-control">
                <option value="ninguno" selected="selected"> Categorias </option>
          
                 <?php foreach($categorias as $categorias) { ?>

                <option value="<?php echo $categorias->id_categoria; ?>" > <?php echo $categorias->descripcion; ?> </option> 
                 <?php } ?>
              </select>
           </p>
         </div>
             <span class="text-danger"><?php echo form_error('categoria'); ?> </span>
       
              <div class="col-sm-7 controls">
                    <?php echo form_submit('buscar', 'Buscar',"class='btn btn-danger btn-lg'"); ?>&nbsp;&nbsp;&nbsp;
                  <a href="<?php echo base_url(); ?>Administrador/adminCatalogos"><button type="button" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;Listar Todos</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="<?php echo base_url(); ?>Administrador/listarInactivos"><button type="button" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;&nbsp;Listar Inactivos</button></a>
             </div>
        <?php echo form_close(); ?> 
     <br><br><br><br>

 <div class="col-md-10 col-md-offset-1">
 <div class="table-responsive">
  <table id="mytable" class="table table-bordred table-striped table-hover">
    
      <thead bgcolor="red">
         <th style="color:white";>Nombre</th>
        <th style="color:white";>Descripción</th>
        <th style="color:white">Precio</th>
        <th style="color:white">Stock</th>
        <th style="color:white">Categoría</th>
        <th></th> 
        
      </thead>
    

    <tbody>
        
        <?php foreach($productos as $row) { ?>
      <tr class="danger"> 
              <td style="color:black";> <?php echo $row->nombre_producto; ?> </td>
              <td style="color:black";> <?php echo $row->descripcion_producto; ?> </td>
              <td style="color:black";>$ <?php echo $row->precio; ?> </td>
              <td style="color:black";> <?php echo $row->stock; ?> </td>
              <td style="color:black";> <?php echo $row->descripcion;?> </td>
              <td> <img src="<?php echo base_url('/assets/upload/') . $row->imagen ?>" alt="" height="100" width="100" /> </td>
       </tr>

    
       
       <?php } ?>
    </tbody>
  </table>
   </div>
   <div class="centrado">  </div>
 </div>
</div>
</div>
</section>
