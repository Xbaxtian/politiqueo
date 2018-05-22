<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('inicioModel');
		$this->load->model('rolModel');
		$this->load->helper('Modulo');
		$this->load->model('organosModel');

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
	public function mod1()
	{
		$resultado = $this->inicioModel->listarusuarios();
		$data = array("content"=>'admin/usuarios',"dataView"=>array('resultado' => $resultado));
		$this->load->view('layoutInicio',$data);
	}
	public function usuariosporid() // actualizar borrar
	{
		$id = $this->input->post('id');
		$resultado = $this->inicioModel->usuariosporid($id);
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

	    $this->inicioModel->registrarUsuario($data);
		redirect('admin/mod1');
	}
// --------------------------------------------------------------------------------------------------------//
	public function mod2()
	{
		$resultado = $this->rolModel->getRoles();
		$data = array("content"=>'admin/roles',"dataView"=>array('resultado' => $resultado));
		$this->load->view('layoutInicio',$data);
	}

	public function recibirdatos_rol()
	{
		$data_rol = array('descripcion'=>$this->input->post('descripcion'));
		$this->rolModel->registrarrol($data_rol);

		$data_modulos = array('modulos' => $this->input->post('modulos'));
	  	$this->rolModel->modulosasignados($data_modulos);
		redirect('admin/mod2');
	}
//---------------------------------------------------------------------------------------------------------//
	public function mod3()
	{
		$data = array("content"=>'edicion/addorgano',"dataView"=>array());
		$this->load->view('layoutInicio',$data);
	}

	public function mod4()
	{
		$data = array("content"=>'edicion/addpartido',"dataView"=>array());
		$this->load->view('layoutInicio',$data);
	}

	public function recibirdatos_nuevo()
	{

	}


}
