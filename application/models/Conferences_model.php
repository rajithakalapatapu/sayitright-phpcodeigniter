<?php

class Conferences_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function confirm_conference_participation($conference_id, $user_id)
    {
        $stmt = "insert into my_conferences values ('%s', '%s');";
        $sql = sprintf($stmt, $user_id, $conference_id);

        $this->db->query($sql);
        return $this->db->affected_rows();
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

    public function get_count_all_conferences()
    {
        $stmt = "select count(*) as conf_count from conferences;";
        $sql = sprintf($stmt);

        $counts = 0;

        $result = $this->db->query($sql);
        foreach ($result->result() as $row) {
            $counts = $row->conf_count;
        }

        return $counts;
    }

    public function get_count_user_conferences($user_id)
    {
        $stmt = "select count(*) as conf_count from my_conferences where individual_id = '%s';";
        $sql = sprintf($stmt, $user_id);

        $counts = 0;

        $result = $this->db->query($sql);
        foreach ($result->result() as $row) {
            $counts = $row->conf_count;
        }

        return $counts;
    }

    public function get_participating_conferences($user_id)
    {
        $stmt = "select * from conferences where conference_id in (SELECT conference_id FROM `my_conferences` WHERE individual_id = '%s');";
        $sql = sprintf($stmt, $user_id);

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
