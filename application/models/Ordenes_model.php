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
    
    function obtener_registro_ajax($initial_date = null, $final_date = null, $nombre_busqueda = null, $dni_busqueda = null) {

        if($initial_date == null) {
            $initial_date = date("Y-m-d");
        }

        if($nombre_busqueda == null) {
            $nombre_busqueda ="null";
        }

        if($dni_busqueda == null) {
            $dni_busqueda="null";
        }
        if($final_date == null) {
            $final_date = date('Y-m-d');
        }
        
        
        
        $query = $this->db->query(
        "SELECT e.Id AS id ,e.nro_identificador, 
            concat(e.nombre,' ',e.apellido_paterno,' ',e.apellido_materno) AS nombrex, 
            e.dni,e.nombre,e.apellido_paterno,e.apellido_materno,e.id_sexo,e.empresa,e.status, 
            DATE(e.fecha_registro) AS fecha_ ,e.url_unico, e.id_paquete, 
            (SELECT l.nombre FROM exam_paquetes AS l WHERE l.Id=e.id_paquete) AS nombre_paquete 
        FROM exam_datos_generales AS e 
        WHERE (DATE(fecha_registro)>='$initial_date' AND DATE(fecha_registro)<='$final_date')
            OR nombre LIKE $nombre_busqueda
            OR apellido_paterno LIKE $nombre_busqueda
            OR apellido_materno LIKE $nombre_busqueda
            OR dni LIKE $dni_busqueda
        ORDER BY Id DESC, nro_identificador DESC"
        );


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