<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CargosModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function listarTodos(){
        $this->db->select('*');
        $this->db->from('cargos');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function registrarcargo($data){
        try
        {
            $this->db->insert('cargos',
            array('descripcion'=>$data['descripcion'],
                     'periodo'=>$data['periodo'],
                     'tipo_periodo'=>$data['tipoperiodo'])
           );
           return "success";
        }
        catch(Exception $e){
            return "error";
        }
    }

}
