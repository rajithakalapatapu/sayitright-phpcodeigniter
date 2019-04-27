<?php

class Event_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_current_user_events($user_id)
    {
        $stmt = "select * from events where event_created_by = '%s';";
        $sql = sprintf($stmt, $user_id);

        $result = $this->db->query($sql);

        $current_user_events = array();

        foreach($result->result() as $row) {
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
}
