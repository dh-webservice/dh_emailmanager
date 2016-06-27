<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
$config['module']['dh_emailmanager'] = array
(
    'module' => "Dh_emailmanager",
    'name' => "DH Webservice Email Manager",
    'description' => "Save and manage email-addresses and form data from request form.",
    'author' => "Partikule",
    'version' => "1.1",
 
    // 'uri' should be the module's folder in lowercase.
    // From 1.0.3, it is not mandatory to set 'uri'.
    'uri' => 'dh_emailmanager',
    'has_admin'=> TRUE,
    'has_frontend'=> TRUE,
);
 
return $config['module']['dh_emailmanager'];