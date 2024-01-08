
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador_Controler extends CI_Controller {
       
       function __construct()
    			{
        			parent::__construct();
              if (!($this->session->userdata('login'))) {
                  redirect('Ingresar');
                  }
                
          }
    public function index() 
  {
      
    $data['title'] = 'Administrador';
    $this->load->view('plantillas/header-admin',$data);
    $this->load->view('contenidos/administrador_view');
    $this->load->view('plantillas/footer-admin');
  }

//ver lista de usuarios---------------------------------------------------------

  public function ver_los_usuarios(){
    $this->load->model('usuarios_model');
    $this->load->library('pagination');
    $config['base_url'] = base_url().'administrador_controler/ver_los_usuarios';
    $config['total_rows'] = count ($this->usuarios_model->select_usuarios());    
    $config['per_page'] = 4;
    $config['num_links'] = 5;
    $config["uri_segment"] = 3;
    $config['first_link'] = 'Primero ';
    $config['prev_link'] = 'Anterior';
    $config['last_link'] = 'Último' ;
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
    $page=$this->uri->segment(3);
    $data2 = array('usuarios'=> $this->usuarios_model->select_usuarios_mostrar(4, $page),);
    $data['title'] = 'Ver Clientes';
    $this->load->view('plantillas/header-admin',$data);
    $this->load->view('contenidos/administrador_gestionUsuarios_view',$data2);
    $this->load->view('plantillas/footer-admin');   
    }

  /*consultas de usuarios anonimos----------------------------------------*/

  public function consultas_usuarios()
  { 
    $this->load->model('nuevoModelo');
    $this->load->library('pagination');
    $config['base_url'] = base_url().'administrador_controler/consultas_usuarios';
    $config['total_rows'] = count ($this->nuevoModelo->select_consulta());    
    $config['per_page'] = 4;
    $config['num_links'] = 5;
    $config["uri_segment"] = 3;
    $config['first_link'] = 'Primero ';
    $config['prev_link'] = 'Anterior';
    $config['last_link'] = 'Último' ;
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
    $page=$this->uri->segment(3);
    $data2 = array('consultas'=> $this->nuevoModelo->select_consulta_mostrar(4, $page),);
    
          $data['title'] = 'Consultas';
          $this->load->view('plantillas/header-admin',$data);  
          $this->load->view('contenidos/administrador_consultas_view',$data2); 
          $this->load->view('plantillas/footer-admin');
  }

  public function consultas_no_leidas()
  {       
          $this->load->model('nuevoModelo');
          $this->load->library('pagination');
          $config['base_url'] = base_url().'administrador_controler/consultas_no_leidas';
          $config['total_rows'] = count ($this->nuevoModelo->select_consulta_no_leido());    
          $config['per_page'] = 4;
          $config['num_links'] = 5;
          $config["uri_segment"] = 3;
          $config['first_link'] = 'Primero ';
          $config['prev_link'] = 'Anterior';
          $config['last_link'] = 'Último' ;
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
          $page=$this->uri->segment(3);
          $data2 = array('consultas'=> $this->nuevoModelo->select_consulta_no_leido_mostrar(4, $page),);
          
          $data['title'] = 'No Leidas';
          $this->load->view('plantillas/header-admin',$data);  
          $this->load->view('contenidos/administrador_consultas_no_leidas_view',$data2); 
          $this->load->view('plantillas/footer-admin');
  }

  public function consultas_archivadas()
  {       
    $this->load->model('nuevoModelo');
          $this->load->library('pagination');
          $config['base_url'] = base_url().'administrador_controler/consultas_archivadas';
          $config['total_rows'] = count ($this->nuevoModelo->select_consultas_archivo());    
          $config['per_page'] = 4;
          $config['num_links'] = 5;
          $config["uri_segment"] = 3;
          $config['first_link'] = 'Primero ';
          $config['prev_link'] = 'Anterior';
          $config['last_link'] = 'Último' ;
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
          $page=$this->uri->segment(3);
          $data2 = array('consultas'=> $this->nuevoModelo->select_consultas_archivo_mostrar(4, $page),);

          $data['title'] = 'Archivo';
          $this->load->view('plantillas/header-admin',$data);  
          $this->load->view('contenidos/administrador_consultas_archivo_view',$data2); 
          $this->load->view('plantillas/footer-admin');
  }

  public function archivar_consulta($id=NULL){
  $data = array('archivo'=> '0');   
  $this->load->model('nuevoModelo');
  $this->nuevoModelo->actualizar_consulta($data, $id);
  redirect(base_url().'administrador_controler/consultas_archivadas');
  }

  public function desarchivar_consulta($id=NULL){
  $data = array('archivo'=> '1');   
  $this->load->model('nuevoModelo');
  $this->nuevoModelo->actualizar_consulta($data, $id);
  redirect(base_url().'administrador_controler/consultas_archivadas');
  }

    public function visualizar_consulta($id_cons)
  {       
          $this->leer_consulta($id_cons);
          $this->load->model('nuevoModelo');
          $datos['consulta'] =  $this->nuevoModelo->select_esta_consulta($id_cons);
          $data['title'] = 'Ver Consulta';
          $this->load->view('plantillas/header-admin',$data);  
          $this->load->view('contenidos/administrador_ver_consulta',$datos); 
          $this->load->view('plantillas/footer-admin');
  }




public function leido_consulta($id=NULL)
       {
        

              $data = array(
              'leido'=> '0'
            );
                
                $this->load->model('nuevoModelo');
                $this->nuevoModelo->actualizar_consulta($data, $id);
                //redirect('Administrador');
                redirect(base_url().'administrador_controler/consultas_usuarios');
           }
           



   public function leer_consulta($id=NULL)
    {
        
           
           $data = array(
           'leido'=> '1'
           );

       $this->load->model('nuevoModelo');
       $this->nuevoModelo->actualizar_consulta($data, $id);
        }

/*FIN consultas de usuarios anonimos----------------------------------------*/



/*consultas de usuarios Clientes----------------------------------------*/

public function consultas_usuarios_clientes()
  { 
    $this->load->model('nuevoModelo');
    $this->load->library('pagination');
    $config['base_url'] = base_url().'administrador_controler/consultas_usuarios_clientes';
    $config['total_rows'] = count ($this->nuevoModelo->select_consulta_clientes());    
    $config['per_page'] = 4;
    $config['num_links'] = 5;
    $config["uri_segment"] = 3;
    $config['first_link'] = 'Primero ';
    $config['prev_link'] = 'Anterior';
    $config['last_link'] = 'Último' ;
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
    $page=$this->uri->segment(3);
    $data2 = array('consultas'=> $this->nuevoModelo->select_consulta_mostrar_clientes(4, $page),);
    
          $data['title'] = 'Consultas';
          $this->load->view('plantillas/header-admin',$data);  
          $this->load->view('contenidos/administrador_consultas_clientes_view',$data2); 
          $this->load->view('plantillas/footer-admin');
  }

  public function consultas_no_leidas_clientes()
  {       
          $this->load->model('nuevoModelo');
          $this->load->library('pagination');
          $config['base_url'] = base_url().'administrador_controler/consultas_no_leidas_clientes';
          $config['total_rows'] = count ($this->nuevoModelo->select_consulta_no_leido_clientes());    
          $config['per_page'] = 4;
          $config['num_links'] = 5;
          $config["uri_segment"] = 3;
          $config['first_link'] = 'Primero ';
          $config['prev_link'] = 'Anterior';
          $config['last_link'] = 'Último' ;
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
          $page=$this->uri->segment(3);
          $data2 = array('consultas'=> $this->nuevoModelo->select_consulta_no_leido_mostrar_clientes(4, $page),);
          
          $data['title'] = 'No Leidas';
          $this->load->view('plantillas/header-admin',$data);  
          $this->load->view('contenidos/administrador_consultas_no_leidas_clientes_view',$data2); 
          $this->load->view('plantillas/footer-admin');
  }

  public function consultas_archivadas_clientes()
  {       
    $this->load->model('nuevoModelo');
          $this->load->library('pagination');
          $config['base_url'] = base_url().'administrador_controler/consultas_archivadas_clientes';
          $config['total_rows'] = count ($this->nuevoModelo->select_consultas_archivo_clientes());    
          $config['per_page'] = 4;
          $config['num_links'] = 5;
          $config["uri_segment"] = 3;
          $config['first_link'] = 'Primero ';
          $config['prev_link'] = 'Anterior';
          $config['last_link'] = 'Último' ;
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
          $page=$this->uri->segment(3);
          $data2 = array('consultas'=> $this->nuevoModelo->select_consultas_archivo_mostrar_clientes(4, $page),);

          $data['title'] = 'Archivo';
          $this->load->view('plantillas/header-admin',$data);  
          $this->load->view('contenidos/administrador_consultas_archivo_clientes_view',$data2); 
          $this->load->view('plantillas/footer-admin');
  }

  public function archivar_consulta_clientes($id=NULL){
  $data = array('archivo'=> '0');   
  $this->load->model('nuevoModelo');
  $this->nuevoModelo->actualizar_consulta($data, $id);
  redirect(base_url().'administrador_controler/consultas_archivadas_clientes');
  }

  public function desarchivar_consulta_clientes($id=NULL){
  $data = array('archivo'=> '1');   
  $this->load->model('nuevoModelo');
  $this->nuevoModelo->actualizar_consulta($data, $id);
  redirect(base_url().'administrador_controler/consultas_archivadas_clientes');
  }

    public function visualizar_consulta_clientes($id_cons)
  {       
          $this->leer_consulta($id_cons);
          $this->load->model('nuevoModelo');
          $datos['consulta'] =  $this->nuevoModelo->select_esta_consulta_clientes($id_cons);
          $data['title'] = 'Ver Consulta';
          $this->load->view('plantillas/header-admin',$data);  
          $this->load->view('contenidos/administrador_ver_consulta_cliente',$datos); 
          $this->load->view('plantillas/footer-admin');
  }

  public function leido_consulta_clientes($id=NULL)
       {
        

              $data = array(
              'leido'=> '0'
            );
                
                $this->load->model('nuevoModelo');
                $this->nuevoModelo->actualizar_consulta($data, $id);
                redirect(base_url().'administrador_controler/consultas_usuarios_clientes');
           }
           



   public function leer_consulta_clientes($id=NULL)
    {
        
           
           $data = array(
           'leido'=> '1'
           );

       $this->load->model('nuevoModelo');
       $this->nuevoModelo->actualizar_consulta($data, $id);
        }

 public function responderEstaConsulta($id=NULL)
   {
        $this->load->model('nuevoModelo');
        $consulta = $this->nuevoModelo->select_esta_consulta_clientes($id);
        $data['consulta'] = $this->nuevoModelo->select_esta_consulta_clientes($id);
        foreach ($consulta as $row) {
         $data['id_consulta'] = $row->id_consulta;
         $data['respuesta'] = $row->respuesta;
       }
         $data['title'] = 'Responder';
          $this->load->view('plantillas/header-admin',$data);
         $this->load->view('contenidos/admin_consultas_responder_view', $data);
         $this->load->view('plantillas/footer-admin');
       }


public function actualizar_respuesta_consulta($id=NULL)
    {     
        $this->load->model('nuevoModelo');
        $productos = $this->nuevoModelo->select_este_articulo($id);

    $this->form_validation->set_rules('respuesta', 'Respuesta', 'required|trim');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio');

        if ($this->form_validation->run() == FALSE)
        {
        $this->responderEstaConsulta($id);
       } else {


         $data = array(
         'respuesta' => $this->input->post('respuesta')
         );


        $this->load->model('nuevoModelo');
        $this->nuevoModelo->actualizar_consulta($data, $id);
        echo "<script type=\"text/javascript\">
        alert('La Respuesta Se Envio Con Exito');
        window.location =\"http://localhost/ci_taller/administrador_controler/visualizar_consulta_clientes/\"+$id;
      </script>";
        //redirect(base_url('administrador_controler/visualizar_consulta_clientes/'.$id));
      //$this->visualizar_consulta_clientes($id);
        }
       }

/*FIN consultas de usuarios Clientes----------------------------------------*/
      
/*seccion de gestion de productos(algunas funciones se encuentran en el controlador nuevoProducto_ ontroler)*/

  public function nuevo_producto()
  {
          
          $this->load->model('nuevoModelo'); 
          $data['categorias'] = $this->nuevoModelo->select_categoria();
          $data['title'] = 'Agregar Producto';
          $this->load->view('plantillas/header-admin',$data);  
          $this->load->view('contenidos/nuevoProductosView', $data); 
          $this->load->view('plantillas/footer-admin');
          
          
  }


          function select_positivo($num) { 
          // verifica que se selecciono un numero positivo
          if($num < 0 ){ 
          $this->form_validation->set_message('select_positivo', 'Solo se admiten valores Positivos');  
          return false; } else{ return true; } 
          }



          public function registrar_productos() { 
            
          $this->form_validation->set_rules('nombre', 'Nombre del Producto', 'required|trim|is_unique[producto.nombre_producto]');
          $this->form_validation->set_rules('descripcion', 'Descripcion', 'required|trim'); 
          $this->form_validation->set_rules('codigo_producto', 'Codigo Del Producto', 'required|trim|ctype_digit|exact_length[10]|is_unique[producto.codigo_producto]'); 
          $this->form_validation->set_rules('stock', 'Stock', 'required|trim|ctype_digit|integer|callback_select_positivo'); 
          $this->form_validation->set_rules('precio', 'Precio', 'required|trim|numeric|callback_select_positivo'); 
          $this->form_validation->set_rules('categoria', 'Seleccionar una categoria', 'required|trim|callback_select_validate');
          $this->form_validation->set_rules('imagen', 'Seleccionar una imagen', 'callback_validar_imagen|trim');

          //--------------------------------------------

          $this->form_validation->set_message('ctype_digit', 'El %s debe contener solo numeros sin guiones ni comas ni otros caracteres');
          $this->form_validation->set_message('is_unique', 'El %s ya esta registrado');
          $this->form_validation->set_message('exact_length', 'El campo %s debe contar de 10 numeros');
          $this->form_validation->set_message('alpha', 'El %s solo debe contener letras');
          $this->form_validation->set_message('decimal', 'Debe ingresar valores con decimales'); 
          $this->form_validation->set_message('integer', 'El campo %s debe poseer solo numeros enteros'); 
          $this->form_validation->set_message('required', 'El campo %s es obligatorio');
          $this->form_validation->set_message('numeric', 'El campo %s debe ser numerico');


          if ($this->form_validation->run() == FALSE) { 

                   $this->nuevo_producto(); 
                                            } 

            else { 
                     $this->guardar_productos(); 
                                                }
           } 
           

           

        

       function validar_imagen($imagen) { 

        //Verifica que se ingreso una imagen 
        $nombre_imagen = $_FILES['imagen']['name']; //Obtiene el nombre de la imagen 

                if (empty($nombre_imagen)) { 

                  $this->form_validation->set_message('validar_imagen', 'Seleccionar una imagen'); 
                        return false; 
                } 

                else { 
                      return true; 
                   } 


               }

       


        function select_validate($categoria) { 
        // verifica que se selecciono una categoria del libro 

          if($categoria=="ninguno"){ 

            $this->form_validation->set_message('select_validate', 'Seleccione una categoria (obligatorio)');  
            return false; 

          } 

          else{ 
            return true; 
              } 


          }




        function guardar_productos() { 

          

          $config['upload_path'] = 'assets/upload'; 
          $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG'; 
          //$config['remove_spaces'] = TRUE; 
          //$config['encrypt_name']  =TRUE;

          
          $this->load->library('upload', $config);


          if (!$this->upload->do_upload('imagen')) { 

                 echo "<script type=\"text/javascript\">alert('No se pudo cargar el archivo');</script>"; 

                 $this->index();
               }


               

           else {
            $this->load->model('nuevoModelo'); 
            /*$productos = $this->nuevoModelo->select_productos();
                $codigo = 1000000001;
               foreach ($productos as $row) {
                $codigo = $codigo + 1;

                }*/


            $data = array( 
                    
                    'descripcion_producto' => $this->input->post('descripcion'),
                    'nombre_producto' => $this->input->post('nombre'),                            
                    'stock' => $this->input->post('stock'),
                    'precio'=> $this->input->post('precio'),
                    'estado' => 1,   
                    'imagen' => str_replace(" ", "_",$_FILES['imagen']['name']),
                    'id_categoria'=> $this->input->post('categoria'),
                    //'codigo_producto'=> ($codigo)
                    'codigo_producto'=> $this->input->post('codigo_producto')
                    );


            $this->nuevoModelo->guardar_productos($data); 
            //redirect('Administrador'); 
            //redirect(base_url('EditarProductos'));
            echo "<script type=\"text/javascript\">
              alert('El Producto se Agrego con exito');
              window.location =\"http://localhost/ci_taller/nuevoProducto_controler/gestionar_productos\"
            </script>";
             } 
            

       } 


  public function editar_productos()
  {

          $data['title'] = 'Editar Productos';
          $this->load->view('plantillas/header-admin',$data);    
          $this->load->view('contenidos/gestionar_productos_view'); 
          $this->load->view('plantillas/footer-admin');

  }
/* seccion de gestion de categorias---------------------------------------------*/

  public function gestionar_categorias(){


          $this->load->model('nuevoModelo');
            $this->load->library('pagination');
           $config['base_url'] = base_url().'administrador_controler/gestionar_categorias/';
           $config['total_rows'] = count ($this->nuevoModelo->select_categoria());
          
           $config['per_page'] = 4;
           $config['num_links'] = 2;
           $config["uri_segment"] = 3;
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

         $page=$this->uri->segment(3);
          $data = array(
       'categorias'=> $this->nuevoModelo->select_categoria_mostrar(4, $page)
       );
          //$this->load->model('nuevoModelo');
          //$data['categorias'] = $this->nuevoModelo->select_categoria();
          $data['title'] = 'Lista de Categorias';
          $this->load->view('plantillas/header-admin',$data);  
          $this->load->view('contenidos/gestion_categorias_view',$data); 
          $this->load->view('plantillas/footer-admin');
  }


  public function nueva_categoria()
  {
          $this->load->model('nuevoModelo'); 
          $data['categorias'] = $this->nuevoModelo->select_categoria();
          $data['title'] = 'Agregar Categoria';
          $this->load->view('plantillas/header-admin',$data);  
          $this->load->view('contenidos/nuevaCategoria_view',$data); 
          $this->load->view('plantillas/footer-admin');
  }

  public function editar_categoria($id=null){
          $this->load->model('nuevoModelo'); 
          $data['categorias'] = $this->nuevoModelo->select_esta_categoria($id);
          $data['title'] = 'Editar Categoria';
          $this->load->view('plantillas/header-admin',$data);  
          $this->load->view('contenidos/editar_categoria_view',$data); 
          $this->load->view('plantillas/footer-admin');
  }

  public function actualizar_esta_categoria($id)
    {       $this->load->model('nuevoModelo'); 
            $categorias = $this->nuevoModelo->select_esta_categoria($id);
         
            $this->form_validation->set_rules('descripcion', 'Nombre de La Categoria', 'required|trim');



        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        
        foreach ($categorias as $row) {
        if ($this->input->post('descripcion')!= $row->descripcion){
          $this->form_validation->set_rules('descripcion', 'Nombre de La Categoria', 'required|trim|is_unique[categoria.descripcion]');

          $this->form_validation->set_message('required', 'El campo %s es obligatorio');
          $this->form_validation->set_message('is_unique', 'El %s introducido "'.$this->input->post('descripcion').'" ya esta registrado');}

      }
          if ($this->form_validation->run() == FALSE) { 

                   $this->editar_categoria($id); 
                                            } 

            else {

                              
         $data = array(
         'descripcion' => $this->input->post('descripcion'),
         );

        $this->load->model('nuevoModelo');
        $this->nuevoModelo->actualizar_categoria($data, $id);

        redirect('administrador_controler/gestionar_categorias');
       }
    }


/*Pagina de Gestion de Articulos-----------------------------------------------*/

public function gestion_articulos(){
$this->load->model('nuevoModelo');
$this->load->library('pagination');
$config['base_url'] = base_url().'administrador_controler/gestion_articulos/';
$config['total_rows'] = count ($this->nuevoModelo->select_articulos());
$config['per_page'] = 10;
$config['num_links'] = 2;
$config["uri_segment"] = 3;
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
$page=$this->uri->segment(3);
$data = array('articulos'=> $this->nuevoModelo->select_articulos_mostrar(10, $page));

          //$this->load->model('nuevoModelo'); 
          //$data['articulos'] = $this->nuevoModelo->select_articulos();
          $data['title'] = 'Gestion de Articulos';
          $this->load->view('plantillas/header-admin',$data);  
          $this->load->view('contenidos/admin_gestion_articulos_view',$data); 
          $this->load->view('plantillas/footer-admin');
}

 public function nuevo_articulo()
  {
          $data['title'] = 'Publicar Articulo';
          $this->load->view('plantillas/header-admin',$data);  
          $this->load->view('contenidos/admin_nuevo_articulo_view'); 
          $this->load->view('plantillas/footer-admin');
          
          
  }

            public function registrar_articulos() { 
            
          $this->form_validation->set_rules('titulo_articulo', 'Titulo del Articulo', 'required|trim');
          $this->form_validation->set_rules('descripcion_articulo', 'Descripcion', 'required|trim'); 
          $this->form_validation->set_rules('imagen', 'Seleccionar una imagen', 'callback_validar_imagen|trim');

          //--------------------------------------------

          $this->form_validation->set_message('ctype_digit', 'El %s debe contener solo numeros sin guiones ni comas');
          $this->form_validation->set_message('is_unique', 'El %s ya esta registrado');
          $this->form_validation->set_message('alpha', 'El %s solo debe contener letras');
          $this->form_validation->set_message('decimal', 'Debe ingresar valores con decimales'); 
          $this->form_validation->set_message('integer', 'El campo %s debe poseer solo numeros enteros'); 
          $this->form_validation->set_message('required', 'El campo %s es obligatorio'); 


          if ($this->form_validation->run() == FALSE) { 

                   $this->nuevo_articulo(); 
                                            } 

            else { 
                     $this->guardar_articulos(); 
                                                }
           } 


        function guardar_articulos() { 

          

          $config['upload_path'] = 'assets/upload'; 
          $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG'; 
          //$config['remove_spaces'] = TRUE; 
          //$config['encrypt_name']  =TRUE;

          
          $this->load->library('upload', $config);


          if (!$this->upload->do_upload('imagen')) { 

                 echo "<script type=\"text/javascript\">alert('No se pudo cargar el archivo');</script>"; 

                 $this->index();
               }


           else { $data = array( 
                    
          'titulo_articulo' => $this->input->post('titulo_articulo'),
          'descripcion_articulo' => $this->input->post('descripcion_articulo'),                            
          'estado_articulo' => 1, 
          'fecha_articulo' => date('Y-m-d'), 
          'imagen' => str_replace(" ", "_",$_FILES['imagen']['name']),
                     );


            $this->load->model('nuevoModelo'); 
            $this->nuevoModelo->guardar_articulos($data); 
            echo "<script type=\"text/javascript\">
                  alert('El Articulo se Publicó con Exito');
                  window.location =\"http://localhost/ci_taller/administrador_controler/gestion_articulos\"
                </script>";
            //redirect(base_url('administrador_controler/gestion_articulos'));
             } 
            

       } 

public function visualizar_articulo($id){
          $this->load->model('nuevoModelo'); 
          $data['articulos'] = $this->nuevoModelo->select_este_articulo($id);
          $data['title'] = 'Ver Articulo';
          $this->load->view('plantillas/header-admin',$data);  
          $this->load->view('contenidos/admin_ver_este_articulo_view',$data); 
          $this->load->view('plantillas/footer-admin');
}


   public function editar_articulos($id=NULL)
   {
        $this->load->model('nuevoModelo');
        $articulos = $this->nuevoModelo->select_este_articulo($id);
        foreach ($articulos as $row) {
         $data['id_articulo'] = $row->id_articulo;
         $data['titulo_articulo'] = $row->titulo_articulo;
         $data['descripcion_articulo'] = $row->descripcion_articulo;
         $data['imagen']= $row->imagen;
       }
         $data['title'] = 'Editar Articulo';
          $this->load->view('plantillas/header-admin',$data);
         $this->load->view('contenidos/admin_articulos_edicion_view', $data);
         $this->load->view('plantillas/footer-admin');
       }

     public function editar_a_este_articulo($id=NULL)
   {
        $this->load->model('nuevoModelo');
        $articulos = $this->nuevoModelo->select_este_articulo($id);
        foreach ($articulos as $row) {
         $data['id_articulo'] = $row->id_articulo;
         $data['titulo_articulo'] = $row->titulo_articulo;
         $data['descripcion_articulo'] = $row->descripcion_articulo;
         $data['imagen']= $row->imagen;
       }
         $data['title'] = 'Editar Articulo';
          $this->load->view('plantillas/header-admin',$data);
         $this->load->view('contenidos/admin_articulos_edicion_view2', $data);
         $this->load->view('plantillas/footer-admin');
       }
         
   


    public function desactivar_articulos($id=NULL) {

    $data = array('estado_articulo'=> '0');
                
                $this->load->model('nuevoModelo');
                $this->nuevoModelo->actualizar_articulos($data, $id);
                //redirect(base_url('administrador_controler/gestion_articulos'));
                echo "<script type=\"text/javascript\">
                  alert('El Articulo se Desactivó con Exito');
                  window.location =\"http://localhost/ci_taller/administrador_controler/gestion_articulos\"
                </script>";
  }
           
    public function activar_articulos($id=NULL) {

    $data = array('estado_articulo'=> '1');
                
                $this->load->model('nuevoModelo');
                $this->nuevoModelo->actualizar_articulos($data, $id);
                //redirect(base_url('administrador_controler/gestion_articulos'));
                echo "<script type=\"text/javascript\">
                  alert('El Articulo se Activó con Exito');
                  window.location =\"http://localhost/ci_taller/administrador_controler/gestion_articulos\"
                </script>";
  }

      public function desactivar_este_articulo($id=NULL) {

    $data = array('estado_articulo'=> '0');
                
                $this->load->model('nuevoModelo');
                $this->nuevoModelo->actualizar_articulos($data, $id);
                //redirect(base_url('administrador_controler/visualizar_articulo/'.$id));
                echo "<script type=\"text/javascript\">
                  alert('El Articulo se Desactivó con Exito');
                  window.location =\"http://localhost/ci_taller/administrador_controler/visualizar_articulo/\"+$id;
                </script>";
  }
           
    public function activar_este_articulo($id=NULL) {

    $data = array('estado_articulo'=> '1');
                
                $this->load->model('nuevoModelo');
                $this->nuevoModelo->actualizar_articulos($data, $id);
                //redirect(base_url('administrador_controler/visualizar_articulo/'.$id));
                echo "<script type=\"text/javascript\">
                  alert('El Articulo se Activó con Exito');
                  window.location =\"http://localhost/ci_taller/administrador_controler/visualizar_articulo/\"+$id;
                </script>";
  }



   public function actualizar_articulos($id=NULL)
    {     
        $this->load->model('nuevoModelo');
        $productos = $this->nuevoModelo->select_este_articulo($id);

  $this->form_validation->set_rules('titulo_articulo', 'Titulo del Articulo', 'required|trim');
  $this->form_validation->set_rules('descripcion_articulo', 'Descripcion', 'required|trim');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio');

        if ($this->form_validation->run() == FALSE)
        {
        $this->editar_articulos($id);
       } else {

         if ($this->input->post('titulo_articulo')){
          $nom = $this->input->post('titulo_articulo');
         }else{
          $nom = $titulo_articulo;
         }

         if ($this->input->post('descripcion')){
          $desc = $this->input->post('descripcion');
         }

         $data = array(
         'titulo_articulo' => $nom,
         'descripcion_articulo' => $this->input->post('descripcion_articulo'),
         'fecha_articulo' => date('Y-m-d'), 
         );


        $this->load->model('nuevoModelo');
        $this->nuevoModelo->actualizar_articulos($data, $id);
        //redirect(base_url('administrador_controler/gestion_articulos'));
        echo "<script type=\"text/javascript\">
                  alert('El Articulo se Editó con Exito');
                  window.location =\"http://localhost/ci_taller/administrador_controler/gestion_articulos\";
                </script>";
        }
       }

public function actualizar_este_articulo($id=NULL)
    {     
        $this->load->model('nuevoModelo');
        $productos = $this->nuevoModelo->select_este_articulo($id);

  $this->form_validation->set_rules('titulo_articulo', 'Titulo del Articulo', 'required|trim');
  $this->form_validation->set_rules('descripcion_articulo', 'Descripcion', 'required|trim');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio');

        if ($this->form_validation->run() == FALSE)
        {
        $this->editar_a_este_articulo($id);
       } else {

         if ($this->input->post('titulo_articulo')){
          $nom = $this->input->post('titulo_articulo');
         }else{
          $nom = $titulo_articulo;
         }

         if ($this->input->post('descripcion')){
          $desc = $this->input->post('descripcion');
         }

         $data = array(
         'titulo_articulo' => $nom,
         'descripcion_articulo' => $this->input->post('descripcion_articulo'),
         'fecha_articulo' => date('Y-m-d'), 
         );


        $this->load->model('nuevoModelo');
        $this->nuevoModelo->actualizar_articulos($data, $id);
        //redirect(base_url('administrador_controler/visualizar_articulo/'.$id));
        echo "<script type=\"text/javascript\">
                  alert('El Articulo se Editó con Exito');
                  window.location =\"http://localhost/ci_taller/administrador_controler/visualizar_articulo/\"+$id;
                </script>";
        }
       }



public function actualizar_img_art($id=NULL){
        $this->load->model('nuevoModelo');
        $articulos = $this->nuevoModelo->select_este_articulo($id);
        foreach ($articulos as $row) {
         $data['id_articulo'] = $row->id_articulo;
         $data['titulo_articulo'] = $row->titulo_articulo;
         $data['descripcion_articulo'] = $row->descripcion_articulo;
         $data['imagen']= $row->imagen;
       }
         $data['title'] = 'Editar Imagen';
          $this->load->view('plantillas/header-admin',$data);
          $this->load->view('contenidos/imagen_art_editar',$data);
         $this->load->view('plantillas/footer-admin');
}

public function actualizar_img_este_art($id=NULL){
        $this->load->model('nuevoModelo');
        $articulos = $this->nuevoModelo->select_este_articulo($id);
        foreach ($articulos as $row) {
         $data['id_articulo'] = $row->id_articulo;
         $data['titulo_articulo'] = $row->titulo_articulo;
         $data['descripcion_articulo'] = $row->descripcion_articulo;
         $data['imagen']= $row->imagen;
       }
         $data['title'] = 'Editar Imagen';
          $this->load->view('plantillas/header-admin',$data);
          $this->load->view('contenidos/imagen_art_editar2',$data);
         $this->load->view('plantillas/footer-admin');
}

   public function actualizar_imagenes_articulos($id=NULL){
        $this->load->model('nuevoModelo');
        $articulos = $this->nuevoModelo->select_este_articulo($id);
        foreach ($articulos as $row) {
         $data['id_articulo'] = $row->id_articulo;
         $data['titulo_articulo'] = $row->titulo_articulo;
         $data['descripcion_articulo'] = $row->descripcion_articulo;
         $data['imagen']= $row->imagen;
       }

       $this->form_validation->set_rules('imagen', 'Seleccionar una imagen', 'callback_validar_imagen|trim');

            if ($this->form_validation->run() == FALSE)
        {
         $this->actualizar_img_art($id);
        } else {

        

          $config['upload_path'] = 'assets/upload'; 
          $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG'; 
          $config['remove_spaces'] = TRUE; 
          

          
          $this->load->library('upload', $config);

                      if (!$this->upload->do_upload('imagen')) { 

                             echo "<script type=\"text/javascript\">alert('No se pudo cargar el archivo');</script>"; 

                             $this->index();
                           }


                       else {

                      
                    if ($this->input->post('imagen')){
                      $imag = $imagen;
                     }else{
                      $imag = str_replace(" ", "_",$_FILES['imagen']['name']);
                     }

                     $data = array(
                      'imagen' => $imag,
                     );


                    $this->load->model('nuevoModelo');
                    $this->nuevoModelo->actualizar_articulos($data, $id);
                    redirect(base_url("administrador_controler/editar_articulos/".$id));
                  }
       }

   }

public function actualizar_esta_imagen_articulo($id=NULL){
        $this->load->model('nuevoModelo');
        $articulos = $this->nuevoModelo->select_este_articulo($id);
        foreach ($articulos as $row) {
         $data['id_articulo'] = $row->id_articulo;
         $data['titulo_articulo'] = $row->titulo_articulo;
         $data['descripcion_articulo'] = $row->descripcion_articulo;
         $data['imagen']= $row->imagen;
       }

       $this->form_validation->set_rules('imagen', 'Seleccionar una imagen', 'callback_validar_imagen|trim');

            if ($this->form_validation->run() == FALSE)
        {
         $this->actualizar_esta_imagen_articulo($id);
        } else {

        

          $config['upload_path'] = 'assets/upload'; 
          $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG'; 
          $config['remove_spaces'] = TRUE; 
          

          
          $this->load->library('upload', $config);

                      if (!$this->upload->do_upload('imagen')) { 

                             echo "<script type=\"text/javascript\">alert('No se pudo cargar el archivo');</script>"; 

                             $this->index();
                           }


                       else {

                      
                    if ($this->input->post('imagen')){
                      $imag = $imagen;
                     }else{
                      $imag = str_replace(" ", "_",$_FILES['imagen']['name']);
                     }

                     $data = array(
                      'imagen' => $imag,
                     );


                    $this->load->model('nuevoModelo');
                    $this->nuevoModelo->actualizar_articulos($data, $id);
                    redirect(base_url("administrador_controler/editar_a_este_articulo/".$id));
                  }
       }

   }

public function confirmar_eliminacion_articulo($id){
    $this->load->model('nuevoModelo');
    $data['articulos'] = $this->nuevoModelo->select_este_articulo($id);
    $data['title'] = 'Eliminar Articulo';
    $this->load->view('plantillas/header-admin',$data);  
    $this->load->view('contenidos/admin_eliminar_este_articulo_view',$data); 
    $this->load->view('plantillas/footer-admin');
    }

public function delete_articulo($id){
    $this->load->model('nuevoModelo');
    $this->nuevoModelo->select_articulo_delete($id);
    redirect(base_url("administrador_controler/gestion_articulos"));
    }

/*Fin Pagina de Gestion de Articulos-------------------------------------------*/
  
  public function Catalogos() {
       
            $this->load->model('nuevoModelo');

         $this->load->library('pagination');
           $config['base_url'] = base_url().'LogueadoControler/Catalogos/';
           $config['total_rows'] = count ($this->nuevoModelo->select_productos3());
          
           $config['per_page'] = 4;
           $config['num_links'] = 2;
           $config["uri_segment"] = 3;
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

         $page=$this->uri->segment(3);
         //$data['productos'] = $this->libro_model->paginas_mostrar(2, $page);
      $data2 = array(
             //'productos'=> $this->nuevoModelo->select_productos(),
       'productos'=> $this->nuevoModelo->paginas_mostrar(4, $page),
       'categorias' => $this->nuevoModelo->select_categoria()
       );
           $this->load->view('plantillas/header-admin');
           $this->load->view('VistasAdmin/listar_productos_view', $data2);
           $this->load->view('plantillas/footer-admin');
           }
   

   
public function adminCatalogos() {
 
           $this->load->model('nuevoModelo');

           $this->load->library('pagination');
           $config['base_url'] = base_url().'administrador_controler/adminCatalogos';
           $config['total_rows'] = count ($this->nuevoModelo->select_productos3());
           
           $config['per_page'] = 4;
           $config['num_links'] = 5;
           $config["uri_segment"] = 3;
           $config['first_link'] = 'Primero ';
           $config['prev_link'] = 'Anterior';
           $config['last_link'] = 'Último' ;
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

         $page=$this->uri->segment(3);
            $data2 = array(
             'productos'=> $this->nuevoModelo->paginas_mostrar(4, $page),
             'categorias' => $this->nuevoModelo->select_categoria()
            );
           $this->load->view('plantillas/header-admin');
           $this->load->view('contenidos/listarProductosAdmin', $data2);
           $this->load->view('plantillas/footer-admin');
           }
   
      



public function listarInactivos() {
     
           $this->load->model('nuevoModelo');
            $data2 = array(
             'productos'=> $this->nuevoModelo->select_productos(),
             'categorias' => $this->nuevoModelo->select_categoria()
            );
           
           $this->load->view('plantillas/header');
           $this->load->view('plantillas/navegarAdmin');
           $this->load->view('VistasAdmin/productosInactivos', $data2);
           $this->load->view('plantillas/footer');
}


 public function buscarAdmin() {
   
     $this->load->model('nuevoModelo'); 
     $categ = $this->input->post('categoria');
           $data2 = array(
             'productos'=> $this->nuevoModelo->select_categoria2($categ),
             'categorias' => $this->nuevoModelo->select_categoria()

            );

           $this->load->view('plantillas/header-admin');
           $this->load->view('contenidos/listarProductosAdmin', $data2);
           $this->load->view('plantillas/footer-admin');
  }
 

//Pagina de pedidos----------------------------------------------------------------

  public function adminPedidos() {

          $this->load->model('nuevoModelo');
          $this->load->library('pagination');
           $config['base_url'] = base_url().'administrador_controler/adminPedidos';
           $config['total_rows'] = count ($this->nuevoModelo->select_orden());
           
           $config['per_page'] = 4;
           $config['num_links'] = 5;
           $config["uri_segment"] = 3;
           $config['first_link'] = 'Primero ';
           $config['prev_link'] = 'Anterior';
           $config['last_link'] = 'Último' ;
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

         $page=$this->uri->segment(3);
            $data2 = array(
             'pedidos'=> $this->nuevoModelo->pedidos_mostrar(4, $page),

            );
             $data['title'] = 'Pedidos';
          $this->load->view('plantillas/header-admin',$data);  
           $this->load->view('contenidos/listarPedidosAdmin', $data2);
           $this->load->view('plantillas/footer-admin');

          
  }


  public function adminPedidos_archivados() {

          $this->load->model('nuevoModelo');
          $this->load->library('pagination');
           $config['base_url'] = base_url().'administrador_controler/adminPedidos_archivados';
           $config['total_rows'] = count ($this->nuevoModelo->select_orden_archivado());
           
           $config['per_page'] = 4;
           $config['num_links'] = 5;
           $config["uri_segment"] = 3;
           $config['first_link'] = 'Primero ';
           $config['prev_link'] = 'Anterior';
           $config['last_link'] = 'Último' ;
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

         $page=$this->uri->segment(3);
            $data2 = array(
             'pedidos'=> $this->nuevoModelo->pedidos_mostrar_archivado(4, $page),

            );
             $data['title'] = 'Pedidos Archivados';
          $this->load->view('plantillas/header-admin',$data);  
           $this->load->view('contenidos/listarPedidosAdmin', $data2);
           $this->load->view('plantillas/footer-admin');

          
  }

           public function reportesVentas() {
 
           $this->load->model('nuevoModelo');
           $data['vendidos'] = $this->nuevoModelo->reporte_historico_max();
           $data['vendidosmin'] = $this->nuevoModelo->reporte_historico_min();
           $data['categorias'] = $this->nuevoModelo->seleccionar_categorias();
           $data['totalr'] = $this->nuevoModelo->total_reporte_historico();
           $data['title'] = 'Reportes';
            $this->load->view('plantillas/header-admin',$data);  
           $this->load->view('contenidos/reportesVentas_view', $data);
           $this->load->view('plantillas/footer-admin');
           }

           public function reportesVentas_categ($categoria) {
 
           $this->load->model('nuevoModelo');
           $data['categorias'] = $this->nuevoModelo->seleccionar_categorias();
           $data['vendidos'] = $this->nuevoModelo->reporte_historico_max_categ($categoria);
           $data['vendidosmin'] = $this->nuevoModelo->reporte_historico_min_categ($categoria);
           $data['totalr'] = $this->nuevoModelo->reporte_historico_categ($categoria);
           //$data['vendidos'] = $this->nuevoModelo->reporte_historico_max();
           //$data['vendidosmin'] = $this->nuevoModelo->reporte_historico_min();
           $data['title'] = 'Reportes Por Categoria';
            $this->load->view('plantillas/header-admin',$data);  
           $this->load->view('contenidos/reportesVentas_view', $data);
           $this->load->view('plantillas/footer-admin');
           }

           public function reportes_por_fecha() {
 
           $this->load->model('nuevoModelo');
           $fecha1 = $this->input->post('fecha1');
            $fecha2 = $this->input->post('fecha2');
           $data['vendidos'] = $this->nuevoModelo->select_reporte_fecha_max($fecha1,$fecha2);
           $data['vendidosmin'] = $this->nuevoModelo->select_reporte_fecha_min($fecha1,$fecha2);
           $data['totalr'] = $this->nuevoModelo->select_reporte_fecha($fecha1,$fecha2);
           $data['categorias'] = $this->nuevoModelo->seleccionar_categorias();
           $data['title'] = 'Reportes Por Fecha';
            $this->load->view('plantillas/header-admin',$data);  
           $this->load->view('contenidos/reportesVentas_view', $data);
           $this->load->view('plantillas/footer-admin');
           }
  
public function pedidosDetalles($id=NULL) {

// INICIO libreria QR ---------------------------------------------------
        $this->load->library('ciqrcode');
        $params['data'] = $id;
        $params['level'] = 'H';
        $params['size'] = 10;

        //decimos el directorio a guardar el codigo qr, en este 
        //caso una carpeta en la raíz llamada qrcode
        $params['savename'] = FCPATH . "assets/upload/qr_code/qr_$id.png";
        //generamos el código qr
        $this->ciqrcode->generate($params);

        $data['img'] = "qr_$id.png";
// Fin libreria QR -------------------------------------------------------
    


           $this->load->model('nuevoModelo');         
            $data['detalle'] =  $this->nuevoModelo->select_detalle_id($id);
            $data['cabecera'] =  $this->nuevoModelo->select_cabecera($id);
            $data['title'] = 'Detalles';
          $this->load->view('plantillas/header-admin',$data);  
           $this->load->view('contenidos/listarPedidosDetalles', $data);
           $this->load->view('plantillas/footer-admin');

        /*$dato = [];
        $pdfFilePath = "cipdf_".$id.".pdf";
        $this->load->library('M_pdf');
        $mpdf = new mPDF('c', 'A4-L'); 
        $mpdf->WriteHTML($this->load->view('contenidos/listarPedidosDetalles', $dato,true));
        $mpdf->Output($pdfFilePath, "D"); */
           }


function descargar_pdf($id=NULL){
        $this->archivar_pedido_impreso($id);
// INICIO libreria QR ---------------------------------------------------
        $this->load->library('ciqrcode');
        $params['data'] = $id;
        $params['level'] = 'H';
        $params['size'] = 10;

        //decimos el directorio a guardar el codigo qr, en este 
        //caso una carpeta en la raíz llamada qrcode
        $params['savename'] = FCPATH . "assets/upload/qr_code/qr_$id.png";
        //generamos el código qr
        $this->ciqrcode->generate($params);

        $data['img'] = "qr_$id.png";
// Fin libreria QR -------------------------------------------------------
    


           $this->load->model('nuevoModelo');         
            $data['detalle'] =  $this->nuevoModelo->select_detalle_id($id);
            $data['cabecera'] =  $this->nuevoModelo->select_cabecera($id);
            $data['title'] = 'Detalles';
          $this->load->view('plantillas/header-admin',$data);  
           $this->load->view('contenidos/imprimirPedidoDetalle', $data);
           $this->load->view('plantillas/footer-admin');

        $dato = [];
        $pdfFilePath = "cipdf_".$id.".pdf";
        $this->load->library('M_pdf');
        $mpdf = new mPDF('c', 'A4-L'); 
        $mpdf->WriteHTML($this->load->view('contenidos/imprimirPedidoDetalle', $dato,true));
        $mpdf->Output($pdfFilePath, "D"); 
}


   public function archivar_pedido($id=NULL)
    {
           $data = array(
           'archivar_pedido'=> '1'
           );

       $this->load->model('nuevoModelo');
       $this->nuevoModelo->actualizar_pedido($data, $id);
       redirect(base_url().'administrador_controler/adminPedidos_archivados');
    }

       public function archivar_pedido_impreso($id=NULL)
    {
           $data = array(
           'archivar_pedido'=> '1'
           );

       $this->load->model('nuevoModelo');
       $this->nuevoModelo->actualizar_pedido($data, $id);
    }


       public function quitar_pedido_archivo($id=NULL)
    {
           $data = array(
           'archivar_pedido'=> '0'
           );

       $this->load->model('nuevoModelo');
       $this->nuevoModelo->actualizar_pedido($data, $id);
       redirect(base_url().'administrador_controler/adminPedidos_archivados');
    }
//pagina del perfil--------------------------------------------------------------

    public function ver_perfil() {
    $data['title'] = 'Mis Datos';
    $this->load->view('plantillas/header-admin',$data);
    $this->load->view('contenidos/administrador_mis_datos_view',$data);
    $this->load->view('plantillas/footer-admin');  
    }

    public function editar_contra(){
    $dat['id_usuario'] =$this->session->userdata('id_usuario');
    $dat['nombre'] = $this->session->userdata('nombre');
    $dat['apellido'] = $this->session->userdata('apellido');
    $dat['direccion'] = $this->session->userdata('direccion');
    $dat['telefono'] = $this->session->userdata('telefono');
    $dat['email']= $this->session->userdata('email');
    $dat['pass']= base64_decode($this->session->userdata('contraseña'));
    $data['title'] = 'Editar Contraseña';
    $this->load->view('plantillas/header-admin',$data);
    $this->load->view('contenidos/administrador_edicionContra_view',$dat);
    $this->load->view('plantillas/footer-admin');
   }

    public function editar_datos(){
    $dat['id_usuario'] =$this->session->userdata('id_usuario');
    $dat['nombre'] = $this->session->userdata('nombre');
    $dat['apellido'] = $this->session->userdata('apellido');
    $dat['direccion'] = $this->session->userdata('direccion');
    $dat['telefono'] = $this->session->userdata('telefono');
    $dat['email']= $this->session->userdata('email');
    //$dat['pass']= base64_decode($this->session->userdata('contraseña'));
    $data['title'] = 'Editar Datos';
    $this->load->view('plantillas/header-admin',$data);
    $this->load->view('contenidos/administrador_edicionPerfil_view',$dat);
    $this->load->view('plantillas/footer-admin');
   }

   public function actualizar_usuario_contra($id_usuario){
    $this->form_validation->set_rules('contraseñaant', 'Contraseña Anterior', 'callback_contraseña_anterior');
    $this->form_validation->set_rules('contraseña', 'Contraseña', 'min_length[6]|trim|required');
    $this->form_validation->set_rules('password2', 'Repita Contraseña', 'trim|required|matches[contraseña]');

    $this->form_validation->set_message('required', 'El campo %s es obligatorio');
    $this->form_validation->set_message('matches', 'Las contraseñas no coinciden');
    $this->form_validation->set_message('min_length', 'El campo %s debe tener al menos 6 caracteres');
    $this->form_validation->set_message('max_length', 'El %s debe tener un máximo de 12 caracteres');

    if ($this->form_validation->run() == FALSE) { 

                   $this->editar_contra($id_usuario); 
                                            }
    else {
    $password = base64_encode($this->input->post('contraseña'));
    $data = array('contraseña' => $password);
    $this->session->set_userdata($data);
    $this->load->model('nuevoModelo');
    $this->nuevoModelo->actualizar_usuario($data, $id_usuario);
    //redirect('administrador_controler/ver_perfil');
    echo "<script type=\"text/javascript\">alert('La contraseña Se Editó con Exito !');</script>";
    $this->ver_perfil();
    }
    }

    public function contraseña_anterior($contraseñaant){
       if ($this->input->post('contraseñaant') != base64_decode($this->session->userdata('contraseña'))) 
       { 

            $this->form_validation->set_message('contraseña_anterior', 'Su contraseña Anterior Es incorrecta');  
            return false; 

        }else{ 
            return true; 
        } 
    }

   public function actualizar_usuario($id_usuario)
    {
         
            $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim');
            $this->form_validation->set_rules('apellido', 'Apellido', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('telefono', 'Telefono', 'ctype_digit|required|trim');
            $this->form_validation->set_rules('direccion', 'Dirección', 'trim|required');


        $this->form_validation->set_message('ctype_digit', 'El %s debe contener solo numeros');
        $this->form_validation->set_message('alpha', 'El %s solo debe contener letras');
        $this->form_validation->set_message('numeric', 'El %s solo debe contener numeros');
        $this->form_validation->set_message('is_unique', 'El %s introducido ya esta registrado');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('valid_email', 'El campo %s debe ser un correo valido');
        $this->form_validation->set_message('matches', 'Las contraseñas no coinciden');
        $this->form_validation->set_message('min_length', 'El campo %s debe tener al menos 6 caracteres');
        $this->form_validation->set_message('max_length', 'El %s debe tener un máximo de 12 caracteres');
        
        if ($this->input->post('email')!= $this->session->userdata('email')){
          $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[usuario.email]|valid_email');
          $this->form_validation->set_message('required', 'El campo %s es obligatorio');
          $this->form_validation->set_message('valid_email', 'El campo %s debe ser un correo valido');
          $this->form_validation->set_message('is_unique', 'El %s introducido "'.$this->input->post('email').'" ya esta registrado');}

          if ($this->input->post('telefono')!= $this->session->userdata('telefono')){
          $this->form_validation->set_rules('telefono', 'Telefono', 'ctype_digit|required|trim|is_unique[usuario.telefono]');
          $this->form_validation->set_message('required', 'El campo %s es obligatorio');
          $this->form_validation->set_message('ctype_digit', 'El %s debe contener solo numeros');
          $this->form_validation->set_message('is_unique', 'El %s introducido "'.$this->input->post('telefono').'" ya esta registrado');}

          if ($this->form_validation->run() == FALSE) { 

                   $this->editar_datos($id_usuario); 
                                            } 

            else {

        /* if (isset($_POST['password']))
        {
          $pass = $this->input->post('password');

                  $contrasenia = base64_encode($pass);
        }else{
          $contrasenia = $pass;
        }*/
                              
         
        if (($this->session->userdata('nombre') != $this->input->post('nombre'))or($this->session->userdata('apellido') != $this->input->post('apellido'))or($this->session->userdata('email') != $this->input->post('email'))or($this->session->userdata('direccion') != $this->input->post('direccion'))or($this->session->userdata('telefono')) != $this->input->post('telefono'))
        {
        $data = array(
         'nombre' => $this->input->post('nombre'),
         'apellido'=> $this->input->post('apellido'),
         'email' => $this->input->post('email'), 
         'direccion'=> $this->input->post('direccion'),
         'telefono' => $this->input->post('telefono'), 
         //'contraseña' => $contrasenia,


         );

        $this->session->set_userdata($data);
        $this->load->model('nuevoModelo');
        $this->nuevoModelo->actualizar_usuario($data, $id_usuario);

        //redirect('administrador_controler/ver_perfil');
        echo "<script type=\"text/javascript\">
                  alert('Datos Guardados');
                  window.location =\"http://localhost/ci_taller/administrador_controler/ver_perfil\";
                </script>";
        } else {
        echo "<script type=\"text/javascript\">
                  alert('No se Realizaron cambios');
                  window.location =\"http://localhost/ci_taller/administrador_controler/ver_perfil\";
                </script>";
        }
       }
    }


 function cerrar_sesion(){
      //destruyo la variable de sesión
      $this->session->sess_destroy();
      //direcciono a la página principal
      redirect(base_url('Principal'));   
    } 


   


}