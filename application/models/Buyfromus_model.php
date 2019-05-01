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
        $stmt = "select * from products;";
        $sql = sprintf($stmt);

        $result = $this->db->query($sql);

        $all_products = array();

        foreach ($result->result() as $row) {
            $product = array(
                'product_name' => $row->product_name,
                'product_description' => $row->product_description,
                'product_picture' => $row->product_picture,
                'price_per_unit' => $row->price_per_unit,
                'product_id' => $row->product_id,
                'user_id' => $this->session->user_id

            );
            array_push($all_products, $product);
        }

        return $all_products;
    }
}
