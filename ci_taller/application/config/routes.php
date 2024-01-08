<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'principal_controler';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['Registrarse'] = 'registrarse_controler';
$route['Principal'] = 'principal_controler';
$route['Somos'] = 'principal_controler/somos';
$route['Ingresar'] = 'ingresar_controler';
$route['QuienesSomos'] = 'somos_controler';
$route['Novedades'] = 'novedades_controler';
$route['Contacto'] = 'contacto_controler';
$route['Comercializacion'] = 'principal_controler/comercializacion';
$route['Productos'] = 'productos_controler/catalogos';
$route['Productos/(:any)'] = 'productos_controler/catalogos/$1';
$route['ProductosRepuestos'] = 'productos_controler/repuestos';
$route['Sesion'] = 'ingresar_controler/iniciar_sesion';
$route['Mensaje'] = 'contacto_controler/validar_mensaje';
$route['Salir'] = 'logueadoControler/cerrar_sesion';
$route['SalirAdmin'] = 'administrador_controler/cerrar_sesion';
$route['Administrador'] = 'administrador_controler';
$route['Perfil'] = 'logueadoControler/Perfil';
$route['Editar'] = 'logueadoControler/Editar_datos';
$route['UsuarioPrincipal'] = 'logueadoControler';
$route['UsuarioComercializacion'] = 'logueadoControler/Comercializacionlog';
$route['UsuarioContacto'] = 'logueadoControler/Contactolog';
$route['UsuarioSomos'] = 'logueadoControler/somoslog';
$route['Catalogo'] = 'logueadoControler/catalogos';
$route['Catalogo/(:any)'] = 'logueadoControler/catalogos/$1';
$route['Carrito'] = 'carritoControler';
$route['Aviso'] = 'carritoControler/aviso_carrito';
$route['Comprar'] = 'carritoControler/realizar_pedido';
$route['MenorPrecio'] = 'logueadoControler/menorPrecio';
$route['MenorPrecio/(:any)'] = 'logueadoControler/menorPrecio/$1';
$route['MayorPrecio'] = 'logueadoControler/mayorPrecio';
$route['MayorPrecio/(:any)'] = 'logueadoControler/mayorPrecio/$1';
$route['porCategoria'] = 'logueadoControler/filtrar_producto';
$route['porCategori/(:any)'] = 'logueadoControler/filtrar_producto/$1';
$route['menorPrecio'] = 'productos_controler/menorPrecio';
$route['menorPrecio/(:any)'] = 'productos_controler/menorPrecio/$1';
$route['mayorPrecio'] = 'productos_controler/mayorPrecio';
$route['mayorPrecio/(:any)'] = 'productos_controler/mayorPrecio/$1';
$route['porcategoria'] = 'productos_controler/filtrar_producto';
$route['porcategoria/(:any)'] = 'productos_controler/filtrar_producto/$1';
$route['AgregarAdmin'] = 'administrador_controler/nuevo_administrador';
$route['Pedidos'] = 'administrador_controler/adminPedidos';
$route['PedidosporFecha'] = 'pedidosControler/pedidoFecha';
$route['PedidosporFecha/(:any)'] = 'pedidosControler/pedidoFecha/$1';
$route['AgregarProducto'] = 'administrador_controler/nuevo_producto';
$route['EditarProductos'] = 'nuevoProducto_controler/gestionar_productos';
$route['EditarP/(:any)'] = 'nuevoProducto_controler/editar_productos/$1';
$route['ActualizarProducto/(:any)'] = 'nuevoProducto_controler/actualizar_productos/$1';
$route['PedidosDetalles/(:any)'] = 'administrador_controler/pedidosDetalles/$1';
$route['PedidosporPago'] = 'pedidosControler/pedidoPago';
$route['PedidosporPago/(:any)'] = 'pedidosControler/pedidoPago/$1';
$route['Reportes'] = 'administrador_controler/reportesVentas';
$route['NuevaCategoria'] = 'nuevoProducto_controler/alta_categoria';
$route['AgregarCategoria'] = 'nuevoProducto_controler/agregar_categoria';