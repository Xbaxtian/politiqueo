<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class UsuariosModel extends CI_Model{

        public function listarusuarios(){
            $this->db->select('*');
            $this->db->from('usuarios');
            $query = $this->db->get();
            $result = $query->result_array();
            if(count($result)>0){
                return $result;
            }
        }

        public function borrarusuario($id){ //editarborrar
            $this->db->delete('usuarios', array('id' => $id));
        }

        public function registrarUsuario($data){
           $this->db->insert('usuarios',
           array('id_usuario'=>$data['id_usuario'],
                    'id_rol'=>$data['id_rol'],
                    'nombres'=>$data['nombres'],
                    'apellidos'=>$data['apellidos'],
                    'pass'=>$data['pass'],
                    'correo'=>$data['correo'])
          );

        }

        public function busqueda($txt){
            $this->db->from('usuarios');
            $this->db->like('nombres',$txt,'both');
            $query = $this->db->get();
            return $query ->result();

        }

}
