<main id="contenido">
  <h1 id="titulo_pagina" style="filter: grayscale(100%);" class="img-carrito">Clientes del sistema</h1>

  <div class="col-md-12 col-md-offset-1 m-auto">
    <div class="img-carrito2 table-responsive bg-white mt-4">
      <table id="mytable" class="table table-bordred table-striped table-hover">
      
        <thead bgcolor="black">
          <th style="color:white">Nombre</th>
          <th style="color:white">📧 Correo</th>
          <th style="color:white">🏠Direcc</th>
          <th style="color:white">☏ Tel</th>
          <th style="color:white">👤Rol</th> 
        </thead>
      

        <tbody class="bg-white">
        <?php foreach($usuarios as $row) { ?>
            <tr class="danger"> 
                <td style="color:black";> <?php echo $row->nombre; ?>  <?php echo $row->apellido; ?> </td>
                <td style="color:black";> <?php echo $row->email; ?> </td>
                <td style="color:black";> <?php echo $row->direccion; ?> </td>
                <td style="color:black";> <?php echo $row->telefono;?> </td>
                <td style="color:black";> <?php echo $row->descripcion_perfil.' (Cliente)';?> </td>
            </tr>
            </tr>
    <?php } ?>
        </tbody>
      </table>
    </div>

     <nav aria-label="Page navigation example" style=" width: 100%; height: auto; filter: grayscale(100%);">
      <ul class="img-carrito2 pagination justify-content-center bg-white mt-4 col-10 ml-auto mr-auto text-center">
        <div class="col-5 m-auto text-center"> <?php echo $this->pagination->create_links() ?> 
        </div>
      </ul>
    </nav>

  </div><br><br>
</main>