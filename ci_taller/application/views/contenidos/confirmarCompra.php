<main id="contenido">
<h1 class="img-carrito2" id="titulo_pagina">Confirmar Compra</h1>
<title>Confirmar Compra</title>

    <?php echo validation_errors(); ?> 
    <?php echo form_open('pedidosControler/guardar_pedido'); ?>

<fieldset id="redondo" style="width: 90%">
  <legend><strong>Corrobore los datos de operación </strong></legend>
    <div class="h4 text-center m-2">  
      <h4 id="anim-text"> PASO 1: Datos del Usuario </h4><br>
    </div>

  <div class="container table-responsive-md">
 <div class="col-md-10 col-md-offset-1 m-auto">
  <div class="img-carrito2 table-responsive">
  <table id="mytable" class="table table-bordred table-striped table-hover m-auto">
    
      <thead bgcolor="blue">
        <th style="color:white">Nombre del Usuario</th>
        <th style="color:white">Correo</th>
        <th style="color:white">Direccion</th>
        <th style="color:white">Telefono</th>
           
      </thead>

      <tbody>

      
      <tr class="bg-white"> 
              <td style="color:black";> <?php echo $this->session->userdata('nombre');?>  <?php echo $this->session->userdata('apellido');?></td>
              <td style="color:black";> <?php echo $this->session->userdata('email');?> </td>
              <td style="color:black";> <?php echo $this->session->userdata('direccion');?></td>
              <td style="color:black";> <?php echo $this->session->userdata('telefono');?> </td>


      </tr>

  
    </tbody> 
       
  </table>
  </div>
  <div class="img-carrito2 table-responsive">
    <table id="mytable" class="table table-bordred table-striped" >
    <tr class="bg-dark text-white">
       <td ><strong>El Total de la Compra Realizada es:     $<?php echo number_format($this->cart->total(),2); ?></strong></td>
    </tr>
    </table>
   </div>
 </div>
</div> 

  
   <div class="h4 text-center m-2">  
      <h4 id="anim-text"> PASO 2: Ingresar una forma de Pago </h4><br>

           <div class="h4">
            <div class="col-md-10 m-auto">
              <p class="input-group input-group-lg">
               <label class="input-group-addon" id="sizing-addon1" ><span class="glyphicon glyphicon-usd" aria-hidden="true"></span></label>   
               <select name="pago" class="img-carrito2 form-control" required>
               <option value "--------" selected="selected" > Forma de Pago </option>
          
            <?php foreach($pago as $pago) { ?>
               <option value="<?php echo $pago->id_pago; ?>" > <?php echo $pago->descripcion; ?> </option> 
              <?php } ?>
              </select>
              </p>
      
               <span class="text-danger"><?php echo form_error('pago'); ?> </span>
            </div>
           </div>
   </div> <br><br><br>


   <div class="h4 text-center m-2">  
      <h4 id="anim-text"> PASO 3: Ingresar una forma de Envío </h4><br>

           <div class="h4">
            <div class="col-md-10 m-auto">
              <p class="input-group input-group-lg">
               <label class="input-group-addon" id="sizing-addon1" ><span class="glyphicon glyphicon-transfer" aria-hidden="true"></span></label>   
               <select name="envio" class="img-carrito2 form-control" required>
               <option value "--------" selected="selected"> Forma de Envío </option>
          
            <?php foreach($envio as $envio) { ?>
               <option value="<?php echo $envio->id_envio; ?>" required="required"> <?php echo $envio->descripcion; ?> </option> 
              <?php } ?>
              </select>
              </p>
      
               <span class="text-danger"><?php echo form_error('envio'); ?> </span> 
            </div>
           </div> <br><br>
           <h4 id="anim-text"> Recibir el pedido o la notificacion en la siguiente direccion: </h4><br>

           <div class="col-md-10 m-auto">
            <div class="input-group input-group-lg">
               <label class="input-group-addon" id="sizing-addon1" ><span class="glyphicon glyphicon-home" aria-hidden="true"></span></label>
               <?php echo form_input(['name' => 'direccion', 'id' => 'direccion', 'class' => 'img-carrito2 form-control','placeholder' => "Agregar una direccion", 'value'=>"$direccion",
                               'required'=>'required']); ?>
            </div>
          </div><br>

          <p id="anim-text"> En caso de desear ser necesario, modificar la direccion.</p>
   </div> <br><br>

                  
                  <div class="controls col-md-10 m-auto">
                    <?php echo form_submit('Confirmar', 'Confirmar la Compra',"id='sombraredondeada-log'"); ?>
                  </div>

           <?php echo form_close(); ?>
           <br> 
  </fieldset>
</main>