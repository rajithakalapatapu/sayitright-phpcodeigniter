<?php

class Individual_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function validate_login($email, $password)
    {
        $stmt = "select individual_id from individual_users where email = %s and password = %s;";
        $sql = sprintf($stmt,
            $this->db->escape($email),
            $this->db->escape($password)
        );

        $result = $this->db->query($sql);

        foreach ($result->result() as $row)
        {
            $this->session->user_id = $row->individual_id;
            $this->session->user_type = "individual";
            return true;
        }

        return false;
    }
}
