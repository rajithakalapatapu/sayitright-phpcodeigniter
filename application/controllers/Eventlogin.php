<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventlogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->model('event_model');

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter

        if ($this->validate_new_event_entry()) {
            // now create the event
            $affected_rows = $this->event_model->create_event(
                $this->input->post('event_name'),
                $this->input->post('event_date') . " " . $this->input->post('event_time'),
                $this->input->post('event_type'),
                $this->input->post('event_location'),
                $this->session->user_id
            );

            if ($affected_rows) {
                //TODO: Actually show that we successfully created the event!
            }


        }

        $this->load_page($data);
    }

    public function delete($event_id)
    {
        $affected_row = $this->event_model->delete($event_id);
        if ($affected_row) {
            //TODO: show success message
        }
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter
        $this->load_page($data);
    }

    private function validate_new_event_entry()
    {
        $config = array(
            array(
                'field' => 'event_name',
                'label' => 'Name',
                'rules' => 'trim|required|regex_match[/^[A-Za-z ]*$/]',
                'errors' => array(
                    'regex_match' => 'You must provide a valid event name.',
                ),
            ),
            array(
                'field' => 'event_date',
                'label' => 'Event Date',
                'rules' => 'trim|required',
                'errors' => array(
                    'regex_match' => 'You must provide a valid event date.',
                ),
            ),
            array(
                'field' => 'event_time',
                'label' => 'Event Timee',
                'rules' => 'trim|required',
                'errors' => array(
                    'regex_match' => 'You must provide a valid event time.',
                ),
            ),
            array(
                'field' => 'event_type',
                'label' => 'Event Type',
                'rules' => 'trim|required',
                'errors' => array(
                    'regex_match' => 'You must provide a valid event type.',
                ),
            ),
            array(
                'field' => 'event_location',
                'label' => 'Event Location',
                'rules' => 'trim|required|regex_match[/^[A-Za-z ]*$/]',
                'errors' => array(
                    'regex_match' => 'You must provide a valid event location.',
                ),
            )
        );

        $this->form_validation->set_rules($config);
        return $this->form_validation->run();
    }

    private function load_page($data)
    {
        $user_id = $this->session->user_id;
        $data['current_user_events'] = $this->event_model->get_current_user_events($user_id);

        $this->load->view('templates/loggedinheader', $data);
        $this->load->view('pages/' . strtolower(get_class($this)) . '.php');
        $this->load->view('templates/footer', $data);
    }

}
