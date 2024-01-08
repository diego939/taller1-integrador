<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Super_Controler extends CI_Controller {

       function __construct()
    			{
        			parent::__construct();
              if (!($this->session->userdata('login'))) {
                  redirect('Ingresar');
                  }
                
          }

//pagina inicio---------------------------------------------------
	 
	public function index()
	{
	
	$data['title'] = 'Super';
	$this->load->view('plantillas/header-super',$data);
	$this->load->view('contenidos/super_principal_view');
	$this->load->view('plantillas/footer-super');	
	}

//editar usuario------------------------------------------------------
    public function editar_usuario($id_us){
    $this->load->model('usuarios_model');
    $data['usuario'] = $this->usuarios_model->select_usuario($id_us);
    $data['title'] = 'Editar usuario';
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_editar_usuario_view', $data);
    $this->load->view('plantillas/footer-super');   
    }

    public function actualizar_este_usuario($id_us)
    {       $this->load->model('usuarios_model');
            $usuario = $this->usuarios_model->select_usuario($id_us);
         
            $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim');
            $this->form_validation->set_rules('apellido', 'Apellido', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('telefono', 'Telefono', 'ctype_digit|required|trim');
            $this->form_validation->set_rules('direccion', 'Dirección', 'trim|required');


        $this->form_validation->set_message('numeric', 'El %s debe contener solo numeros naturales');
        $this->form_validation->set_message('ctype_digit', 'El %s debe contener solo numeros sin guiones ni comas');
        $this->form_validation->set_message('alpha', 'El %s solo debe contener letras');
        $this->form_validation->set_message('is_numeric', 'El %s solo debe contener numeros');
        $this->form_validation->set_message('is_unique', 'El %s introducido ya esta registrado');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('valid_email', 'El campo %s debe ser un correo valido');
        $this->form_validation->set_message('matches', 'Las contraseñas no coinciden');
        $this->form_validation->set_message('min_length', 'El campo %s debe tener al menos 6 caracteres');
        $this->form_validation->set_message('max_length', 'El %s debe tener un máximo de 12 caracteres');
        
        foreach ($usuario as $row) {
        if ($this->input->post('email')!= $row->email){
          $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[usuario.email]');
          $this->form_validation->set_message('required', 'El campo %s es obligatorio');
          $this->form_validation->set_message('valid_email', 'El campo %s debe ser un correo valido');
          $this->form_validation->set_message('is_unique', 'El %s introducido "'.$this->input->post('email').'" ya esta registrado');}

          if ($this->input->post('telefono')!= $row->telefono){
          $this->form_validation->set_rules('telefono', 'Telefono', 'ctype_digit|required|trim|is_unique[usuario.telefono]');
          $this->form_validation->set_message('required', 'El campo %s es obligatorio');
          $this->form_validation->set_message('ctype_digit', 'El %s debe contener solo numeros sin guiones ni comas ni caracteres especiales');
          $this->form_validation->set_message('is_unique', 'El %s introducido "'.$this->input->post('telefono').'" ya esta registrado');}
      }
          if ($this->form_validation->run() == FALSE) { 

                   $this->editar_usuario($id_us); 
                                            } 

            else {

        foreach ($usuario as $row) {
            if (($row->nombre != $this->input->post('nombre'))or($row->apellido != $this->input->post('apellido'))or($row->email != $this->input->post('email'))or($row->direccion != $this->input->post('direccion'))or($row->telefono != $this->input->post('telefono')))
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
                    $this->nuevoModelo->actualizar_usuario($data, $row->id_usuario);

                    echo "<script type=\"text/javascript\">
                              alert('Usuario Editado');
                              window.location =\"http://localhost/ci_taller/super_controler/todos_usuarios\";
                            </script>";
                    } else {
                    echo "<script type=\"text/javascript\">
                              alert('No se Realizaron cambios');
                              window.location =\"http://localhost/ci_taller/super_controler/todos_usuarios\";
                            </script>";
                    }
            }
       }
    }

    public function editar_contra_este_usuario($id_us){
    $this->load->model('usuarios_model');
    $data['usuario'] = $this->usuarios_model->select_usuario($id_us);
    $data['title'] = 'Editar Contraseña';
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_edicionContra_este_view',$data);
    $this->load->view('plantillas/footer-super');
   }

   public function actualizar_este_usuario_contra($id_usuario){
    $this->load->model('usuarios_model');
    $usuario = $this->usuarios_model->select_usuario($id_usuario);

    $this->form_validation->set_rules('contraseña', 'Contraseña', 'min_length[6]|trim|required');
    $this->form_validation->set_rules('password2', 'Repita Contraseña', 'trim|required|matches[contraseña]');

    $this->form_validation->set_message('required', 'El campo %s es obligatorio');
    $this->form_validation->set_message('matches', 'Las contraseñas no coinciden');
    $this->form_validation->set_message('min_length', 'El campo %s debe tener al menos 6 caracteres');
    $this->form_validation->set_message('max_length', 'El %s debe tener un máximo de 12 caracteres');

    if ($this->form_validation->run() == FALSE) { 

                   $this->editar_contra_este_usuario($id_usuario); 
                                            }
    else {
    $password = base64_encode($this->input->post('contraseña'));
    $data = array('contraseña' => $password);
    //$this->session->set_userdata($data);
    $this->load->model('nuevoModelo');
    $this->nuevoModelo->actualizar_usuario($data, $id_usuario);
    echo "<script type=\"text/javascript\">
    alert('Contraseña Cambiada');
    window.location =\"http://localhost/ci_taller/super_controler/todos_usuarios\";
    </script>";
    }
    }
//lista de usuarios---------------------------------------------------

	public function todos_usuarios(){
    $this->load->model('usuarios_model');
    $this->load->library('pagination');
    $config['base_url'] = base_url().'super_controler/todos_usuarios';
    $config['total_rows'] = count ($this->usuarios_model->select_usuarios_y_administradores());
           
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
    $data2 = array('usuarios'=> $this->usuarios_model->select_usuarios_y_administradores_mostrar(4, $page),);
	$data['title'] = 'Ver Usuarios';
	$this->load->view('plantillas/header-super',$data);
	$this->load->view('contenidos/super_gestionUsuarios_view',$data2);
	$this->load->view('plantillas/footer-super');	
	}

    public function solo_usuarios(){
    $this->load->model('usuarios_model');
    $this->load->library('pagination');
    $config['base_url'] = base_url().'super_controler/solo_usuarios';
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
    $data['title'] = 'Ver Usuarios';
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_gestionUsuarios_view',$data2);
    $this->load->view('plantillas/footer-super');   
    }

    public function solo_administradores(){
    $this->load->model('usuarios_model');
    $this->load->library('pagination');
    $config['base_url'] = base_url().'super_controler/solo_administradores';
    $config['total_rows'] = count ($this->usuarios_model->select_administradores());    
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
    $data2 = array('usuarios'=> $this->usuarios_model->select_administradores_mostrar(4, $page),);
    $data['title'] = 'Ver Usuarios';
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_gestionUsuarios_view',$data2);
    $this->load->view('plantillas/footer-super');   
    }

//agregar usuario---------------------------------------------------------

	public function agregar_usuario(){
	$this->load->model('usuarios_model');
	$data['usuarios'] = $this->usuarios_model->select_usuarios();
	//$data['administradores'] = $this->usuarios_model->select_administradores();
	$data['title'] = 'Agregar Usuario';
	$this->load->view('plantillas/header-super',$data);
	$this->load->view('contenidos/super_agregar_usuario_view',$data);
	$this->load->view('plantillas/footer-super');	
	}



	      public function guardar_cuenta()
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim');
            $this->form_validation->set_rules('apellido', 'Apellido', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[usuario.email]');

        $this->form_validation->set_rules('contraseña', 'Contraseña', 'min_length[6]|trim|required');
        $this->form_validation->set_rules('password2', 'Repita Contraseña', 'trim|required|matches[contraseña]');
        $this->form_validation->set_rules('telefono', 'Telefono', 'required|ctype_digit|is_unique[usuario.telefono]');
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

        if ($this->form_validation->run() == FALSE)
        {
            $this->agregar_usuario();
        }
        else
        {
        	$this->load->model('registro_model');
          $usuario = $this->registro_model->add_user2($this->input->post());
                //$this->todos_usuarios();
        echo "<script type=\"text/javascript\">
                  alert('Usuario Agregado Con Exito!!!');
                  window.location =\"http://localhost/ci_taller/super_controler/todos_usuarios\";
                </script>";
        }
  	}

//agregar administrador ------------------------------------------------------

  	public function agregar_administrador(){
	$this->load->model('usuarios_model');
	$data['usuarios'] = $this->usuarios_model->select_usuarios();
	$data['title'] = 'Agregar Administrador';
	$this->load->view('plantillas/header-super',$data);
	$this->load->view('contenidos/super_agregar_admin_view',$data);
	$this->load->view('plantillas/footer-super');	
	}

	      public function guardar_cuenta_admin()
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim');
            $this->form_validation->set_rules('apellido', 'Apellido', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[usuario.email]');

        $this->form_validation->set_rules('contraseña', 'Contraseña', 'min_length[6]|trim|required');
        $this->form_validation->set_rules('password2', 'Repita Contraseña', 'trim|required|matches[contraseña]');
        $this->form_validation->set_rules('telefono', 'Telefono', 'required|ctype_digit|is_unique[usuario.telefono]');
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

        if ($this->form_validation->run() == FALSE)
        {
            $this->agregar_administrador();
        }
        else
        {
        	$this->load->model('registro_model');
          $usuario = $this->registro_model->add_admin2($this->input->post());
        echo "<script type=\"text/javascript\">
                  alert('Administrador Agregado Con Exito!!!');
                  window.location =\"http://localhost/ci_taller/super_controler/todos_usuarios\";
                </script>";
        }
  	}

//gestionar privilegios-----------------------------------------------------

	public function gestion_privilegios(){
	$this->load->model('usuarios_model');
    $this->load->library('pagination');
    $config['base_url'] = base_url().'super_controler/gestion_privilegios';
    $config['total_rows'] = count ($this->usuarios_model->select_usuarios_y_administradores());
           
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
    $data2 = array('usuarios'=> $this->usuarios_model->select_usuarios_y_administradores_mostrar(4, $page),);
	$data['title'] = 'Gestion Privilegios';
	$this->load->view('plantillas/header-super',$data);
	$this->load->view('contenidos/super_gestion_privilegios_view',$data2);
	$this->load->view('plantillas/footer-super');	
	}

    public function gestion_privilegios_usuarios(){
    $this->load->model('usuarios_model');
    $this->load->library('pagination');
    $config['base_url'] = base_url().'super_controler/gestion_privilegios_usuarios';
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
    $data['title'] = 'Gestion Privilegios';
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_gestion_privilegios_view',$data2);
    $this->load->view('plantillas/footer-super');   
    }

    public function gestion_privilegios_admin(){
    $this->load->model('usuarios_model');
    $this->load->library('pagination');
    $config['base_url'] = base_url().'super_controler/gestion_privilegios_admin';
    $config['total_rows'] = count ($this->usuarios_model->select_administradores());    
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
    $data2 = array('usuarios'=> $this->usuarios_model->select_administradores_mostrar(4, $page),);
    $data['title'] = 'Gestion Privilegios';
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_gestion_privilegios_view',$data2);
    $this->load->view('plantillas/footer-super');   
    }

	public function cambiar_a_usuario($id=NULL){
	$data = array('id_perfil'=> '2');
	$this->load->model('usuarios_model');
    $this->usuarios_model->actualizar_rol_usuario($data, $id);
    //$this->gestion_privilegios();
    redirect(base_url().'super_controler/gestion_privilegios');
    }

    public function cambiar_a_admin($id=NULL){
	$data = array('id_perfil'=> '1');
	$this->load->model('usuarios_model');
    $this->usuarios_model->actualizar_rol_usuario($data, $id);
    //$this->gestion_privilegios();
    redirect(base_url().'super_controler/gestion_privilegios');
    }

//bloquear usuario ---------------------------------------------------------

    public function bloquear_usuarios(){
    $this->load->model('usuarios_model');
    $this->load->library('pagination');
    $config['base_url'] = base_url().'super_controler/bloquear_usuarios';
    $config['total_rows'] = count ($this->usuarios_model->select_todos_usuarios_desbloqueados());
           
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
    $data2 = array('usuarios'=> $this->usuarios_model->select_todos_usuarios_desbloqueados_mostrar(4, $page),);
    $data['title'] = 'Bloqueo Usuarios';
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_bloquear_usuarios_view',$data2);
    $this->load->view('plantillas/footer-super');   
    }

    public function bloquear_usuarios_clientes(){
    $this->load->model('usuarios_model');
    $this->load->library('pagination');
    $config['base_url'] = base_url().'super_controler/bloquear_usuarios_clientes';
    $config['total_rows'] = count ($this->usuarios_model->select_usuarios_desbloqueados());
           
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
    $data2 = array('usuarios'=> $this->usuarios_model->select_usuarios_desbloqueados_mostrar(4, $page),);
    $data['title'] = 'Bloqueo Usuarios';
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_bloquear_usuarios_view',$data2);
    $this->load->view('plantillas/footer-super');   
    }

    public function bloquear_usuarios_administradores(){
    $this->load->model('usuarios_model');
    $this->load->library('pagination');
    $config['base_url'] = base_url().'super_controler/bloquear_usuarios_administradores';
    $config['total_rows'] = count ($this->usuarios_model->select_administradores_desbloqueados());
           
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
    $data2 = array('usuarios'=> $this->usuarios_model->select_administradores_desbloqueados_mostrar(4, $page),);

    $data['title'] = 'Bloqueo Usuarios';
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_bloquear_usuarios_view',$data2);
    $this->load->view('plantillas/footer-super');   
    }

    public function bloquear_este_usuario($id=NULL){
    $data = array('usuario_estado'=> '0');
    $this->load->model('usuarios_model');
    $this->usuarios_model->actualizar_estado_a_bloqueado($data, $id);
    //$this->desbloquear_usuarios();
   // redirect(base_url().'super_controler/desbloquear_usuarios');
    echo "<script type=\"text/javascript\">
                  alert('Usuario BLOQUEADO!!!');
                  window.location =\"http://localhost/ci_taller/super_controler/bloquear_usuarios\";
                </script>";
    }

//desbloquear usuario----------------------------------------------------

    public function desbloquear_usuarios(){
    $this->load->model('usuarios_model');
    $this->load->library('pagination');
    $config['base_url'] = base_url().'super_controler/desbloquear_usuarios';
    $config['total_rows'] = count ($this->usuarios_model->select_todos_usuarios_bloqueados());
           
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
    $data2 = array('usuarios'=> $this->usuarios_model->select_todos_usuarios_bloqueados_mostrar(4, $page),);
    $data['title'] = 'Desbloqueo Usuarios';
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_desbloquear_usuarios_view',$data2);
    $this->load->view('plantillas/footer-super');   
    }

    public function desbloquear_usuarios_clientes(){
    $this->load->model('usuarios_model');
    $this->load->library('pagination');
    $config['base_url'] = base_url().'super_controler/desbloquear_usuarios_clientes';
    $config['total_rows'] = count ($this->usuarios_model->select_usuarios_bloqueados());
           
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
    $data2 = array('usuarios'=> $this->usuarios_model->select_usuarios_bloqueados_mostrar(4, $page),);
    $data['title'] = 'Desbloqueo Usuarios';
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_desbloquear_usuarios_view',$data2);
    $this->load->view('plantillas/footer-super');   
    }

    public function desbloquear_usuarios_administradores(){
    $this->load->model('usuarios_model');
    $this->load->library('pagination');
    $config['base_url'] = base_url().'super_controler/desbloquear_usuarios_administradores';
    $config['total_rows'] = count ($this->usuarios_model->select_administradores_bloqueados());
           
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
    $data2 = array('usuarios'=> $this->usuarios_model->select_administradores_bloqueados_mostrar(4, $page),);
    $data['title'] = 'Desbloqueo Usuarios';
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_desbloquear_usuarios_view',$data2);
    $this->load->view('plantillas/footer-super');   
    }

    public function desbloquear_este_usuario($id=NULL){
    $data = array('usuario_estado'=> '1');
    $this->load->model('usuarios_model');
    $this->usuarios_model->actualizar_estado_a_desbloqueado($data, $id);
    //$this->bloquear_usuarios();
    //redirect(base_url().'super_controler/bloquear_usuarios');
    echo "<script type=\"text/javascript\">
                  alert('Usuario DESBLOQUEADO!!!');
                  window.location =\"http://localhost/ci_taller/super_controler/desbloquear_usuarios\";
                </script>";
    }

//eliminar usuario------------------------------------------------------------
    
    public function todos_usuarios_eliminar(){
    $this->load->model('usuarios_model');
    $data['usuarios'] = $this->usuarios_model->select_todos_usuarios_eliminar();
    $data['title'] = 'Eliminar Usuarios';
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_eliminar_usuarios_view',$data);
    $this->load->view('plantillas/footer-super');   
    }  

    public function usuario_delete($id_usuario){
    $this->load->model('usuarios_model');
    $this->usuarios_model->select_usuario_delete($id_usuario);
    redirect(base_url("super_controler/todos_usuarios_eliminar"));
    }

    public function solo_usuarios_eliminar() {
    $this->load->model('usuarios_model');
    $data['usuarios'] = $this->usuarios_model->select_solo_usuarios_eliminar();
    $data['title'] = 'Eliminar Usuarios';
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_eliminar_usuarios_view',$data);
    $this->load->view('plantillas/footer-super');  
    }

    public function solo_administradores_eliminar() {
    $this->load->model('usuarios_model');
    $data['usuarios'] = $this->usuarios_model->select_solo_administradores_eliminar();
    $data['title'] = 'Eliminar Usuarios';
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_eliminar_usuarios_view',$data);
    $this->load->view('plantillas/footer-super');  
    }

    public function todos_usuarios_bloqueados_eliminar(){
    $this->load->model('usuarios_model');
    $data['usuarios'] = $this->usuarios_model->select_todos_usuarios_bloqueados_eliminar();
    $data['title'] = 'Eliminar Usuarios';
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_eliminar_usuarios_view',$data);
    $this->load->view('plantillas/footer-super');   
    }  

    public function solo_usuarios_bloqueados_eliminar() {
    $this->load->model('usuarios_model');
    $data['usuarios'] = $this->usuarios_model->select_solo_usuarios_bloqueados_eliminar();
    $data['title'] = 'Eliminar Usuarios';
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_eliminar_usuarios_view',$data);
    $this->load->view('plantillas/footer-super');  
    }

    public function solo_administradores_bloqueados_eliminar() {
    $this->load->model('usuarios_model');
    $data['usuarios'] = $this->usuarios_model->select_solo_administradores_bloqueados_eliminar();
    $data['title'] = 'Eliminar Usuarios';
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_eliminar_usuarios_view',$data);
    $this->load->view('plantillas/footer-super');  
    }

    public function seleccionar_usuario_a_eliminar($id = null){
    $this->load->model('usuarios_model');
    $data['usuario'] = $this->usuarios_model->select_este_usuario_delete($id);
    $data['title'] = 'Eliminar Este Usuario';
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_eliminar_a_este_view',$data);
    $this->load->view('plantillas/footer-super');
    }


//datos de usuarios-------------------------------------------------------
	public function datos_usuarios() {
    $this->load->model('usuarios_model');
    $data['usuarios'] = $this->usuarios_model->select_todos_usuarios_eliminar();
    $data['solo_usuarios'] = $this->usuarios_model->select_solo_usuarios_eliminar();
    $data['solo_administradores'] = $this->usuarios_model->select_solo_administradores_eliminar();
    $data['todo_usuarios_bloq'] = $this->usuarios_model->select_todos_usuarios_bloqueados_eliminar();
    $data['solo_usuarios_bloq'] = $this->usuarios_model->select_solo_usuarios_bloqueados_eliminar();
    $data['solo_admin_bloq'] = $this->usuarios_model->select_solo_administradores_bloqueados_eliminar();
    $data['title'] = 'Datos de Usuarios';
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_datos_de_usuarios_view',$data);
    $this->load->view('plantillas/footer-super');  
    }

//pagina del perfil--------------------------------------------------------------

    public function ver_perfil() {
    $data['title'] = 'Mis Datos';
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_mis_datos_view',$data);
    $this->load->view('plantillas/footer-super');  
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
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_edicionContra_view',$dat);
    $this->load->view('plantillas/footer-super');
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
    $this->load->view('plantillas/header-super',$data);
    $this->load->view('contenidos/super_edicionPerfil_view',$dat);
    $this->load->view('plantillas/footer-super');
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
    echo "<script type=\"text/javascript\">alert('La contraseña Se Editó con Exito !');</script>";
    $this->ver_perfil();
    //redirect('super_controler/ver_perfil');
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
          $this->form_validation->set_rules('email', 'Email', 'valid_email|required|trim|is_unique[usuario.email]');
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

        if (($this->session->userdata('nombre') != $this->input->post('nombre'))or($this->session->userdata('apellido') != $this->input->post('apellido'))or($this->session->userdata('email') != $this->input->post('email'))or($this->session->userdata('direccion') != $this->input->post('direccion'))or($this->session->userdata('telefono')) != $this->input->post('telefono'))
        {
        $data = array(
         'nombre' => $this->input->post('nombre'),
         'apellido'=> $this->input->post('apellido'),
         'email' => $this->input->post('email'), 
         'direccion'=> $this->input->post('direccion'),
         'telefono' => $this->input->post('telefono'), 
         );

        $this->session->set_userdata($data);
        $this->load->model('nuevoModelo');
        $this->nuevoModelo->actualizar_usuario($data, $id_usuario);

        echo "<script type=\"text/javascript\">
                  alert('Datos Guardados');
                  window.location =\"http://localhost/ci_taller/super_controler/ver_perfil\";
                </script>";
        } else {
        echo "<script type=\"text/javascript\">
                  alert('No se Realizaron cambios');
                  window.location =\"http://localhost/ci_taller/super_controler/ver_perfil\";
                </script>";
        }
                              

       }
    }

}