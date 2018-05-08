<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Organos extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('partidosModel');
    }


    public function index(){
        $dataPartidos = $this->partidosModel->listarTodos();
		$data = array("content"=>'organos/organo',"dataView"=>array('dataPartidos'=>$dataPartidos));
		$this->load->view('layout',$data);
    }

}

?>
