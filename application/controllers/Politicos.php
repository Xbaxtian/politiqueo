<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Politicos extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('politicosModel');
    }

	public function index()
	{
		$id_politico = $this->input->get('id');
		$dataPolitico = $this->politicosModel->getPolitico($id_politico);
		$data = array("content"=>'politicos/politico',"dataView"=>array('dataPolitico'=>$dataPolitico));
		$this->load->view('layout',$data);
	}
}
