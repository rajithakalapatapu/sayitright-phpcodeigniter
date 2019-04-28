<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyfromus2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('url_helper');

        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->model('products_model');
        $this->load->model('orders_model');
    }

    public function index()
    {
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter

        $data['all_products'] = $this->products_model->get_all_products();

        $this->load_page($data);
    }

    public function place_order()
    {
        $data['title'] = ucfirst(get_class($this)); // Capitalize the first letter

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
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'trim|required|regex_match[/^[A-Za-z0-9 ]*$/]',
                'errors' => array(
                    'regex_match' => 'You must provide a valid address.',
                ),
            ),
            array(
                'field' => 'apartment',
                'label' => 'apartment',
                'rules' => 'trim|required|regex_match[/^[A-Za-z0-9 ]*$/]',
                'errors' => array(
                    'regex_match' => 'You must provide a valid apartment.',
                ),
            ),
            array(
                'field' => 'city',
                'label' => 'city',
                'rules' => 'trim|required',
                'errors' => array(
                    'regex_match' => 'You must provide a valid city.',
                ),
            ),
            array(
                'field' => 'postal',
                'label' => 'postal',
                'rules' => 'trim|required',
                'errors' => array(
                    'regex_match' => 'You must provide a valid postal code.',
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

        if ($this->form_validation->run()) {

            $status = $this->orders_model->save_order(
                $this->session->total,
                $this->input->post('email'),
                $this->input->post('fname'),
                $this->input->post('lname'),
                $this->input->post('address'),
                $this->input->post('apartment'),
                $this->input->post('city'),
                $this->input->post('language'),
                $this->input->post('postal')
            );

            if ($status) {
                // successfully placed order so now map orders and products
                //TODO SUCCESSFUl!
                $order_id = $this->orders_model->get_order_id(
                    $this->input->post('email'),
                    $this->session->total,
                    $this->input->post('postal')
                );

                $cart_items = $_SESSION['cart'];
                foreach ($cart_items as $product_id => $quantity) {
                    $this->orders_model->add_entry_to_order_product($order_id, $product_id, $quantity['quantity']);
                }

                $this->clear_cart();
            }
        } else {
            $this->load_page($data);
        }
    }

    public function clear_cart()
    {
        session_destroy();
        redirect(base_url() . 'index.php/' . strtolower(get_class($this)));
    }

    private function load_page($data)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . strtolower(get_class($this)) . '.php');
        $this->load->view('templates/footer', $data);
    }
}
