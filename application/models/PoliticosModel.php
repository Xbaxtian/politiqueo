<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PoliticosModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function listarTodos(){
        $query = $this->db->get('politicos'); 
        return $query->result_array();
    }

    public function getPolitico($id_politico){
        $this->db->select('pol.id_politico, pol.nombres, pol.apellidos, pol.fec_nacimiento, pol.dni, pol.id_cargo, pol.id_partido, pol.condicion, pol.imagen, par.nombre');
        $this->db->from('politicos pol');
        $this->db->join('partidos par','pol.id_partido=par.id_partido');
        $this->db->where('id_politico = '.$id_politico);
        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result)>0){
            return $result[0];
        }
    }
    
}