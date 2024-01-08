<main id="contenido">
<Section>


     
   <h1 class="img-carrito2" id="titulo_pagina">Carrito de compras</h1>
<!--<div class="col-md-12 mb-20">
<div class="m-2 float-left">
<a style="border-radius: 10px; border: #040D69 1px solid;" href="<?php echo base_url();?>Catalogo" class="btn-lg btn-primary"
role="button">Continuar comprando</a><br>
</div>
<div class="m-2 float-right">
<a style="border-radius: 10px; border: #040D69 1px solid;" href="<?php echo base_url();?>Comprar" class="btn-lg btn-primary"
role="button">Realizar compra</a><br>
</div>
</div><br><br><br>-->


<div class="col-md-12 col-md-offset-1 m-auto">
  <div class="btn-group" style="width: 100%">
    <a class="img-carrito2 btn btn-primary" href="<?php echo base_url();?>Catalogo" >
    <span class="glyphicon glyphicon-trash">Continuar comprando</span></a>
    <a class="img-carrito2 btn btn-primary" href="<?php echo base_url();?>Comprar" >
    <span class="glyphicon glyphicon-trash">Realizar compra</span></a>
  </div>
</div>

<br><h4 class="text-center text-danger m-auto"><?php echo $message ?></h4><br><br>
<div class="img-carrito2 col-md-12 col-md-offset-1 m-auto bg-white">
<table id="mytable" class="table table-responsive-md">
<?php if ($cart = $this->cart->contents()): ?>
<thead class="table-dark">
<td>Nº item</td>
<td>Imagen</td>
<td>Nombre</td>
<td>Precio</td>
<td>Cantidad</td>
<td>Subtotal</td>
<td>Acción</td>
</thead>

<tbody>
<?php
$i = 1;
foreach ($cart as $item):?>

<tr class="table-warning">
<td> <?php echo $i++; ?> </td>
<td><img src="<?php echo base_url() . "assets/upload/" . $item["img"];?>" width="40"></td>
<td> <?php echo $item['name']; ?> </td>
<td> $ <?php echo $this->cart->format_number($item['price'],2); ?> </td>
<td> <?php echo $item['qty']; ?> </td>
<td> $ <?php echo $this->cart->format_number($item['subtotal'],2); ?> </td>
<td title="✘ Eliminar"> <?php echo anchor('carritoControler/borrar/'.$item['rowid'],'✘', "class='img-carrito2 btn btn-danger'"); ?></td>

</tr>
<?php endforeach; ?>
<tr>
<td  class="bg-dark text-white"><strong>Total Compra: $<?php echo number_format($this->cart->total(),2); ?></strong></td>
</tr>

<?php endif; ?>

</tbody>

</table>
</div>


</Section>
<section>
	<img class="img-carrito m-2" src="<?php echo base_url("/assets/imagenes/carrito-compras-online2.jpg");?>" style=" hover {filter: grayscale(80%);}">
</section><br>
</main>