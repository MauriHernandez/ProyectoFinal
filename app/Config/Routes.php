<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/usuarios/login', 'UserController::index');
$routes->post('/usuarios/login','UserController::index');

$routes->get('/admin/inicio', 'Admin::inicio');
$routes->get('/admin/mostrarP', 'Admin::mostrarP');
$routes->get('/admin/mostrarD', 'Admin::mostrarD');
$routes->get('/admin/mostrarE', 'Admin::mostrarE');
$routes->get('/admin/mostrarA', 'Admin::mostrarA');

$routes->get('/admin/agregarP', 'Admin::agregarP');  
$routes->post('/admin/agregarP', 'Admin::agregarP'); 
$routes->post('/admin/insertP', 'Admin::insertP');

$routes->get('/admin/agregarD', 'Admin::agregarD');  
$routes->post('/admin/agregarD', 'Admin::agregarD'); 
$routes->post('/admin/insertD', 'Admin::insertD');

$routes->get('/admin/agregarE', 'Admin::agregarE');  
$routes->post('/admin/agregarE', 'Admin::agregarE'); 
$routes->post('/admin/insertE', 'Admin::insertE');

$routes->get('/admin/agregarA', 'Admin::agregarA');  
$routes->post('/admin/agregarA', 'Admin::agregarA'); 
$routes->post('/admin/insertA', 'Admin::insertA');


$routes->get('admin/editarD/(:num)','Admin::editarD/$1');
$routes->post('/admin/updateD','Admin::updateD');
$routes->get('admin/editarE/(:num)','Admin::editarE/$1');
$routes->post('/admin/updateE','Admin::updateE');
$routes->get('admin/editarP/(:num)','Admin::editarP/$1');
$routes->post('/admin/updateP','Admin::updateP');
$routes->get('admin/editarA/(:num)','Admin::editarA/$1');
$routes->post('/admin/updateA','Admin::updateA');

$routes->get('/admin/deleteA/(:num)', 'Admin::deleteA/$1');
$routes->get('/admin/deleteP/(:num)', 'Admin::deleteP/$1');
$routes->get('/admin/deleteD/(:num)', 'Admin::deleteD/$1');
$routes->get('/admin/deleteE/(:num)', 'Admin::deleteE/$1');



//doctor
$routes->get('/doctor/inicio', 'DoctorController::inicio');
$routes->get('/doctor/recetas', 'DoctorController::recetas');
$routes->get('/doctor/apoyo', 'DoctorController::apoyo');

$routes->post('/doctor/recetas', 'DoctorController::recetas');

$routes->post('/doctor/apoyo', 'DoctorController::apoyo');
$routes->get('/doctor/mostrarR', 'DoctorController::mostrarR');
$routes->get('/doctor/mostrarA', 'DoctorController::mostrarA');

$routes->get('/doctor/cerrar_sesion', 'DoctorController::cerrar_sesion');
$routes->get('/admin/cerrar_sesion', 'Admin::cerrar_sesion');
$routes->get('doctor/descargar/(:num)', 'DoctorController::descargarPdf/$1');
$routes->get('doctor/descargarA/(:num)', 'DoctorController::descargarPdfA/$1');


