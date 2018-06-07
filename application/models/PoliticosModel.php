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

    public function listarTodosAdmin(){
        $this->db->select('*');
        $this->db->from('politicos');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPolitico($id_politico){
        $this->db->select('pol.id_politico, pol.nombres, pol.apellidos, pol.fec_nacimiento, pol.dni, pol.id_cargo, pol.representa ,pol.id_partido, pol.condicion, pol.imagen, par.nombre');
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

    public function registrarpolitico($data){

       try {
           $this->db->insert('politicos',
           array('nombres'=>$data['nombres'],
                    'apellidos'=>$data['apellidos'],
                    'nombres'=>$data['nombres'],
                    'apellidos'=>$data['apellidos'],
                    'imagen'=>$data['url'],
                    'fec_nacimiento'=>$data['edad'],
                    'id_cargo'=>$data['cargo'],
                    'representa'=>$data['representa'],
                    'id_partido'=>$data['bancada'],
                    'condicion'=>$data['condicion'],
                    'estado' => 1)
          );

          return "success";
       } catch (Exception $e) {
          return "error";
       }
    }

    public function actualizarpolitico($data){
        try
        {
            $this->db->set('nombre',$data['nombres|']);
            $this->db->set('apellidos',$data['apellidos']);
            $this->db->set('imagen',$data['imagen']);
            $this->db->set('fec_nacimiento',$data['edad']);
            $this->db->set('id_cargo',$data['cargo']);
            $this->db->set('representa',$data['representa']);
            $this->db->set('id_partido',$data['bancada']);
            $this->db->set('condicion',$data['condicion']);
            $this->db->where('id_partido',$data['id'] );
            $this->db->update('partidos');
            return "success";
        }
        catch (Exception $e) {
            return "error";
        }
    }
    public function borrarpolitico($id){
        try {
            $this->db->set('estado', 0);
            $this->db->where('id_politico', $id);
            $this->db->update('politicos');

            return "success";
        } catch (Exception $e) {
            return "error";
        }

    }

    public function activarpolitico($id){
        try {
            $this->db->set('estado', 1);
            $this->db->where('id_politico', $id);
            $this->db->update('politicos');

            return "success";
        } catch (Exception $e) {
            return "error";
        }

    }



}
