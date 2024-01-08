<!DOCTYPE html>
<html>
  <head>
    
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"  href= "<?= base_url();?>assets/css/estilo.css" >
    <link rel="stylesheet"  href= "<?= base_url();?>assets/css/bootstrap.min.css" >
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 
    <link rel="icon"  href= "<?= base_url();?>/assets/imagenes/icono.jpg">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-social.css" rel="stylesheet">
    <title> <?php echo $title;?> </title>
    
  </head>


<body class="color-body-admin">
    <header class="clase-header">
      <div id="marca-admin"></div>
      <div class="caja-nav">
        <nav class="navbar" style="width: 100%; background-color: #424949; border-radius: 10px;">
          <h6 class="text-white m-2 ml-auto"> <b style="color: #FFF; -webkit-text-stroke: 1px black; font-size:20px;"> Administrador: </b> <b><?=$this->session->userdata('nombre');?> <?= $this->session->userdata('apellido');?></b></h6>

          <a title="Ver Perfil" href="<?= base_url()?>administrador_controler/ver_perfil" class="text-white p-2 float-right badge badge-pill badge-primary">
                  <h6><b>👨 Perfil</b></h6></a>

            <a title="Cerrar Sesion" href="<?= base_url()?>SalirAdmin" class="text-white p-2 float-right badge badge-pill badge-danger">
                  <h6><b>🕛 Salir </b></h6></a>
        </nav>
        </nav>
      </div>
          <nav class="navbar navbar-expand-lg navbar-toggler navbar-dark" 
        style="
        width: 100%;
        background-color: #0E04B7;
        border-radius: 10px;
        font-family: 'Courgette', cursive;
        filter: grayscale(100%);
        ">  
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url()?>Administrador" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                    Pagina Inicio<span class="sr-only"></span>
                    </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url()?>administrador_controler/ver_los_usuarios" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                      Ver Los Clientes<span class="sr-only"></span>
                    </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url()?>administrador_controler/consultas_usuarios" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                    Consultas Anonimas<span class="sr-only"></span>
                    </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url()?>administrador_controler/consultas_usuarios_clientes" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                    Consultas Clientes<span class="sr-only"></span>
                    </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url()?>Pedidos" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                      Gestion Pedidos<span class="sr-only"></span>
                    </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url()?>EditarProductos" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                      Gestionar Productos<span class="sr-only"></span>
                    </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url()?>administrador_controler/gestionar_categorias" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                    Gestionar Categorias<span class="sr-only"></span>
                    </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url()?>administrador_controler/gestion_articulos" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                    Gestionar Articulos<span class="sr-only"></span>
                    </a>
                  </li>
                </ul>
              </div>
            </nav>
        </header>