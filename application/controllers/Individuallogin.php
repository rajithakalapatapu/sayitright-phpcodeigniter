<?php


class Individuallogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->model('individual_model');
        $this->load->model('conferences_model');
        $this->load->model('events_model');

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter

        if (!$this->individual_user_logged_in()) {
            $this->go_to_login_page($data);
        }

        $this->load_page($data);
    }

    private function individual_user_logged_in()
    {
        if ($this->session->user_type == "individual" && $this->session->user_id != 0) {
            return true;
        }
        return false;
    }

    private function go_to_login_page($data)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('pages/login');
        $this->load->view('templates/footer', $data);
    }

    private function load_page($data)
    {
        $user_id = $this->session->user_id;
        $data['all_conferences_count'] = $this->conferences_model->get_count_all_conferences();
        $data['my_conferences_count'] = $this->conferences_model->get_count_user_conferences($user_id);

        $data['all_events_count'] = $this->events_model->get_count_all_events();
        $data['my_events_count'] = $this->events_model->get_count_user_events($user_id);

        $data['all_events'] = $this->events_model->get_participating_events($user_id);
        $data['all_conferences'] = $this->conferences_model->get_participating_conferences($user_id);

        $this->load->view('templates/loggedinheader', $data);
        $this->load->view('pages/' . strtolower(get_class($this)) . '.php');
        $this->load->view('templates/footer', $data);
    }
}
