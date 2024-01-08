
<?php

defined('BASEPATH') OR exit('No direct script access allowed');


       class PedidosControler extends CI_Controller {
                      
                      function __construct() {
                  
                  parent::__construct();
                  if (!($this->session->userdata('login'))) {
                     redirect('Principal');
                   }
                      

                  $this->load->model('nuevoModelo');
                }



   public function guardar_pedido() {
         
       
          $orden_pedido = array(
           'fecha' => date('Y-m-d'),
           'id_usuario' => $this->session->userdata('id_usuario'),
           'direccion' => $this->input->post('direccion'),
           'id_pago' => $this->input->post('pago'),
           'id_envio' => $this->input->post('envio')

          );
          $this->load->model('pedidosModelo');
       $this->pedidosModelo->guardar_orden_pedido($orden_pedido);

           // obtiene el maximo id_orden_pedido ingresado

       $id_pedido = $this->db->insert_id();
            
            if ($cart = $this->cart->contents()):
                
                foreach ($cart as $item):
                  $detalle_pedido = array(
                  'id_pedido' => $id_pedido,
                  'id_producto' => $item['id'],
                  'cantidad' => $item['qty'],
                  'preciodetalle' => $item['price']
                );

               $this->pedidosModelo->guardar_detalle_pedido($detalle_pedido);

               //METODOS PARA PODER ACTUALIZAR EL STOCK DE LA BASE DE DATOS
               $this->load->model('nuevoModelo');
               $productos = $this->nuevoModelo->select_productos_id($item['id']);               
               foreach ($productos as $row) {
                 $data['stock'] = $row->stock - $item['qty'];
                 $data['vendidos'] = $row->vendidos + $item['qty'];
                 
                }

               
               $this->nuevoModelo->actualizar_stock($data, $item['id']);
              
               endforeach;
            endif;
            
            $this->cart->destroy();

          // Mensaje de agradecimiento por la compra
         // Regresar a la página de listado de productos
             $data['title'] = 'Gracias por su compra';
             $this->load->view('plantillas/header-usuario', $data);
         $this->load->view('contenidos/compraRealizada_view');
         $this->load->view('plantillas/footer');
        
   }

 
   public function pedidoFecha() {


   
     $this->load->model('nuevoModelo'); 
     $fecha1 = $this->input->post('fecha1');
      $fecha2 = $this->input->post('fecha2');
     $data['pedidos'] = $this->nuevoModelo->select_orden_fecha($fecha1, $fecha2);
     $data['fecha1'] = $fecha1;
    $data['fecha2'] = $fecha2;
            $dat['title'] = 'Pedidos por Fechas';
           $this->load->view('plantillas/header-admin',$dat);
           $this->load->view('contenidos/listarPedidosAdmin', $data);
           $this->load->view('plantillas/footer-admin');
     
      
   }

   public function pedidoPago() {
   
     $this->load->model('nuevoModelo');

     $categ= $this->input->post('categoria');


         $this->load->library('pagination');
           $config['base_url'] = base_url().'PedidosporPago';
           $config['total_rows'] = count ($this->nuevoModelo->select_orden_pago());
          
           $config['per_page'] = 3;
           $config['num_links'] = 2;
           $config["uri_segment"] = 2;
           $config['first_link'] = 'Primero ';
           $config['prev_link'] = 'Anterior';
           $config['last_link'] = 'Último';
           $config['next_link'] = 'Siguiente';
                 //integración con bootstrap
           $config['full_tag_open'] = '<div class="pagination pagination-lg text-white p-2 m-auto"><h6>';
           $config['full_tag_close'] = '</h6></div>';
           $config['num_tag_open'] = '<div class="btn btn-outline-primary text-white">';
           $config['num_tag_close'] = '</div>';
           $config['cur_tag_open'] = '<div class="active btn btn-outline-primary bg-primary"><span><h5>';
           $config['cur_tag_close'] = '</h5><span ></span></span></div>';
           $config['prev_tag_open'] = '<div class="btn btn-outline-primary">';
           $config['prev_tag_close'] = '</div>';
           $config['next_tag_open'] = '<div class="btn btn-outline-primary">';
           $config['next_tag_close'] = '</div>';
           $config['first_tag_open'] = '<div class="btn btn-outline-primary">';
           $config['first_tag_close'] = '</div>';
           $config['last_tag_open'] = '<div class="btn btn-outline-primary">';
         $this->pagination->initialize($config);
         //echo $config['total_rows']; die;

         $page=$this->uri->segment(2);
         //$data['productos'] = $this->libro_model->paginas_mostrar(2, $page);
      $data2 = array(
             //'productos'=> $this->nuevoModelo->select_productos(),
       'pedidos'=> $this->nuevoModelo->pagos_mostrar(3, $page),
       'categorias' => $this->nuevoModelo->select_categoria()
       );

            $dat['title'] = 'Pedidos por Fechas';
           $this->load->view('plantillas/header-admin',$dat);
           $this->load->view('contenidos/listarPedidosAdmin', $data2);
           $this->load->view('plantillas/footer-admin');
     
      
   }


}