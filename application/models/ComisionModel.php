<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ComisionModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function getComisiones(){
            $this->db->select('id_comision,descripcion');
            $this->db->from('comisiones');
            $this->db->where('activo = 1');
            $query = $this->db->get();
            $result = $query->result_array();
            if(count($result)>0){
                return $result;
            }
    }

    public function getcomisiondictamen($id){
        $this->db->select('*');
        $this->db->from('dictamenes d');
        $this->db->join('dictamen_comision dc','d.id_dictamen = dc.id_dictamen');
        $this->db->join('comisiones c','dc.id_comision = c.id_comision');
        $this->db->where(array('d.codigo'=>$id));
        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result)>0){
            return $result[0];
        }
    }

    public function obtenerpuntuaciones($id){
        $this->db->select('calificacion,count(calificacion) as cantidad');
        $this->db->from('comentarios c');
        $this->db->join('dictamenes dc','c.id_dictamen = dc.id_dictamen');
        $this->db->where(array('dc.codigo'=>$id));
        $this->db->group_by("calificacion");
        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result)>0){
            return $result;
        }
    }

    public function obtenercomentarios($id){
        $this->db->select('comentario');
        $this->db->from('comentarios c');
        $this->db->join('dictamenes dc','c.id_dictamen = dc.id_dictamen');
        $this->db->where(array('dc.codigo'=>$id));
		$this->db->order_by('c.id_comentario','DESC');
        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result)>0){
            return $result;
        }
    }

    public function registrarpuntuacion($data){
		$query = $this->db->get_where('comentarios',array('dni'=>$data['dni'],'id_dictamen'=>$data['codigo']));
		$aux = $query->result_array();
		if(count($aux)>0){
			return "error";
		}
		else{
			$this->db->trans_begin();
			$this->db->insert('comentarios',
			array(   'id_dictamen' => $data['codigo'],
			       'dni'=>$data['dni'],
			       'comentario'=>$data['comentario'],
			       'calificacion'=>$data['calificacion']
			   )
			);

			if ($this->db->trans_status() === FALSE){
			 $this->db->trans_rollback();
			 return "error";
			}
			else{
			 $this->db->trans_commit();
			 return "success";
			}
		}

	}

    public function registrarsuscribcion($data){
        try{

              $this->db->trans_begin();
              $this->db->insert('subscriptores',
              array(
                       'email' => $data['email'],
                       'nombres'=>$data['nombres'],
                       'apellidos'=>$data['apellidos'],
                       'dni'=>$data['dni'],
                       'telefono'=>$data['telefono']
                   )
              );

              $this->db->select('max(id_subscriptor) as id');
              $this->db->from('subscriptores');
              $query = $this->db->get();
              $id = $query->result_array();

              if(isset($data['comisiones'])){
                  for ($i=0; $i < count($data['comisiones']); $i++) {
                      $this->db->insert('subscripciones',array('id_comision'=>$data['comisiones'][$i],'id_subscriptor'=>$id[0]['id']));
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
				 if($data['email']!=''){
					 $this->load->library("phpmailer_library");
			         $mail = $this->phpmailer_library->load();
					 $mail->isSMTP();
					 //Enable SMTP debugging
					 // 0 = off (for production use)
					 // 1 = client messages
					 // 2 = client and server messages
					 $mail->SMTPDebug = 2;
					 //Set the hostname of the mail server
					 $mail->Host = 'ec2-54-233-211-151.sa-east-1.compute.amazonaws.com';
					 //Set the SMTP port number - likely to be 25, 465 or 587
					 $mail->Port = 25;
					 //Whether to use SMTP authentication
					 $mail->SMTPAuth = false;
					 //6546565465
					 $mail->setFrom('dieg0407@hotmail.com', 'First Last');
					 //Set who the message is to be sent to
					 $mail->addAddress($data['email'], 'John Doe');
					 //Set the subject line
					 $mail->Subject = 'PHPMailer SMTP test';
					 //Read an HTML message body from an external file, convert referenced images to embedded,
					 //convert HTML into a basic plain-text alternative body
					 $mail->Body = "Gracias por la suscripcion, le llegaran correos electronicos cada vez que una ley de su interes vaya a ser debatida
					 http://hackathonparlamentario.mybluemix.net/";
					 //Replace the plain text body with one created manually
					 $mail->AltBody = 'This is a plain-text message body';

					 //send the message, check for errors
					 if (!$mail->send()) {
					     return 'error';
					 } else {
					     return 'success';
					 }
				 }

             }
           }
           catch (Exception $e) {

              return "error";
           }
    }
}
