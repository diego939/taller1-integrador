<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bloqueado_controler extends CI_Controller {

       function __construct()
    			{
        			parent::__construct();
              if (!($this->session->userdata('login'))) {
                  redirect('Ingresar');
                  }
                
          }


	 
	public function index()
	{
	$data['title'] = 'Bloqueado';
	$this->load->view('plantillas/header-bloqueado',$data);
	$this->load->view('contenidos/bloqueado_view');
	$this->load->view('plantillas/footer-bloqueado');	
	}

	public function privacidad()
	{
	$data['title'] = 'politica de privacidad';
	$this->load->view('plantillas/header-bloqueado',$data);
	$this->load->view('contenidos/politica_de_privacidad_view');
	$this->load->view('plantillas/footer-bloqueado');	
	}

}