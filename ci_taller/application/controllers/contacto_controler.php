<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto_controler extends CI_Controller {

	function __construct()
    			
    {
       
                    parent::__construct();
                    $this->load->model('usuarios_model');
              if ($this->session->userdata('login')) {
              switch ($this->session->userdata('id_perfil')) {
                    case '1':
              // echo $this->session->userdata('nombre');
            
              redirect('Administrador');
              
            case '2':
              // echo $this->session->userdata('nombre');
              redirect('logueadoControler');
              break;  
                   }
          }         
    }


	public function index()
		{
		
        $data['title'] = 'Contacto'; 
				$this->load->view('plantillas/header',$data);
				$this->load->view('contenidos/contacto_view');
				$this->load->view('plantillas/footer');
      
         }
	


	public function validar_mensaje()

  {       
     $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim'); 
     $this->form_validation->set_rules('apellido', 'Apellido', 'required|trim');      
     $this->form_validation->set_rules('email', 'Email', 'required|min_length[3]|valid_email|trim');
     //$this->form_validation->set_rules('telefono', 'Telefono', 'required|numeric|trim');
     $this->form_validation->set_rules('ciudad', 'Ciudad', 'required|trim'); 
     $this->form_validation->set_rules('provincia', 'Provincia', 'required|trim');
     $this->form_validation->set_rules('asunto', 'Asunto', 'required|trim');
     $this->form_validation->set_rules('mensaje', 'Mensaje', 'required|trim');
     


        $this->form_validation->set_message('alpha', 'El %s solo debe contener letras');
        //$this->form_validation->set_message('numeric', 'El %s solo debe contener numeros');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('valid_email', 'El campo %s debe ser un correo valido');
        $this->form_validation->set_message('matches', 'Las contraseñas no coinciden');
        $this->form_validation->set_message('min_length', 'El campo %s debe tener al menos 6 caracteres');
        $this->form_validation->set_message('max_length', 'El %s debe tener un máximo de 12 caracteres'); 



                     if ($this->form_validation->run() == FALSE) {
                            echo "<script type=\"text/javascript\">alert('Errores En El Formulario de Consulta');</script>"; 
                            $this->index();

        }            else {
                            $this->insertar_mensaje();
            
                          }
  }
  


	  public function insertar_mensaje()
	  {
      $data = array(
        'nombre' => ucfirst($this->input->post('nombre')),
        'apellido' => ucfirst($this->input->post('apellido')),
        'email' => $this->input->post('email'),
        'ciudad' => ucfirst($this->input->post('ciudad')),
        'provincia' => ucfirst($this->input->post('provincia')),
        'asunto' => ucfirst($this->input->post('asunto')),
        'mensaje' => ucfirst($this->input->post('mensaje'))
      );


            $this->load->model('usuarios_model'); 
            $this->usuarios_model->guardar_consulta($data); 
            echo "<script type=\"text/javascript\">alert('Su Consulta se envio con exito');</script>"; 
            $this->index();
	             
	  }

}
