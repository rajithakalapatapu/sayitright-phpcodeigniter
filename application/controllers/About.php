<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller
{
    public function index()
    {

        $this->load->helper('url');

        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . strtolower(get_class($this)) .'.php');
        $this->load->view('templates/footer', $data);

    }

}
