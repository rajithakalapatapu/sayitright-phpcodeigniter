<?php

class Products_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all_products()
    {
        $stmt = "select * from products";
        $sql = sprintf($stmt);

        $result = $this->db->query($sql);

        $all_products = array();

        foreach ($result->result() as $row) {
            $product = array(
                'product_id' => $row->product_id,
                'product_name' => $row->product_name,
                'product_description' => $row->product_description,
                'product_picture' => $row->product_picture,
                'price_per_unit' => $row->price_per_unit
            );
            array_push($all_products, $product);
        }

        return $all_products;
    }

}
