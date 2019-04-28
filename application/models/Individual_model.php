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

        foreach ($result->result() as $row) {
            $this->session->user_id = $row->individual_id;
            $this->session->user_type = "individual";
            return true;
        }

        return false;
    }

    public function signup_individual($fname, $lname, $work, $password, $school, $email)
    {
        $stmt = "INSERT INTO individual_users (`first_name`, `last_name`, `place_of_work`, `password`, `school`, `email`) VALUES ('%s', '%s', '%s', '%s', '%s', '%s');";
        $sql = sprintf($stmt,$fname, $lname, $work, $password, $school, $email);

        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function get_details($user_id)
    {
        $stmt = "select * from individual_users where individual_id='%s'";
        $sql = sprintf($stmt, $user_id);

        $result = $this->db->query($sql);

        $user_details = array();
        foreach ($result->result() as $row) {
            $user_details['fname'] = $row->first_name;
            $user_details['lname'] = $row->last_name;
            $user_details['work'] = $row->place_of_work;
            $user_details['school'] = $row->school;
            $user_details['email'] = $row->email;
            $user_details['password'] = $row->password;
        }

        return $user_details;
    }

    public function update_individual_details($fname, $lname, $work, $school, $email, $password, $user_id)
    {
        $stmt = "update individual_users set first_name = '%s', last_name = '%s', place_of_work = '%s', password = '%s', school = '%s', email = '%s' where individual_id = '%s';";
        $sql = sprintf($stmt, $fname, $lname, $work, $password, $school, $email, $user_id);

        $this->db->query($sql);
        return $this->db->affected_rows();
    }
}
