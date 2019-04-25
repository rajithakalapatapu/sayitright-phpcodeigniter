<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends CI_Controller
{
    public function index()
    {
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');

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
                'rules' => 'trim|required|regex_match[/^[A-Za-z ]*$/]',
                'errors' => array(
                    'regex_match' => 'You must provide a valid alphabetic name.',
                ),
            ),
            array(
                'field' => 'phone',
                'label' => 'Phone',
                'rules' => 'trim|required|regex_match[/^[0-9]*$/]',
                'errors' => array(
                    'regex_match' => 'You must provide a valid phone number.',
                ),
            ),
            array(
                'field' => 'Message',
                'label' => 'Message',
                'rules' => 'trim|required|regex_match[/^[A-Za-z ]*$/]',
                'errors' => array(
                    'regex_match' => 'You must provide a valid alphabetic message.',
                ),
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('pages/' . strtolower(get_class($this)) . '.php');
            $this->load->view('templates/footer', $data);
        } else {
            $data['status'] = 'Message sent successfully!';
            $this->load->view('templates/header', $data);
            $this->load->view('pages/' . strtolower(get_class($this)) . '.php', $data);
            $this->load->view('templates/footer', $data);
        }
    }

}
