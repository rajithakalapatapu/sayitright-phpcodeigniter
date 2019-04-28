<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyfromus2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('url_helper');

        $this->load->library('session');

        $this->load->model('products_model');
    }

    public function index()
    {

        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter

        $data['all_products'] = $this->products_model->get_all_products();

        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . strtolower(get_class($this)) . '.php');
        $this->load->view('templates/footer', $data);


    }

}
