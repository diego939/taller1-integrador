<?php
/**
  * @author      Duete, Juan Pablo
*/



defined('BASEPATH') OR exit('No direct script access allowed');

class Registrarse_controler extends CI_Controller {

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
          $this ->load->model('registro_model');
        }




        public function index()
		{
        	$data['title'] = 'Registrarse';
        	$this->load->view('plantillas/header_reg',$data);
            $this->load->view('contenidos/registrarse_view');
            $this->load->view('plantillas/footer');
             
         }




         public function registro(){

             
     //Genero las reglas de validacion
            $this->form_validation->set_rules('nombre', 'Nombre', 'required|alpha|trim');
            $this->form_validation->set_rules('apellido', 'Apellido', 'required|alpha|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[usuario.email]');
            
            //$this->form_validation->set_rules('password', 'Contraseña','required|xss_clean');
            $this->form_validation->set_rules('contraseña', 'Contraseña','required');

            $this->form_validation->set_rules('password2', 'Repetir contraseña', 'required|matches[contraseña]');

            //Mensaje de error si no pasan las reglas
            $this->form_validation->set_message('required',
                                        '<div class="alert alert-danger">El campo %s es obligatorio</div>');

            $this->form_validation->set_message('matches',
                                        '<div class="alert alert-danger">Las contraseñas ingresadas no coinciden</div>');

            $this->form_validation->set_message('is_unique',
                                        '<div class="alert alert-danger">Este %s ya está asociado a otra cuenta</div>');

            $pass = $this->input->post('re_password_registro',true);

            //Preparo los datos para guardar en la base, en caso de que pase la validacion
            $data = array(
                
                'id_perfil'=>'2',
                'nombre'=>$this->input->post('nombre_registro',true),
                'apellido'=>$this->input->post('apellido_registro',true),
                'email'=>$this->input->post('email_registro',true),
                'contraseña'=>base64_encode($pass)
            );

            //Si no pasa la validacion de datos
            if ($this->form_validation->run() == FALSE)
            {
                //Muestra la página de registro con el título de error
                $this->index();   
            }
            
            else    //Pasa la validacion
            {
                //Envio array al metodo insert para registro de datos
                $usuario = $this->registro_model->add_user($data);

                //Redirecciono a la pagina de perfil
                $data['title'] = 'Ingresar';
                $this->load->view('plantillas/header',$data);   
                $this->load->view('contenidos/ingresar_view');
                $this->load->view('plantillas/footer');
            }   
        }
         
      public function guardar_cuenta()
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim');
            $this->form_validation->set_rules('apellido', 'Apellido', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[usuario.email]');

        $this->form_validation->set_rules('contraseña', 'Contraseña', 'min_length[6]|trim|required');
        $this->form_validation->set_rules('password2', 'Repita Contraseña', 'trim|required|matches[contraseña]');
        $this->form_validation->set_rules('telefono', 'Telefono', 'ctype_digit|required|numeric|is_unique[usuario.telefono]');
        $this->form_validation->set_rules('direccion', 'Dirección', 'trim|required');



        $this->form_validation->set_message('alpha', 'El %s solo debe contener letras');
        $this->form_validation->set_message('numeric', 'El %s solo debe contener numeros');
        $this->form_validation->set_message('is_unique', 'El %s introducido ya esta registrado');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('valid_email', 'El campo %s debe ser un correo valido');
        $this->form_validation->set_message('ctype_digit', 'El %s debe contener solo numeros');
        $this->form_validation->set_message('matches', 'Las contraseñas no coinciden');
        $this->form_validation->set_message('min_length', 'El campo %s debe tener al menos 6 caracteres');
        $this->form_validation->set_message('max_length', 'El %s debe tener un máximo de 12 caracteres');

        if ($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
          $usuario = $this->registro_model->add_user2($this->input->post());
          echo "<script type=\"text/javascript\">alert('Su usuario se creo con Exito !!! INGRESAR');</script>";
          $this->ingresar();    
        }
  }

  public function ingresar(){
    $data['title'] = 'Ingresar';
    $this->load->view('plantillas/headering',$data);   
    $this->load->view('contenidos/ingresar_view');
    $this->load->view('plantillas/footer');
  }

		
}