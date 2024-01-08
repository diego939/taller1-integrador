<main id="contenido">
<br>

  <div class="img-carrito2 m-auto tex-white text-center bg-dark" style="height: 40px; line-height: 40px; color: #fff; font-family: 'Gochi Hand', cursive;
  font-size:14px;"> 
    <strong>USUARIOS A ELIMINAR</strong>
  </div>

  <div class="col-md-12 col-md-offset-1 m-auto">
    <div class="table-responsive bg-white mt-4">
      <table id="mytable" class="table table-bordred table-striped table-hover">
      
        <thead bgcolor="black">
          <th style="color:white">Usuario</th>
          <th style="color:white">Correo</th>
          <th style="color:white">Direccion</th>
          <th style="color:white">Telefono</th> 
          <th style="color:white">Eliminar</th> 
        </thead>
      

        <tbody class="bg-white">
        <?php foreach($usuario as $row) { ?>
            <tr class="danger"> 
                <td style="color:black";> <?php echo $row->nombre; ?>  <?php echo $row->apellido; ?> </td>
                <td style="color:black";> <?php echo $row->email; ?> </td>
                <td style="color:black";> <?php echo $row->direccion; ?> </td>
                <td style="color:black";> <?php echo $row->telefono;?> </td>
                <td align="right" style="color:#fff;"> <a class="img-carrito2 btn btn-danger" Onclick="confirmarEliminacion();" >
                  <span class="glyphicon glyphicon-trash">Eliminar</span></a>
                  </td>
            </tr>
            <script type="text/javascript">
              function confirmarEliminacion()
              {
                 if (window.confirm("Desea eliminar el registro?") == true)
                    {
                       window.location = "http://localhost/ci_taller/super_controler/usuario_delete/"+<?php echo $row->id_usuario;?>;
                    }
              else
                 {
                    //alert("Cancelado será redirigido a la pagina principal");
                    //window.location ="http://localhost/ci_taller/super_controler/todos_usuarios_eliminar";
                 }
              }
              </script>
    <?php } ?>
        </tbody>
      </table>
    </div><br><br>
  </div>
</main>