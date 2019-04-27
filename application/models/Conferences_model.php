<?php

class Conferences_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all_conferences()
    {
        $stmt = "select * from conferences;";
        $sql = sprintf($stmt);

        $result = $this->db->query($sql);

        $all_conferences = array();

        foreach ($result->result() as $row) {
            $conference = array(
                'conference_type' => $row->conference_type,
                'conference_name' => $row->conference_name,
                'conference_datetime' => $row->conference_datetime,
                'conference_location' => $row->conference_location,
                'conference_id' => $row->conference_id,
                'user_id' => $this->session->user_id

            );
            array_push($all_conferences, $conference);
        }

        return $all_conferences;
    }
}
