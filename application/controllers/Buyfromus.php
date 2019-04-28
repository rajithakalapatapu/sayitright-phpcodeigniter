<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyfromus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('buyfromus_model');

        $this->load->helper('url_helper');

        $this->load->library('session');

    }

    public function index()
    {

        $this->load->helper('url');

        $data['products'] = $this->buyfromus_model->get_products();
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . strtolower(get_class($this)) . '.php');
        $this->load->view('templates/footer', $data);

    }

    public function update($product_id, $quantity)
    {
        $quantity = $quantity <= 0 ? 1 : $quantity;
        $cart_item = array('quantity' => $quantity);

        if(!isset($_SESSION['cart'])) {
            echo "Does not exist";
            $_SESSION['cart'] = array();
        }

        $_SESSION['cart'][$product_id] = $cart_item;
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter
        redirect(base_url() . 'index.php/' . strtolower(get_class($this)));
    }
}
