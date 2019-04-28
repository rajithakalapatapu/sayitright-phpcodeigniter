<?php

class Usersettings extends CI_Controller
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

    public function update()
    {
        $config = array(
            array(
                'field' => 'fname',
                'label' => 'First Name',
                'rules' => 'trim|required|regex_match[/^[A-Za-z ]*$/]',
                'errors' => array(
                    'regex_match' => 'You must provide a valid alphabetic name.',
                ),
            ),
            array(
                'field' => 'lname',
                'label' => 'Last Name',
                'rules' => 'trim|regex_match[/^[A-Za-z ]*$/]',
                'errors' => array(
                    'regex_match' => 'You must provide a valid alphabetic name.',
                ),
            ),
            array(
                'field' => 'work',
                'label' => 'Work',
                'rules' => 'trim|regex_match[/^[A-Za-z ]*$/]',
                'errors' => array(
                    'regex_match' => 'You must provide a valid work location.',
                ),
            ),
            array(
                'field' => 'school',
                'label' => 'School',
                'rules' => 'trim|regex_match[/^[A-Za-z ]*$/]',
                'errors' => array(
                    'regex_match' => 'You must provide a valid school.',
                ),
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required',
                'errors' => array(
                    'regex_match' => 'You must provide a valid password.',
                ),
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email',
                'errors' => array(
                    'regex_match' => 'You must provide a valid email.',
                ),
            )
        );

        $this->form_validation->set_rules($config);

        $status = false;
        if ($this->form_validation->run()) {

            if ($this->session->user_type == "individual") {
                echo "valid";
                $status = $this->individual_model->update_individual_details(
                    $this->input->post('fname'),
                    $this->input->post('lname'),
                    $this->input->post('work'),
                    $this->input->post('school'),
                    $this->input->post('email'),
                    $this->input->post('password'),
                    $this->session->user_id
                    );
            } else if ($this->session->user_type == "event") {
                $status = $this->events_model->update_event_details(
                    $this->input->post('fname'),
                    $this->input->post('lname'),
                    $this->input->post('email'),
                    $this->input->post('password'),
                    $this->session->user_id
                );
            } else if ($this->session->user_type == "business") {
                $status = $this->business_model->update_business_details(
                    $this->input->post('fname'),
                    $this->input->post('email'),
                    $this->input->post('password'),
                    $this->session->user_id
                );
            }
        }

        if ($status) {
            //TODO successful!
        }

        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter
        $this->load_page($data);


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
        if ($this->session->user_type == "individual") {
            $user_details = $this->get_individual_user_details($user_id);
        } else if ($this->session->user_type == "event") {
            $user_details = $this->get_event_user_details($user_id);
        } else if ($this->session->user_type == "business") {
            $user_details = $this->get_business_user_details($user_id);
        }

        if (array_key_exists('fname', $user_details)) {
            $data['fname'] = $user_details['fname'];
        } else if (array_key_exists('name', $user_details)) {
            $data['fname'] = $user_details['name'];
        }

        if (array_key_exists('lname', $user_details)) {
            $data['lname'] = $user_details['lname'];
        } else {
            $data['lname'] = "";
        }

        if (array_key_exists('school', $user_details)) {
            $data['work'] = $user_details['work'];
        } else {
            $data['work'] = "";
        }

        if (array_key_exists('school', $user_details)) {
            $data['school'] = $user_details['school'];
        } else {
            $data['school'] = "";
        }

        $data['email'] = $user_details['email'];
        $data['password'] = $user_details['password'];

        $this->load->view('templates/loggedinheader', $data);
        $this->load->view('pages/' . strtolower(get_class($this)) . '.php');
        $this->load->view('templates/footer', $data);
    }

    private function get_individual_user_details($user_id)
    {
        return $this->individual_model->get_details($user_id);
    }

    private function get_event_user_details($user_id)
    {
        return $this->events_model->get_details($user_id);
    }

    private function get_business_user_details($user_id)
    {
        return $this->business_model->get_details($user_id);
    }

}
