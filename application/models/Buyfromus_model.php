<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyfromus_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_products()
    {
        $query = $this->db->get('products');
        return $query->result_array();

    }
}
