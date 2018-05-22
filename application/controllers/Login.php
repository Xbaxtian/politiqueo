<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    public function __constuct(){
        parent:: __constuct();
        
    }

    public function index(){
        $data = array("content"=>'admin/login',"dataView"=>'');
        $this->load->view('layoutAdmin',$data);
    }

    public function acceso(){
        $data = array('email' => $this->input->post('email'),
                      'pass' => $this->input->post('pass'));
        $this->load->model('loginModel');
        $resultado = $this->loginModel->getUsuario($data);
        $resultado = $resultado[0];
        if($resultado != false){
            print_r($resultado);
            $this->session->set_userdata($resultado);
            redirect('admin');
        }
        else{
            redirect('Login');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }
}
