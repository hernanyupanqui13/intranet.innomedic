<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ordenes_model extends CI_Model
{
    
    function __construct() 
    {
        parent::__construct();
        ini_set('date.timezone', 'America/Lima');
    }
    
    function obtener_registro_ajax(){
        /*$query = $this->db->query("select e.Id as id ,e.nro_identificador, concat(e.nombre,' ',e.apellido_paterno,' ',e.apellido_materno) as nombrex, e.dni,e.nombre,e.apellido_paterno,e.apellido_materno,e.id_sexo,e.empresa,e.status from exam_datos_generales as e where (fecha_registro>='".date('Y-m-d')." 00:00:01' and fecha_registro<='".date('Y-m-d')." 23:59:59')");
        return $query->result();*/
        $query = $this->db->query("select e.Id as id ,e.nro_identificador, concat(e.nombre,' ',e.apellido_paterno,' ',e.apellido_materno) as nombrex, e.dni,e.nombre,e.apellido_paterno,e.apellido_materno,e.id_sexo,e.empresa,e.status, date(e.fecha_registro) as fecha_ ,e.url_unico, e.id_paquete,(select l.nombre from exam_paquetes as l where l.Id=e.id_paquete) as nombre_paquete from exam_datos_generales as e where (fecha_registro>='".date('Y-m-d')." 00:00:01' and fecha_registro<='".date('Y-m-d')." 23:59:59')  ORDER BY Id desc, nro_identificador desc");
        return $query->result();       
    }

    public function mostrar_datos_busqueda_($fecha_inicio,$fecha_fin,$nombre_busqueda,$dni_busqueda)
    {

        $this->db->select("Id as id ,nro_identificador, concat(nombre,' ',apellido_paterno,' ',apellido_materno) as nombrex, dni,nombre,apellido_paterno,apellido_materno,id_sexo,empresa,status, date(fecha_registro) as fecha_ ,url_unico, id_paquete");
        
        if ($fecha_fin == date("Y-m-d")) {
            
        }else{
            $this->db->where(array(
            'fecha_registro>=' =>$fecha_inicio.' 00:00:01', 
            'fecha_registro<=' =>$fecha_fin.' 23:59:59',
        ));

        }
        if ($nombre_busqueda=="0") {
            # code...
        }else{
            $this->db->like('nombre',$nombre_busqueda);
            $this->db->or_like('apellido_paterno',$nombre_busqueda);
            $this->db->or_like('apellido_materno',$nombre_busqueda);
        }
        if ($dni_busqueda=="0") {
            # code...
        }else{
            $this->db->where('dni',$dni_busqueda);
        }
    
        $query = $this->db->get("exam_datos_generales ");
        return $query->result();
    }

}