<?php


class Conferences extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->model('conferences_model');

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter
        $this->load_page($data);
    }

    public function confirm_conference_participation($conference_id, $user_id)
    {
        $affected_row = $this->conferences_model->confirm_conference_participation($conference_id, $user_id);
        if ($affected_row) {
            //TODO: show success message
        }
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter
        $this->load_page($data);

    }

    private function load_page($data)
    {
        $user_id = $this->session->user_id;

        $data['all_conferences'] = $this->conferences_model->get_all_conferences();

        $this->load->view('templates/loggedinheader', $data);
        $this->load->view('pages/' . strtolower(get_class($this)) . '.php');
        $this->load->view('templates/footer', $data);
    }

}
