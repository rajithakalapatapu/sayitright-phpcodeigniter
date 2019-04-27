<?php


class Myevents extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->model('myevents_model');

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter
        $this->load_page($data);
    }

    public function unconfirm_event_participation($event_id, $user_id)
    {
        $affected_row = $this->myevents_model->unconfirm_event_participation($event_id, $user_id);
        if ($affected_row) {
            //TODO: show success message
        }
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter
        $this->load_page($data);

    }

    private function load_page($data)
    {
        $user_id = $this->session->user_id;
        $data['all_myevents'] = $this->myevents_model->get_all_my_events($user_id);

        $this->load->view('templates/loggedinheader', $data);
        $this->load->view('pages/' . strtolower(get_class($this)) . '.php');
        $this->load->view('templates/footer', $data);
    }

}
