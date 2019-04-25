<?php

class Contactus_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function store_message($fname, $lname, $phone, $message)
    {
        $stmt = "INSERT INTO contact_us (first_name, last_name, message, telephone) VALUES (%s, %s, %s, %s)";
        $sql = sprintf($stmt,
            $this->db->escape($fname),
            $this->db->escape($lname),
            $this->db->escape($message),
            $this->db->escape($phone)
        );

        $this->db->query($sql);
        return $this->db->affected_rows();
    }
}
