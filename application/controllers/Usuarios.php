<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('usuariosModel');
        $this->load->helper('modulo');

		if(!$this->session->userdata('id_usuario')){
		    $this->session->sess_destroy();
			redirect('login');
		}
    }

	public function index()
	{
        $resultado = $this->usuariosModel->listarusuarios();
		$data = array("content"=>'admin/usuarios',"dataView"=>array('resultado' => $resultado));
		$this->load->view('layoutInicio',$data);

	}

	public function borrar() // borrar
	{
		$id = $this->input->post('idusuario');
		$result = $this->usuariosModel->borrarusuario($id);
		if($result == "success"){
			redirect("usuarios");
		}
		else {
			header('Content-Type: application/json');
			echo json_encode(array("result"=>$result));
		}
	}

	public function recibirdatos()
	{
		$data = array(
	        'id_usuario'=>$this->input->post('id'),
			'id_rol'=>$this->input->post('rol'),
			'nombres'=>$this->input->post('nombres'),
			'apellidos'=>$this->input->post('apellidos'),
			'pass'=>$this->input->post('pass'),
			'correo'=>$this->input->post('correo')
	      );

	    $this->usuariosModel->registrarUsuario($data);
		redirect('usuarios');
	}

	public function busqueda()
	{
		$txt = $this->input->post('texto');
		$resultado = $this->usuariosModel->busqueda($txt);
		echo json_encode($resultado);
	}
}
