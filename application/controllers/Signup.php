<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->model('individual_model');
        $this->load->model('events_model');
        $this->load->model('business_model');

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter

        $this->load_page($data);
    }

    public function signup_individual()
    {
        $config = array(
            array(
                'field' => 'ind_fname',
                'label' => 'First Name',
                'rules' => 'trim|required|regex_match[/^[A-Za-z ]*$/]',
                'errors' => array(
                    'regex_match' => 'You must provide a valid alphabetic name.',
                ),
            ),
            array(
                'field' => 'ind_lname',
                'label' => 'Last Name',
                'rules' => 'trim|required|regex_match[/^[A-Za-z ]*$/]',
                'errors' => array(
                    'regex_match' => 'You must provide a valid alphabetic name.',
                ),
            ),
            array(
                'field' => 'ind_work',
                'label' => 'Work',
                'rules' => 'trim|required|regex_match[/^[A-Za-z ]*$/]',
                'errors' => array(
                    'regex_match' => 'You must provide a valid work location.',
                ),
            ),
            array(
                'field' => 'ind_school',
                'label' => 'School',
                'rules' => 'trim|required|regex_match[/^[A-Za-z ]*$/]',
                'errors' => array(
                    'regex_match' => 'You must provide a valid school.',
                ),
            ),
            array(
                'field' => 'ind_password',
                'label' => 'Password',
                'rules' => 'trim|required',
                'errors' => array(
                    'regex_match' => 'You must provide a valid password.',
                ),
            ),
            array(
                'field' => 'ind_email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email',
                'errors' => array(
                    'regex_match' => 'You must provide a valid email.',
                ),
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run()) {
            $status = $this->individual_model->signup_individual(
                $this->input->post('ind_fname'),
                $this->input->post('ind_lname'),
                $this->input->post('ind_work'),
                $this->input->post('ind_password'),
                $this->input->post('ind_school'),
                $this->input->post('ind_email')
            );
            if($status) {
                //TODO SUCCESSFUl!
                $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter
                $this->load_page($data);
            }
        }
    }

    public function signup_event()
    {
        $config = array(
            array(
                'field' => 'event_fname',
                'label' => 'First Name',
                'rules' => 'trim|required|regex_match[/^[A-Za-z ]*$/]',
                'errors' => array(
                    'regex_match' => 'You must provide a valid alphabetic name.',
                ),
            ),
            array(
                'field' => 'event_lname',
                'label' => 'Last Name',
                'rules' => 'trim|required|regex_match[/^[A-Za-z ]*$/]',
                'errors' => array(
                    'regex_match' => 'You must provide a valid alphabetic name.',
                ),
            ),
            array(
                'field' => 'event_password',
                'label' => 'Password',
                'rules' => 'trim|required',
                'errors' => array(
                    'regex_match' => 'You must provide a valid password.',
                ),
            ),
            array(
                'field' => 'event_email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email',
                'errors' => array(
                    'regex_match' => 'You must provide a valid email.',
                ),
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run()) {
            $status = $this->events_model->signup_event(
                $this->input->post('event_fname'),
                $this->input->post('event_lname'),
                $this->input->post('event_password'),
                $this->input->post('event_email')
            );
            if($status) {
                //TODO SUCCESSFUl!
                $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter
                $this->load_page($data);
            }
        }
    }

    public function signup_business()
    {
        $config = array(
            array(
                'field' => 'busi_lname',
                'label' => 'Last Name',
                'rules' => 'trim|required|regex_match[/^[A-Za-z ]*$/]',
                'errors' => array(
                    'regex_match' => 'You must provide a valid alphabetic name.',
                ),
            ),
            array(
                'field' => 'busi_password',
                'label' => 'Password',
                'rules' => 'trim|required',
                'errors' => array(
                    'regex_match' => 'You must provide a valid password.',
                ),
            ),
            array(
                'field' => 'busi_email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email',
                'errors' => array(
                    'regex_match' => 'You must provide a valid email.',
                ),
            )
        );

        $this->form_validation->set_rules($config);

        if($this->input->post('businesstype') == "University") {
            $is_business = 1;
            $is_company = 0;
        } else {
            $is_business = 0;
            $is_company = 1;
        }

        if ($this->form_validation->run()) {
            $status = $this->business_model->signup_business(
                $this->input->post('busi_lname'),
                $this->input->post('busi_email'),
                $this->input->post('busi_password'),
                $is_business,
                $is_company
            );
            if($status) {
                //TODO SUCCESSFUl!
                $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter
                $this->load_page($data);
            }
        }
    }

    private function load_page($data)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . strtolower(get_class($this)) . '.php');
        $this->load->view('templates/footer', $data);
    }
}
