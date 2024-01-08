<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_controler extends CI_Controller {



   function __construct()
              {
                 parent::__construct();
                 if ($this->session->userdata('login')) {
                   switch ($this->session->userdata('id_perfil')) {
                    case '1':
              // echo $this->session->userdata('nombre');
            
              redirect('Administrador');
              break;
              
            case '2':
              // echo $this->session->userdata('nombre');
              redirect('logueadoControler');
              break;  
                   }

              }
    }


	
	public function catalogos()
	{
       
            $this->load->model('nuevoModelo');

         $this->load->library('pagination');
           $config['base_url'] = base_url().'Productos';
           $config['total_rows'] = count ($this->nuevoModelo->select_productos3());
          
           $config['per_page'] = 8;
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
           $config['last_tag_close'] = '</div>';
         $this->pagination->initialize($config);
         //echo $config['total_rows']; die;

         $page=$this->uri->segment(2);
         //$data['productos'] = $this->libro_model->paginas_mostrar(2, $page);
      $data2 = array(
             //'productos'=> $this->nuevoModelo->select_productos(),
       'productos'=> $this->nuevoModelo->paginas_mostrar(8, $page),
       'categorias' => $this->nuevoModelo->select_categoria()
       );
            $data['title'] = 'Catalogo';
           $this->load->view('plantillas/header',$data);
           $this->load->view('contenidos/productos_view', $data2);
           $this->load->view('plantillas/footer');
           }

	
  public function filtrar_producto()
   {

    $categ= $this->input->post('categoria');
    $this->load->model('nuevoModelo');

         $this->load->library('pagination');
           $config['base_url'] = base_url().'porcategoria';
           $config['total_rows'] = count ($this->nuevoModelo->filtro_select($categ));
          
           $config['per_page'] = 8;
           $config['num_links'] = 3;
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
           $config['last_tag_close'] = '</div>';
         $this->pagination->initialize($config);
         //echo $config['total_rows']; die;

         $page=$this->uri->segment(2);
         //$data['productos'] = $this->libro_model->paginas_mostrar(2, $page);
      $data2 = array(
             //'productos'=> $this->nuevoModelo->select_productos(),
       'productos'=> $this->nuevoModelo->filtro_mostrar(8, $page, $categ),
       'categorias' => $this->nuevoModelo->select_categoria()
       );
            $data['title'] = 'Productos';
           $this->load->view('plantillas/header',$data);
           $this->load->view('contenidos/productos_view', $data2);
           $this->load->view('plantillas/footer');


   }


    public function mayorPrecio()
    {
      $this->load->model('nuevoModelo');

         $this->load->library('pagination');
           $config['base_url'] = base_url().'mayorPrecio';
           $config['total_rows'] = count ($this->nuevoModelo->select_productos());
          
           $config['per_page'] = 8;
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
           $config['last_tag_close'] = '</div>';
         $this->pagination->initialize($config);
         //echo $config['total_rows']; die;

         $page=$this->uri->segment(2);
         //$data['productos'] = $this->libro_model->paginas_mostrar(2, $page);
      $data2 = array(
             //'productos'=> $this->nuevoModelo->select_productos(),
       'productos'=> $this->nuevoModelo->precioma_mostrar(8, $page),
       'categorias' => $this->nuevoModelo->select_categoria()
       );
            $data['title'] = 'Catalogo';
           $this->load->view('plantillas/header',$data);
           $this->load->view('contenidos/productos_view', $data2);
           $this->load->view('plantillas/footer');

    }

    public function menorPrecio()
    {
      $this->load->model('nuevoModelo');

         $this->load->library('pagination');
           $config['base_url'] = base_url().'menorPrecio';
           $config['total_rows'] = count ($this->nuevoModelo->select_productos());
          
           $config['per_page'] = 8;
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
           $config['last_tag_close'] = '</div>';
         $this->pagination->initialize($config);
         //echo $config['total_rows']; die;

         $page=$this->uri->segment(2);
         //$data['productos'] = $this->libro_model->paginas_mostrar(2, $page);
      $data2 = array(
             //'productos'=> $this->nuevoModelo->select_productos(),
       'productos'=> $this->nuevoModelo->preciome_mostrar(8, $page),
       'categorias' => $this->nuevoModelo->select_categoria()
       );
            $data['title'] = 'Catalogo';
           $this->load->view('plantillas/header',$data);
           $this->load->view('contenidos/productos_view', $data2);
           $this->load->view('plantillas/footer');

    }

  


	
}