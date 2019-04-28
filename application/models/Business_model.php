<?php

class Business_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function validate_login($email, $password)
    {
        $stmt = "select business_user_id from business_users where email = %s and password = %s;";
        $sql = sprintf($stmt,
            $this->db->escape($email),
            $this->db->escape($password)
        );

        $result = $this->db->query($sql);

        foreach ($result->result() as $row)
        {
            $this->session->user_id = $row->business_user_id;
            $this->session->user_type = "business";
            return true;
        }

        return false;
    }

    public function get_current_user_businesses($user_id)
    {
        $stmt = "select * from my_businesses where business_created_by='%s'";
        $sql = sprintf($stmt, $user_id);

        $result = $this->db->query($sql);

        $current_user_businesss = array();

        foreach ($result->result() as $row) {
            $current_user_business = array(
                'business_name' => $row->business_name,
                'business_address' => $row->business_address,
                'business_description' => $row->business_description,
                'business_license_number' => $row->business_license_number,
                'business_id' => $row->business_id

            );
            array_push($current_user_businesss, $current_user_business);
        }

        return $current_user_businesss;
    }

    public function delete($business_id)
    {
        $stmt = "delete from my_businesses where business_id = '%s';";
        $sql = sprintf($stmt, $business_id);

        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function create_business($business_name, $business_address, $business_description, $business_license_number, $business_created_by)
    {
        $stmt = "insert into my_businesses(`business_name`, `business_address`, `business_description`, `business_license_number`, `business_created_by`) values ('%s', '%s', '%s', '%s', '%s');";
        $sql = sprintf($stmt, $business_name, $business_address, $business_description, $business_license_number, $business_created_by);

        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function signup_business($name, $email, $password, $is_university, $is_company)
    {
        $stmt = "INSERT INTO business_users (`name`, `email`, `password`, `is_university`, `is_company`) VALUES ('%s', '%s', '%s', '%s', '%s');";
        $sql = sprintf($stmt, $name, $email, $password, $is_university, $is_company);

        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function get_details($user_id)
    {
        $stmt = "select * from business_users where business_user_id='%s'";
        $sql = sprintf($stmt, $user_id);

        $result = $this->db->query($sql);

        $user_details = array();
        foreach ($result->result() as $row) {
            $user_details['name'] = $row->name;
            $user_details['email'] = $row->email;
            $user_details['password'] = $row->password;
        }

        return $user_details;
    }

    public function update_business_details($fname, $password, $email, $user_id)
    {
        $stmt = "update business_users set name = '%s', password = '%s', email = '%s' where business_user_id = '%s';";
        $sql = sprintf($stmt, $fname, $password, $email, $user_id);

        $this->db->query($sql);
        return $this->db->affected_rows();
    }
}
