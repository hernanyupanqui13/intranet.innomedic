<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
        ini_set('date.timezone', 'America/Lima');
        $this->load->helper(array('url','funciones'));
        $this->load->model("Chat_model");

        
	} 
    public function index()
    {
        $current_user_id = $this->session->userdata('session_id');
        if($current_user_id == '') {
            redirect(base_url());
        }

        $data = array(
            'title' =>array("estas viendo el chat","Chat","","<a>Area de Sistemas</a>"),
        );

        
        $this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view('chat/index',$data);
        $this->load->view("intranet_view/footer",$data);
    }


    public function sendMessage() {
        $mensaje = $this->input->post("mensaje");
        $from_user = $this->input->post("from_user");
        //$to_user = $this->input->post("to_user");

        $to_user = 35;      //to be changed

        $data = array("message"=>$mensaje, "from_user"=>$from_user, "to_user"=>$to_user);

        $this->Chat_model->sendMessage($data);

        echo json_encode($data);

    }

    public function getChatUsers() {

        $user_session_id = $this->session->userdata("session_id");

        $chat_users_list = $this->Chat_model->getChatUsers($user_session_id);

        echo json_encode($chat_users_list);
    }

    public function getCurrentUser() {
        $user_session_id = $this->session->userdata("session_id");

        echo json_encode($this->Chat_model->getCurrentUser($user_session_id));

    }
    

    public function getConversationWith() {
        $current_user = $this->input->post("current_user");
        $target_user = $this->input->post("target_user");

        echo json_encode($this->Chat_model->getConversationWith($current_user, $target_user));
    }
    
}
