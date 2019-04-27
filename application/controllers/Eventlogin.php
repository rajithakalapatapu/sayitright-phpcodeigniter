<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventlogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->model('events_model');

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter

        if (! $this->event_user_logged_in()) {
            $this->go_to_login_page($data);
        }

        if ($this->validate_new_event_entry()) {
            // now create the event
            $affected_rows = $this->events_model->create_event(
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
        $data['current_user_events'] = $this->events_model->get_current_user_events($user_id);

        $this->load->view('templates/loggedinheader', $data);
        $this->load->view('pages/' . strtolower(get_class($this)) . '.php');
        $this->load->view('templates/footer', $data);
    }

    public function delete($event_id)
    {
        $affected_row = $this->events_model->delete($event_id);
        if ($affected_row) {
            //TODO: show success message
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

    private function event_user_logged_in()
    {
        if($this->session->user_type == "event" && $this->session->user_id != 0) {
            return true;
        }
        return false;
    }
}
