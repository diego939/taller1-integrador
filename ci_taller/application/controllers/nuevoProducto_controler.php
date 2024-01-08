

<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 


class NuevoProducto_controler extends CI_Controller { 

  function __construct() { 

            parent::__construct(); 
            if (!($this->session->userdata('login'))) {
                  redirect('Principal');
                  $this->load->model('nuevoModelo');
                  }
                           }

  


        public function index() { 
        
          $this->load->model('nuevoModelo'); 
          $data['categorias'] = $this->nuevoModelo->select_categoria();
          $data['title'] = 'Agregar Producto';
          $this->load->view('plantillas/header-admin');  
          $this->load->view('contenidos/nuevoProductosView', $data); 
          $this->load->view('plantillas/footer-admin');
           }
                



        public function listar_productos() {
           $this->load->model('nuevoModelo');
            $data2 = array(
             'productos'=> $this->nuevoModelo->select_productos(),
             'categorias' => $this->nuevoModelo->select_categoria()
            );
           $this->load->view('plantillas/header');
           $this->load->view('plantillas/navegarJose');
           $this->load->view('VistasAdmin/listar_productos_view', $data2);
           $this->load->view('plantillas/footer');
                  }





        public function registrar_productos() { 
            
          $this->form_validation->set_rules('nombre', 'Nombre del Producto', 'required|trim|is_unique[producto.nombre_producto]');
          $this->form_validation->set_rules('descripcion', 'Descripcion', 'required|trim'); 
          $this->form_validation->set_rules('stock', 'Stock', 'required|trim|callback_select_positivo|ctype_digit|integer'); 
          $this->form_validation->set_rules('precio', 'Precio', 'required|callback_select_positivo|trim|numeric'); 
          $this->form_validation->set_rules('categoria', 'Seleccionar una categoria', 'required|trim|callback_select_validate');
          $this->form_validation->set_rules('imagen', 'Seleccionar una imagen', 'callback_validar_imagen|trim');

          //--------------------------------------------

          $this->form_validation->set_message('ctype_digit', 'El %s debe contener solo numeros sin guiones ni comas ni otros caracteres');
          $this->form_validation->set_message('is_unique', 'El %s ya esta registrado');
          $this->form_validation->set_message('alpha', 'El %s solo debe contener letras');
          $this->form_validation->set_message('decimal', 'Debe ingresar valores con decimales'); 
          $this->form_validation->set_message('integer', 'El campo %s debe poseer solo numeros enteros'); 
          $this->form_validation->set_message('required', 'El campo %s es obligatorio');
          $this->form_validation->set_message('numeric', 'El campo %s debe ser numerico');  


          if ($this->form_validation->run() == FALSE) { 

                   $this->index(); 
                                            } 

            else { 
                     $this->guardar_productos(); 
                                                }
           } 
           

           

        

       function validar_imagen($imagen) { 

        //Verifica que se ingreso una imagen 
        $nombre_imagen = $_FILES['imagen']['name']; //Obtiene el nombre de la imagen 

                if (empty($nombre_imagen)) { 

                  $this->form_validation->set_message('validar_imagen', 'Seleccionar una imagen'); 
                        return false; 
                } 

                else { 
                      return true; 
                   } 


               }

       


        function select_validate($categoria) { 
        // verifica que se selecciono una categoria del libro 

          if($categoria=="ninguno"){ 

            $this->form_validation->set_message('select_validate', 'Seleccione una categoria (obligatorio)');  
            return false; 

          } 

          else{ 
            return true; 
              } 


          }

        function select_positivo($num) { 
        // verifica que se selecciono un numero positivo

          if($num < 0 ){ 

            $this->form_validation->set_message('select_positivo', 'Solo se admiten valores Positivos');  
            return false; 

          } 

          else{ 
            return true; 
              } 


          }




        function guardar_productos() { 

          

          $config['upload_path'] = 'assets/upload'; 
          $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG'; 
          //$config['remove_spaces'] = TRUE; 
          //$config['encrypt_name']  =TRUE;

          
          $this->load->library('upload', $config);


          if (!$this->upload->do_upload('imagen')) { 

                 echo "<script type=\"text/javascript\">alert('No se pudo cargar el archivo');</script>"; 

                 $this->index();
               }


           else { $data = array( 
                    
                    'descripcion_producto' => $this->input->post('descripcion'),
                    'nombre_producto' => $this->input->post('nombre'),                            
                    'stock' => $this->input->post('stock'),
                    'precio'=> $this->input->post('precio'),
                    'estado' => 1,   
                    'imagen' => str_replace(" ", "_",$_FILES['imagen']['name']),
                    'id_categoria'=> $this->input->post('categoria')

                    );


            $this->load->model('nuevoModelo'); 
            $this->nuevoModelo->guardar_productos($data); 
            redirect('Administrador'); 

             } 
            

       } 


   public function editar_productos($id=NULL)
   {
      

        $this->load->model('nuevoModelo');
        $productos = $this->nuevoModelo->select_productos_id($id);
        $data['categorias'] = $this->nuevoModelo->select_categoria();
      foreach ($productos as $row) {
         $data['id_producto'] = $row->id_producto;
         $data['nombre_producto'] = $row->nombre_producto;
         $data['descripcion_producto'] = $row->descripcion_producto;
         $data['precio'] = $row->precio;
         $data['stock'] = $row->stock;
         $data['estado']= $row->estado;
         $data['imagen']= $row->imagen;
         $data['codigo_producto']= $row->codigo_producto;
         $data['descripcion'] = $row->descripcion;
         $data['id_categoria']= $row->id_categoria;
       }
         $data['title'] = 'Editar Producto';
          $this->load->view('plantillas/header-admin',$data);
         $this->load->view('contenidos/gestionar_productos_edicion_view', $data);
         $this->load->view('plantillas/footer-admin');
       }
         
   


    public function eliminar_productos($id=NULL)
       {
        

              $data = array(
              'estado'=> '0'
            );
                
                $this->load->model('nuevoModelo');
                $this->nuevoModelo->actualizar_productos($data, $id);
                //redirect('EditarProductos');
                echo "<script type=\"text/javascript\">
                  alert('Producto Desactivado');
                  window.location =\"http://localhost/ci_taller/EditarProductos\";
                </script>";
           }
           



   public function activar_productos($id=NULL)
    {
        
           
           $data = array(
           'estado'=> '1'
           );

       $this->load->model('nuevoModelo');
       $this->nuevoModelo->actualizar_productos($data, $id);
       //redirect('EditarProductos');
       echo "<script type=\"text/javascript\">
                  alert('Producto Activado');
                  window.location =\"http://localhost/ci_taller/EditarProductos\";
                </script>";
        }
      

/*se lista los productos que se pueden dar de alta y baja y modificar*/   
   public function gestionar_productos()
    {
            $this->load->model('nuevoModelo');
            $this->load->library('pagination');
           $config['base_url'] = base_url().'NuevoProducto_controler/gestionar_productos/';
           $config['total_rows'] = count ($this->nuevoModelo->select_productosE());
          
           $config['per_page'] = 4;
           $config['num_links'] = 2;
           $config["uri_segment"] = 3;
           $config['first_link'] = 'Primero ';
           $config['prev_link'] = 'Anterior';
           $config['last_link'] = 'Último';
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
         //echo $config['total_rows']; die;

         $page=$this->uri->segment(3);
         //$data['productos'] = $this->libro_model->paginas_mostrar(2, $page);
      $data = array(
             //'productos'=> $this->nuevoModelo->select_productos(),
       'productos'=> $this->nuevoModelo->select_productosE_mostrar(4, $page),
       'categorias' => $this->nuevoModelo->seleccionar_categorias()
       );

         //$this->load->model('nuevoModelo');
         //$data['productos'] = $this->nuevoModelo->select_productosE();
         //$data['categorias'] = $this->nuevoModelo->seleccionar_categorias();
         $data['title'] = 'Gestionar Productos';
          $this->load->view('plantillas/header-admin',$data);
         $this->load->view('contenidos/gestionar_productos_view', $data);
         $this->load->view('plantillas/footer-admin');

  }

  public function gestionar_productos_bajo_stock()
    {
            $this->load->model('nuevoModelo');
            $this->load->library('pagination');
           $config['base_url'] = base_url().'NuevoProducto_controler/gestionar_productos_bajo_stock/';
           $config['total_rows'] = count ($this->nuevoModelo->select_bajostock());
          
           $config['per_page'] = 4;
           $config['num_links'] = 2;
           $config["uri_segment"] = 3;
           $config['first_link'] = 'Primero ';
           $config['prev_link'] = 'Anterior';
           $config['last_link'] = 'Último';
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
         //echo $config['total_rows']; die;

         $page=$this->uri->segment(3);
         //$data['productos'] = $this->libro_model->paginas_mostrar(2, $page);
      $data = array(
             //'productos'=> $this->nuevoModelo->select_productos(),
       'productos'=> $this->nuevoModelo->select_bajostock_mostrar(4, $page),
       'categorias' => $this->nuevoModelo->seleccionar_categorias()
       );

         //$this->load->model('nuevoModelo');
         //$data['productos'] = $this->nuevoModelo->select_productosE();
         //$data['categorias'] = $this->nuevoModelo->seleccionar_categorias();
         $data['title'] = 'Gestionar Productos';
          $this->load->view('plantillas/header-admin',$data);
         $this->load->view('contenidos/gestionar_productos_view', $data);
         $this->load->view('plantillas/footer-admin');

  }

  public function gestionar_productos_por_nombre()
    {       
            $nombre = $this->input->post('nombre');
            $this->load->model('nuevoModelo');
            $this->load->library('pagination');
           $config['base_url'] = base_url().'NuevoProducto_controler/gestionar_productos_por_nombre/';
           $config['total_rows'] = count ($this->nuevoModelo->buscar_productos_nombre($nombre));
          
           $config['per_page'] = 4;
           $config['num_links'] = 2;
           $config["uri_segment"] = 3;
           $config['first_link'] = 'Primero ';
           $config['prev_link'] = 'Anterior';
           $config['last_link'] = 'Último';
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
         //echo $config['total_rows']; die;

         $page=$this->uri->segment(3);
         //$data['productos'] = $this->libro_model->paginas_mostrar(2, $page);
      $data = array(
             //'productos'=> $this->nuevoModelo->select_productos(),
       'productos'=> $this->nuevoModelo->buscar_productos_nombre_mostrar(4, $page, $nombre),
       'categorias' => $this->nuevoModelo->seleccionar_categorias()
       );

         //$this->load->model('nuevoModelo');
         //$data['productos'] = $this->nuevoModelo->select_productosE();
         //$data['categorias'] = $this->nuevoModelo->seleccionar_categorias();
         $data['title'] = 'Gestionar Productos';
          $this->load->view('plantillas/header-admin',$data);
         $this->load->view('contenidos/gestionar_productos_view', $data);
         $this->load->view('plantillas/footer-admin');

  }

     public function gestionar_productos_categoria($categoria)
    {

          /*$this->load->model('nuevoModelo');
            $this->load->library('pagination');
           $config['base_url'] = base_url().'NuevoProducto_controler/gestionar_productos_categoria/';
           $config['total_rows'] = count ($this->nuevoModelo->select_productosE_categorias($categoria));
          
           $config['per_page'] = 4;
           $config['num_links'] = 2;
           $config["uri_segment"] = 3;
           $config['first_link'] = 'Primero ';
           $config['prev_link'] = 'Anterior';
           $config['last_link'] = 'Último';
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
         //echo $config['total_rows']; die;

         $page=$this->uri->segment(3);
          $data = array(
       'productos'=> $this->nuevoModelo->select_productosE_categorias_mostrar(4, $page, $categoria),
       'categorias' => $this->nuevoModelo->seleccionar_categorias()
       );*/
        $this->load->model('nuevoModelo');
        $data['productos'] = $this->nuevoModelo->select_productosE_categorias($categoria);
        $data['categorias'] = $this->nuevoModelo->seleccionar_categorias();
         $data['title'] = 'Gestionar Productos';
          $this->load->view('plantillas/header-admin',$data);
         $this->load->view('contenidos/gestionar_productos_view', $data);
         $this->load->view('plantillas/footer-admin');

  }
       




   public function actualizar_productos($id=NULL)
    {     
      $this->load->model('nuevoModelo');
        $productos = $this->nuevoModelo->select_productos_id($id);
        $data['categorias'] = $this->nuevoModelo->select_categoria();



          $this->form_validation->set_rules('categoria', 'Seleccionar una categoria', 'required|trim|callback_select_validate');
         $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim');
         $this->form_validation->set_rules('descripcion', 'Descripcion', 'required|trim');
         $this->form_validation->set_rules('codigo_producto', 'Codigo Del Producto', 'required|trim|ctype_digit|exact_length[10]'); 
           $this->form_validation->set_rules('stock', 'Stock', 'required|numeric|callback_select_positivo|ctype_digit|trim');
           $this->form_validation->set_rules('precio', 'Precio', 'required|numeric|callback_select_positivo|trim');


          $this->form_validation->set_message('numeric', 'El campo %s debe ser numerico');
        $this->form_validation->set_message('alpha', 'El %s solo debe contener letras');
        $this->form_validation->set_message('ctype_digit', 'El %s debe contener solo numeros sin guiones ni comas ni otros caracteres');
        $this->form_validation->set_message('numeric', 'El %s solo debe contener numeros');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('valid_email', 'El campo %s debe ser un correo valido');
        $this->form_validation->set_message('matches', 'Las contraseñas no coinciden');
        $this->form_validation->set_message('exact_length', 'El campo %s debe contar de 10 numeros');
        $this->form_validation->set_message('min_length', 'El campo %s debe tener al menos 6 caracteres');
        $this->form_validation->set_message('max_length', 'El %s debe tener un máximo de 12 caracteres');
             foreach ($productos as $row) {
                 if ($this->input->post('nombre')!= $row->nombre_producto){
          $this->form_validation->set_rules('nombre', 'Nombre del Producto', 'required|is_unique[producto.nombre_producto]'); 
          $this->form_validation->set_message('required', 'El campo %s es obligatorio');
          $this->form_validation->set_message('is_unique', 'El %s introducido "'.$this->input->post('nombre').'" ya esta registrado'); 
         }
       }

       foreach ($productos as $row) {
                 if ($this->input->post('codigo_producto')!= $row->codigo_producto){
          $this->form_validation->set_rules('codigo_producto', 'Codigo Del Producto', 'required|trim|ctype_digit|exact_length[10]|is_unique[producto.codigo_producto]');

          $this->form_validation->set_message('ctype_digit', 'El %s debe contener solo numeros sin guiones ni comas ni otros caracteres');
          $this->form_validation->set_message('required', 'El campo %s es obligatorio');
          $this->form_validation->set_message('exact_length', 'El campo %s debe contar de 10 numeros');
          $this->form_validation->set_message('is_unique', 'El %s introducido "'.$this->input->post('codigo_producto').'" ya esta registrado');
         }
       }


        if ($this->form_validation->run() == FALSE)
        {
          $this->load->model('nuevoModelo');
        $productos = $this->nuevoModelo->select_productos_id($id);
        $data['categorias'] = $this->nuevoModelo->select_categoria();
      foreach ($productos as $row) {
         $data['id_producto'] = $row->id_producto;
         $data['nombre_producto'] = $row->nombre_producto;
         $data['descripcion_producto'] = $row->descripcion_producto;
         $data['precio'] = $row->precio;
         $data['stock'] = $row->stock;
         $data['estado']= $row->estado;
         $data['imagen']= $row->imagen;
         $data['codigo_producto']= $row->codigo_producto;
         $data['descripcion'] = $row->descripcion;
         $data['id_categoria']= $row->id_categoria;
       }
         $data['title'] = 'Editar Producto';
          $this->load->view('plantillas/header-admin',$data);
         $this->load->view('contenidos/gestionar_productos_edicion_view', $data);
         $this->load->view('plantillas/footer-admin');
       } else {

        /*$config['upload_path'] = 'assets/upload'; 
          $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG'; 
          //$config['remove_spaces'] = TRUE; 
          //$config['encrypt_name']  =TRUE;

          
          $this->load->library('upload', $config);


          
        if ($this->input->post('imagen')){
          $imag = $imagen;
         }else{
          $imag = str_replace(" ", "_",$_FILES['imagen']['name']);
         }*/


         if ($this->input->post('nombre')){
          $nom = $this->input->post('nombre');
         }else{
          $nom = $nombre;
         }


         if ($this->input->post('descripcion')){
          $desc = $this->input->post('descripcion');
         }

         if ($this->input->post('precio')){
          $prec = $this->input->post('precio');
         }
         if ($this->input->post('stock')){
          $sto = $this->input->post('stock');
         }



         $data = array(
          'nombre_producto' => $this->input->post('nombre'),
         'descripcion_producto' => $this->input->post('descripcion'),
         'stock' => $this->input->post('stock'), 
          'precio'=> $this->input->post('precio'),
          'codigo_producto'=> $this->input->post('codigo_producto'),
          //'imagen' => $imag,
          'id_categoria'=> $this->input->post('categoria')
         );


        $this->load->model('nuevoModelo');
        $this->nuevoModelo->actualizar_productos($data, $id);
        //redirect('EditarProductos');
        echo "<script type=\"text/javascript\">
        alert('El Producto se edito con exito');
        window.location =\"http://localhost/ci_taller/NuevoProducto_controler/gestionar_productos\"
        </script>"; 
        //$this->gestionar_productos();
        }
       }



public function actualizar_img_prod($id=NULL){
        $this->load->model('nuevoModelo');
        $productos = $this->nuevoModelo->select_productos_id($id);
        $data['categorias'] = $this->nuevoModelo->select_categoria();
      foreach ($productos as $row) {
         $data['id_producto'] = $row->id_producto;
         $data['nombre_producto'] = $row->nombre_producto;
         $data['descripcion'] = $row->descripcion_producto;
         $data['precio'] = $row->precio;
         $data['stock'] = $row->stock;
         $data['estado']= $row->estado;
         $data['imagen']= $row->imagen;
       }
         $data['title'] = 'Editar Imagen';
          $this->load->view('plantillas/header-admin',$data);
          $this->load->view('contenidos/imagen_prod_editar',$data);
         $this->load->view('plantillas/footer-admin');
}

   public function actualizar_imagenes_producto($id=NULL){
        $this->load->model('nuevoModelo');
        $productos = $this->nuevoModelo->select_productos_id($id);
        $data['categorias'] = $this->nuevoModelo->select_categoria();
        foreach ($productos as $row) {
         $data['id_producto'] = $row->id_producto;
         $data['nombre_producto'] = $row->nombre_producto;
         $data['descripcion'] = $row->descripcion_producto;
         $data['precio'] = $row->precio;
         $data['stock'] = $row->stock;
         $data['estado']= $row->estado;
         $data['imagen']= $row->imagen;
         $data['codigo_producto']= $row->codigo_producto;
         $data['id_categoria']= $row->id_categoria;
       }

            $this->form_validation->set_rules('imagen', 'Seleccionar una imagen', 'callback_validar_imagen|trim');

            if ($this->form_validation->run() == FALSE)
        {
          $this->load->model('nuevoModelo');
        $productos = $this->nuevoModelo->select_productos_id($id);
        $data['categorias'] = $this->nuevoModelo->select_categoria();
      foreach ($productos as $row) {
         $data['id_producto'] = $row->id_producto;
         $data['nombre_producto'] = $row->nombre_producto;
         $data['descripcion'] = $row->descripcion_producto;
         $data['precio'] = $row->precio;
         $data['stock'] = $row->stock;
         $data['estado']= $row->estado;
         $data['imagen']= $row->imagen;
         $data['id_categoria']= $row->id_categoria;
       }
         $data['title'] = 'Editar Imagen';
          $this->load->view('plantillas/header-admin',$data);
         $this->load->view('contenidos/imagen_prod_editar',$data);
         $this->load->view('plantillas/footer-admin');
       } else {

        

          $config['upload_path'] = 'assets/upload'; 
          $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG'; 
          $config['remove_spaces'] = TRUE; 
          

          
          $this->load->library('upload', $config);

                      if (!$this->upload->do_upload('imagen')) { 

                             echo "<script type=\"text/javascript\">alert('No se pudo cargar el archivo');</script>"; 

                             $this->index();
                           }


                       else {

                      
                    if ($this->input->post('imagen')){
                      $imag = $imagen;
                     }else{
                      $imag = str_replace(" ", "_",$_FILES['imagen']['name']);
                     }

                     $data = array(
                      'imagen' => $imag,
                     );


                    $this->load->model('nuevoModelo');
                    $this->nuevoModelo->actualizar_productos($data, $id);
                    //redirect('EditarProductos');
                    redirect(base_url("EditarP/".$id));
                  }
       }

   }


           public function nueva_categoria(){
            
          $this->form_validation->set_rules('descripcion', 'Nombre de la categoria', 'required|is_unique[categoria.descripcion]');

          $this->form_validation->set_message('is_unique', 'El %s "'.$this->input->post('descripcion').'"ya esta registrado'); 
          $this->form_validation->set_message('required', 'El campo %s es obligatorio'); 
          if ($this->form_validation->run() == FALSE) { 

          $this->load->model('nuevoModelo'); 
          $data['categorias'] = $this->nuevoModelo->select_categoria();
          $data['title'] = 'Agregar Producto';
          $this->load->view('plantillas/header-admin',$data);  
          $this->load->view('contenidos/nuevaCategoria_view',$data); 
          $this->load->view('plantillas/footer-admin'); 
                                            } 

            else { 
                     $this->guardar_categoria(); 
                                                }
           } 


    function guardar_categoria(){
      $data = array(
        'descripcion' => $this->input->post('descripcion')
      );


            $this->load->model('nuevoModelo'); 
            $this->nuevoModelo->agregar_categoria($data); 
            //redirect(base_url('AgregarProducto')); 
            echo "<script type=\"text/javascript\">
              alert('La Categoria Agrego con exito');
              window.location =\"http://localhost/ci_taller/administrador_controler/gestionar_categorias\"
            </script>";
    }
    

}

