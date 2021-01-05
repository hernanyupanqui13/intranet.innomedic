<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
class ResultadoFinal extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
        ini_set('date.timezone', 'America/Lima');
		$this->load->helper(array('url','funciones'));
		$this->load->model("ResultadoFinal_model");
	} 

	public function index()
	{
		if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }
		echo "No se a agregado ninguna cosa aqui, !Estamos para ayudarlos";
	}
	public function Process()
	{
		if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }
         $data = array(
            'title' =>array("estas viendo Resultado Final","Resultado Final","","<a target='_blank' href='https://www.facebook.com/escudero05' title=''>Evaristo Escudero Huillcamascco</a>"),
             );

        
        $this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view('resultadofinal/index',$data);
        $this->load->view("intranet_view/footer",$data);
	}


	 public function obtener_registro_ajax()
    {
        if ($this->session->userdata("session_id")=="") {
            redirect(base_url().'Inicio/Zona_roja/');
        }
        $list = $this->ResultadoFinal_model->obtener_registro_ajax();
        $data = array();
       // $no = 0;
        foreach ($list as $person) {
         //   $no++;
           $row = array();
           // $row[]=$no;
            $row["nro_identificador"] = $person->nro_identificador;
            $row["fecha_registro"] = $person->fecha_;
            $row["nombrex"] = '<a target="_blank" href="'.base_url().'ResultadoFinal/ResultadoFinal/view_result_data_list_details/'.$person->url_unico.'">'.$person->nombrex.'</a>';
            if ($person->empresa=="" || $person->empresa==NULL) {
                $row["empresa"] = "___";
            }else{
                $row["empresa"] = $person->empresa;
            }

            if ($person->precio=="" || $person->precio==null) {
            	 $row["monto"] = "<span>S/.".$person->total."</span>";
            }else{
            	 $row["monto"] = "<span>S/.".$person->precio."</span>";
            }
             $row["estado"] = $person->status;
             if ($person->status=="1") {
             	$row["estado"] = '<span class="label label-danger">Nuevo</span>';
             }else if ($person->status=="2") {
             	$row["estado"] = '<span class="label label-warning">En proceso</span>';
             }else{
             	$row["estado"] = '<span class="label label-success">Termino Exámen</span>';
             }

            //loaboratorio
            $row["laboratorio"] = '<a class="btn btn-warning" href="javascript:void(0)" title="Laboratorio" onclick="laboraorio('."'".$person->id."'".')"><i class="  fas fa-vials"></i>&nbsp;</a>';
            //rayox x
             $row["rayox"] = '<a class="btn btn-dark" href="javascript:void(0)" title="Rayos X" onclick="rayosx('."'".$person->id."'".')"><i class=" fas fa-file-medical-alt"></i>&nbsp;</a>';
           
            $row["final"] = '<a class="btn btn-info" href="javascript:void(0)" title="Final Result" onclick="impresion_final('."'".$person->id."'".')"><i class="fas fa-print"></i>&nbsp;</a>';

            if ($person->boleta_pago=="" || $person->boleta_pago==null) {
            	$row["boleta"] = '<a class="btn btn-danger" href="javascript:void(0)" title="Adjuntar Boleta" onclick="adjuntar_boleta_pago('."'".$person->id."'".')"><i class=" fas fa-donate"></i>&nbsp;</a>';
            }else{

            	$row["boleta"] = '<a class="btn btn-secondary" href="javascript:void(0)" title="Boleta de Pago" onclick="ver_boleta('."'".$person->id."'".')"><i class="fas fa-eye"></i></a>';
            }

            if ($person->boleta_pago=="" and $person->archivo=="") {
            	$row["enviar"] = '<span class="label label-info">Adjuntar Boleta</span>';
            }else if ($person->archivo=="" || $person->archivo==null) {
            	$row["enviar"] = '<a class="btn btn-success" href="javascript:void(0)" title="Actualizar" onclick="enviarcorreo('."'".$person->id."'".')"><i class="fas fa-envelope"></i>&nbsp;Enviar Resultado</a>';
            }else{
            	
            	$row["enviar"] = '<span class="label label-warning">Resultado Enviado</span>';
            }
            $data[] = $row;
        }

        $output = $data;
        echo json_encode($output);
    }


    public function mostrar_datos_busqueda_avanzada()
    {
    	if ($this->session->userdata("session_id")=="") {
            redirect(base_url().'Inicio/Zona_roja/');
        }
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
        $list = $this->ResultadoFinal_model->mostrar_datos_busqueda_($fecha_inicio,$fecha_fin,$nombre_busqueda,$dni_busqueda);
        $data = array();
       // $no = 0;
        foreach ($list as $person) {
         //   $no++;
           $row = array();
           // $row[]=$no;
            $row["nro_identificador"] = $person->nro_identificador;
            $row["fecha_registro"] = $person->fecha_;
            $row["nombrex"] = '<a target="_blank" href="'.base_url().'ResultadoFinal/ResultadoFinal/view_result_data_list_details/'.$person->url_unico.'">'.$person->nombrex.'</a>';
           
            if ($person->empresa=="" || $person->empresa==NULL) {
                $row["empresa"] = "____________________";
            }else{
                $row["empresa"] = $person->empresa;
            }
            if ($person->precio=="" || $person->precio==null) {
            	 $row["monto"] = "<span>S/.".$person->total."</span>";
            }else{
            	 $row["monto"] = "<span>S/.".$person->precio."</span>";
            }
           
            //loaboratorio
            $row["laboratorio"] = '<a class="btn btn-warning" href="javascript:void(0)" title="Laboratorio" onclick="laboraorio('."'".$person->id."'".')"><i class="  fas fa-vials"></i>&nbsp;</a>';
            //rayox x
             $row["rayox"] = '<a class="btn btn-dark" href="javascript:void(0)" title="Rayos X" onclick="rayosx('."'".$person->id."'".')"><i class=" fas fa-file-medical-alt"></i>&nbsp;</a>';
           
            
            $row["final"] = '<a class="btn btn-info" href="javascript:void(0)" title="Final Result" onclick="impresion_final('."'".$person->id."'".')"><i class="fas fa-print"></i>&nbsp;</a>';

             if ($person->boleta_pago=="" || $person->boleta_pago==null) {
            	$row["boleta"] = '<a class="btn btn-danger" href="javascript:void(0)" title="Adjuntar Boleta" onclick="adjuntar_boleta_pago('."'".$person->id."'".')"><i class=" fas fa-donate"></i>&nbsp;</a>';
            }else{

            	$row["boleta"] = '<a class="btn btn-secondary" href="javascript:void(0)" title="Boleta de Pago" onclick="ver_boleta('."'".$person->id."'".')"><i class="fas fa-eye"></i></a>';
            }

            if ($person->boleta_pago=="" and $person->archivo=="") {
            	$row["enviar"] = '<span class="label label-info">Adjuntar Boleta</span>';
            }else if ($person->archivo=="" || $person->archivo==null) {
            	$row["enviar"] = '<a class="btn btn-success" href="javascript:void(0)" title="Actualizar" onclick="enviarcorreo('."'".$person->id."'".')"><i class="fas fa-envelope"></i>&nbsp;Enviar Resultado</a>';
            }else{
            	
            	$row["enviar"] = '<span class="label label-warning">Resultado Enviado</span>';
            }
            
            $data[] = $row;
        }

        $output = $data;

     
        //output to json format
        echo json_encode($output);

    }


    //impresion final Wiew

    public function Impresion_final_view($id)
    {
    	if ($this->session->userdata("session_id")=="") {
            redirect(base_url().'Inicio/Zona_roja/');
        }
        $query = $this->db->query("select * from exam_datos_generales where Id='".$id."'");
		foreach ($query->result() as $emp) {
			$nombrex = $emp->apellido_paterno." ".$emp->apellido_materno.", ".$emp->nombre;
		}
		$data['title'] = array($nombrex);

    	$data['laboratorio_view_register'] = $this->ResultadoFinal_model->laboratorio_view_register($id);
    	# code...
    	//$this->load->view('resultadofinal/impresion',$data);
    	$this->load->view('resultadofinal/impresion',$data);


    }

    public function getFullName($id) {
        $query = $this->db->query("select concat_ws(' ', nombre, apellido_paterno, apellido_materno) as full_name from exam_datos_generales where Id='$id'");
        echo json_encode($query->row());
    }

    //esto es una prueba que se esta realizando 
    public function view_result_data_list_details($id_paciente)
    {
    	
    	$id_pacientex = $id_paciente;
    	$query = $this->db->query("select * from exam_datos_generales where url_unico='".$id_paciente."'");
		foreach ($query->result() as $emp) {
			$nombrex = $emp->apellido_paterno." ".$emp->apellido_materno.", ".$emp->nombre;
		}
		$data['segmento'] = $id_pacientex;
		if (!$data['segmento']) {
			$data['laboratorio_view_register'] = $this->ResultadoFinal_model->laboratorio_view_register_url();
			
		}else{
			$data['laboratorio_view_register'] = $this->ResultadoFinal_model->laboratorio_view_register_url($data['segmento']);
		}
		//$data['laboratorio_view_register'] = $this->ResultadoFinal_model->laboratorio_view_register_url($id_pacientex);
		$data['title'] = array($nombrex);
        $this->load->view('resultadofinal/prueba',$data);

    }

    public function enviar_correo_datos()
    {
    	if ($this->session->userdata("session_id")=="") {
            redirect(base_url().'Inicio/Zona_roja/');
        }

        $id_paciente = $this->input->post("id_paciente_update");
        $correo_paciente = $this->input->post("correo_valid");
        echo "mosytramos_id:".$this->input->post("id_paciente_update");

          //aqui buscamos los datos del mismo
    	$query = $this->db->query("select * from exam_datos_generales where Id='".$id_paciente."'");
		foreach ($query->result() as $emp) {
			$nombrexxx = $emp->apellido_paterno." ".$emp->apellido_materno.", ".$emp->nombre;
		}

        if(!empty($_FILES['imagen']['name'])){
            $config['upload_path'] = 'upload/Resultado_analisis/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
            $config['file_name'] = $nombrexxx." ".rand(100000000000000,900000000000000).md5($_FILES['imagen']['name']);
            
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            
        if($this->upload->do_upload('imagen')){
            $uploadDataI = $this->upload->data();
            $imagen = $uploadDataI['file_name'];
        }else{
            $imagen = '';
        }
        }else{
        $imagen = '';
        }

        $data_update = array(
        	'update_result_date' =>date('Y-m-d G:i:s'),
        	'correo'=> $correo_paciente,
        	'status'=>"3",
        	'archivo'=>  $imagen

        );

        $this->ResultadoFinal_model->update_insert_file($id_paciente,$data_update);


          //aqui buscamos los datos del mismo
    	$query_result = $this->db->query("select * from exam_datos_generales where Id='".$id_paciente."'");
		foreach ($query_result->result() as $emp) {
			$nombrex = $emp->apellido_paterno." ".$emp->apellido_materno.", ".$emp->nombre;
		//	$correo_paciente = $emp->correo;
			$archivo1_xx = $emp->archivo;
			$url_unico = $emp->url_unico;
		}


       
        if ($this->input->post("options")=="si") {
        	$acceso_link = base_url().'ResultadoFinal/ResultadoFinal/view_result_data_list_details/'.$url_unico;
        }else if ($this->input->post("options")=="no") {
        	$acceso_link = "";
        }

      
		$mail = new PHPMailer();


        // Creando la configuracion del correo
        $mail->isSMTP();
        $mail->Host     = 'ssl://p3plzcpnl434616.prod.phx3.secureserver.net';
        $mail->SMTPSecure = false;
        $mail->SMTPDebug  = 3;
        $mail->Username = 'reenviadores@innomedic.pe';
        $mail->Password = 'Sistemas20**';
        $mail->SMTPAuth = true;
        $mail->SMTPAutoTLS = false; 
        $mail->SMTPSecure = 'ssl';   
        $mail->Port     = 465;
        $mail->CharSet = 'UTF-8';
        $mail->AllowEmpty = true;

        // De: 
        $mail->setFrom('reenviadores@innomedic.pe', 'Innomedic.pe | Resultados de la Clinica Innomedic International E.I.R.L');


        $archivo1 = 'upload/Resultado_analisis/'.$archivo1_xx;


       // $mail->setFrom('resetpassword@innomedic.pe', 'Innomedic.pe | Restablecer la Contraseña');
        
       //Mandamos a los correos
        $mail->addReplyTo('reenviadores@innomedic.pe', 'Innomedic.pe | Reenviar Email');
        $mail->addAddress($correo_paciente,  $nombrex); 
        $mail->Subject = 'Innomedic.pe '.$nombrex.' | Verificar Tus resultados';
       
        // Set email format to HTML
        $mail->isHTML(true);
        $mailContent = '<!DOCTYPE html>
			<html>
			<head>
				<title>Acceso al Sistema</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
			</head>
			<body>
				<tr><td valign="top"><table class="full-width" align="center" width="600" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="background-color: #ffffff; width: 600px"><tbody><tr><td style="vertical-align: top"><table class="full-width" align="center" width="600" border="0" cellpadding="0" cellspacing="0" style="width: 600px"><tbody><tr><td class="logo" width="588" align="right" valign="top" style="color: #ffffff; font-family: adobe-clean, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; padding-bottom: 12px; text-align: right; width: 588px"><img class="logo" alt="Adobe" src="http://innomedic.pe/public/assets/images/logo.png"  border="0" hspace="0" vspace="0" style=" display: inline-block; vertical-align: top; width: 205px; height: 60px"></td>
			                <td width="12" style="width: 12px">&nbsp;</td>
			              </tr></tbody></table></td>
			        </tr><tr><td valign="top"><table class="full-width" align="center" width="600" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="background-color: #ffffff; width: 600px"><tbody><tr><td class="mobile-spacer" width="30" style="width: 30px">&nbsp; </td>
			                <td style="color: #555555; font-family: adobe-clean, Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; padding-top: 20px">Estimado(a) Cliente; '.$nombrex.' <br>
			               Envió los resultados Médicos <a href="'.$acceso_link.'" style="color: #1473e6; text-decoration: none">Link de Acceso: </a></td>
			                <td class="mobile-spacer" width="30" style="width: 30px">&nbsp;</td>
			              </tr><tr><td class="mobile-spacer" width="30" style="width: 30px">&nbsp;</td>
			               
			                <td class="mobile-spacer" width="30" style="width: 30px">&nbsp;</td>
			              </tr><tr><td class="mobile-spacer" width="30" style="width: 30px">&nbsp;</td>
			                <td style="color: #555555; font-family: adobe-clean, Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; padding-top: 20px">En caso de un error, <a href="http://innomedic.pe/" style="color: #1473e6; text-decoration: none" target="_blank" rel="noreferrer">ponte en contacto con nosotros inmediatamente</a>.</td>
			                <td class="mobile-spacer" width="30" style="width: 30px">&nbsp;</td>
			              </tr><tr><td class="mobile-spacer" width="30" style="width: 30px">&nbsp;</td>
			                <td style="color: #555555; font-family: adobe-clean, Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; padding-top: 20px; padding-bottom: 30px">Muchas gracias,<br> INNOMEDIC INTERNATIONAL E.I.R.L</td>
			                <td class="mobile-spacer" width="30" style="width: 30px">&nbsp;</td>
			              </tr></tbody></table></td>
			            </tr><tr><td valign="top"><table class="full-width" align="center" width="600" border="0" cellpadding="0" cellspacing="0" bgcolor="#313A3E" style="background-color: #313A3E; width: 600px"><tbody><tr><td width="22" style="width: 22px">&nbsp;</td>
			          			<td align="center" style="color: #ffffff; font-family: adobe-clean, Arial, Helvetica, sans-serif; font-size: 11px; line-height: 14px; padding-top: 30px; text-align: center"><strong><a href="http://intranet.metjetsac.com/" style="color: #ffffff; font-weight: bold; text-decoration: none" target="_blank" rel="noreferrer">Administrar tu cuenta</a> | <a href="http://innomedic.metjetsac.com/soporte/" style="color: #ffffff; font-weight: bold; text-decoration: none" target="_blank" rel="noreferrer">Asistencia al colaborador</a> | <a href="http://innomedic.pe/" style="color: #ffffff; font-weight: bold; text-decoration: none" target="_blank" rel="noreferrer">Foros</a> </strong></td>
			          			<td width="22" style="width: 22px">&nbsp;</td>
			        		</tr>
			        		<tr>
			        			<td width="22" style="width: 22px">&nbsp;</td>
			          			<td class="legal" style="color: #999999; font-family: adobe-clean, Arial, Helvetica, sans-serif; font-size: 11px; line-height: 14px; padding-top: 30px; padding-bottom: 30px">
			          				Intranet Innomedic | desarrollado especialmente para los clientes de Innomedic International E.I.R.L &copy; todo los derechos reservados.<br><br> 
			          				
			          				&reg; Av. Javier Prado Este 2638, San Borja, Lima, Perú<br/>
			                        <a target="_blank" href="http://innomedic.metjetsac.com/soporte/" style="color: #ffffff;"><font color="#ffffff">Mas informacion</font></a> Área de Sistemas T.I
			                        <br /><br />
			                        <a href="https://www.facebook.com/escudero05/" color="#ffffff" style="color: #ffffff;">Desarrollado por: Area de Sistemas</a>
			          			</td>

			          			<td width="22" style="width: 22px">&nbsp;</td>

			        		</tr>
			        	</tbody></table></td>
			            </tr></tbody></table></td>
			  </tr>

			</body>

			</html>';

        $mail->AddAttachment($archivo1);
        //con esto funciona
         //$mail->AddStringAttachment($imagen, '"'.$nombrex.'.pdf"', 'base64', 'application/pdf');
      //  $mail->AddStringAttachment($imagen,$nombrex,"base64","application/pdf"); 
        //$mail->AddAttachment($imagen , 'RenamedFile.pdf');

        $mail->Body = $mailContent;

        // Enviando email. Notese que send() devuelve true ó false a parte de enviar el correo
        if(!$mail->send()){
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            $this->output->set_status_header(400);
        } else {
            echo "Su petición ha sido enviada";
        }

    }


    //para la Impresion de datos por url


    public function Mostrar_prueba_rapida()
    {
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }

        $id_obtenemos_data = $this->input->post("id_paciente");
        $data = $this->ResultadoFinal_model->Mostrar_prueba_rapida($id_obtenemos_data);
        echo json_encode($data);
    }

    public function Mostrar_prueba_rapida1()
    {
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }

        $id_obtenemos_data = $this->input->post("id_paciente");
        $data = $this->ResultadoFinal_model->Mostrar_prueba_rapida1($id_obtenemos_data);
        echo json_encode($data);
    }


    public function imprimir_prueba_rapida()
    {
    	if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }

        $id_obtenemos_data = $this->input->post("id_paciente");
        $data = $this->ResultadoFinal_model->Impoirmir_prueba_rapida($id_obtenemos_data);
        echo json_encode($data);
    }

    public function Mostrar_paquete_01()
    {
    	if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }

        $id_paciente = $this->input->post("id_paciente");

        $data = $this->ResultadoFinal_model->Mostrar_paquete_01($id_paciente);
        echo json_encode($data);

    }

    public function mostramos_archivos_pdf_id_paciente()
    {
    	if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }

        $user_id = $this->input->post("id_paciente");

        $query = $this->db->query("select * from exam_datos_generales where url_unico='".$user_id."'");
        foreach ($query->result() as $xxx) {
        	$id_users = $xxx->Id;
        }
        $data = $this->ResultadoFinal_model->mostramos_archivos_pdf_id_paciente($id_users);
        echo json_encode($data);
    }

     public function mostrar_rwegistros_online_del_oit()
    {
    	if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }

        $user_id = $this->input->post("id_paciente");
        $data = $this->ResultadoFinal_model->mostrar_rwegistros_online_del_oit($user_id);
        echo json_encode($data);
    }

    public function mostramosdatos_del_paciente()
    {
    	if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }

        $user_id = $this->input->post("id_paciente");
        $data = $this->ResultadoFinal_model->mostramosdatos_del_paciente($user_id);
        echo json_encode($data);
    }



    public function adjuntar_boleta_pago_exit()
    {
    	if ($this->session->userdata("session_id")=="") {
            redirect(base_url().'Inicio/Zona_roja/');
        }

        $id_paciente_xx = $this->input->post("id_paciente_update_boleta");
          //aqui buscamos los datos del mismo
    	$query = $this->db->query("select * from exam_datos_generales where Id='".$id_paciente_xx."'");
		foreach ($query->result() as $emp) {
			$nombrexx = $emp->apellido_paterno." ".$emp->apellido_materno.", ".$emp->nombre;
		}

        if(!empty($_FILES['imagen']['name'])){
            $config['upload_path'] = 'upload/boleta_cliente/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
            $config['file_name'] = $nombrexx." ".rand(100000000000000,900000000000000).md5($_FILES['imagen']['name']);
            
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            
        if($this->upload->do_upload('imagen')){
            $uploadDataI = $this->upload->data();
            $imagen = $uploadDataI['file_name'];
        }else{
            $imagen = '';
        }
        }else{
        $imagen = '';
        }

        $data_update = array(
        	'boleta_pago'=>  $imagen
        );

        $this->ResultadoFinal_model->update_insert_file($id_paciente_xx,$data_update);

    }


    

    
}
