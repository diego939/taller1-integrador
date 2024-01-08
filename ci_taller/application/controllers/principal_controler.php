<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal_controler extends CI_Controller {

	function __construct()
    			{
        			parent::__construct();
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
	
		$data['title'] = 'Pagina Principal';
		$this->load->view('plantillas/header',$data);
		$this->load->view('contenidos/principal_view');
		$this->load->view('plantillas/footer');
		
	}

	public function comercializacion()
	{
		$data['title'] = 'Comercializacion';
		$this->load->view('plantillas/header',$data);
		$this->load->view('contenidos/comercializacion_view');
		$this->load->view('plantillas/footer');
	}


	public function somos()
	{
		$data['title'] = 'Quienes Somos';
		$this->load->view('plantillas/header',$data);
		$this->load->view('contenidos/quienes_somos_view');
		$this->load->view('plantillas/footer');
	}

	public function historia()
	{
		$data['title'] = 'Historia';
		$this->load->view('plantillas/header',$data);
		$this->load->view('contenidos/historia_view');
		$this->load->view('plantillas/footer2');
	}

	public function mision()
	{
		$data['title'] = 'Mision';
		$this->load->view('plantillas/header',$data);
		$this->load->view('contenidos/mision_view');
		$this->load->view('plantillas/footer2');
	}
	
	
}
