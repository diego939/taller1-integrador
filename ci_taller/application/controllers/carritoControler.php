
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CarritoControler extends CI_Controller {
             function __construct()
              {
                 parent::__construct();
                 if (!($this->session->userdata('login'))) {
                   redirect('Ingresar');
                   }
              }



     public function index() {

        if (!$this->cart->contents()){
        $data['message'] = 'El carrito está vacío!';
        }else{
        $data['message'] = '';
        }
        $dat['title'] = 'Carrito';
        $this->load->view('plantillas/header-usuario', $dat);
        $this->load->view('contenidos/carritoVista', $data);
        $this->load->view('plantillas/footer');
      }

    

     
     public function realizar_pedido(){

       
        if (!$this->cart->contents()){
        $data['message'] = 'Su carrito no tiene productos. Debe agregar productos al carrito para realizar una compra';

        $this->load->view('plantillas/header-usuario');
        $this->load->view('contenidos/carritoVista', $data);
        $this->load->view('plantillas/footer');
        }else{
         $this->load->model('nuevoModelo');
         
         $usuario= $this->session->userdata('id_usuario');
         $data = array(
         'pago' => $this->nuevoModelo->select_pago(),
         'envio' => $this->nuevoModelo->select_envio(),
         'usuario' => $this->nuevoModelo->select_usuario($usuario),
         'direccion' => $this->session->userdata('direccion')
         );
         $dat['title'] = 'Compra';
         $this->load->view('plantillas/header-usuario', $dat);
         $this->load->view('contenidos/confirmarCompra', $data);
         $this->load->view('plantillas/footer');
        
      }
        
      }





     public function agregar_carrito(){
       
 
       $stock= $this->input->post('stock');
       $id = $this->input->post('id');
       
       $cart = $this->cart->contents();
      

       foreach ($cart as $item) {
          if (($id==$item['id']) and ($stock == $item['qty'])) {
               
                redirect('carritoControler/aviso_carrito');             
              }
        }
            $data = array(
                'id' => $this->input->post('id'),
                'img' => $this->input->post('img'),
                'name' => $this->input->post('titulo'),
                'price'=> $this->input->post('precio'),
                'qty' => 1        
             );
             $this->cart->insert($data);
             redirect('Carrito');
       }

       public function aviso_carrito() {

        $data['message'] = 'El producto que intenta agregar no posee el stock suficiente';
     
        $dat['title'] = 'Carrito';
        $this->load->view('plantillas/header-usuario', $dat);
        $this->load->view('contenidos/carritoVista', $data);
        $this->load->view('plantillas/footer');
      }

 

       

     function borrar ($id) {
         if ($id=="all"){
         $this->cart->destroy();
         }else{
         $data = array(
         'rowid' => $id,
         'qty' => 0
          );
       $this->cart->update($data);
        }
       redirect('Carrito');
     }
}