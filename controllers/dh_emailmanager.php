<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Dh_emailmanager extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
 
    function index()
    {
		#$dh_array=array('ein'=>'1','zwei'=>'2');
		#$this->template['dh_output'] = $dh_array;
        $this->template['title'] = 'DH Webservice Email Manager - This is the Frontend';
        $this->output('Dh_emailmanager');
    }
	
	
	
}