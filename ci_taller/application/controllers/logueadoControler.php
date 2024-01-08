

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogueadoControler extends CI_Controller {
       
      function __construct()
          {
              parent::__construct();
              if (!($this->session->userdata('login')))
               {
                  redirect('Principal');
                  }
                
          }


  public function index()
  {
    $this->load->model('nuevoModelo');
    $data['articulos'] = $this->nuevoModelo->mostrar_articulos_usuario();
    $data['title'] = 'Bienvenido';
    $this->load->view('plantillas/header-usuario',$data);
    $this->load->view('contenidos/principallog_view',$data);
    $this->load->view('plantillas/footer');
    
  }

  public function comercializacionlog()
  {
    $data['title'] = 'Comercializacion';
    $this->load->view('plantillas/header-usuario',$data);
    $this->load->view('contenidos/comercializacion_view');
    $this->load->view('plantillas/footer');
  }


  public function somoslog()
  {
    $data['title'] = 'Quienes Somos';
    $this->load->view('plantillas/header-usuario',$data);
    $this->load->view('contenidos/quienes_somos_view');
    $this->load->view('plantillas/footer');
  }
   

   public function Perfil()
  {
    $data['title'] = 'Mis Datos';
    $this->load->view('plantillas/header-usuario',$data);
    $this->load->view('contenidos/mis_datos');
    $this->load->view('plantillas/footer');
  }
   
   public function Editar_datos()
   {

    $dat['id_usuario'] =$this->session->userdata('id_usuario');
    $dat['nombre'] = $this->session->userdata('nombre');
    $dat['apellido'] = $this->session->userdata('apellido');
    $dat['direccion'] = $this->session->userdata('direccion');
    $dat['telefono'] = $this->session->userdata('telefono');
    $dat['email']= $this->session->userdata('email');
    $dat['pass']= base64_decode($this->session->userdata('contraseña'));
    $data['title'] = 'EditarDatos';
    $this->load->view('plantillas/header-usuario',$data);
    $this->load->view('contenidos/edicionPerfil_view',$dat);
    $this->load->view('plantillas/footer');

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

                   $this->Editar_datos($id_usuario); 
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

        //redirect('logueadoControler/Perfil');
        echo "<script type=\"text/javascript\">
                  alert('Datos Guardados');
                  window.location =\"http://localhost/ci_taller/logueadoControler/Perfil\";
                </script>";
        } else {
        echo "<script type=\"text/javascript\">
                  alert('No se Realizaron cambios');
                  window.location =\"http://localhost/ci_taller/logueadoControler/Perfil\";
                </script>";
        }
       }
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
    $this->load->view('plantillas/header-usuario',$data);
    $this->load->view('contenidos/edicionContra_view',$dat);
    $this->load->view('plantillas/footer');
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
    //redirect('logueadoControler/Perfil');
    echo "<script type=\"text/javascript\">alert('La contraseña Se Editó con Exito !');</script>";
    $this->Perfil();
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



   public function filtrar_producto()
   {

    $categ= $this->input->post('categoria');
    $this->load->model('nuevoModelo');

         $this->load->library('pagination');
           $config['base_url'] = base_url().'porCategoria';
           $config['total_rows'] = count ($this->nuevoModelo->filtro_select($categ));
          
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
       'productos'=> $this->nuevoModelo->filtro_mostrar(8, $page, $categ),
       'categorias' => $this->nuevoModelo->select_categoria()
       );
            $data['title'] = 'Productos';
           $this->load->view('plantillas/header-usuario',$data);
           $this->load->view('contenidos/productos_view', $data2);
           $this->load->view('plantillas/footer');


   }
  



  public function catalogos() {
       
            $this->load->model('nuevoModelo');

         $this->load->library('pagination');
           $config['base_url'] = base_url().'Catalogo';
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
           $this->load->view('plantillas/header-usuario',$data);
           $this->load->view('contenidos/productos_view', $data2);
           $this->load->view('plantillas/footer');
           }


            



           public function novedadeslog()
  {
    $data['title'] = 'Novedades';
    $this->load->view('plantillas/header-usuario',$data);
    $this->load->view('contenidos/novedades_view');
    $this->load->view('plantillas/footer');
  }

  public function contactolog()
  {
    $data['title'] = 'Contacto';
    $this->load->view('plantillas/header-usuario',$data);
    $this->load->view('contenidos/contacto_log_view');
    $this->load->view('plantillas/footer');
  }

  function registrar_consulta()  {       
     /*$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required'); 
     $this->form_validation->set_rules('apellido', 'Apellido', 'trim|required');      
     $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');*/
     $this->form_validation->set_rules('ciudad', 'Ciudad', 'trim|required'); 
     $this->form_validation->set_rules('provincia', 'Provincia', 'trim|required');
     $this->form_validation->set_rules('asunto', 'Asunto', 'trim|required');
     $this->form_validation->set_rules('mensaje', 'Provincia', 'trim|required');
     


     $this->form_validation->set_message('valid_email', 'El campo %s debe ser un mail válido');

     $this->form_validation->set_message('required', 'El campo %s es obligatorio'); 

            if ($this->form_validation->run() == FALSE) {
                            echo "<script type=\"text/javascript\">alert('Errores En El Formulario de Consulta');</script>"; 
                            $this->contactolog();

        }            else {

                            $this->insertar_mensaje();


            
                          }


  }
  


    public function insertar_mensaje()
    {

      $data = array(
        'nombre' => ucfirst($this->session->userdata('nombre')),
        'apellido' => ucfirst($this->session->userdata('apellido')),
        'email' => $this->session->userdata('email'),
        'ciudad' => ucfirst($this->input->post('ciudad')),
        'provincia' => ucfirst($this->input->post('provincia')),
        'asunto' => ucfirst($this->input->post('asunto')),
        'mensaje' => ucfirst($this->input->post('mensaje')),
        'id_usuario'=>$this->session->userdata('id_usuario')
      );


            $this->load->model('usuarios_model'); 
            $this->usuarios_model->guardar_consulta($data); 
            echo "<script type=\"text/javascript\">
            alert('Su Consulta se envio con exito');
            window.location =\"http://localhost/ci_taller/logueadoControler/mis_consultas\";
              </script>"; 
            //redirect(base_url('logueadoControler/contactolog'));
            //$this->contactolog();

               
    }
   


 function cerrar_sesion(){
      //destruyo la variable de sesión
      $this->session->sess_destroy();
      //direcciono a la página principal
      redirect(base_url('Principal'));   
    } 

    public function mayorPrecio()
    {
      $this->load->model('nuevoModelo');

         $this->load->library('pagination');
           $config['base_url'] = base_url().'MayorPrecio';
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
       'productos'=> $this->nuevoModelo->precioma_mostrar(8, $page),
       'categorias' => $this->nuevoModelo->select_categoria()
       );
            $data['title'] = 'Catalogo';
           $this->load->view('plantillas/header-usuario',$data);
           $this->load->view('contenidos/productos_view', $data2);
           $this->load->view('plantillas/footer');

    }

    public function menorPrecio()
    {
      $this->load->model('nuevoModelo');

         $this->load->library('pagination');
           $config['base_url'] = base_url().'MenorPrecio';
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
       'productos'=> $this->nuevoModelo->preciome_mostrar(8, $page),
       'categorias' => $this->nuevoModelo->select_categoria()
       );
            $data['title'] = 'Catalogo';
           $this->load->view('plantillas/header-usuario',$data);
           $this->load->view('contenidos/productos_view', $data2);
           $this->load->view('plantillas/footer');

    }

 public function somos()
  {
    $data['title'] = 'Quienes Somos';
    $this->load->view('plantillas/header-usuario',$data);
    $this->load->view('contenidos/quienes_somos_view');
    $this->load->view('plantillas/footer');
  }

  public function historia()
  {
    $data['title'] = 'Historia';
    $this->load->view('plantillas/header-usuario',$data);
    $this->load->view('contenidos/historia_view');
    $this->load->view('plantillas/footer');
  }

  public function mision()
  {
    $data['title'] = 'Mision';
    $this->load->view('plantillas/header-usuario',$data);
    $this->load->view('contenidos/mision_view');
    $this->load->view('plantillas/footer');
  }

  public function mis_consultas() 
  {
    $id = $this->session->userdata('id_usuario');
    $this->load->model('nuevoModelo');  
    $data['title'] = 'Mis Consultas';
    $datos['consultas'] =  $this->nuevoModelo->select_consulta_por_cliente($id);
    $this->load->view('plantillas/header-usuario',$data);
    $this->load->view('contenidos/ver_consultas_log_view',$datos);
    $this->load->view('plantillas/footer');
  } 

  public function mis_pedidos() 
  {
          $this->load->model('nuevoModelo');
          $id = $this->session->userdata('id_usuario');
          $this->load->library('pagination');
           $config['base_url'] = base_url().'logueadoControler/mis_pedidos';
           $config['total_rows'] = count ($this->nuevoModelo->select_pedidos_por_cliente($id));

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
          $datos = array(
          'pedidos'=> $this->nuevoModelo->select_pedidos_por_cliente_mostrar(4, $page,$id),
       );
    //$this->load->model('nuevoModelo');  
    $data['title'] = 'Mis Pedidos';
    //$datos['pedidos'] =  $this->nuevoModelo->select_pedidos_por_cliente($id);
    $this->load->view('plantillas/header-usuario',$data);
    $this->load->view('contenidos/listarPedidosCliente',$datos);
    $this->load->view('plantillas/footer');
  } 

  public function mis_pedidos_porfecha() {


   
     $this->load->model('nuevoModelo');
     $id =  $this->session->userdata('id_usuario');
     $fecha1 = $this->input->post('fecha1');
      $fecha2 = $this->input->post('fecha2');
     $data['pedidos'] = $this->nuevoModelo->select_pedidos_por_cliente_fecha($id, $fecha1, $fecha2);
     $data['fecha1'] = $fecha1;
    $data['fecha2'] = $fecha2;
            $dat['title'] = 'Pedidos por Fechas';
           $this->load->view('plantillas/header-usuario',$dat);
           $this->load->view('contenidos/listarPedidosCliente', $data);
           $this->load->view('plantillas/footer');
     
      
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
            $data['title'] = 'Detalle del Pedido';
          $this->load->view('plantillas/header-usuario',$data);  
           $this->load->view('contenidos/listarPedidosDetallesClientes', $data);
           $this->load->view('plantillas/footer');
           } 

}