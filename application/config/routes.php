<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller'] = "welcome";
$route['404_override'] = '';


$route['control'] = 'dashboard';
$route['control/logout'] = 'dashboard/logout';
$route['migrate/(:num)'] = 'migrate/index/$';
$route['control/laempresa/(:num)'] = 'control/laempresa/index/$';
$route['control/servicios/(:num)'] = 'control/servicios/index/$';
$route['control/slider_servicios/(:num)'] = 'control/slider_servicios/index/$';
$route['control/productos/(:num)'] = 'control/productos/index/$';
$route['control/sucursales/(:num)'] = 'control/sucursales/index/$';
$route['control/capacitaciones/(:num)'] = 'control/capacitaciones/index/$';
$route['control/novedades/(:num)'] = 'control/novedades/index/$';



###### FRONT ######
$route['la-empresa'] = 'welcome/la_empresa';
$route['grupo-de-productos'] = 'welcome/grupo_productos';
$route['servicios'] = 'welcome/servicios';
$route['servicio/(:any)/(:num)'] = 'welcome/detalle_servicio';
$route['producto-detalle/(:num)'] = 'welcome/producto_detalle';
$route['novedades'] = 'welcome/novedades';
$route['novedades/(:any)/(:num)'] = 'welcome/novedades_detalle';
$route['sucursales'] = 'welcome/sucursales';
$route['capacitaciones'] = 'welcome/capacitaciones';
$route['capacitaciones/(:any)'] = 'welcome/capacitaciones';




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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

/* append */
/* Location: ./application/config/routes.php */
