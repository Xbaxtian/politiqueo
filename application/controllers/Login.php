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
}
