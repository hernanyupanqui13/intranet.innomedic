<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chat_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        ini_set('date.timezone', 'America/Lima');
    }

    public function sendMessage($mensaje) {
        $this->db->insert('chat', $mensaje);
    }

    public function getChatUsers($user_session_id) {
        $query = $this->db->query(
            "SELECT DISTINCT from_user, tsu.nombre, tsu.apellido_paterno, `connect`, 'varon.png' AS imagen_perfil
            FROM chat
                INNER JOIN ts_usuario tsu
                    ON tsu.Id = chat.from_user
            WHERE to_user=$user_session_id"
        );

		return $query->result();
    }

    public function getCurrentUser($id) {
        $query = $this->db->query(
            "SELECT $id AS current_user_id, CONCAT_WS(' ', dp.nombres, dp.apellido_paterno) AS nombre, 'varon.png' AS imagen, 
                (select `connect` from ts_usuario where dp.Id=ts_usuario.Id ) AS estado
            FROM ts_datos_personales dp
            WHERE Id=$id"
        );

        return $query->row();
    }

    public function getConversationWith($current_user, $target_user) {
        $query = $this->db->query(
            "   SELECT * 
                FROM chat
                WHERE from_user = $current_user AND to_user=$target_user
            UNION
                SELECT *
                FROM chat
                WHERE to_user = $current_user AND from_user=$target_user
            ORDER BY time_send"
        );

        return $query->result();
    }


    public function getRRHHChatLink() {
        $query = $this->db->query(
            "SELECT tsu.Id, tsu.nombre, tsu.apellido_paterno, `connect`, 'varon.png' AS imagen_perfil
            FROM ts_usuario tsu
            WHERE Id = 35"
        );

        return $query->row();
    }


}