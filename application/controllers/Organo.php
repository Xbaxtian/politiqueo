<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organo extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('partidosModel');
        $this->load->helper('Modulo');
    }

	public function index()
	{
		$data = array("content"=>'edicion/addorgano',"dataView"=>array());
		$this->load->view('layoutInicio',$data);
	}
}
