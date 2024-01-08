<?php

 
class NuevoModelo extends CI_Model
{
        function __construct()   {
               parent::__construct();
             }



public function guardar_productos($data)  {
              $this->db->insert('producto', $data);
             }


public function select_producto() {
            
            $query = $this->db->get('producto');
            return $query->result();
}

public function select_categoria() {
            
            $query = $this->db->get('categoria');
            return $query->result();
}

public function select_categoria_mostrar($limit,$row) {
            $this->db->select('*');
            $this->db->from('categoria');
            $this->db->limit($limit,$row);
            $query = $this->db->get();
            return $query->result();
}

public function select_esta_categoria($id) {
            $this->db->select('*');
             $this->db->from('categoria');
             $this->db->where('categoria.id_categoria =', $id);
            $query = $this->db->get();
            return $query->result();
}

public function actualizar_categoria($data, $id)
     {
             $this->db->where('id_categoria', $id);
             $this->db->update('categoria', $data);
     }

public function select_categoria_max() {
            
            $this->db->select_max('id_categoria');
            $result = $this->db->get('categoria')->row();  
            return $result->id_categoria;

}

/*modelos de articulos ----------------------------------------------------------*/

public function select_articulos(){
            $this->db->select('*');
            $this->db->from('articulo');
            $this->db->order_by('id_articulo','DESC');
            $query = $this->db->get();
            return $query->result();
}

public function select_articulos_mostrar($limit,$row){
            $this->db->select('*');
            $this->db->from('articulo');
            $this->db->order_by('id_articulo','DESC');
            $this->db->limit($limit,$row);
            $query = $this->db->get();
            return $query->result();
}



public function guardar_articulos($data)  {
              $this->db->insert('articulo', $data);
             }

public function select_este_articulo($id){
            $this->db->select('*');
            $this->db->from('articulo');
            $this->db->where('articulo.id_articulo =', $id);
            $query = $this->db->get();
            return $query->result();
}

public function actualizar_articulos($data, $id)
     {
             $this->db->where('id_articulo', $id);
             $this->db->update('articulo', $data);
     }

public function select_articulo_delete($id){
            $this->db->select('*');
             $this->db->from('articulo');
             $this->db->where('articulo.id_articulo =', $id);
             $this->db->delete('articulo');
            
}

//se muestran los articulos al cliente
public function mostrar_articulos_usuario(){
      $this->db->select('*');
      $this->db->from('articulo');
      $this->db->where('articulo.estado_articulo =', 1);
      $this->db->order_by('id_articulo','DESC');
      $query = $this->db->get();
      return $query->result();
}

public function agregar_categoria($datos)
{

  $this->db->insert('categoria', $datos);
}

/*metodos para administrar consultas-----------------------------------------*/

public function select_esta_consulta($id_cons) {
              $this->db->select('*');
             $this->db->from('consulta');
             $this->db->where('consulta.id_consulta =', $id_cons);
             $query = $this->db->get();
            return $query->result();
}



public function select_consulta() {
            $this->db->select('*');
             $this->db->from('consulta');
            $this->db->where('consulta.id_usuario is null');
            $this->db->where('consulta.archivo =', 1);
            $this->db->order_by('consulta.id_consulta','DESC');
            $query = $this->db->get();
            return $query->result();
}

public function select_consulta_mostrar($limit, $row) {
            $this->db->select('*');
             $this->db->from('consulta');
            $this->db->where('consulta.id_usuario is null');
            $this->db->where('consulta.archivo =', 1);
            $this->db->order_by('consulta.id_consulta','DESC');
            $this->db->limit($limit,$row);
            $query = $this->db->get();
            return $query->result();
}

public function select_consulta_no_leido() {
            $this->db->select('*');
             $this->db->from('consulta');
            $this->db->where('consulta.id_usuario is null');
            $this->db->where('consulta.archivo =', 1);
            $this->db->where('consulta.leido =', 0);
            $this->db->order_by('id_consulta','DESC');
            $query = $this->db->get();
            return $query->result();
}

public function select_consulta_no_leido_mostrar($limit, $row) {
            $this->db->select('*');
             $this->db->from('consulta');
            $this->db->where('consulta.id_usuario is null');
            $this->db->where('consulta.archivo =', 1);
            $this->db->where('consulta.leido =', 0);
            $this->db->order_by('id_consulta','DESC');
            $this->db->limit($limit,$row);
            $query = $this->db->get();
            return $query->result();
}

public function select_consultas_archivo() {
            $this->db->select('*');
             $this->db->from('consulta');
            $this->db->where('consulta.id_usuario is null');
            $this->db->where('consulta.archivo =', 0);
            $this->db->order_by('id_consulta','DESC');
            $query = $this->db->get();
            return $query->result();
}

public function select_consultas_archivo_mostrar($limit, $row) {
            $this->db->select('*');
             $this->db->from('consulta');
            $this->db->where('consulta.id_usuario is null');
            $this->db->where('consulta.archivo =', 0);
            $this->db->order_by('id_consulta','DESC');
            $this->db->limit($limit,$row);
            $query = $this->db->get();
            return $query->result();
}

//muestra a los clientes las consultas que realizaron
public function select_consulta_por_cliente($id) {
            $this->db->select('*');
            $this->db->from('usuario');
            $this->db->join('consulta', 'consulta.id_usuario =
               usuario.id_usuario');
            $this->db->where('usuario.id_usuario =', $id);
            $this->db->order_by('consulta.id_consulta','DESC');
            $query = $this->db->get();
            return $query->result();
}

/*metodos para administrar consultas(de usuarios registrados)-------------------*/

public function select_esta_consulta_clientes($id_cons) {
             $this->db->select('*');
             $this->db->from('consulta');
              $this->db->join('usuario', 'consulta.id_usuario =
               usuario.id_usuario');
             $this->db->where('consulta.id_consulta =', $id_cons);
             $query = $this->db->get();
            return $query->result();
}



public function select_consulta_clientes() {
            $this->db->select('*');
            $this->db->from('consulta');
      $this->db->join('usuario', 'consulta.id_usuario =
               usuario.id_usuario');
            $this->db->where('consulta.archivo =', 1);
            $this->db->order_by('consulta.id_consulta','DESC');
            $query = $this->db->get();
            return $query->result();
}

public function select_consulta_mostrar_clientes($limit, $row) {
            $this->db->select('*');
            $this->db->from('consulta');
      $this->db->join('usuario', 'consulta.id_usuario =
               usuario.id_usuario');
            $this->db->where('consulta.archivo =', 1);
            $this->db->order_by('consulta.id_consulta','DESC');
            $this->db->limit($limit,$row);
            $query = $this->db->get();
            return $query->result();
}

public function select_consulta_no_leido_clientes() {
            $this->db->select('*');
            $this->db->from('consulta');
      $this->db->join('usuario', 'consulta.id_usuario =
               usuario.id_usuario');
            $this->db->where('consulta.archivo =', 1);
            $this->db->where('consulta.leido =', 0);
            $this->db->order_by('consulta.id_consulta','DESC');
            $query = $this->db->get();
            return $query->result();
}

public function select_consulta_no_leido_mostrar_clientes($limit, $row) {
            $this->db->select('*');
            $this->db->from('consulta');
      $this->db->join('usuario', 'consulta.id_usuario =
               usuario.id_usuario');
            $this->db->where('consulta.archivo =', 1);
            $this->db->where('consulta.leido =', 0);
            $this->db->order_by('consulta.id_consulta','DESC');
            $this->db->limit($limit,$row);
            $query = $this->db->get();
            return $query->result();
}

public function select_consultas_archivo_clientes() {
            $this->db->select('*');
            $this->db->from('consulta');
      $this->db->join('usuario', 'consulta.id_usuario =
               usuario.id_usuario');
            $this->db->where('consulta.archivo =', 0);
            $this->db->order_by('consulta.id_consulta','DESC');
            $query = $this->db->get();
            return $query->result();
}

public function select_consultas_archivo_mostrar_clientes($limit, $row) {
            $this->db->select('*');
            $this->db->from('consulta');
      $this->db->join('usuario', 'consulta.id_usuario =
               usuario.id_usuario');
            $this->db->where('consulta.archivo =', 0);
            $this->db->order_by('consulta.id_consulta','DESC');
            $this->db->limit($limit,$row);
            $query = $this->db->get();
            return $query->result();
}


/*FIN metodos para administrar consultas(de usuarios registrados)---------------*/


public function select_bajostock()
     {
             $this->db->select('*');
             $this->db->from('producto');
             $this->db->join('categoria', 'categoria.id_categoria = producto.id_categoria');
             $this->db->where('producto.stock <', 10);
             $query = $this->db->get();
        return $query->result();
     }

public function select_bajostock_mostrar($limit, $row)
     {
             $this->db->select('*');
             $this->db->from('producto');
             $this->db->join('categoria', 'categoria.id_categoria = producto.id_categoria');
             $this->db->where('producto.stock <', 10);
             $this->db->limit($limit,$row);
             $query = $this->db->get();
        return $query->result();
     }

public function buscar_productos_nombre($nombre)
 {
       $this->db->select('*');
       $this->db->from('producto');
       $this->db->join('categoria', 'categoria.id_categoria = producto.id_categoria');
       //$this->db->like('producto.nombre_producto', $nombre);
       $this->db->where("producto.nombre_producto LIKE '%$nombre%'");
       //$this->db->or_where('producto.id_producto', $nombre);
       $this->db->or_where('producto.codigo_producto', $nombre);
       $query = $this->db->get();
       return $query->result();
 }


 public function buscar_productos_nombre_mostrar($limit, $row, $nombre)
 {
                    $this->db->select('*');
                    $this->db->from('producto');
                    $this->db->join('categoria', 'categoria.id_categoria =
                    producto.id_categoria');
                    //$this->db->like('producto.nombre_producto', $nombre);
                    $this->db->where("producto.nombre_producto LIKE '%$nombre%'");
                    //$this->db->or_where('producto.id_producto', $nombre);
                    $this->db->or_where('producto.codigo_producto', $nombre);
                    $this->db->limit($limit,$row);
                    $query = $this->db->get();
                    return $query->result();
 }

 public function select_productos_id($id)
     {
             $this->db->select('*');
             $this->db->from('producto');
             $this->db->where('id_producto', $id);
             $this->db->join('categoria', 'producto.id_categoria =
               categoria.id_categoria');
             $query = $this->db->get();
        return $query->result();
     }


 public function select_detalle_id($id)
     {
             $this->db->select('*');
             $this->db->from('detallepedido');
             $this->db->where('id_pedido', $id);
             $this->db->join('producto', 'producto.id_producto =
               detallepedido.id_producto');
             $query = $this->db->get();
        return $query->result();
     }
 public function select_cabecera($id)
     {
             $this->db->select('*');
             $this->db->from('pedido');
              $this->db->join('usuario', 'usuario.id_usuario =
               pedido.id_usuario');
              $this->db->join('pago', 'pago.id_pago =
               pedido.id_pago');
              $this->db->where('id_pedido', $id);
              $query = $this->db->get();
        return $query->result();
     }




public function actualizar_productos($data, $id)
     {
             $this->db->where('id_producto', $id);
             $this->db->update('producto', $data);
     }

    public function actualizar_consulta($data, $id)
    {
             $this->db->where('id_consulta', $id);
             $this->db->update('consulta', $data);
     }



public function actualizar_usuario($data, $id_usuario)
     {
             $this->db->where('id_usuario', $id_usuario);
             $this->db->update('usuario', $data);
     }

 
 public function actualizar_stock($data, $id)
     {
             $this->db->where('id_producto', $id);
             $this->db->update('producto', $data);
     }


 public function select_preciome()
 {
      $this->db->select('*');
       $this->db->from('producto');
      $this->db->where('estado',1);
       $query = $this->db->get();
        return $query->result();
 }

  public function select_pedidos_por_cliente($id){
              $this->db->select('*');
              $this->db->from('pedido');
              $this->db->join('usuario', 'usuario.id_usuario =
               pedido.id_usuario');
              $this->db->join('pago', 'pago.id_pago =
              pedido.id_pago');
              $this->db->where('usuario.id_usuario =', $id);
              $this->db->order_by('pedido.id_pedido','DESC');
              $query = $this->db->get();
              return $query->result();
    }

      public function select_pedidos_por_cliente_fecha($id, $fecha1, $fecha2){
              $this->db->select('*');
              $this->db->from('pedido');
              $this->db->join('usuario', 'usuario.id_usuario =
               pedido.id_usuario');
              $this->db->join('pago', 'pago.id_pago =
              pedido.id_pago');
              $this->db->where('usuario.id_usuario =', $id);
              $this->db->where('fecha >=',  $fecha1);
              $this->db->where('fecha <=',  $fecha2);
              //$this->db->where("pedido.fecha BETWEEN $fecha1 AND $fecha2");
              $this->db->order_by('pedido.id_pedido','DESC');
              $query = $this->db->get();
              return $query->result();
    }

      public function select_pedidos_por_cliente_mostrar($limit, $row, $id){
              $this->db->select('*');
              $this->db->from('pedido');
              $this->db->join('usuario', 'usuario.id_usuario =
               pedido.id_usuario');
              $this->db->join('pago', 'pago.id_pago =
              pedido.id_pago');
              $this->db->where('usuario.id_usuario =', $id);
              $this->db->order_by('pedido.id_pedido','DESC');
              $this->db->limit($limit,$row);
              $query = $this->db->get();
              return $query->result();
    }



 public function select_orden(){
              $this->db->select('*');
              $this->db->from('pedido');
              $this->db->join('usuario', 'usuario.id_usuario =
               pedido.id_usuario');
              $this->db->join('pago', 'pago.id_pago =
              pedido.id_pago');
              $this->db->where('pedido.archivar_pedido =', 0);
              $this->db->order_by('pedido.id_pedido','DESC');
              $query = $this->db->get();
              return $query->result();
    }

 public function pedidos_mostrar($limit, $row)
 {
                    $this->db->from('pedido');
              $this->db->join('usuario', 'usuario.id_usuario =
               pedido.id_usuario');
              $this->db->join('pago', 'pago.id_pago =
               pedido.id_pago');
              $this->db->where('pedido.archivar_pedido =', 0);
              $this->db->order_by('pedido.id_pedido','DESC');
                    $this->db->limit($limit,$row);
                    $query = $this->db->get();
                     return $query->result();
 }

  public function select_orden_archivado(){
              $this->db->select('*');
              $this->db->from('pedido');
              $this->db->join('usuario', 'usuario.id_usuario =
               pedido.id_usuario');
              $this->db->join('pago', 'pago.id_pago =
              pedido.id_pago');
              $this->db->where('pedido.archivar_pedido =', 1);
              $this->db->order_by('pedido.id_pedido','DESC');
              $query = $this->db->get();
              return $query->result();
    }

 public function pedidos_mostrar_archivado($limit, $row)
 {
                    $this->db->from('pedido');
              $this->db->join('usuario', 'usuario.id_usuario =
               pedido.id_usuario');
              $this->db->join('pago', 'pago.id_pago =
               pedido.id_pago');
              $this->db->where('pedido.archivar_pedido =', 1);
              $this->db->order_by('pedido.id_pedido','DESC');
                    $this->db->limit($limit,$row);
                    $query = $this->db->get();
                     return $query->result();
 }

public function actualizar_pedido($data, $id){
             $this->db->where('id_pedido', $id);
             $this->db->update('pedido', $data);
     }

 
 public function select_pago2(){
              $this->db->select('*');
              $this->db->from('ordenpedido');
              $this->db->join('pago', 'pago.id_pago =
               pedido.id_pago');
            
              $query = $this->db->get();
              return $query->result();
    }


 public function select_pago() {
            
            $query = $this->db->get('pago');
            return $query->result();
 }


 public function select_envio() {
            
            $query = $this->db->get('envio');
            return $query->result();
 }

 public function select_usuario($usuario) {
            
            $this->db->select('*');
            $this->db->from('usuario');
            $this->db->where('id_usuario',$usuario);
            $query = $this->db->get();
            return $query->result();
 }

 public function select_orden_fecha($fecha1,$fecha2)
 {
     $this->db->select('*');
              $this->db->from('pedido');
              $this->db->join('usuario', 'usuario.id_usuario =
               pedido.id_usuario');
              $this->db->join('pago', 'pago.id_pago =
               pedido.id_pago');
              $this->db->where('fecha >=',  $fecha1);
              $this->db->where('fecha <=',  $fecha2);
              $this->db->order_by('fecha','ASC');
              $query = $this->db->get();
              return $query->result();
    }


      public function fechas_mostrar($limit, $row, $fecha1, $fecha2)
 {
                    $this->db->from('pedido');
              $this->db->join('usuario', 'usuario.id_usuario =
               pedido.id_usuario');
              $this->db->join('pago', 'pago.id_pago =
               pedido.id_pago');
              $this->db->where('fecha >=',  $fecha1);
              $this->db->where('fecha <=',  $fecha2);
                    $this->db->limit($limit,$row);
                    $query = $this->db->get();
                     return $query->result();
 }


public function select_orden_usuario2()
 {
              $this->db->select('*');
              $this->db->from('pedido');
              $this->db->join('usuario', 'usuario.id_usuario =
               pedido.id_usuario');
              $this->db->join('pago', 'pago.id_pago =
               pedido.id_pago');
              $this->db->order_by('usuario.nombre');
              $query = $this->db->get();
              return $query->result();
    }


    public function select_orden_usuario1()
 {
              $this->db->select('*');
              $this->db->from('pedido');
              $this->db->join('usuario', 'usuario.id_usuario =
               pedido.id_usuario');
              $this->db->join('pago', 'pago.id_pago =
               pedido.id_pago');
              $this->db->order_by('pedido.');
              $query = $this->db->get();
              return $query->result();
    }

       public function select_orden_pago()
 {
              $this->db->select('*');
              $this->db->from('pedido');
              $this->db->join('usuario', 'usuario.id_usuario =
               pedido.id_usuario');
              $this->db->join('pago', 'pago.id_pago =
               pedido.id_pago');
              $query = $this->db->get();
              return $query->result();
    }

public function pagos_mostrar($limit, $row)
 {
              $this->db->select('*');
              $this->db->from('pedido');
              $this->db->join('usuario', 'usuario.id_usuario =
               pedido.id_usuario');
              $this->db->join('pago', 'pago.id_pago =
               pedido.id_pago');

              $this->db->order_by('pago.id_pago');
              $this->db->limit($limit,$row);
              $query = $this->db->get();
              return $query->result();
    }



    public function  mostrar_filtro_pedidos($limit, $row, $fecha1, $fecha2)
    {

            $this->db->select('*');
                $this->db->from('pedido');
              $this->db->join('usuario', 'usuario.id_usuario =
               pedido.id_usuario');
              $this->db->join('pago', 'pago.id_pago =
               pedido.id_pago');
              $this->db->where('fecha >=',  $fecha1);
              $this->db->where('fecha <=',  $fecha2);
              $this->db->order_by('fecha','ASC');
              $this->db->limit($limit,$row);
              $query = $this->db->get();
              return $query->result();
    
    }


 public function buscar_categoria($categ)
 {
              $this->db->select('*');
              $this->db->from('producto');
              $this->db->where('id_categoria',$categ);

              $query = $this->db->get();
              return $query->result();
}

//esto me sirve si quiero saber el historico nomas

public function select_max_vendidos()
 {
              $this->db->select('*');
              $this->db->from('producto');
              $this->db->join('categoria', 'categoria.id_categoria =
               producto.id_categoria');
              $this->db->order_by('vendidos','Desc');
              $this->db->limit(10);
              $query = $this->db->get();
              return $query->result();
}

public function select_min_vendidos()
 {
              $this->db->select('*');
              $this->db->from('producto');
              $this->db->join('categoria', 'categoria.id_categoria =
               producto.id_categoria');
              $this->db->order_by('vendidos','Asc');
              $this->db->limit(10);
              $query = $this->db->get();
              return $query->result();
}

/*Si quiero tener un buen reporte debo unir las tablas de detalle de pedido con pedido, con producto y con categoria*/
// INICIO reporte-------------------------------------------------------
public function reporte_historico_max(){
    $this->db->select('*');
    $this->db->select('sum(detallepedido.cantidad) AS cantidades', FALSE);
    $this->db->select('(producto.precio * sum(detallepedido.cantidad)) AS subtotales', FALSE);
    $this->db->from('detallepedido');
    $this->db->join('pedido', 'pedido.id_pedido = detallepedido.id_pedido');
    $this->db->join('producto', 'producto.id_producto = detallepedido.id_producto', 'full outer');
    $this->db->join('categoria', 'categoria.id_categoria = producto.id_categoria');
    $this->db->group_by('detallepedido.id_producto');
    $this->db->order_by('cantidades','DESC');
    $this->db->limit(10);
    $query = $this->db->get();
    return $query->result();
}

public function reporte_historico_min(){
    $this->db->select('*');
    $this->db->select('sum(detallepedido.cantidad) AS cantidades', FALSE);
    $this->db->select('(producto.precio * sum(detallepedido.cantidad)) AS subtotales', FALSE);
    $this->db->from('detallepedido');
    $this->db->join('pedido', 'pedido.id_pedido = detallepedido.id_pedido');
    $this->db->join('producto', 'producto.id_producto = detallepedido.id_producto', 'full outer');
    $this->db->join('categoria', 'categoria.id_categoria = producto.id_categoria');
    $this->db->group_by('detallepedido.id_producto');
    $this->db->order_by('cantidades','asc');
    $this->db->limit(10);
    $query = $this->db->get();
    return $query->result();
}

public function total_reporte_historico(){
    $this->db->select('*');
    $this->db->select('sum(detallepedido.cantidad) AS cantidades', FALSE);
    $this->db->select('(producto.precio * sum(detallepedido.cantidad)) AS subtotales', FALSE);
    $this->db->from('detallepedido');
    $this->db->join('pedido', 'pedido.id_pedido = detallepedido.id_pedido');
    $this->db->join('producto', 'producto.id_producto = detallepedido.id_producto', 'full outer');
    $this->db->join('categoria', 'categoria.id_categoria = producto.id_categoria');
    $this->db->group_by('detallepedido.id_producto');
    //$this->db->order_by('cantidades','asc');
    //$this->db->limit(10);
    $query = $this->db->get();
    return $query->result();
}

public function reporte_historico_max_categ($categoria){
    $this->db->select('*');
    $this->db->select('sum(detallepedido.cantidad) AS cantidades', FALSE);
    $this->db->select('(producto.precio * sum(detallepedido.cantidad)) AS subtotales', FALSE);
    $this->db->from('detallepedido');
    $this->db->join('pedido', 'pedido.id_pedido = detallepedido.id_pedido');
    $this->db->join('producto', 'producto.id_producto = detallepedido.id_producto', 'full outer');
    $this->db->join('categoria', 'categoria.id_categoria = producto.id_categoria');
    $this->db->where('producto.id_categoria',$categoria);
    $this->db->group_by('detallepedido.id_producto');
    $this->db->order_by('cantidades','DESC');
    $this->db->limit(10);
    $query = $this->db->get();
    return $query->result();
}

public function reporte_historico_min_categ($categoria){
    $this->db->select('*');
    $this->db->select('sum(detallepedido.cantidad) AS cantidades', FALSE);
    $this->db->select('(producto.precio * sum(detallepedido.cantidad)) AS subtotales', FALSE);
    $this->db->from('detallepedido');
    $this->db->join('pedido', 'pedido.id_pedido = detallepedido.id_pedido');
    $this->db->join('producto', 'producto.id_producto = detallepedido.id_producto', 'full outer');
    $this->db->join('categoria', 'categoria.id_categoria = producto.id_categoria');
    $this->db->where('producto.id_categoria',$categoria);
    $this->db->group_by('detallepedido.id_producto');
    $this->db->order_by('cantidades','asc');
    $this->db->limit(10);
    $query = $this->db->get();
    return $query->result();
}

public function reporte_historico_categ($categoria){
  $this->db->select('*');
    $this->db->select('sum(detallepedido.cantidad) AS cantidades', FALSE);
    $this->db->select('(producto.precio * sum(detallepedido.cantidad)) AS subtotales', FALSE);
    $this->db->from('detallepedido');
    $this->db->join('pedido', 'pedido.id_pedido = detallepedido.id_pedido');
    $this->db->join('producto', 'producto.id_producto = detallepedido.id_producto', 'full outer');
    $this->db->join('categoria', 'categoria.id_categoria = producto.id_categoria');
    $this->db->where('producto.id_categoria',$categoria);
    $this->db->group_by('detallepedido.id_producto');
    //$this->db->order_by('cantidades','asc');
    //$this->db->limit(10);
    $query = $this->db->get();
    return $query->result();
}

 public function select_reporte_fecha_max($fecha1,$fecha2)
 {
              $this->db->select('*');
              $this->db->select('sum(detallepedido.cantidad) AS cantidades', FALSE);
              $this->db->select('(producto.precio * sum(detallepedido.cantidad)) AS subtotales', FALSE);
              $this->db->from('detallepedido');
              $this->db->join('pedido', 'pedido.id_pedido = detallepedido.id_pedido');
              $this->db->join('producto', 'producto.id_producto = detallepedido.id_producto', 'full outer');
              $this->db->join('categoria', 'categoria.id_categoria = producto.id_categoria');
              $this->db->where('fecha >=',  $fecha1);
              $this->db->where('fecha <=',  $fecha2);
              $this->db->group_by('detallepedido.id_producto');
              $this->db->order_by('cantidades','DESC');
              $this->db->limit(10);
              $query = $this->db->get();
              return $query->result();
    }
      

 public function select_reporte_fecha_min($fecha1,$fecha2)
 {

              $this->db->select('*');
              $this->db->select('sum(detallepedido.cantidad) AS cantidades', FALSE);
              $this->db->select('(producto.precio * sum(detallepedido.cantidad)) AS subtotales', FALSE);
              $this->db->from('detallepedido');
              $this->db->join('pedido', 'pedido.id_pedido = detallepedido.id_pedido');
              $this->db->join('producto', 'producto.id_producto = detallepedido.id_producto', 'full outer');
              $this->db->join('categoria', 'categoria.id_categoria = producto.id_categoria');
              $this->db->where('fecha >=',  $fecha1);
              $this->db->where('fecha <=',  $fecha2);
              $this->db->group_by('detallepedido.id_producto');
              $this->db->order_by('cantidades','asc');
              $this->db->limit(10);
              $query = $this->db->get();
              return $query->result();
    }

public function select_reporte_fecha($fecha1,$fecha2)
 {

              $this->db->select('*');
              $this->db->select('sum(detallepedido.cantidad) AS cantidades', FALSE);
              $this->db->select('(producto.precio * sum(detallepedido.cantidad)) AS subtotales', FALSE);
              $this->db->from('detallepedido');
              $this->db->join('pedido', 'pedido.id_pedido = detallepedido.id_pedido');
              $this->db->join('producto', 'producto.id_producto = detallepedido.id_producto', 'full outer');
              $this->db->join('categoria', 'categoria.id_categoria = producto.id_categoria');
              $this->db->where('fecha >=',  $fecha1);
              $this->db->where('fecha <=',  $fecha2);
              $this->db->group_by('detallepedido.id_producto');
              //$this->db->order_by('cantidades','asc');
              //$this->db->limit(10);
              $query = $this->db->get();
              return $query->result();
    }

// FIN reporte-------------------------------------------------------
 
public function select_categoria2($categ) {
            $this->db->select('*');
              $this->db->from('producto');
              $this->db->join('categoria', 'categoria.id_categoria =
producto.id_categoria' );
              
               $this->db->where('producto.id_categoria',$categ);
            $query = $this->db->get();
            return $query->result();
}



public function select_detalle(){
              $query = $this->db->get('detallepedido');
            return $query->result();
    }


public function datosOrden($orden)
 {
     $this->db->select('*');
     $this->db->from('ordenpedido');
     $this->db->where('Id_Orden',$orden);
     $query = $this->db->get();
        return $query->result();   
 }


 public function datosDetalle($orden)
 {
     $this->db->select('*');
     $this->db->from('detallepedido');
     $this->db->where('Id_Orden',$orden);
     $query = $this->db->get();
        return $query->result();   
 }


 public function select_productos3()
 {
       $this->db->select('*');
                    $this->db->from('producto');
                    $this->db->where('estado',1);
                    $this->db->where('stock >=',0);
       $query = $this->db->get();
       return $query->result();
 }


 public function select_productosE()
 {
       $this->db->select('*');
       $this->db->from('producto');
       $this->db->join('categoria', 'categoria.id_categoria = producto.id_categoria');
       $query = $this->db->get();
       return $query->result();
 }


 public function select_productosE_mostrar($limit, $row)
 {
                    $this->db->select('*');
                    $this->db->from('producto');
                    $this->db->join('categoria', 'categoria.id_categoria = producto.id_categoria');
                    $this->db->limit($limit,$row);
                    $query = $this->db->get();
                    return $query->result();
 }

  public function select_productosE_categorias($categoria)
 {
       $this->db->select('*');
       $this->db->from('producto');
       $this->db->join('categoria', 'categoria.id_categoria =
               producto.id_categoria');
       $this->db->where('producto.id_categoria', $categoria);
       $query = $this->db->get();
       return $query->result();
 }

   public function select_productosE_categorias_mostrar($limit, $row, $categoria)
 {
       $this->db->select('*');
       $this->db->from('producto');
       $this->db->join('categoria', 'categoria.id_categoria =
               producto.id_categoria');
       $this->db->where('producto.id_categoria', $categoria);
       $this->db->limit($limit,$row);
       $query = $this->db->get();
       return $query->result();
 }



   public function seleccionar_categorias()
 {
       $this->db->select('*');
       $this->db->from('categoria');
       $query = $this->db->get();
       return $query->result();
 }





public function paginas_mostrar($limit, $row)
 {
                    $this->db->select('*');
                    $this->db->from('producto');
                    $this->db->join('categoria', 'categoria.id_categoria =
                    producto.id_categoria');
                    $this->db->limit($limit,$row);
                    $this->db->where('producto.estado',1);
                    $this->db->where('stock >=',0);
            $query = $this->db->get();
             return $query->result();
 }

 public function edicion_mostrar($limit, $row)
 {
                    $this->db->select('*');
                    $this->db->from('producto');
                    $this->db->join('categoria', 'categoria.id_categoria =
                    producto.id_categoria');
                    $this->db->limit($limit,$row);
            $query = $this->db->get();
             return $query->result();
 }

 public function preciome_mostrar($limit, $row)
 {
                    $this->db->select('*');
                    $this->db->from('producto');
                    $this->db->join('categoria', 'categoria.id_categoria =
                    producto.id_categoria');
                    $this->db->limit($limit,$row);
                    $this->db->where('producto.estado',1);
                    $this->db->where('stock >=',0);
                    $this->db->order_by('precio','ASC');
            $query = $this->db->get();
             return $query->result();
 }

  public function precioma_mostrar($limit, $row)
 {
                    $this->db->select('*');
                    $this->db->from('producto');
                    $this->db->join('categoria', 'categoria.id_categoria =
                    producto.id_categoria');
                    $this->db->limit($limit,$row);
                    $this->db->where('producto.estado',1);
                    $this->db->where('stock >=',0);
                    $this->db->order_by('precio','DESC');
            $query = $this->db->get();
             return $query->result();
 }


public function filtro_mostrar($limit, $row, $categ)
 {
                    $this->db->select('*');
                    $this->db->from('producto');
                     $this->db->join('categoria', 'categoria.id_categoria =
producto.id_categoria');
                     
                    $this->db->where('producto.estado',1);
                    $this->db->where('producto.stock >=',0);
                    $this->db->where('producto.id_categoria',$categ);
                     $this->db->limit($limit,$row);
            $query = $this->db->get();
             return $query->result();
 }



 
 public function select_productos(){
              $this->db->select('*');
              $this->db->from('producto');
              $this->db->join('categoria', 'categoria.id_categoria =
producto.id_categoria');
              $query = $this->db->get();
         return $query->result();
    }

 
 public function filtro_select($categ)
 {
                    $this->db->select('*');
                    $this->db->from('producto');
                     $this->db->join('categoria', 'categoria.id_categoria =
producto.id_categoria');
                    $this->db->where('producto.estado',1);
                    $this->db->where('producto.stock >=',0);
                    $this->db->where('producto.id_categoria',$categ);
            $query = $this->db->get();
             return $query->result();
 }





public function select_productosC()
 {
       $this->db->select('*');
                    $this->db->from('producto');
                    $this->db->where('estado',1);
                    $this->db->where('id_categoria',1);
       $query = $this->db->get();
       return $query->result();
 }









}
?>