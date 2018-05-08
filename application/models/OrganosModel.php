<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrganosModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function listarTodos(){
        $query = $this->db->get('organos'); 
        return $query->result_array();
    }
    
}
