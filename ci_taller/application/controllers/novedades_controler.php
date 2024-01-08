<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Novedades_controler extends CI_Controller {

	 
	public function index()
	{
	
		$data['title'] = 'Novedades';
		$this->load->view('plantillas/header',$data);
		$this->load->view('contenidos/novedades_view');
		$this->load->view('plantillas/footer');
		
	}

	
}
