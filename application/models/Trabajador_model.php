<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 
 */
class Trabajador_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	} 

	public function mostrar_users()
	{
       $query = $this->db->query("SET lc_time_names = 'es_PE'");
		$query = $this->db->query("select apellido_paterno, apellido_materno,nombres,nro_documento,email,status,imagen,puesto,DATE_FORMAT(fecha_ingreso,'%W %d de %M %Y') as fecha_ingresoxx,(select perfil from ts_perfil_users where Id=id_perfil) as txtperfil,
			(select genero from ts_genero where Id=id_genero) as txtgenero,
			(select Id from ts_usuario where Id=id_usuario) as Idx,
			(select 
	        CASE 
	            WHEN genero = 'Masculino' THEN 'varon.png'
	            WHEN genero = 'Femenino' THEN 'mujer.png'
	            WHEN genero = 'Preguntame' THEN 'medio.png'
	            ELSE 'distinto.png'
	        END
	         from ts_genero where Id=id_genero) as id_otros
 from ts_datos_personales where id_usuario_statico = 1 and status=1 order by apellido_paterno asc");
		//WHERE not estado=3 esto es para que no muestre el estado 3 del usuario
		if (!isset($query)) {
			return false;
		}else{
			return $query->result();
		}

	}

	public function id_perfil()
	{
		$data = $this->db->get('ts_perfil_users');
		if (empty($data)) {
			return false;
		}else{
			return $data->result();
		}
	}

	public function id_sexo()
	{
		$data = $this->db->get('ts_genero');
		if (!isset($data)) { 
			return false;
		}else{
			return $data->result();
		}
	}


	public function update($id)
	{
		$query=$this->db->query("select *,(select perfil from ts_perfil_users where Id=id_perfil) as txtperfil,(select genero from ts_genero where Id=id_genero) as txtgenero,
			TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad,
			(select usuario from ts_usuario where Id=id_usuario) as usuario_txt
 			from ts_datos_personales where id_usuario='".$id."'");
		if (empty($query)) {
			return false;
		}else{
			return $query->result();
		}
	}

	public function perfil_list()
	{
		$query =$this->db->get('ts_perfil_users');
		return $query->result();
	}

	public function list_status()
	{
		$query=$this->db->query("select * from ts_variable where codigo='1'");
		return $query->result();
	}

	/**eliminacion de usuario de todo los registros**/

	//Eliminar ts_usuario
	public function eliminar_usuario($id)
	{
		//$query = $this->db->query("delete from ts_usuario ")
		$this->db->where("Id", $id);  
        $this->db->delete("ts_usuario");
	}

	public function ultimo_registrado($id)
	{   $query = $this->db->query("SET lc_time_names = 'es_PE'");
		$query = $this->db->query("select *,concat(apellido_paterno,' ',apellido_materno,' ', nombre) as nombres, DATE_FORMAT(fecha_ingreso_sistema,'%d de %M %Y' ' ' '%r' ) AS fecha_txt from ts_usuario where Id='".$id."'");
		//return $query->result();
		foreach ($query->result() as $xx) {
			$output["nombres"]  =    $xx->nombres;
			$output["fecha_ingreso_sistema"]   = $xx->fecha_txt;
		}
		return $output;

	}

	public function Mostrar_datos_para_actualiozar_xx($id)
	{
		$query = $this->db->query("select *,concat(apellido_paterno,' ',apellido_materno,' ', nombres) as nombres from ts_datos_personales a where id_usuario='".$id."'");
		//return $query->result();
		foreach ($query->result() as $xx) {
			
			$output["nombre"]  =    $xx->nombres;
			$output["puesto"]  =    $xx->puesto;
			$output["correo"]  =    $xx->email;
			$output["status"]  =    $xx->status;
			$output["id_usuario"]  =    $xx->id_usuario;
			$output["fecha_ingreso"]  =    $xx->fecha_ingreso;
			
		}
		return $output;
	}

	public function actualizar_area_emaail_puesto($id_usuario,$data)
	{
		$this->db->where("id_usuario",$id_usuario);
		$this->db->update("ts_datos_personales",$data);
	}

	public function actualizar_area_emaail_puesto_t_usuario($id_usuario,$t_suaurio)
	{
		$this->db->where("Id",$id_usuario);
		$this->db->update("ts_usuario",$t_suaurio);
	}

	//aqui mostramos los trabajadores cesados

	public function mostrar_users_cesados()
	{
		$query = $this->db->query("select *,(select perfil from ts_perfil_users where Id=id_perfil) as txtperfil,
			(select genero from ts_genero where Id=id_genero) as txtgenero,
			(select Id from ts_usuario where Id=id_usuario) as Idx,
			(select usuario from ts_usuario where Id=id_usuario) as usuario,
			TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad,
			(select 
	        CASE
	            WHEN genero = 'Masculino' THEN 'varon.png'
	            WHEN genero = 'Femenino' THEN 'mujer.png'
	            WHEN genero = 'Preguntame' THEN 'medio.png'
	            ELSE 'distinto.png'
	        END
	         from ts_genero where Id=id_genero) as id_otros
 from ts_datos_personales where id_usuario_statico = 1 and status=2");
		//WHERE not estado=3 esto es para que no muestre el estado 3 del usuario
		if (!isset($query)) {
			return false;
		}else{
			return $query->result();
		}
	}

} ?>