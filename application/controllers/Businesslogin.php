<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Businesslogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->model('business_model');

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter

        if (!$this->business_user_logged_in()) {
            $this->go_to_login_page($data);
        }

        if ($this->validate_new_business_entry()) {
            // now create the business
            $affected_rows = $this->business_model->create_business(
                $this->input->post('business_name'),
                $this->input->post('business_address'),
                $this->input->post('business_description'),
                $this->input->post('business_license_number'),
                $this->session->user_id
            );

            if ($affected_rows) {
                //TODO: Actually show that we successfully created the business!
            }


        }

        $this->load_page($data);
    }

    private function business_user_logged_in()
    {
        if ($this->session->user_type == "business" && $this->session->user_id != 0) {
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

    private function validate_new_business_entry()
    {
        $config = array(
            array(
                'field' => 'business_name',
                'label' => 'Name',
                'rules' => 'trim|required|regex_match[/^[A-Za-z ]*$/]',
                'errors' => array(
                    'regex_match' => 'You must provide a valid business name.',
                ),
            ),
            array(
                'field' => 'business_address',
                'label' => 'business Address',
                'rules' => 'trim|required',
                'errors' => array(
                    'regex_match' => 'You must provide a valid business address.',
                ),
            ),
            array(
                'field' => 'business_description',
                'label' => 'Business Description',
                'rules' => 'trim|required',
                'errors' => array(
                    'regex_match' => 'You must provide a valid business description.',
                ),
            ),
            array(
                'field' => 'business_license_number',
                'label' => 'business License Number',
                'rules' => 'trim|required',
                'errors' => array(
                    'regex_match' => 'You must provide a valid business license number.',
                ),
            )
        );

        $this->form_validation->set_rules($config);
        return $this->form_validation->run();
    }

    private function load_page($data)
    {
        $user_id = $this->session->user_id;
        $data['current_user_businesses'] = $this->business_model->get_current_user_businesses($user_id);

        $this->load->view('templates/loggedinheader', $data);
        $this->load->view('pages/' . strtolower(get_class($this)) . '.php');
        $this->load->view('templates/footer', $data);
    }

    public function delete($business_id)
    {
        $affected_row = $this->business_model->delete($business_id);
        if ($affected_row) {
            //TODO: show success message
        }
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter
        $this->load_page($data);
    }
}
