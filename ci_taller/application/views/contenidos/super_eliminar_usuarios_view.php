<main id="contenido">
<br>
<div class="col-md-12 col-md-offset-1 m-auto">
  <div class="btn-group" style="width: 100%">
    <a class="img-carrito2 btn btn-primary" href="<?php echo base_url("super_controler/todos_usuarios_eliminar");?>" >
    <span class="glyphicon glyphicon-trash">Listar Todos</span></a>
    <a class="img-carrito2 btn btn-primary" href="<?php echo base_url("super_controler/solo_usuarios_eliminar");?>" >
    <span class="glyphicon glyphicon-trash">Solo Usuarios</span></a>
    <a class="img-carrito2 btn btn-primary" href="<?php echo base_url("super_controler/solo_administradores_eliminar");?>" >
    <span class="glyphicon glyphicon-trash">Administradores</span></a>
  </div>
</div>
<div class="col-md-12 col-md-offset-1 m-auto">
  <div class="btn-group" style="width: 100%">
    <a class="img-carrito2 btn btn-primary" href="<?php echo base_url("super_controler/todos_usuarios_bloqueados_eliminar");?>" >
    <span class="glyphicon glyphicon-trash">Bloqueados</span></a>
    <a class="img-carrito2 btn btn-primary" href="<?php echo base_url("super_controler/solo_usuarios_bloqueados_eliminar");?>" >
    <span class="glyphicon glyphicon-trash">Usuarios Bloq</span></a>
    <a class="img-carrito2 btn btn-primary" href="<?php echo base_url("super_controler/solo_administradores_bloqueados_eliminar");?>" >
    <span class="glyphicon glyphicon-trash">Administradores Bloq</span></a>
  </div>
</div>
  <div class="img-carrito2 m-auto tex-white text-center bg-dark" style="height: 40px; line-height: 40px; color: #fff; font-family: 'Gochi Hand', cursive;
  font-size:14px;"> 
    <strong>LISTA DE USUARIOS A ELIMINAR</strong>
  </div>

  <div class="col-md-12 col-md-offset-1 m-auto">
    <div class="table-responsive bg-white mt-4">
      <table id="mytable" class="table table-bordred table-striped table-hover">
      
        <thead bgcolor="black">
          <th style="color:white">Usuario</th>
          <th style="color:white">Correo</th>
          <th style="color:white">Direccion</th>
          <th style="color:white">Rol</th>
          <th style="color:white">Estado</th>
          <th style="color:white">Eliminar</th>     
        </thead>
      

        <tbody class="bg-white">
            <?php foreach($usuarios as $row) { ?>
          <tr class="danger"> 
                  <td style="color:black";> <?php echo $row->nombre; ?>  <?php echo $row->apellido; ?> </td>
                  <td style="color:black";> <?php echo $row->email; ?> </td>
                  <td style="color:black";> <?php echo $row->direccion; ?> </td>
                  <td style="color:black";> <?php echo $row->descripcion_perfil;?> </td>
                  <td style="color:black";> <?php echo $row->descripcion_estado;?> </td>
                  <td align="right" style="color:#fff;"> <a href="<?php echo base_url("super_controler/seleccionar_usuario_a_eliminar/$row->id_usuario");?>" class="img-carrito2 btn btn-danger" >
                  <span class="glyphicon glyphicon-trash">Eliminar</span></a>
                  </td>
           </tr>
          <?php } ?>
        </tbody>
      </table>
    </div><br><br>
  </div>
</main>
