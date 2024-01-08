
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 
    <link rel="icon"  href= "<?= base_url();?>/assets/imagenes/icono.jpg">
    <title> <?php echo $title;?> </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href= "<?= base_url();?>assets/css/estilo.css" rel="stylesheet"/>
    <link rel="stylesheet"  href= "<?= base_url();?>assets/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet"> 
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-social.css" rel="stylesheet"> 
  </head>

  <body style="background-color: #DDE9FC;">
    <header class="clase-header">
      <div id="marca"></div>
      <div class="caja-nav">
        <nav class="navbar navbar-expand-lg navbar-toggler navbar-dark" 
        style="
        background-color: #0E04B7;
        border-radius: 10px;
        font-family: 'Courgette', cursive;
        ">
        
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="<?= base_url()?>Principal">
                    Inicio <span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="<?= base_url()?>Comercializacion">
                    Comercializacion <span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="<?= base_url()?>Contacto">
                     Contacto<span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="<?= base_url()?>Productos">
                     Productos<span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                <select onChange="window.location.href=this.value"  class="nav-link btn btn-primary" style="background-color: #0E04B7; font-size: 18px">
                  <option value="">Este Sitio</option>
                  <option value="<?= base_url("principal_controler/historia")?>">Historia</option>
                  <option value="<?= base_url("principal_controler/mision")?>">Mision</option>
                  <option value="<?= base_url("principal_controler/somos")?>">Quien Somos</option>
                </select>
              </li>
            </ul>
          </div>
        </nav>
      </div>
  </header>