<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('usuariosModel');
        $this->load->helper('Modulo');
    }

	public function index()
	{
        $resultado = $this->usuariosModel->listarusuarios();
		$data = array("content"=>'admin/usuarios',"dataView"=>array('resultado' => $resultado));
		$this->load->view('layoutInicio',$data);

	}

	public function usuariosporid() // actualizar borrar
	{
		$id = $this->input->post('id');
		$resultado = $this->UsuariosModel->usuariosporid($id);
		$data = array("content"=>'admin/usuarios',"dataView"=>array('resultado' => $resultado));
		$this->load->view('layoutInicio',$data);
	}

	public function recibirdatos_usuario(){
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
}
