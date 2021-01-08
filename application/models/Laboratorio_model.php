<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Laboratorio_model extends CI_Model
{
    
    function __construct() 
    {
        parent::__construct(); 
        ini_set('date.timezone', 'America/Lima');
    }

    public function laboratorio_view_register($url_unicio)
    {
    	$query = $this->db->query("select a.*,TIMESTAMPDIFF(YEAR,a.fecha_nacimiento,CURDATE()) as edad,(select html from exam_paquetes where Id=a.id_paquete) as html_paquete from exam_datos_generales as a where Id='".$url_unicio."'");
    	return $query->result();
    }

    //sexo

    public function seleccione_sexo()
    {
    	$query = $this->db->query("select * from ts_sexo");
    	return $query->result();
    }

    //actualizamos los datos de pruebga rapida
    public function actualizar_prueba_rapida($id,$data)
    {
        # code...
        $this->db->where("id_paciente",$id);
        $this->db->update("exam_laboratorio",$data);
    }

    //obtenermos todo los registros mediante ajax

    public function Mostrar_prueba_rapida($id)
    {
        $query = $this->db->query("select * from exam_laboratorio where id_paciente='".$id."'");
       // return $query->result();
        return $query->row();
    }
    public function Impoirmir_prueba_rapida($id)
    {
        $query = $this->db->query("select a.*,
            (select nombre from ts_sexo where Id=a.id_sexo) as sexo,
            (select igm from exam_laboratorio where id_paciente=a.Id) as igm,
            (select igg from exam_laboratorio where id_paciente=a.Id) as igg,
            (select concentracion_igm from exam_laboratorio where id_paciente=a.Id) as la_concentracion_igm,
            (select concentracion_igg from exam_laboratorio where id_paciente=a.Id) as la_concentracion_igg,
            (select UPPER(antigeno_resultado) from exam_laboratorio where id_paciente=a.Id) as los_resultados_antigeno,
            (select concentra_atig from exam_laboratorio where id_paciente=a.Id) as la_concentra_atig,
            (select update_covid from exam_laboratorio where id_paciente=a.Id) as update_covid,
            TIMESTAMPDIFF(YEAR,a.fecha_nacimiento,CURDATE()) as edad 
             from exam_datos_generales a where Id='".$id."'");
        return $query->row();
    }

    public function Registrar_paquete_01($id,$data)
    {
        $this->db->where("id_paciente",$id);
        $this->db->update("exam_laboratorio",$data);
    }

    public function Mostrar_paquete_01($id_paciente)
    {
         $query = $this->db->query("select * from exam_laboratorio where id_paciente='".$id_paciente."'");
       // return $query->result();
        return $query->row();
    }

   

 
  

}