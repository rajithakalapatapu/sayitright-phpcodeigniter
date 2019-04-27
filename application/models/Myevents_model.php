<?php

class Myevents_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all_my_events($user_id)
    {
        $stmt = "select * from events where event_id in (select event_id from my_events where individual_id = '%s');";
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

    public function unconfirm_event_participation($event_id, $user_id)
    {
        $stmt = "delete from my_events where individual_id ='%s' and event_id = '%s';";
        $sql = sprintf($stmt, $user_id, $event_id);

        $this->db->query($sql);
        return $this->db->affected_rows();
    }


}
