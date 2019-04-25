<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyfromus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('buyfromus_model');
//        $this->load->helper('url_helper');
    }

    public function index()
    {

        $this->load->helper('url');

        $data['products'] = $this->buyfromus_model->get_products();
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . strtolower(get_class($this)) .'.php');
        $this->load->view('templates/footer', $data);

    }

}
