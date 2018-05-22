<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Politico extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('politicosModel');
        $this->load->helper('Modulo');
    }

	public function index()
	{
		$data = array("content"=>'edicion/addpolitico',"dataView"=>array());
		$this->load->view('layoutInicio',$data);
	}
}
