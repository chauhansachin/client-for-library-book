<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('display_errors', 1);
error_reporting(E_ALL);

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'auth_service']);
    }

	public function display_login()
	{
		$this->load->view('login');
	}

    public function display_register()
    {
        $this->load->view('register');
    }

    public function login()
	{
        $email = $this->input->post('email');
        $password = $this->input->post('password');

		$token = $this->auth_service->login($email, $password);

        $this->session->set_userdata('token', $token);

        redirect('dashboard');
	}

    public function register()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $password = $this->input->post('password');

        $token = $this->auth_service->register($name, $email, $phone, $password);

        $this->session->set_userdata('token', $token);

        redirect('dashboard');
    }

    public function logout()
    {
        $this->session->unset_userdata('token');
        $this->session->sess_destroy();

        redirect('/');
    }
}
