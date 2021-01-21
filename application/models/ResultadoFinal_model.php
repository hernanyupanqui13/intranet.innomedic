<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ResultadoFinal_model extends CI_Model
{
    
    function __construct() 
    {
        parent::__construct();
        ini_set('date.timezone', 'America/Lima');
    }
    
    function obtener_registro_ajax(){
 /*$query = $this->db->query("select e.Id as id ,e.nro_identificador, concat(e.nombre,' ',e.apellido_paterno,' ',e.apellido_materno) as nombrex, e.dni,e.nombre,e.apellido_paterno,e.apellido_materno,e.id_sexo,e.empresa,e.status from exam_datos_generales as e where (fecha_registro>='".date('Y-m-d')." 00:00:01' and fecha_registro<='".date('Y-m-d')." 23:59:59')");
        return $query->result();*/
        $query = $this->db->query("select e.Id as id ,e.nro_identificador, concat(e.nombre,' ',e.apellido_paterno,' ',e.apellido_materno) as nombrex, e.dni,e.nombre,e.apellido_paterno,e.apellido_materno,e.id_sexo,e.empresa,e.status, date(e.fecha_registro) as fecha_ ,e.url_unico, e.id_paquete , e.archivo, e.correo, e.boleta_pago, e.total, e.precio from exam_datos_generales as e where (fecha_registro>='".date('Y-m-d')." 00:00:01' and fecha_registro<='".date('Y-m-d')." 23:59:59')  ORDER BY Id desc, nro_identificador desc");
        return $query->result();

       
    }

    public function mostrar_datos_busqueda_($fecha_inicio,$fecha_fin,$nombre_busqueda,$dni_busqueda)
    {

        $this->db->select("Id as id ,nro_identificador, concat(nombre,' ',apellido_paterno,' ',apellido_materno) as nombrex, dni,nombre,apellido_paterno,apellido_materno,id_sexo,empresa,status, date(fecha_registro) as fecha_ ,url_unico, id_paquete,archivo correo, boleta_pago,total,precio,archivo");
        
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

    public function laboratorio_view_register($id)
    {
        $query = $this->db->query("select a.*,TIMESTAMPDIFF(YEAR,a.fecha_nacimiento,CURDATE()) as edad,(select html from exam_paquetes where Id=a.id_paquete) as html_paquete from exam_datos_generales as a where Id='".$id."'");
        return $query->result();
    }
    public function laboratorio_view_register_url($url)
    {
        
        $query = $this->db->query("select a.*,TIMESTAMPDIFF(YEAR,a.fecha_nacimiento,CURDATE()) as edad,(select html from exam_paquetes where Id=a.id_paquete) as html_paquete from exam_datos_generales as a where url_unico='".$url."'");
        return $query->result();
        
        
    }



    //desde aqui vemos lod datos de los rayox x


    public function mostramos_archivos_pdf_id_paciente($id)
    {
        $query = $this->db->query("select * from exam_archivos where id_paciente='".$id."'");
        return $query->result();
    }

    public function mostrar_rwegistros_online_del_oit($id)
    {
        $query = $this->db->query("select a.*,(select nombre from exam_motivos where Id=a.motivo) as motivo,
            DATE_FORMAT(a.fechalec,'%Y') as anox,
            DATE_FORMAT(a.fechalec,'%m') as mesx,
            DATE_FORMAT(a.fechalec,'%w') as diasx,
            DATE_FORMAT(a.fecha_rad,'%Y') as anox_rad,
            DATE_FORMAT(a.fecha_rad,'%m') as mesx_rad,
            DATE_FORMAT(a.fecha_rad,'%w') as diasx_rad
          from exam_rayox as a where url='".$id."'");
        return $query->row();
    }

    public function Mostrar_paquete_01($id_paciente)
    {
         $query = $this->db->query("select * from exam_laboratorio where url='".$id_paciente."'");
       // return $query->result();
        return $query->row();
    }

    public function Impoirmir_prueba_rapida($id)
    {
        $query = $this->db->query("select a.*,
            (select nombre from ts_sexo where Id=a.id_sexo) as sexo,
            (select igm from exam_laboratorio where id_paciente=a.Id) as igm,
            (select igg from exam_laboratorio where id_paciente=a.Id) as igg,
            (select update_covid from exam_laboratorio where id_paciente=a.Id) as update_covid,
            TIMESTAMPDIFF(YEAR,a.fecha_nacimiento,CURDATE()) as edad 
             from exam_datos_generales a where url_unico='".$id."'");
        return $query->row();
    }


    public function mostramosdatos_del_paciente($id)
    {
        $query = $this->db->query("select a.*,TIMESTAMPDIFF(YEAR,a.fecha_nacimiento,CURDATE()) as edad, concat(a.nombre,' ', a.apellido_paterno,' ',a.apellido_materno) as nombres, a.correo, a.boleta_pago, a.total,a.url_unico,a.boleta_pago from exam_datos_generales as a where Id='".$id."'");
        return $query->row();
    }

    public function update_insert_file($id,$data)
    {
        $this->db->where("Id",$id);
        $this->db->update("exam_datos_generales",$data);
    }

    public function getNombrePlantilla($url) {
        $query = $this->db->query(
            "SELECT id_paquete
            FROM exam_datos_generales AS edg
            WHERE url_unico = '$url'"
        );

        $response = $query->row();
        $nombre_plantilla="";

        $id_paquete= $response->id_paquete;
        
        if($id_paquete == "5") {
            $nombre_plantilla = "prueba-rapida-imprimir";    
        } elseif ($id_paquete =="580") {
            $nombre_plantilla = "prueba-rapida-cuanti-imprimir";    
        } elseif ($id_paquete=="581") {
            $nombre_plantilla ="prueba-antigeno-imprimir";
        } elseif ($id_paquete =="582") {
            $nombre_plantilla ="prueba-molecular-imprimir";
        } elseif ($id_paquete =="583") {
            $nombre_plantilla = "prueba-antigeno-cuanti-imprimir";
        } else {
            $nombre_plantilla = $id_paquete;
        }

        return $nombre_plantilla;
    }

    public function fromUrlToId($url) {
        $query = $this->db->query(
            "SELECT Id
            FROM exam_datos_generales AS edg
            WHERE url_unico = '$url'"
        );

        $response = $query->row();

        return $response->Id;
    }


}