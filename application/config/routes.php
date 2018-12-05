<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 

$route['user/logout'] = 'user/logout';
$route['login'] = 'user/login';
$route['user/create'] = 'user/create';
$route['user/add'] = 'user/add';
$route['user/(:any)'] = 'user/single_profile/$1';
$route['tasks/create'] = 'tasks/create';
$route['tasks/add'] = 'tasks/add';
$route['tasks/(:any)'] = 'tasks/single_task/$1';
$route['user'] = 'user/index';
$route['tasks'] = 'tasks/index';
$route['default_controller'] = 'homepage/index';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
