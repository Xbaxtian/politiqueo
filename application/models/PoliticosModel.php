<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PoliticosModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function listarTodos(){
        $this->db->select('*');
        $this->db->from('politicos');
        $this->db->where('estado = 1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPolitico($id_politico){
        $this->db->select('pol.id_politico, pol.nombres, pol.apellidos, pol.fec_nacimiento, pol.dni, pol.id_cargo, pol.id_partido, pol.condicion, pol.imagen, par.nombre');
        $this->db->from('politicos pol');
        $this->db->join('partidos par','pol.id_partido=par.id_partido');
        $this->db->where('id_politico = '.$id_politico);
        $this->db->where('pol.estado = 1');
        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result)>0){
            return $result[0];
        }
    }

    public function registrarUsuario($data){


       $this->db->insert('politicos',
       array('nombres'=>$data['nombres'],
                'apellidos'=>$data['apellidos'],
                'nombres'=>$data['nombres'],
                'apellidos'=>$data['apellidos'],
                'imagen'=>$data['url'],
                'fec_nacimiento'=>$data['dni'],
                )
      );

    }
    public function borrarpolitico($id){
        $this->db->set('estado', 0);
        $this->db->where('id', $id);
        $this->db->update('politicos');
    }

}
