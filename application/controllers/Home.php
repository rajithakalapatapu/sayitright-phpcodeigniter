<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');

        $config = array(
            array(
                'field' => 'subscribe_email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email',
                'errors' => array(
                    'regex_match' => 'You must provide a valid email address.',
                ),
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == TRUE) {
            $this->send_email_to_user($this->input->post('subscribe_email'));
        }
        $this->load_page($data);
    }

    private function send_email_to_user($user)
    {
        $this->load->library('email');
        $this->email->from('rajithakalapatapu9@gmail.com', 'Rajitha K');
        $this->email->to($user);
        $this->email->subject('SayItRight');
        $this->email->message('Subscribed to SayItRight website');

        $this->email->send();

    }

    private function load_page($data)
    {

        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . strtolower(get_class($this)) . '.php');
        $this->load->view('templates/footer', $data);

    }

}
