<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ingresar_controler extends CI_Controller {

	function __construct() { 

            parent::__construct(); 
             $this->load->library('session') ;

            if ($this->session->userdata('login')) {
                      if ($this->session->userdata('usuario_estado') != 0){
          switch ($this->session->userdata('id_perfil')) {

          case '1':
            // echo $this->session->userdata('nombre');
          
            redirect('Administrador');
            break;
            
          case '2':
            // echo $this->session->userdata('nombre');
            redirect('logueadoControler');
            break; 

            case '3':
           //echo $this->session->userdata('nombre');
          redirect('super_controler');
          break;

          }
            }else{redirect('bloqueado_controler');}
                }
  }
	

        public function index()
		  {
            $data['title'] = 'Ingresar';
            $this->load->view('plantillas/headering',$data);   
            $this->load->view('contenidos/ingresar_view');
            $this->load->view('plantillas/footer');
      }



		public function iniciar_sesion() {
    
        $this->form_validation->set_rules('usuario', 'Usuario', 'trim');
    $this->form_validation->set_rules('usuario_password', 'Contraseña','trim|callback__valid_login');
    
    //Mensajes en caso de error
    $this->form_validation->set_message('required', 'el campo %s es requerido');
    $this->form_validation->set_message('_valid_login', 'El usuario o contraseña son incorrectos');
    
    //Forma en que muestra los mensajes de error
    //$this->form_validation->set_error_delimiters('<ul><li>', '</li></ul>');
    
    if ($this->form_validation->run() == FALSE)
    { //En caso de que falle la validacion vuelve a cargar la pagina de Login
            $data['title'] = 'Error';
            $this->load->view('plantillas/headering',$data);
            $this->load->view('contenidos/ingresar_view');
            $this->load->view('plantillas/footer');

    }
    else{
      //Pagina que carga despues de loguearse
      //redirect(current_url()); ---> Vuelve a la pagina que estaba antes de loguearse
      if ($this->session->userdata('usuario_estado') != 0){
          switch ($this->session->userdata('id_perfil')) {

      case '1':
        // echo $this->session->userdata('nombre');
      
        redirect('Administrador');
        break;
        
      case '2':
        // echo $this->session->userdata('nombre');
        redirect('logueadoControler');
        break; 

        case '3':
       //echo $this->session->userdata('nombre');
      redirect('super_controler');
      break;

      }
    }else{redirect('bloqueado_controler');}
        }
  }


        function _valid_login($usuario_password)
  { 
    //Se validaron los campos exitosamente. Se valida con la base de datos
    $usuario = $this->input->post('usuario');
    $pass = $this->input->post('usuario_password');

    $contrasenia = base64_encode($pass);

         
    $this->load->model('loginModel'); 

        //Consulta a la base
    $result = $this->loginModel->validarUsuario($usuario, $contrasenia);

    if($result)
    { //Si el resultado es correcto lo asigna a la variable session
      $sess_array = array();
      foreach($result as $row)
      {
        $sess_array = array(
                  'id_usuario' => $row->id_usuario,
                  'nombre' => $row->nombre,
                  'apellido' => $row->apellido, 
                  'email' => $row->email,
                  'contraseña' => $row->contraseña,
                  'id_perfil' => $row->id_perfil,
                  'direccion' => $row->direccion,
                  'telefono' => $row->telefono,
                  'usuario_estado' => $row->usuario_estado,
                  'login' => TRUE
                  );
                  
        $this->session->set_userdata($sess_array);
      }
      return TRUE;
    }
    else  //Sino devuelve que los datos no coinciden
    { 
      $this->form_validation->set_message('check_database', '<div class="alert alert-danger">Usuario o Contraseña invalido</div>');
      return false;
    }
  }
    
    
     function cerrar_sesion(){
      //destruyo la variable de sesión
      $this->session->sess_destroy();
      //direcciono a la página principal
      redirect(base_url('Principal'));   
    } 

}