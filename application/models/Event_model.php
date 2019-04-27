<?php

class Event_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function validate_login($email, $password)
    {
        $stmt = "select event_user_id from event_users where email = %s and password = %s;";
        $sql = sprintf($stmt,
            $this->db->escape($email),
            $this->db->escape($password)
        );

        $result = $this->db->query($sql);

        foreach ($result->result() as $row)
        {
            $this->session->user_id = $row->event_user_id;
            $this->session->user_type = "event";
            return true;
        }

        return false;
    }
}
