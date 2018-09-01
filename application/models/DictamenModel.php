<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DictamenModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function getDictamenes(){
            $this->db->select('id_dictamen,id_usuario,id_tipo_dictamen,codigo,titulo,version,sumilla,DATE_FORMAT(fec_debate,"%d/%m/%y") as fecha,id_estado');
            $this->db->from('dictamenes');
            $query = $this->db->get();
            $result = $query->result_array();
            if(count($result)>0){
                return $result;
            }
    }

    public function tipodictamenes(){
        $this->db->select('*');
        $this->db->from('tipo_dictamen');
        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result)>0){
            return $result;
        }
    }

    public function getEstados(){
        $this->db->select('*');
        $this->db->from('estados');
        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result)>0){
            return $result;
        }
    }
    public function obtenertipo($id){
        $this->db->select('*');
        $this->db->from('tipo_dictamen');
        $this->db->where('id_tipo_dictamen = '.$id);
        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result)>0){
            return $result;
        }
    }
    public function getDictamenid($id){
        $this->db->select('d.id_dictamen,d.id_tipo_dictamen,d.codigo,d.titulo,d.sumilla,DATE_FORMAT(fec_debate,"%d/%m/%y") as fecha,d.id_estado,c.nombres,c.apellidos,c.bancada');
        $this->db->from('dictamenes d');
        $this->db->join('propuestas p','d.id_dictamen = p.id_dictamen');
        $this->db->join('congresistas c','p.id_congresista = c.id_congresista');
        $this->db->where(array('d.codigo'=>$id));
        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result)>0){
            return $result;
        }
    }

    public function obtenerestado($id){
        $this->db->select('*');
        $this->db->from('dictamenes d');
        $this->db->join('estados e','d.id_estado = e.id_estado');
        $this->db->where('d.id_dictamen = '.$id);
        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result)>0){
            return $result;
        }

    }
    public function registrardictamen($data){

        try{

          $this->db->trans_begin();
          $this->db->insert('dictamenes',
          array(   'id_usuario' => $this->session->userdata('id_usuario'),
                   'id_tipo_dictamen'=>$data['tipo'],
                   'codigo'=>$data['codigo'],
                   'titulo'=>$data['titulo'],
                   'version'=>0,
                   'sumilla'=>$data['sumilla'],
                   'fec_debate'=>$data['fecha'],
                   'id_estado'=>$data['estado']
               )
         );

         $this->db->select('max(id_dictamen) as id');
         $this->db->from('dictamenes');
         $query = $this->db->get();
         $id = $query->result_array();

         for ($i=0; $i < count($data['comisiones']) ; $i++) {
             $this->db->insert('dictamen_comision',
                        array('id_comisiones'=>$data['comisiones'][$i],
                              'id_dictamen'=>$id[0]['id']));
         }

         if ($this->db->trans_status() === FALSE)
         {
             $this->db->trans_rollback();
             return "error";
         }
         else
         {
             $this->db->trans_commit();
             return "success";
         }
       }
       catch (Exception $e) {

          return "error";
       }

    }

    public function actualizardictamen($data){
        try{
            $this->db->trans_begin();
            $this->db->set('id_tipo_dictamen',$data['tipo']);
            $this->db->set('codigo',$data['codigo']);
            $this->db->set('titulo',$data['titulo']);
            $this->db->set('sumilla',$data['sumilla']);
            $this->db->set('id_estado',$data['estado']);
            $this->db->set('fec_debate',$data['fecha']);
            $this->db->where('id_politico', $data['id']);
            $this->db->delete('historial_academico');

            $this->db->where('id_dictamen', $data['id']);
            $this->db->delete('dictamen_comision');

            if(isset($data['comisiones'])){
                for ($i=0; $i < count($data['comisiones']) ; $i++) {
                    $this->db->insert('dictamen_comision',
                               array('id_comisiones'=>$data['comisiones'][$i],
                                     'id_dictamen'=>$id[0]['id']));
                }
            }

            if ($this->db->trans_status() === FALSE)
            {
            $this->db->trans_rollback();
            return "error";
            }
            else
            {
            $this->db->trans_commit();
            return "success";
            }
        }
        catch (Exception $e) {
            return "error";
        }
    }

	public function busquedatoken($token){
        $this->db->select('id_dictamen,id_usuario,id_tipo_dictamen,codigo,titulo,version,sumilla,DATE_FORMAT(fec_debate,"%d/%m/%y") as fecha,id_estado');
        $this->db->from('dictamenes');
        $or = array('codigo' => $token, 'titulo' => $token, 'sumilla' => $token,'fec_debate'=>$token);
        $this->db->or_like($or);

        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result)>0){
            return $result;
        }
    }

    public function busquedaregion($token,$id){
        $this->db->select('c.calificacion,count(calificacion) as cantidad,');
        $this->db->from('comentarios c');
        $this->db->join('visitantes  v ', 'c.dni = v.dni');
        $this->db->join('regiones r','v.id_region = r.id_region');
        $this->db->where('c.id_dictamen',(integer)$id);
        $this->db->like('r.nombre',ucfirst($token));
        $this->db->group_by("c.calificacion");

        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result)>0){
            return $result;
        }
    }

    public function lugar($token){
        $this->db->select('nombre as lugar');
        $this->db->from('regiones');
        $this->db->like('nombre',ucfirst($token));

        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result)>0){
            return $result;
        }
    }
}
