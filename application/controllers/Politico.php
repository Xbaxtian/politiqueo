<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Politico extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('politicosModel');
        //$this->load->helper('Modulo');

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

    public function recibirdatos()
    {
        $this->form_validation->set_rules("imagenP", "URL de imagen", "required");
		$this->form_validation->set_rules("nombreP","Nombre de politico","required");
        $this->form_validation->set_rules("apellidoP","Apellido de politico","required");
        $this->form_validation->set_rules("edadP","Año de nacimiento","required");
        $this->form_validation->set_rules("dniP","Numero de DNI","required|min_length[8]|max_length[8]");
        //$this->form_validation->set_rules("bancadaP","Partido Politico","required");
        //$this->form_validation->set_rules("cargoP","Cargo de Politico","required");
        $this->form_validation->set_rules("representaP","Lugar de representación","required");
        $this->form_validation->set_rules("condicionP","Condicion","required");

        if ($this->form_validation->run() == FALSE)
        {
            $data = array("content"=>'edicion/registrarpolitico',"dataView"=>array());
    		$this->load->view('layoutInicio',$data);


        }
        else{
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

            $resultado = $this->politicosModel->registrarpolitico($data);
            header('Content-Type: application/json');
            echo json_encode(array("result"=>$resultado));
        }
    }

    public function borrarpolitico(){
		$id = $this->input->post('idObj');
		$data = array("objeto"=>"Politico", "id"=>$id, "direccion"=>"politico/borrar");
		$this->load->view("admin/modales/confirmacion", $data);
	}

    public function borrar()
    {
        $id = $this->input->post('idpolitico');
        $this->politicosModel->borrarpolitico($id);
    }
}
