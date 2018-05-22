<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('inicioModel');
		$this->load->helper('Modulo');

		if(!$this->session->userdata('id_usuario')){
			redirect('login');
		}
    }

	public function index()
	{
		$id_rol =  $this->session->userdata('id_rol');
		$resultado = $this->inicioModel->getModulo($id_rol);
		$data = array("content"=>'admin/inicio',"dataView"=>array('resultado' => $resultado));
		$this->load->view('layoutInicio',$data);
	}
}
