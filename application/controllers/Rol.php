<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rol extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('rolModel');
        $this->load->helper('Modulo');
		$this->load->library(array('form_validation'));
		if(!$this->session->userdata('id_usuario')){
		    $this->session->sess_destroy();
			redirect('login');
		}
    }

	public function index()
	{
        $resultado = $this->rolModel->getRoles();
		$data = array("content"=>'admin/roles',"dataView"=>array('resultado' => $resultado));
		$this->load->view('layoutInicio',$data);
	}

	public function anadirRol(){
		$this->load->view('admin/modales/mroles');
	}

	public function recibirdatos()
	{
		$this->form_validation->set_rules("descripcion", "Descripcion", "trim|required");
		$this->form_validation->set_rules("modulos[]", "Modulos", "required");

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/modales/mroles');
		}
		else{
			$data_rol = array('descripcion'=>$this->input->post('descripcion'));
			$this->rolModel->registrarrol($data_rol);

			$data_modulos = array('modulos' => $this->input->post('modulos'));
			$this->rolModel->modulosasignados($data_modulos);
			header('Content-Type: application/json');
			echo json_encode(array("result"=>"success"));
		}
	}

	public function borrar()
    {
        $id = $this->input->post('idrol');
        $this->rolModel->borrarrol($id);
    }
}
