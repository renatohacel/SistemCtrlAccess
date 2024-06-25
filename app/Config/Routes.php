<?php

use CodeIgniter\Router\RouteCollection;



/**
 * @var RouteCollection $routes
 */


 //GETS RESIDENTES
$routes->get('/home', 'Home::index');
$routes->get('listar_r', 'Residentes::listar_r');
$routes->get('crear_r', 'Residentes::crear_r');
$routes->get('borrar_r/(:num)', 'Residentes::borrar_r/$1');
$routes->get('editar_r/(:num)', 'Residentes::editar_r/$1');
$routes->get('carros_r/(:num)', 'Residentes::carros_r/$1');
$routes->get('borrar_c/(:segment)/(:num)', 'Residentes::borrar_c/$1/$2');
//GET ACCESOS
$routes->get('accesos', 'Accesos::index');
$routes->get('borrar_a/(:num)', 'Accesos::borrar_a/$1');
$routes->get('visitante', 'Accesos::visitanteAlert');
$routes->get('residente', 'Accesos::residenteAlert');
$routes->get('accesos_r', 'Accesos::accesosResidentes');
$routes->get('accesos_visit', 'Accesos::accesosVisitantes');
//GET VIGILANTES
$routes->get('/', 'Vigilantes::index');
$routes->get('crear_v', 'Vigilantes::crear_v');
$routes->get('listar_v', 'Vigilantes::listar_v');
$routes->get('borrar_v/(:num)', 'Vigilantes::borrar_v/$1');
$routes->get('editar_v/(:num)', 'Vigilantes::editar_v/$1');
$routes->get('logout', 'Vigilantes::logout');
//POST RESIDENTES
$routes->post('guardar_r', 'Residentes::guardar_r');
$routes->post('update_r', 'Residentes::update_r');
$routes->post('guardar_c', 'Residentes::guardar_c');
$routes->post('update_c', 'Residentes::update_c');
//POST ACCESOS
$routes->post('guardar_a', 'Accesos::guardar_a');
$routes->post('update_a', 'Accesos::update_a');
//POST VIGILANTES
$routes->post('valida', 'Vigilantes::valida');
$routes->post('guardar_v', 'Vigilantes::guardar_v');
$routes->post('update_v', 'Vigilantes::update_v');


//ACERCA DE
$routes->get('acercaDe','Residentes::acercaDe');