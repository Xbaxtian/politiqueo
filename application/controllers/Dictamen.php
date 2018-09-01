<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dictamen extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('dictamenModel');
		$this->load->model('comisionModel');
	}

	public function index(){
		$dictamenes = $this->dictamenModel->getDictamenes();

		$dataView = array("view"=>'relatoria/dictamenes',"data"=>array('dictamenes'=>$dictamenes));
		$this->load->view('layout',$dataView);
	}

	public function listardictamenes(){ // LISTA DE DICTAMENES
		$dictamenes = $this->dictamenModel->getDictamenes();
		header('Content-Type: application/json');
    	echo json_encode( $dictamenes );
	}

	public function anadirdictamen(){
		$tdictamen = $this->dictamenModel->tipodictamenes();
		$comisiones = $this->comisionModel->getComisiones();
		$estados = $this->dictamenModel->getEstados();

		$dataView = array("view"=>'relatoria/anadirdictamen',"data"=>array('tdictamen'=>$tdictamen,'comisiones'=>$comisiones,'estados'=>$estados));
		$this->load->view('layout',$dataView);
	}

	public function actualizardictamen(){
		$id = $this->input->post('idObj');

		$resultado = $this->dictamenModel->getDictamenid($id);
		$dcomisiones = $this->comisionModel->getcomisiondictamen($id); // comisiones
		$tipodictamen = $this->dictamenModel->obtenertipo($resultado[0]['id_tipo_dictamen']);
		$estadodictamen = $this->dictamenModel->obtenerestado($resultado[0]['id_dictamen']);

		$tdictamen = $this->dictamenModel->tipodictamenes();
		$comisiones = $this->comisionModel->getComisiones();
		$estados = $this->dictamenModel->getEstados();

		$data = array('resultado'=>$resultado,'dcomisiones' => $dcomisiones,'tipodictamen'=>$tipodictamen,'estadodictamen'=>$estadodictamen,
                      'tdictamen' => $tdictamen,'comisiones'=>$comisiones,'estados'=>$estados);

        $this->load->view('relatoria/anadirdictamen',$data);
	}

	public function obtenerdictamen(){ // DICTAMENES POR id

		$id = $this->input->post('idObj');
		$resultado = $this->dictamenModel->getDictamenid($id);

		$data = array('resultado'=>$resultado);
		header('Content-Type: application/json');
    	echo json_encode( $data );

	}
	public function recibirdatos(){
		$this->form_validation->set_rules("titulo", "Título", "required");
		$this->form_validation->set_rules("codigo", "Código", "required");
		$this->form_validation->set_rules("sumilla", "Sumilla", "required");
		$this->form_validation->set_rules("estado", "Estado", "required");
		//$this->form_validation->set_rules("comisiones[]", "Comisiones o Comisión", "required");
        $this->form_validation->set_rules("tipo","Tipo","required");
        $this->form_validation->set_rules("fdebate","fecha de debate","required");

		if ($this->form_validation->run() == FALSE)
        {
			$tdictamen = $this->dictamenModel->tipodictamenes();
			$comisiones = $this->comisionModel->getComisiones();
			$estados = $this->dictamenModel->getEstados();

			$data = array('tdictamen'=>$tdictamen,'comisiones'=>$comisiones,'estados'=>$estados);
			$this->load->view('relatoria/anadirdictamen',$data);
		}
		else
		{
			$data = array('titulo' => $this->input->post("titulo"),
						  'codigo' => $this->input->post("codigo"),
						  'sumilla'=> $this->input->post("sumilla"),
						  'estado' => $this->input->post('estado'),
						  'comisiones' => $this->input->post('comisiones'),
					  	  'tipo'=>$this->input->post('tipo'),
					  	  'fecha'=>$this->input->post('fdebate'));
			$resultado = $this->dictamenModel->registrardictamen($data);
			header('Content-Type: application/json');
			echo json_encode(array("result"=>$resultado));
		}
	}

	public function actualizar(){
		$this->form_validation->set_rules("titulo", "Título", "required");
		$this->form_validation->set_rules("codigo", "Código", "required");
		$this->form_validation->set_rules("sumilla", "Sumilla", "required");
		$this->form_validation->set_rules("estado", "Estado", "required");
		//$this->form_validation->set_rules("comisiones[]", "Comisiones o Comisión", "required");
        $this->form_validation->set_rules("tipo","Tipo","required");
        $this->form_validation->set_rules("fdebate","fecha de debate","required");

		if ($this->form_validation->run() == FALSE)
        {
			$tdictamen = $this->dictamenModel->tipodictamenes();
			$comisiones = $this->comisionModel->getComisiones();
			$estados = $this->dictamenModel->getEstados();

			$data = array('tdictamen'=>$tdictamen,'comisiones'=>$comisiones,'estados'=>$estados);
			$this->load->view('relatoria/anadirdictamen',$data);
        }
		else
		{
			$data = array('id'=>$this->input->post('id'),
						  'titulo' => $this->input->post("titulo"),
						  'codigo' => $this->input->post("codigo"),
						  'sumilla'=> $this->input->post("sumilla"),
						  'estado' => $this->input->post('estado'),
						  'comisiones' => $this->input->post('comisiones'),
					  	  'tipo'=>$this->input->post('tipo'),
					  	  'fecha'=>$this->input->post('fdebate'));

			$resultado = $this->dictamenModel->actualizardictamen($data);
			header('Content-Type: application/json');
			echo json_encode(array("result"=>$resultado));
		}
	}
}
