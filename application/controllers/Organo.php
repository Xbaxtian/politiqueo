<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organo extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('organosModel');
        $this->load->helper('modulo');

        if(!$this->session->userdata('id_usuario')){
            $this->session->sess_destroy();
            redirect('login');
        }
    }

	public function index()
	{
        $resultado = $this->organosModel->listarTodos();
		$data = array("content"=>'edicion/panelorgano',"dataView"=>array('resultado'=>$resultado));
		$this->load->view('layoutInicio',$data);
	}

    public function panelregistrar()
    {
        $data = array("content"=>'edicion/registrarorgano',"dataView"=>array());
		$this->load->view('layoutInicio',$data);
    }

    public function registrar()
    {
        $data = array(
	        'descripcion'=>$this->input->post('descripcion'),
			'titulo'=>$this->input->post('titulo'),
			'url'=>$this->input->post('url'),
	      );

	    $result = $this->organosModel->registrarorgano($data);
        redirect('organo');
        if($result === "success"){

		}
		else {
			header('Content-Type: application/json');
			echo json_encode(array("result"=>$result));

		}
    }

    public function borrar()
    {
        $id = $this->input->post('idorgano');
        $this->organosModel->borrarorgano($id);
        redirect('organo');
    }


}
