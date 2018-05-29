<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Politico extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('politicosModel');
        $this->load->helper('Modulo');

        if(!$this->session->userdata('id_usuario')){
            $this->session->sess_destroy();
            redirect('login');
        }
    }

	public function index()
	{
        $resultado = $this->politicosModel->listarTodos();
		$data = array("content"=>'edicion/panelpolitico',"dataView"=>array('resultado'=>$resultado));
		$this->load->view('layoutInicio',$data);
	}

    public function panelregistrar()
    {
        $data = array("content"=>'edicion/registrarpolitico',"dataView"=>array());
		$this->load->view('layoutInicio',$data);
    }

    public function registrar()
    {
        $data = array(
	        'url'=>$this->input->post('imagenP'),
			'nombres'=>$this->input->post('nombreP'),
            'apellidos'=>$this->input->post('apellidoP'),
			'edad'=>$this->input->post('edadP'),
            'dni'=>$this->input->post('dniP'),
            'bancada'=>$this->input->post('bancadaP'),
            'cargo'=>$this->input->post('cargoP'),
            'representa'=>$this->input->post('representaP'),
            'condicion'=>$this->input->post('condicionP'),
	      );

	    $this->politicosModel->registrarpolitico($data);
		redirect('politico');
    }
    public function borrar()
    {
        $id = $this->input->post('idpolitico');
        $this->politicosModel->borrarpolitico($id);
    }
}
