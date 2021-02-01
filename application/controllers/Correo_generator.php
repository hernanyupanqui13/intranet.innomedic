<?php defined('BASEPATH') OR exit('No direct script access allowed');	/**
 * 
 */
use PHPMailer\PHPMailer\PHPMailer;

class Correo_generator extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		ini_set('date.timezone', 'America/Lima'); 
	} 

    public function index() {
        if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
			
        }
        
        $this->load->view('email_template_builder/template_builder');
    }

    public function enviarCorreo() {
        $config = json_decode($_POST["config"]);

        $mi_correo = $config->mi_correo;
        $my_password = $config->mi_contrasena;
        $asunto = $config->asunto;
        $destination_list = $config->destination_list;

        $content = $_POST["content"];



        // PHPMailer object
        $mail = new PHPMailer();
	        
	        
        // Creando la configuracion del correo
        $mail->isSMTP();
        $mail->Host     = 'ssl://smtpout.secureserver.net';
        $mail->SMTPSecure = false;
        $mail->SMTPDebug  = 3;
        $mail->Username = $mi_correo;
        $mail->Password = $my_password;
        $mail->SMTPAuth = true;
        $mail->SMTPAutoTLS = false; 
        $mail->SMTPSecure = 'ssl';   
        $mail->Port     = 465;
        $mail->CharSet = 'UTF-8';
        $mail->AllowEmpty = true;                        
     
        
        $mail->setFrom($mi_correo, $asunto);
        $mail->addReplyTo($mi_correo, $asunto);
        
        // Add a recipient
        $mail->addAddress($destination_list);
        
        
        
        // Email subject
        $mail->Subject = $asunto;
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = $content;
        $head = $this->load->view("header_template", "", TRUE);
        $mail->Body = $head . $mailContent . "</body></html>";
        $mail->send();

    }


}

?>