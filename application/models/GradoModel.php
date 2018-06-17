<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GradoModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function registrargrado($data){
        try
        {
            $this->db->insert('grados_academicos',
            array('nombre'=>$data['nombre']));
           return "success";
        }
        catch(Exception $e){
            return "error";
        }
    }

    public function listarTodos()
    {
        $this->db->select('*');
        $this->db->from('grados_academicos');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function obtenerestudios($id)
    {
        $this->db->select('*');
        $this->db->from('historial_academico ha');
        $this->db->join('grados_academicos ga','ha.id_grado = ga.id_grado');
        $this->db->where('id_politico = '.$id);
        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result)>0){
            return $result;
        }
    }

}
