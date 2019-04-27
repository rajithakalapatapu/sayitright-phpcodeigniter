<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('individual_model');
        $this->load->model('event_model');
        $this->load->model('business_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');

        $config = array(
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email',
                'errors' => array(
                    'regex_match' => 'You must provide a valid email address.',
                ),
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required',
                'errors' => array(
                    'regex_match' => 'You must provide a valid password.',
                ),
            )
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            // login the user here
            if (TRUE == $this->validate_user($this->input->post('email'), $this->input->post('password'))) {
                $this->load->view('pages/redirect_to_loginpage.php');
            }
        }

        $this->load_page($data);
    }

    private function validate_user($email, $password)
    {
        $this->load->library('session');

        $valid_indidivual = $this->individual_model->validate_login($email, $password);
        if ($valid_indidivual) {
            return $valid_indidivual;
        }

        $valid_event_user = $this->event_model->validate_login($email, $password);
        if ($valid_event_user) {
            return $valid_event_user;
        }

        $valid_business_user = $this->business_model->validate_login($email, $password);
        if ($valid_business_user) {
            return $valid_business_user;
        }

        return FALSE;
    }

    private function load_page($data)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . strtolower(get_class($this)) . '.php');
        $this->load->view('templates/footer', $data);
    }
}
