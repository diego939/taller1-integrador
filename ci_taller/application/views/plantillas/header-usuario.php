
<!DOCTYPE html>
<html>
  <head>
    
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"  href= "<?= base_url();?>assets/css/bootstrap.min.css" >
    <link rel="stylesheet"  href= "<?= base_url();?>assets/css/estilo.css" >
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 
    <link rel="icon"  href= "<?= base_url();?>/assets/imagenes/icono.jpg">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-social.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">
    <title> <?php echo $title;?> </title>
    <style type="text/css">
      #estilo-nav{
          background-color: #0E04B7;
          width: 60%;
          border-radius: 10px;
          font-family: 'Courgette', cursive;
      }
      @media handheld, screen and (max-width: 1023px) 
      {
        #estilo-nav{
          width: 97%;
      }
      }
    </style>
  </head>
  <body class="color-body">     
    <header class="clase-header">
      <div id="marca"></div>
      <div class="caja-nav col-md-14 col-md-offset-1 m-auto text-capitalize">
        <nav class="navbar" style="width: 100%; background-color: #210680; border-radius: 10px;">
          <h6 class="text-white m-2 ml-auto"> <b style="color: #FFF; -webkit-text-stroke: 1px black; font-size:20px;"></b> <b><?=$this->session->userdata('nombre');?> <?= $this->session->userdata('apellido');?></b></h6>
          <a href="<?= base_url()?>Perfil">
                  <button type="button" class="btn btn-outline-warning m-1 p-1"><h6><b>👨 Ver Perfil </b></h6></button></a>
                <a href="<?= base_url()?>Salir">
                  <button type="button" class="btn btn-outline-danger m-1 p-1"><h6><b>🕛 Salir </b></h6></button></a>
        </nav>
      </div>
        <nav class="navbar navbar-expand-lg navbar-toggler navbar-dark" id="estilo-nav" 
          style="
        width: 100%;
        border-radius: 10px;
        font-family: 'Courgette', cursive;">

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
              <li class="nav-item active">
                <a class="nav-link" href="<?= base_url()?>UsuarioPrincipal">
               Inicio<span class="sr-only"></span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="<?= base_url()?>UsuarioComercializacion">
                  Comercializacion <span class="sr-only"></span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="<?= base_url()?>UsuarioContacto">
                   Contacto<span class="sr-only"></span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="<?= base_url("logueadoControler/mis_consultas")?>">
                  Mis Consultas<span class="sr-only"></span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="<?= base_url("logueadoControler/mis_pedidos")?>">
                   Pedidos<span class="sr-only"></span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="<?= base_url()?>Catalogo">
                  Catalogo<span class="sr-only"></span></a>
              </li>
              <li class="nav-item active mr-2">
                <a class="btn btn-primary" type="button" href="<?= base_url();?>carritoControler" style="background-color: #0E04B7; font-size: 18px">Carrito <span class="badge badge-light"> <?php echo count($this->cart->contents()) ; ?></span></a>
              </li>
              <li class="nav-item active">
                <select onChange="window.location.href=this.value"  class="nav-link btn btn-primary" style="background-color: #0E04B7; font-size: 18px">
                  <option value="">Del Sitio</option>
                  <option value="<?= base_url("logueadoControler/historia")?>">Historia</option>
                  <option value="<?= base_url("logueadoControler/mision")?>">Mision</option>
                  <option value="<?= base_url("logueadoControler/somos")?>">Quien Somos</option>
                </select>
              </li>
            </ul>
          </div>
        </nav>
    </section>
    </header>
