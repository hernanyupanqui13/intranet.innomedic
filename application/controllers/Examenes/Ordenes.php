<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordenes extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
        ini_set('date.timezone', 'America/Lima');
		$this->load->helper(array('url','funciones'));
        $this->load->model("Ordenes_model");
        
	} 
    public function index()
    {
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }
         $data = array(
            'title' =>array("estas viendo la lista de almacen","Almacen","","<a target='_blank' href='https://www.facebook.com/escudero05' title=''>Evaristo Escudero Huillcamascco</a>"),
             );

        
        $this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view('orden/index',$data);
        $this->load->view("intranet_view/footer",$data);
    }
    /*  public function obtener_registro_ajax()
    {
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }

        $data = $this->Ordenes_model->obtener_registro_ajax();
        echo json_encode($data);
    }*/
    public function obtener_registro_ajax()
    {
        if ($this->session->userdata("session_id")=="") {
            redirect(base_url().'Inicio/Zona_roja/');
        }
        $list = $this->Ordenes_model->obtener_registro_ajax();
        $data = array();
       // $no = 0;
        foreach ($list as $person) {
         //   $no++;
           $row = array();
           // $row[]=$no;
            $row["nro_identificador"] = $person->nro_identificador;
            $row["fecha_registro"] = $person->fecha_;
            $row["nombrex"] = $person->nombrex;
            $row["tipo_examen"] = $person->nombre_paquete;
            if ($person->empresa=="" || $person->empresa==NULL) {
                $row["empresa"] = "____";
            }else{
                $row["empresa"] = $person->empresa;
            }
            if (in_array($person->id_paquete, array("1", "2", "3", "5", "580", "581", "582", "583"))) {
                $row["laboratorio"] = '<a class="btn btn-warning" href="javascript:void(0)" title="Laboratorio" onclick="laboraorio('."'".$person->id."'".')"><i class="  fas fa-vials"></i>&nbsp;</a>';
                 
            }else{
                $row["laboratorio"] = '____';
                 
            }
            //rayox x
            if ($person->id_paquete=="1" or $person->id_paquete=="2" or $person->id_paquete=="3" ) {
                 $row["rayox"] = '<a class="btn btn-dark" href="javascript:void(0)" title="Rayos X" onclick="rayosx('."'".$person->id."'".')"><i class=" fas fa-file-medical-alt"></i>&nbsp;</a>';
            }else{
                 $row["rayox"] = '____';
            }

            
            $row["final"] = '<a class="btn btn-info" href="javascript:void(0)" title="Actualizar" onclick="impresion_final('."'".$person->id."'".')"><i class=" fas fa-file-medical-alt"></i>&nbsp;</a>';
           // $row["enviar"] = '<a class="btn btn-success" href="javascript:void(0)" title="Actualizar" onclick="edit_person('."'".$person->id."'".')"><i class="fas fa-location-arrow"></i>&nbsp;Enviar Resultado</a>';
            $data[] = $row; // Añadiendo el row a data


            
        }

        $output = $data;
        echo json_encode($output);
    }


    public function mostrar_datos_busqueda_avanzada()
    {
        /*if ($this->session->userdata("session_id")=="") {
            redirect(base_url().'Inicio/Zona_roja/');
        }

        $fecha_inicio = fecha_ymd($this->input->post('fecha_inicio'));
        $fecha_fin = fecha_ymd($this->input->post('fecha_fin'));
        
         $data = $this->Examenes_model->mostrar_datos_busqueda_($fecha_inicio,$fecha_fin);
         echo json_encode($data);*/
        if ($this->input->post('fecha_inicio')=="" || $this->input->post('fecha_fin')=="") {
            $fecha_inicio = date("Y-m-d");
            $fecha_fin = date("Y-m-d");
        }else{
            $fecha_inicio = fecha_ymd($this->input->post('fecha_inicio'));
            $fecha_fin = fecha_ymd($this->input->post('fecha_fin'));
        }

        //nombres

        if ($this->input->post('nombre_busqueda')=="" ) {
            $nombre_busqueda = "0"; 
            
        }else{
            $nombre_busqueda = $this->input->post('nombre_busqueda');
            
        }

        //nombres

        if ($this->input->post('dni_busqueda')=="" ) {
            $dni_busqueda = "0";
            
        }else{
            $dni_busqueda = $this->input->post('dni_busqueda');
            
        }
    

         if ($this->session->userdata("session_id")=="") {
            redirect(base_url().'Inicio/Zona_roja/');
        }
        $list = $this->Ordenes_model->mostrar_datos_busqueda_($fecha_inicio,$fecha_fin,$nombre_busqueda,$dni_busqueda);
        $data = array();
       // $no = 0;
        foreach ($list as $person) {
         //   $no++;
           $row = array();
           // $row[]=$no;
            $row["nro_identificador"] = $person->nro_identificador;
            $row["fecha_registro"] = $person->fecha_;
            $row["nombrex"] = $person->nombrex;
            if ($person->empresa=="" || $person->empresa==NULL) {
                $row["empresa"] = "____________________";
            }else{
                $row["empresa"] = $person->empresa;
            }
            if (in_array($person->id_paquete, array("1", "2", "3", "5", "580", "581", "582", "583"))) {
                $row["laboratorio"] = '<a class="btn btn-warning" href="javascript:void(0)" title="Laboratorio" onclick="laboraorio('."'".$person->id."'".')"><i class="  fas fa-vials"></i>&nbsp;</a>';
                 
            }else{
                $row["laboratorio"] = '___________________';
                 
            }
            //rayox x
            if ($person->id_paquete=="1" or $person->id_paquete=="2" or $person->id_paquete=="3" ) {
                 $row["rayox"] = '<a class="btn btn-dark" href="javascript:void(0)" title="Rayos X" onclick="rayosx('."'".$person->id."'".')"><i class=" fas fa-file-medical-alt"></i>&nbsp;</a>';
            }else{
                 $row["rayox"] = '________________';
            }

            
            $row["final"] = '<a class="btn btn-info" href="javascript:void(0)" title="Actualizar" onclick="impresion_final('."'".$person->id."'".')"><i class=" fas fa-file-medical-alt"></i>&nbsp;</a>';
           // $row["enviar"] = '<a class="btn btn-success" href="javascript:void(0)" title="Actualizar" onclick="edit_person('."'".$person->id."'".')"><i class="fas fa-location-arrow"></i>&nbsp;Enviar Resultado</a>';
            $data[] = $row;
        }

        $output = $data;

     
        //output to json format
        echo json_encode($output);

    }





 



    
}
