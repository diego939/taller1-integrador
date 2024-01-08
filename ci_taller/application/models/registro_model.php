<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Registro_model extends CI_Model{

	/**
    * Constructor de la clase
    */
    public function __construct() {
        parent::__construct();
    }

		
	function get_usuarios()
	{
		//$this->db->select('id, nombre, apellido, username');
		$query = $this->db->get('usuario');

		if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }
	}
	

	function add_user($data)
	{
		$this->db->insert('usuario', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	function add_user2($datos)
	{
		$array = array(
			"nombre" => $datos["nombre"],
			"apellido" => $datos["apellido"],
			"email" => $datos["email"],
			"contraseña" => base64_encode($datos["contraseña"]),
			"id_perfil" => '2',
			"direccion" => $datos["direccion"],
			"telefono" => $datos["telefono"],
		);
		$insert = $this->db->insert('usuario', $array);
	}
	
		function add_admin2($datos)
	{
		$array = array(
			"nombre" => $datos["nombre"],
			"apellido" => $datos["apellido"],
			"email" => $datos["email"],
			"contraseña" => base64_encode($datos["contraseña"]),
			"id_perfil" => '1',
			"direccion" => $datos["direccion"],
			"telefono" => $datos["telefono"],
		);
		$insert = $this->db->insert('usuario', $array);
	}

	function add_admin($data)
	{
		$this->db->insert('usuario', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}


	function edit_usuario($id)
	{
		$query = $this->db->get_where('usuario', array('id' => $id),1);
                
        if($query->num_rows() == 1) {
            return $query;
        } else {
            return FALSE;
        }
	}
	
	function update_usuario($id, $data)
	{
		$this->db->where('id', $id);
        $query = $this->db->update('usuario', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
	}

	function delete_usuario($id)
	{			
		$this->db->where('id', $id);
		$query = $this->db->delete('usuario'); 
		return true;	
	}
	
	
} 