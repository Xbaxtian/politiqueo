<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrganosModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function listarTodos(){
        $this->db->select('*');
        $this->db->from('organos');
        $this->db->where('estado = 1');
        $query = $this->db->get();
        $result = $query->result_array();

        if(count($result)>0){
            return $result;
        }
    }

    public function registrarorgano($data){
        $this->db->insert('organos',
        array('descripcion'=>$data['descripcion'],
                 'titulo'=>$data['titulo'],
                 'imagen'=>$data['url'],
                 'estado'=>1)
       );
    }

    public function borrarorgano($id){
        $this->db->set('estado', 0);
        $this->db->where('id', $id);
        $this->db->update('organos');
    }

}
