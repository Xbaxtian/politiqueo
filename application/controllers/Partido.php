<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partido extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('partidosModel');
        $this->load->helper('modulo');

        if(!$this->session->userdata('id_usuario')){
            $this->session->sess_destroy();
            redirect('login');
        }
    }

	public function index()
	{
        $resultado = $this->partidosModel->listarTodos();
		$data = array("content"=>'edicion/panelpartido',"dataView"=>array('resultado'=>$resultado));
		$this->load->view('layoutInicio',$data);
	}

    public function panelregistrar()
    {
        $data = array("content"=>'edicion/registrarpartido',"dataView"=>array());
		$this->load->view('layoutInicio',$data);
    }

    public function borrar()
    {
        $id = $this->input->post('idpartido');
        $this->partidosModel->borrarpartido($id);
    }

}
