<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratorio extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
        ini_set('date.timezone', 'America/Lima');
        $this->load->helper(array('url','funciones'));
        $this->load->helper(array('form', 'url'));
        $this->load->model("Laboratorio_model");
         
    }
    
    // Este vendria a ser el index del controlador
    public function Mostrar_registros()
    {
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }

        $data = array(
        'title' =>array("estas viendo la lista de Laboratorio","Laboratorio","","<a target='_blank' href='https://www.facebook.com/escudero05' title=''>Evaristo Escudero Huillcamascco</a>"),
        'seleccione_sexo' => $this->Laboratorio_model->seleccione_sexo(),
        );

        $the_id= $this->uri->segment(4,0); 
        $data['segmento']=$the_id;

        if (!$the_id) {
            $data['laboratorio_view_register'] = $this->Laboratorio_model->laboratorio_view_register();
        }else{
            $data['laboratorio_view_register'] = $this->Laboratorio_model->laboratorio_view_register($the_id);
        }


        $id_del_paquete = $data['laboratorio_view_register'][0]->id_paquete;


        
        $view_path_body="";
        $view_path_imprimir = "";
        $body_view_data = array();

        // Configurando un body diferente apra cada tipo de examen y su formato de impresion rapida
        if ($id_del_paquete =="5") {
            $view_path_body = "laboratorio/prueba-rapida-body";
            $view_path_imprimir ="laboratorio/prueba_rapida_imprimir";
            $body_view_data = array("exam_data"=>$this->Laboratorio_model->Mostrar_prueba_rapida($the_id));

        } else if ($id_del_paquete=="580") {
            $view_path_body = "laboratorio/prueba-rapida-cuanti-body";
            $view_path_imprimir = "laboratorio/prueba_rapida_cuantitativa_imprimir";
            $body_view_data = array("exam_data"=>$this->Laboratorio_model->Mostrar_prueba_rapida($the_id));
        } else if($id_del_paquete =="581") {
            $view_path_body = "laboratorio/prueba-antigeno-body";
            $view_path_imprimir = "laboratorio/prueba_antigeno_imprimir";
            $body_view_data = array("exam_data"=>$this->Laboratorio_model->Mostrar_prueba_rapida($the_id));
        } else if($id_del_paquete =="583") {
            $view_path_body = "laboratorio/prueba-antigeno-cuanti-body";
            $view_path_imprimir = "laboratorio/prueba_antigeno_cuanti_imprimir";
            $body_view_data = array("exam_data"=>$this->Laboratorio_model->Mostrar_prueba_rapida($the_id));
        } else if ($id_del_paquete =="582") {
            $view_path_body = "laboratorio/prueba-molecular-body";
            // Para imprimir el PDF adjunto
            $molecular_url = $this->Laboratorio_model->obtenerMolecularUrl($data['segmento']);
            $molecular_url = $molecular_url->molecular_url;
            $view_path_imprimir = "laboratorio/prueba-molecular-imprimir";
            $body_view_data = array("molecular_url"=>$molecular_url);
        }

        // Cargando una vista dentro de una vista desde el controlador
        $data["body_template"]=$this->load->view($view_path_body, $body_view_data, TRUE);
        $data["body_print"]=$this->load->view($view_path_imprimir, NULL, TRUE);

     


        // Renderizando las vistas        
        $this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view('laboratorio/index',$data);
        $this->load->view("intranet_view/footer",$data);
    }

    public function actualizar_prueba_rapida()
    {
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }
       

        if ($this->input->is_ajax_request()) {
            $id = $this->input->post("id_unico");
            $data = array(
                'igm' => $this->input->post("igm"), 
                'igg' => $this->input->post("igg"),
                'concentracion_igm' => $this->input->post("concentracion_igm"),
                'concentracion_igg' => $this->input->post("concentracion_igg"),
                'antigeno_resultado' => $this->input->post("antigeno_resultado"),
                'concentra_atig' => $this->input->post("concentra_atig"),
                'update_covid' => date('Y-m-d G:i:s')
            );

            $this->Laboratorio_model->actualizar_prueba_rapida($id, $data);

        } else {
            exit('No direct script access allowed');
        }

    }

    public function Mostrar_prueba_rapida()
    {
        if ($this->session->userdata('session_id') == ''){
            redirect(base_url());
        }

        $id_obtenemos_data = $this->input->post("id_paciente");
        $data = $this->Laboratorio_model->Mostrar_prueba_rapida($id_obtenemos_data);
        echo json_encode($data);
    }


    /*
    Esta funcion devuelve los datos par auna rapida impresion de un examen en especifico de Laboratorio
    La data es procesada en el lado del cliente con JS
    */
    public function imprimir_prueba_rapida()
    {
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }

        $id_obtenemos_data = $this->input->post("id_paciente");
        $data = $this->Laboratorio_model->Impoirmir_prueba_rapida($id_obtenemos_data);
        echo json_encode($data);
    }

    // Aqui registramos el paquete 01
    public function Registrar_paquete_01()
    {
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }


         if ($this->input->is_ajax_request()) {
            $id = $this->input->post("id_registrar_id_laboraortoio_paquete_1");
            $data = array(
                'eritrocisrc' => $this->input->post("eritrocisrc"),
                'hemoglobinarc' => $this->input->post("hemoglobinarc"),
                'hematocritorc' => $this->input->post("hematocritorc"),
                'copro_leuco' => $this->input->post("copro_leuco"),
                'plaquetas' => $this->input->post("plaquetas"),
                'vcm' => $this->input->post("vcm"),
                'hcm' => $this->input->post("hcm"),
                'ccmh' => $this->input->post("ccmh"),
                'linfocitosrc' => $this->input->post("linfocitosrc"),
                'monoticosrc' => $this->input->post("monoticosrc"),
                'eosinofilosrc' => $this->input->post("eosinofilosrc"),
                'basofilosrc' => $this->input->post("basofilosrc"),
                'segmentadossrc' => $this->input->post("segmentadossrc"),
                'abastonadossrc' => $this->input->post("abastonadossrc"),
                'anormal_lab1' => $this->input->post("anormal_lab1"),
                'nuevocampo_1' => $this->input->post("nuevocampo_1"),
                'nuevocampo_2' => $this->input->post("nuevocampo_2"),
                'nuevocampo_3' => $this->input->post("nuevocampo_3"),
                'nuevocampo_4' => $this->input->post("nuevocampo_4"),
                'nuevocampo_5' => $this->input->post("nuevocampo_5"),
                'nuevocampo_6' => $this->input->post("nuevocampo_6"),
                'nuevocampo_7' => $this->input->post("nuevocampo_7"),
                'nuevocampo_8' => $this->input->post("nuevocampo_8"),
                'nuevocampo_9' => $this->input->post("nuevocampo_9"),
                'nuevocampo_10' => $this->input->post("nuevocampo_10"),
                'linfocitos' => $this->input->post("linfocitos"),
                'monocitos' => $this->input->post("monocitos"),
                'eosinofilos' => $this->input->post("eosinofilos"),
                'basofilos' => $this->input->post("basofilos"),
                'segmentados' => $this->input->post("segmentados"),
                'abastonados' => $this->input->post("abastonados"),
                'anormal_lab2' => $this->input->post("anormal_lab2"),
                'comentarios' => $this->input->post("comentarios"),
                'glucosa' => $this->input->post("glucosa"),
                'salto20' => $this->input->post("salto20"),
                'colesteroltotal' => $this->input->post("colesteroltotal"),
                'colesterolhdl' => $this->input->post("colesterolhdl"),
                'trigliceridos' => $this->input->post("trigliceridos"),
                'colesterolldl' => $this->input->post("colesterolldl"),
                'colesterolvldl' => $this->input->post("colesterolvldl"),
                'obser_perfillipi' => $this->input->post("obser_perfillipi"),
                'fecha_evaluacion' => date('Y-m-d G:i:s'),
                'salto21' => $this->input->post("salto21"),
                'prote_total' => $this->input->post("prote_total"),
                'albumina' => $this->input->post("albumina"),
                'globulina' => $this->input->post("globulina"),
                'relacion_alb' => $this->input->post("relacion_alb"),
                'bili_total' => $this->input->post("bili_total"),
                'bili_directa' => $this->input->post("bili_directa"),
                'bili_indirecta' => $this->input->post("bili_indirecta"),
                'fosfatasa' => $this->input->post("fosfatasa"),
                'dhl' => $this->input->post("dhl"),
                'tgo' => $this->input->post("tgo"),
                'tgp' => $this->input->post("tgp"),
                'obser_perfilhepa' => $this->input->post("obser_perfilhepa"),
            );

            $this->Laboratorio_model->Registrar_paquete_01($id,$data);
            echo json_encode(array("mensaje"=>"Se Actualizo de Manera Correcta"));
        }else{
            exit('No direct script access allowed');
        }


    }

    public function Mostrar_paquete_01()
    {
        $id_paciente = $this->input->post("id_paciente");

        $data = $this->Laboratorio_model->Mostrar_paquete_01($id_paciente);
        echo json_encode($data);

    }

    /*
    Funcion para subir archivos al servidor. Se usa cuando se sube el resultado final externo de la prueba molecular
    */
    public function uploadMolecular() {

        // Cambiando el nombre al archivo
        $_FILES['file']['type']     = $_FILES['userfile']['type']; 
        $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name']; 
        $_FILES['file']['error']    = $_FILES['userfile']['error']; 
        $_FILES['file']['size']     = $_FILES['userfile']['size']; 
        $_FILES['file']['name']     = "Molecular_".rand(100000000000000,900000000000000).'_'.substr($_FILES['userfile']['name'], -5);

        // Colocando la configuracion
        $config['upload_path']          = 'upload/resultados_molecular';
        $config['allowed_types']        = 'jpg|png|gif|pdf|mp3|mp4|AVI|3GP|FLV|doc|docm|docx|dot|dotm|dotx|htm|html|odt|csv|txt|xls|xlsm|xlsx|xps|bmp|emf|odp|ppt|pptx|jpge|zip';
        $config['max_size']             = 100000000;

        //Cargando la libreria
        $this->load->library('upload', $config);

        // Subiendo el archivo al servidor
        if ( ! $this->upload->do_upload('file')) {
            echo json_encode($this->upload->display_errors());
        }
        else {
            echo $_FILES["file"]["name"];
        }

        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }
       

        if ($this->input->is_ajax_request()) {

            $id = $this->input->post("id_unico");
            $data = array(
                'update_covid' => date('Y-m-d G:i:s'),
                'molecular_url' => $_FILES["file"]["name"]
            );

            $this->Laboratorio_model->actualizar_prueba_rapida($id,$data);
        } else {
            exit('No direct script access allowed');
        }
    }

    public function obtenerMolecularUrl($id_exam) {
        echo json_encode($this->Laboratorio_model->obtenerMolecularUrl($id_exam));
    }
    
}
 