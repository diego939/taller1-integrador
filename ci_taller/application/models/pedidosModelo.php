<?php


class PedidosModelo extends CI_Model {
    function __construct() {
       parent::__construct();
     }



public function guardar_orden_pedido($data) {
     $this->db->insert('pedido', $data);
   }



public function guardar_detalle_pedido($data)
{
$this->db->insert('detallepedido', $data);
}

}