<main id="contenido">
<br>
<div class="col-md-12 col-md-offset-1 m-auto">
  <div class="btn-group" style="width: 100%">
    <a class="img-carrito2 btn btn-primary" href="<?php echo base_url("super_controler/bloquear_usuarios");?>" >
    <span class="glyphicon glyphicon-trash">Listar Todos</span></a>
    <a class="img-carrito2 btn btn-primary" href="<?php echo base_url("super_controler/bloquear_usuarios_clientes");?>" >
    <span class="glyphicon glyphicon-trash">Solo Usuarios</span></a>
    <a class="img-carrito2 btn btn-primary" href="<?php echo base_url("super_controler/bloquear_usuarios_administradores");?>" >
    <span class="glyphicon glyphicon-trash">Administradores</span></a>
  </div>
</div>
  <div class="img-carrito2 m-auto tex-white text-center bg-dark" style="height: 40px; line-height: 40px; color: #fff; font-family: 'Gochi Hand', cursive;
  font-size:14px;"> 
    <strong>LISTA DE USUARIOS</strong>
  </div>

  <div class="col-md-12 col-md-offset-1 m-auto">
    <div class="img-carrito2 table-responsive bg-white mt-4">
      <table id="mytable" class="table table-bordred table-striped table-hover">
      
        <thead bgcolor="black">
          <th style="color:white">Usuario</th>
          <th style="color:white">📧 Correo</th>
          <th style="color:white">🏠 Direcc</th>
          <th style="color:white">☏ Tel</th>
          <th style="color:white">👤Rol</th>
          <th style="color:white">⛔ Bloquear</th>      
        </thead>
      

        <tbody class="bg-white">
            <?php foreach($usuarios as $row) { ?>
          <tr class="danger"> 
                  <td style="color:black";> <?php echo $row->nombre; ?>  <?php echo $row->apellido; ?> </td>
                  <td style="color:black";> <?php echo $row->email; ?> </td>
                  <td style="color:black";> <?php echo $row->direccion; ?> </td>
                  <td style="color:black";> <?php echo $row->telefono;?> </td>
                  <td style="color:black";> <?php echo $row->descripcion_perfil;?> </td>
                  <td align="right"> <a class="img-carrito2 btn btn-secondary" href="<?php echo base_url("super_controler/bloquear_este_usuario/$row->id_usuario");?>" >
                  <span class="glyphicon glyphicon-trash">⛔ Bloquear</span></a>
                  </td>
           </tr>

        
          <?php } ?>
        </tbody>
      </table>
    </div>
    <nav aria-label="Page navigation example" style=" width: 100%; height: auto;">
      <ul class="img-carrito2 pagination justify-content-center bg-white mt-4 col-10 ml-auto mr-auto text-center">
        <div class="col-5 m-auto text-center"> <?php echo $this->pagination->create_links() ?> 
        </div>
      </ul>
    </nav>
  </div><br><br>
</main>