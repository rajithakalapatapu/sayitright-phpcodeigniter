<?php

class Events_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function create_event($event_name, $event_datetime, $event_type, $event_location, $event_created_by)
    {
        $stmt = "insert into events (`event_name`, `event_datetime`, `event_type`, `event_location`, `event_created_by`) values ('%s', '%s', '%s', '%s', '%s');";
        $sql = sprintf($stmt, $event_name, $event_datetime, $event_type, $event_location, $event_created_by);

        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function get_current_user_events($user_id)
    {
        $stmt = "select * from events where event_created_by = '%s';";
        $sql = sprintf($stmt, $user_id);

        $result = $this->db->query($sql);

        $current_user_events = array();

        foreach ($result->result() as $row) {
            $current_user_event = array(
                'event_type' => $row->event_type,
                'event_name' => $row->event_name,
                'event_datetime' => $row->event_datetime,
                'event_location' => $row->event_location,
                'event_id' => $row->event_id

            );
            array_push($current_user_events, $current_user_event);
        }

        return $current_user_events;
    }

    public function validate_login($email, $password)
    {
        $stmt = "select event_user_id from event_users where email = %s and password = %s;";
        $sql = sprintf($stmt,
            $this->db->escape($email),
            $this->db->escape($password)
        );

        $result = $this->db->query($sql);

        foreach ($result->result() as $row) {
            $this->session->user_id = $row->event_user_id;
            $this->session->user_type = "event";
            return true;
        }

        return false;
    }

    public function delete($event_id)
    {
        $stmt = "delete from events where event_id = '%s';";
        $sql = sprintf($stmt, $event_id);

        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function get_all_events()
    {
        $stmt = "select * from events;";
        $sql = sprintf($stmt);

        $result = $this->db->query($sql);

        $all_events = array();

        foreach ($result->result() as $row) {
            $event = array(
                'event_type' => $row->event_type,
                'event_name' => $row->event_name,
                'event_datetime' => $row->event_datetime,
                'event_location' => $row->event_location,
                'event_id' => $row->event_id,
                'user_id' => $this->session->user_id

            );
            array_push($all_events, $event);
        }

        return $all_events;
    }

    public function confirm_event_participation($event_id, $user_id)
    {
        $stmt = "insert into my_events values ('%s', '%s');";
        $sql = sprintf($stmt, $user_id, $event_id);

        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function get_count_all_events()
    {
        $stmt = "select count(*) as count from events;";
        $sql = sprintf($stmt);

        $counts = 0;

        $result = $this->db->query($sql);
        foreach ($result->result() as $row) {
            $counts = $row->count;
        }

        return $counts;
    }

    public function get_count_user_events($user_id)
    {
        $stmt = "select count(*) as count from my_events where individual_id = '%s';";
        $sql = sprintf($stmt, $user_id);

        $counts = 0;

        $result = $this->db->query($sql);
        foreach ($result->result() as $row) {
            $counts = $row->count;
        }

        return $counts;
    }

    public function get_participating_events($user_id)
    {
        $stmt = "select * from events where event_id in (SELECT event_id FROM `my_events` WHERE individual_id = '%s');";
        $sql = sprintf($stmt, $user_id);

        $result = $this->db->query($sql);

        $all_events = array();

        foreach ($result->result() as $row) {
            $event = array(
                'event_type' => $row->event_type,
                'event_name' => $row->event_name,
                'event_datetime' => $row->event_datetime,
                'event_location' => $row->event_location,
                'event_id' => $row->event_id,
                'user_id' => $this->session->user_id

            );
            array_push($all_events, $event);
        }

        return $all_events;
    }

    public function signup_event($fname, $lname, $password, $email)
    {
        $stmt = "INSERT INTO event_users (`first_name`, `last_name`, `password`, `email`) VALUES ('%s', '%s', '%s','%s');";
        $sql = sprintf($stmt, $fname, $lname, $password, $email);

        $this->db->query($sql);
        return $this->db->affected_rows();
    }
}
