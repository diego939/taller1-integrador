<?php 

class Usuarios_model extends CI_Model

{
    function __construct()
    {
        parent::__construct();
    }



   public function guardar_mensaje($nombre,$apellido,$email,$ciudad,$provincia,$asunto,$mensaje){
      $data = array(
         'nombre' => $nombre,
         'apellido' => $apellido,
         'email' => $email,
       'ciudad' => $ciudad,
     'provincia' => $provincia,
     'asunto' => $asunto,
     'mensaje' => $mensaje,
     'leido' => 0
      );
      
       $this->db->insert('consulta',$data);
    redirect('Principal');
      
   }

   public function guardar_consulta($data){
    $this->db->insert('consulta',$data);
   }

public function select_usuario($id_us) {
            
              $this->db->select('*');
             $this->db->from('usuario');
             $this->db->where('usuario.id_usuario =', $id_us);
             $query = $this->db->get();
            return $query->result();
}

public function select_usuarios() {
            
              $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->where('usuario.id_perfil =', 2);
             $query = $this->db->get();
            return $query->result();
}

public function select_usuarios_mostrar($limit, $row) {
            
              $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->where('usuario.id_perfil =', 2);
             $this->db->limit($limit,$row);
             $query = $this->db->get();
            return $query->result();
}

public function select_administradores() {
            
              $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->where('usuario.id_perfil =', 1);
             $query = $this->db->get();
            return $query->result();
}

public function select_administradores_mostrar($limit, $row) {
            
              $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->where('usuario.id_perfil =', 1);
             $this->db->limit($limit,$row);
             $query = $this->db->get();
            return $query->result();
}

public function select_usuarios_y_administradores() {
            
            $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->where('usuario.id_perfil !=', 3);
             $this->db->order_by('usuario.nombre');
             $query = $this->db->get();
            return $query->result();
}

public function select_usuarios_y_administradores_mostrar($limit, $row) {
            
            $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->where('usuario.id_perfil !=', 3);
             $this->db->order_by('usuario.nombre');
             $this->db->limit($limit,$row);
             $query = $this->db->get();
            return $query->result();
}

public function actualizar_rol_usuario($data, $id)
     {
             $this->db->where('id_usuario', $id);
             $this->db->update('usuario', $data);
     }

/*funciones de bloqueo---------------------------------------------------------------------------*/

public function select_todos_usuarios_desbloqueados() {
            
              $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->where('usuario.usuario_estado =', 1);
             $this->db->where('usuario.id_perfil !=', 3);
             $query = $this->db->get();
            return $query->result();
}

public function select_todos_usuarios_desbloqueados_mostrar($limit,$row) {
            
              $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->where('usuario.usuario_estado =', 1);
             $this->db->where('usuario.id_perfil !=', 3);
             $this->db->limit($limit,$row);
             $query = $this->db->get();
            return $query->result();
}

public function select_usuarios_desbloqueados() {
            
              $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->where('usuario.usuario_estado =', 1);
             $this->db->where('usuario.id_perfil =', 2);
             $query = $this->db->get();
            return $query->result();
}

public function select_usuarios_desbloqueados_mostrar($limit,$row) {
            
              $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->where('usuario.usuario_estado =', 1);
             $this->db->where('usuario.id_perfil =', 2);
             $this->db->limit($limit,$row);
             $query = $this->db->get();
            return $query->result();
}

public function select_administradores_desbloqueados() {
            
              $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->where('usuario.usuario_estado =', 1);
             $this->db->where('usuario.id_perfil =', 1);
             $query = $this->db->get();
            return $query->result();
}

public function select_administradores_desbloqueados_mostrar($limit,$row) {
            
              $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->where('usuario.usuario_estado =', 1);
             $this->db->where('usuario.id_perfil =', 1);
             $this->db->limit($limit,$row);
             $query = $this->db->get();
            return $query->result();
}

public function actualizar_estado_a_bloqueado($data, $id)
     {
             $this->db->where('id_usuario', $id);
             $this->db->update('usuario', $data);
     }

public function select_todos_usuarios_bloqueados() {
            
              $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->where('usuario.usuario_estado', 0);
             $this->db->where('usuario.id_perfil !=', 3);
             $query = $this->db->get();
            return $query->result();
}

public function select_todos_usuarios_bloqueados_mostrar($limit,$row) {
            
              $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->where('usuario.usuario_estado', 0);
             $this->db->where('usuario.id_perfil !=', 3);
             $this->db->limit($limit,$row);
             $query = $this->db->get();
            return $query->result();
}

public function select_usuarios_bloqueados() {
            
              $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->where('usuario.id_perfil =', 2);
             $this->db->where('usuario.usuario_estado =', 0);
             $query = $this->db->get();
            return $query->result();
}

public function select_usuarios_bloqueados_mostrar($limit,$row) {
            
              $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->where('usuario.id_perfil =', 2);
             $this->db->where('usuario.usuario_estado =', 0);
             $this->db->limit($limit,$row);
             $query = $this->db->get();
            return $query->result();
}


public function select_administradores_bloqueados() {
            
              $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->where('usuario.id_perfil =', 1);
             $this->db->where('usuario.usuario_estado =', 0);
             $query = $this->db->get();
            return $query->result();
}

public function select_administradores_bloqueados_mostrar($limit,$row) {
            
              $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->where('usuario.id_perfil =', 1);
             $this->db->where('usuario.usuario_estado =', 0);
             $this->db->limit($limit,$row);
             $query = $this->db->get();
            return $query->result();
}

public function actualizar_estado_a_desbloqueado($data, $id)
     {
             $this->db->where('id_usuario', $id);
             $this->db->update('usuario', $data);
     }

/*funciones de eliminacion---------------------------------------------------------------------------*/

public function select_todos_usuarios_eliminar() {
            $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->join('estado_usuario', 'usuario.usuario_estado =
               estado_usuario.usuario_estado');
             $this->db->where('usuario.id_perfil !=', 3);
             $this->db->order_by('usuario.nombre');
             $query = $this->db->get();
            return $query->result();
}


public function select_solo_usuarios_eliminar() {
            $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->join('estado_usuario', 'usuario.usuario_estado =
               estado_usuario.usuario_estado');
             $this->db->where('usuario.id_perfil =', 2);
             $query = $this->db->get();
            return $query->result();
}

public function select_solo_administradores_eliminar() {
            $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->join('estado_usuario', 'usuario.usuario_estado =
               estado_usuario.usuario_estado');
             $this->db->where('usuario.id_perfil =', 1);
             $this->db->order_by('usuario.nombre');
             $query = $this->db->get();
            return $query->result();
}

public function select_todos_usuarios_bloqueados_eliminar() {
            $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->join('estado_usuario', 'usuario.usuario_estado =
               estado_usuario.usuario_estado');
             $this->db->where('usuario.id_perfil !=', 3);
             $this->db->where('usuario.usuario_estado =', 0);
             $this->db->order_by('usuario.nombre');
             $query = $this->db->get();
            return $query->result();  
}

public function select_solo_usuarios_bloqueados_eliminar() {
            $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->join('estado_usuario', 'usuario.usuario_estado =
               estado_usuario.usuario_estado');
             $this->db->where('usuario.id_perfil =', 2);
             $this->db->where('usuario.usuario_estado =', 0);
             $this->db->order_by('usuario.nombre');
             $query = $this->db->get();
            return $query->result(); 
}

public function select_solo_administradores_bloqueados_eliminar() {
            $this->db->select('*');
             $this->db->from('usuario');
             $this->db->join('perfil', 'usuario.id_perfil =
               perfil.id_perfil');
             $this->db->join('estado_usuario', 'usuario.usuario_estado =
               estado_usuario.usuario_estado');
             $this->db->where('usuario.id_perfil =', 1);
             $this->db->where('usuario.usuario_estado =', 0);
             $this->db->order_by('usuario.nombre');
             $query = $this->db->get();
            return $query->result(); 
}

//muestra el usuario seleccionado para eliminar--------------------------
public function select_este_usuario_delete($id_usuario){
            $this->db->select('*');
             $this->db->from('usuario');
             $this->db->where('id_usuario =', $id_usuario);
             $query = $this->db->get();
            return $query->result();
}

//elimina el usuario seleccionado
public function select_usuario_delete($id_usuario){
            $this->db->select('*');
             $this->db->from('usuario');
             $this->db->where('usuario.id_usuario =', $id_usuario);
             $this->db->delete('usuario');
            
}


 }