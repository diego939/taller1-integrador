<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginModel extends CI_Model{

	public function __construct() 
    {
        parent::__construct();
    }
	
	function validarUsuario($usuario, $contrasenia)
	{
		$query = $this->db->get_where('usuario', array('email'=>$usuario,'contraseña'=>$contrasenia), 1);

        if($query->num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
	}
}