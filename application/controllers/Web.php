<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model('comisionModel');
		$this->load->model('dictamenModel');
		$this->load->model('loginModel');
	}

	public function index(){
		$dataView = array("content"=>'web/index',"dataView"=>array());
		$this->load->view('layout',$dataView);
	}

	public function dictamenDetallado(){
		$codigo = $this->input->get('proyecto');
		$dataView = array("content"=>'web/dictamenDetallado',"dataView"=>array("codigo"=>$codigo));
		$this->load->view('layout',$dataView);
	}

	public function estadisticasDictamen(){
		$codigo = $this->input->get('proyecto');
		$dataView = array("content"=>'web/estadisticasDictamen',"dataView"=>array("codigo"=>$codigo));
		$this->load->view('layout',$dataView);
	}

	public function suscripcion(){
		$this->load->view("web/suscripcion");
	}

	public function listarcomisiones(){ // LISTA DE comisiones
		$comisiones = $this->comisionModel->getComisiones();
		header('Content-Type: application/json');
    	echo json_encode( $comisiones );
	}

	public function modallogin(){
		$this->load->view("web/login");
	}

	public function login(){

		if (strlen($this->input->post('dni')) == 8 )
        {
			$data = array('dni' => $this->input->post('dni'));

            $resultado = $this->loginModel->getUsuarioVotacion($data);

            if(isset($resultado)){
				$resultado = $resultado[0];
                $this->session->set_userdata($resultado);
                $result = array("result"=>"success","dni"=>$resultado['dni']);
    			header('Content-Type: application/json');
    			echo json_encode($result);
        	}
			else
			{
				$data = array('dni' => $this->input->post('dni'));
				$respuesta = $this->loginModel->ingresarvisitante($data);
				$resultado = $this->loginModel->getUsuarioVotacion($data);
				$resultado = $resultado[0];
				$this->session->set_userdata($resultado);
				$result = array("result"=>$respuesta,"dni"=>$resultado['dni']);
    			header('Content-Type: application/json');
    			echo json_encode($result);
			}
		}
        else
        {
			$result = array("result"=>"error");
			header('Content-Type: application/json');
			echo json_encode($result);
        }
	}

	public function recibircalificacion(){

		$data = array('dni' => $this->input->post("dni"),
					  'codigo' => $this->input->post("codigo"),
					  'comentario' => $this->input->post('comentario'),
				  	  'calificacion'=>$this->input->post('puntaje'));

		$resultado = $this->comisionModel->registrarpuntuacion($data);
		header('Content-Type: application/json');
		echo json_encode(array("result"=>$resultado));
	}

	public function enviarpuntuaciones(){

		$id = $this->input->post('idObj');
		$resultado = $this->dictamenModel->getDictamenid($id);
		$puntuaciones =  $this->comisionModel->obtenerpuntuaciones($id);

		$data = array('resultado'=>$resultado,'puntuaciones'=>$puntuaciones);
		header('Content-Type: application/json');
    	echo json_encode( $data );
	}

	public function enviarcomentarios(){

		$id = $this->input->post('idObj');
		$resultado = $this->dictamenModel->getDictamenid($id);
		$comentarios =  $this->comisionModel->obtenercomentarios($id);

		$data = array('resultado'=>$resultado,'comentarios'=>$comentarios);
		header('Content-Type: application/json');
    	echo json_encode( $data );
	}

	public function recibirsuscripcion(){
		header('Content-Type: application/json');
		$data = array('nombres' => $this->input->post("nombre"),
					  'apellidos' => $this->input->post("apellidos"),
					  'email' => $this->input->post('email'),
				  	  'dni'=>$this->input->post('dni'),
				      'telefono'=>$this->input->post('telefono'),
				  	  'comisiones'=> $this->input->post('comisiones'));

		$resultado = $this->comisionModel->registrarsuscribcion($data);
		if(!isset($resultado) || $resultado=="error"){
			echo json_encode(array("result"=>"error"));
		}
		else{
			echo json_encode(array("result"=>"success"));
		}

	}

	public function busqueda(){
		$token = $this->input->post("algo");
		$busqueda = $this->dictamenModel->busquedatoken($token);
		header('Content-Type: application/json');
		echo json_encode($busqueda);
	}

	public function filtrar(){
		$token = $this->input->post("algo");
		$id = $this->input->post("id");
		$lugar = $this->dictamenModel->lugar($token);
		$busquedar = array($lugar[0],$this->dictamenModel->busquedaregion($token,$id));
		header('Content-Type: application/json');
		echo json_encode($busquedar);
	}

}



 ?>
