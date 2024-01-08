<main id="contenido">
	<br>
	<div class="img-carrito2 m-auto tex-white text-center bg-dark" style="height: 40px; line-height: 40px; color: #fff; font-family: 'Gochi Hand', cursive;font-size:14px;"> 
    <strong>DATOS DE LOS USUARIOS</strong>
  	</div><br>

	<div class="col-md-12 col-md-offset-1 m-auto">
	    <div class="img-carrito2 table-responsive bg-white mt-4">
	      <table id="mytable" class="table table-bordred table-striped table-hover">
	      
	        <thead bgcolor="#3073E9">
	          <th style="color:white; text-align: center; font-family: 'Gochi Hand', cursive;"><h5>Total de Usuarios Registrados</h5></th>  
	        </thead>
	      

	        <tbody class="bg-white">
	        <?php $contador1=0;?>
	        <?php foreach($usuarios as $row) { ?>
	        <?php $contador1= $contador1 + 1;?>
	        <?php } ?>
	            <tr class="danger"> 
	                <td style="color:black ; text-align: center; font-family: 'Gochi Hand', cursive;"><h5> <?php echo $contador1; ?></h5></td>
	            </tr>
	    
	        </tbody>
	      </table>
	    </div>
	</div>

		<div class="col-md-12 col-md-offset-1 m-auto">
	    <div class="img-carrito2 table-responsive bg-white mt-4">
	      <table id="mytable" class="table table-bordred table-striped table-hover">
	      
	        <thead bgcolor="#3073E9">
	          <th style="color:white; text-align: center; font-family: 'Gochi Hand', cursive;"><h5>Cantidad de clientes Registrados</h5></th>  
	        </thead>
	      

	        <tbody class="bg-white">
	        <?php $contador2=0;?>
	        <?php foreach($solo_usuarios as $row) { ?>
	        <?php $contador2= $contador2 + 1;?>
	        <?php } ?>
	            <tr class="danger"> 
	                <td style="color:black ; text-align: center; font-family: 'Gochi Hand', cursive;"><h5> <?php echo $contador2; ?></h5></td>
	            </tr>
	    
	        </tbody>
	      </table>
	    </div>
	</div>

		<div class="col-md-12 col-md-offset-1 m-auto">
	    <div class="img-carrito2 table-responsive bg-white mt-4">
	      <table id="mytable" class="table table-bordred table-striped table-hover">
	      
	        <thead bgcolor="#3073E9">
	          <th style="color:white; text-align: center; font-family: 'Gochi Hand', cursive;"><h5>Cantidad de Administradores Registrados</h5></th>  
	        </thead>
	      

	        <tbody class="bg-white">
	        <?php $contador3=0;?>
	        <?php foreach($solo_administradores as $row) { ?>
	        <?php $contador3= $contador3 + 1;?>
	        <?php } ?>
	            <tr class="danger"> 
	                <td style="color:black ; text-align: center; font-family: 'Gochi Hand', cursive;"><h5> <?php echo $contador3; ?></h5></td>
	            </tr>
	    
	        </tbody>
	      </table>
	    </div>
	</div>

		<div class="col-md-12 col-md-offset-1 m-auto">
	    <div class="img-carrito2 table-responsive bg-white mt-4">
	      <table id="mytable" class="table table-bordred table-striped table-hover">
	      
	        <thead bgcolor="#FF0000">
	          <th style="color:white; text-align: center; font-family: 'Gochi Hand', cursive;"><h5>Total de Usuarios Bloqueados</h5></th>  
	        </thead>
	      

	        <tbody class="bg-white">
	        <?php $contador4=0;?>
	        <?php foreach($todo_usuarios_bloq as $row) { ?>
	        <?php $contador4= $contador4 + 1;?>
	        <?php } ?>
	            <tr class="danger"> 
	                <td style="color:black ; text-align: center; font-family: 'Gochi Hand', cursive;"><h5> <?php echo $contador4; ?></h5></td>
	            </tr>
	    
	        </tbody>
	      </table>
	    </div>
	</div>

		<div class="col-md-12 col-md-offset-1 m-auto">
	    <div class="img-carrito2 table-responsive bg-white mt-4">
	      <table id="mytable" class="table table-bordred table-striped table-hover">
	      
	        <thead bgcolor="#FF0000">
	          <th style="color:white; text-align: center; font-family: 'Gochi Hand', cursive;"><h5>Cantidad de Usuarios Bloqueados</h5></th>  
	        </thead>
	      

	        <tbody class="bg-white">
	        <?php $contador5=0;?>
	        <?php foreach($solo_usuarios_bloq as $row) { ?>
	        <?php $contador5= $contador5 + 1;?>
	        <?php } ?>
	            <tr class="danger"> 
	                <td style="color:black ; text-align: center; font-family: 'Gochi Hand', cursive;"><h5> <?php echo $contador5; ?></h5></td>
	            </tr>
	    
	        </tbody>
	      </table>
	    </div>
	</div>

		<div class="col-md-12 col-md-offset-1 m-auto">
	    <div class="img-carrito2 table-responsive bg-white mt-4">
	      <table id="mytable" class="table table-bordred table-striped table-hover">
	      
	        <thead bgcolor="#FF0000">
	          <th style="color:white; text-align: center; font-family: 'Gochi Hand', cursive;"><h5>Cantidad de Administradores Bloqueados</h5></th>  
	        </thead>
	      

	        <tbody class="bg-white">
	        <?php $contador6=0;?>
	        <?php foreach($solo_admin_bloq as $row) { ?>
	        <?php $contador6= $contador6 + 1;?>
	        <?php } ?>
	            <tr class="danger"> 
	                <td style="color:black ; text-align: center; font-family: 'Gochi Hand', cursive;"><h5> <?php echo $contador6; ?></h5></td>
	            </tr>
	    
	        </tbody>
	      </table>
	    </div>
	</div>
</main>