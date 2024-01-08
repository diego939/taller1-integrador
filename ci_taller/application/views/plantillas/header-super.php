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
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-social.css" rel="stylesheet">   
  </head>



<body class="color-body-super">
    <header class="clase-header">
      <div id="marca-admin"></div>
      <div class="caja-nav col-md-14 col-md-offset-1 m-auto">
        <nav class="navbar" style="width: 100%; background-color: #0827D4; border-radius: 10px;">
          <h6 class="text-white m-2 ml-auto"> <b style="color: #FFF; -webkit-text-stroke: 1px black; font-size:20px;"> SUPER: </b> <b><?=$this->session->userdata('nombre');?> <?= $this->session->userdata('apellido');?></b></h6>
          <a title="Ver Perfil" href="<?= base_url()?>super_controler/ver_perfil" class="text-white p-2 float-right badge badge-pill badge-dark">
                  <h6><b>👨 Perfil</b></h6></a>

            <a title="Cerrar Sesion" href="<?= base_url()?>SalirAdmin" class="text-white p-2 float-right badge badge-pill badge-danger">
                  <h6><b>🕛 Salir </b></h6></a>
        </nav>
      </div>
          <nav class="navbar navbar-expand-lg navbar-toggler navbar-dark" 
        style="
        width: 100%;
        background-color: #3073E9;
        border-radius: 10px;
        font-family: 'Courgette', cursive;
        ">  
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url()?>" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                   Pagina Inicio<span class="sr-only"></span>
                    </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url()?>super_controler/todos_usuarios" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                      Lista De Usuarios<span class="sr-only"></span>
                    </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url()?>super_controler/agregar_usuario" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                      Agregar Usuario<span class="sr-only"></span>
                    </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url()?>super_controler/agregar_administrador" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                      Agregar Admin<span class="sr-only"></span>
                    </a>
                  </li>
                  <!--<li class="nav-item active">
                    <a class="nav-link" href="<?= base_url()?>super_controler/gestion_privilegios" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                      Gestionar Privilegios<span class="sr-only"></span>
                    </a>
                  </li>-->
                  <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url()?>super_controler/bloquear_usuarios" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                      Bloquear Usuario<span class="sr-only"></span>
                    </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url()?>super_controler/desbloquear_usuarios" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                      Desbloq Usuario<span class="sr-only"></span>
                    </a>
                  <!-- </li> 
                  <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url()?>super_controler/todos_usuarios_eliminar" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                      Eliminar Usuario<span class="sr-only"></span>
                    </a>
                  </li>-->
                  <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url()?>super_controler/datos_usuarios" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                      Datos de Usuarios<span class="sr-only"></span>
                    </a>
                  </li>
                </ul>
              </div>
            </nav>
        </header>
