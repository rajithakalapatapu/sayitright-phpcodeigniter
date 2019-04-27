<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventlogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('event_model');
        $this->load->helper('url');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter

        $this->load_page($data);
    }

    private function load_page($data)
    {
        $user_id = $this->session->user_id;
        $data['current_user_events'] = $this->event_model->get_current_user_events($user_id);

        $this->load->view('templates/loggedinheader', $data);
        $this->load->view('pages/' . strtolower(get_class($this)) . '.php');
        $this->load->view('templates/footer', $data);
    }

}
