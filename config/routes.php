<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
$route['default_controller'] = "dh_emailmanager";
$route['(.*)'] = "dh_emailmanager/index/$1";
$route[''] = 'dh_emailmanager/index';