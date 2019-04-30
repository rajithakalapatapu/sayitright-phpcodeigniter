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

        if (!$this->any_valid_user_logged_in()) {
            $this->go_to_login_page($data);
        }

        $this->load_page($data);
    }

    private function any_valid_user_logged_in()
    {
        if ($this->session->user_type == "event" && $this->session->user_id != 0) {
            return true;
        } else if ($this->session->user_type == "business" && $this->session->user_id != 0) {
            return true;
        } else if ($this->session->user_type == "individual" && $this->session->user_id != 0) {
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

        $data['all_conferences'] = $this->conferences_model->get_all_conferences();

        $this->load->view('templates/loggedinheader', $data);
        $this->load->view('pages/' . strtolower(get_class($this)) . '.php');
        $this->load->view('templates/footer', $data);
    }

    public function confirm_conference_participation($conference_id, $user_id)
    {
        $affected_row = $this->conferences_model->confirm_conference_participation($conference_id, $user_id);
        if ($affected_row) {
            // all good - we redirect to the next page - so need not show status
        }
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter
        redirect(base_url() . 'index.php/' . strtolower(get_class($this)));
    }


}
