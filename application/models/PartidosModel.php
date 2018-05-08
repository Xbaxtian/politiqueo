<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PartidosModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function listarTodos(){
        $query = $this->db->get('partidos'); 
        return $query->result_array();
    }

    public function listarPoliticos($id_partido){
        $this->db->select('*');
        $this->db->from('politicos');
        $this->db->where('id_partido = '.$id_partido);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getNombre($id_partido){
        $this->db->select('nombre');
        $this->db->from('partidos');
        $this->db->where('id_partido = '.$id_partido);
        $query = $this->db->get();
        return $query->result_array();
    }
    
}