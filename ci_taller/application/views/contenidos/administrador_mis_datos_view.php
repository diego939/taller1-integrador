<main id="contenido">
    <br>
<h1 id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito">MI Perfil</h1>
   <br>
   <fieldset id="redondo" style="width: 80%; border-color: black; color: black; filter: grayscale(100%);">
    <legend><strong>Datos Personales</strong></legend>
    <div class="pages text-dark">
    <div id="privacidad-content" class="container">
    <div class="col-xs-12 paddingwrapper">
<br>
    <div id="bill_info">
            <div align="center">
            <table class="table" border="0" cellpadding="2px" >
                <tr>
                    <td>
                        <strong>Nombre:</strong>
                    </td>
                    <td> 
                        <?php echo $this->session->userdata('nombre') ?> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Apellido:</strong>
                    </td>
                    <td> 
                        <?php echo $this->session->userdata('apellido') ?>  
                    </td>
                </tr>  
                <tr>
                    <td>
                        <strong>Email:</strong>
                    </td>
                    <td> 
                        <?php echo $this->session->userdata('email') ?> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Direccion:</strong>
                        <?php if (!($this->session->userdata('direccion'))){?>
                                 <p class="text-secondary">Agregar Direccion</p>
                        <?php } ?>
                    </td>

                    <td> 
                        <?php echo $this->session->userdata('direccion') ?> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Telefono:</strong>
                         <?php if (!($this->session->userdata('telefono'))){?>
                                <p class="text-secondary"> Agregar Telefono</p>
                        
                    </td>
                    <?php } else {?>
                    <td> 
                        <?php echo $this->session->userdata('telefono') ?> 
                    </td>
                    <?php } ?>
                </tr>

            </table>
            <br> 
         
        </div>
       <br>           
    </div>
</div>
</div>
<div class="col-12 col-md-12 m-auto">
<br><br>
<a href="<?= base_url()?>administrador_controler/editar_datos" type="button" id="sombraredondeada-log" class="btn btn-secondary btn-lg btn-block">Editar Mis Datos</a><br>
<a href="<?= base_url()?>administrador_controler/editar_contra" type="button" id="sombraredondeada-log" class="btn btn-secondary btn-lg btn-block">Cambiar Contraseña</a>
<br><br>
</div>
</div>
</fieldset>
<br>
</main>