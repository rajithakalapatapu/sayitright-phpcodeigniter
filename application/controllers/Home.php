<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter
        $data['status'] = "";

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
            $sent_successfully = $this->send_email_to_user($this->input->post('subscribe_email'));
            if ($sent_successfully) {
                $data['status'] = "Yay! Subscribed!!";
            } else {
                $data['status'] = "Try again.";
            }
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

        return $this->email->send();

    }

    private function load_page($data)
    {

        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . strtolower(get_class($this)) . '.php');
        $this->load->view('templates/footer', $data);

    }

}
