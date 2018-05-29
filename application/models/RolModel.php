<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RolModel extends CI_Model{

    public function getRoles(){
        $this->db->select('r.id_rol,r.descripcion,count(u.id_rol) as total');
        $this->db->from('usuarios u');
        $this->db->join('roles r','u.id_rol = r.id_rol');
        $this->db->group_by('u.id_rol');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function registrarrol($data){
        $this->db->insert('roles', array('descripcion'=>$data['descripcion']));
    }

    public function modulosasignados($data){
        $this->db->select("max(id_rol) as id");
        $this->db->from('roles');
        $query = $this->db->get();
        $row = $query->result_array();

        for ($i=0; $i < count($data['modulos']); $i++) {
            $this->db->insert('modulos_asignados',
            array('id_modulo'=>$data['modulos'][$i],'id_rol'=>$row[0]['id']));
        }
    }

    public function borrarrol($id)
    {  
        $this->db->delete('roles', array('id_rol' => $id));
    }

}
