<?php

class Orders_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function save_order($total, $email, $fname, $lname, $address, $apartment, $city, $language, $postal)
    {
        $stmt = "insert into orders (`order_total`, `order_email`, `order_first_name`, `order_last_name`, `order_address`, `order_apt_number`, `order_city`, `order_language`, `order_pincode`) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')";
        $sql = sprintf($stmt, $total, $email, $fname, $lname, $address, $apartment, $city, $language, $postal);

        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function get_order_id($email, $order_total, $postal)
    {
        $stmt = "select order_id from orders where order_email = '%s' and order_total = '%s' and order_pincode = '%s'";
        $sql = sprintf($stmt, $email, $order_total, $postal);

        $result = $this->db->query($sql);

        $order_id = 0;
        foreach ($result->result() as $row) {
            $order_id = $row->order_id;
        }

        return $order_id;
    }

    public function add_entry_to_order_product($order_id, $product_id, $quantity)
    {
        $stmt = "insert into order_products values ('%s', '%s', '%s')";
        $sql = sprintf($stmt, $order_id, $product_id, $quantity);

        $this->db->query($sql);
        return $this->db->affected_rows();
    }
}
