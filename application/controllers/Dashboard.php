<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library(['session', 'book_service']);

        if($this->session->userdata('token') === NULL)
        {
            redirect('/login');
        }
    }

	public function index()
	{
		$this->load->view('dashboard');
	}

    public function last_5_rented_books()
    {
        $response = $this->book_service->last_5_rented_books($this->session->userdata('token'));
        if($response['http_code'] == 401 || $response['http_code'] == 403)
        {
            redirect('/logout');
        }
        $data['books'] = $response['response'];
        $this->load->view('last_5_rented_books', $data);
    }

    public function no_of_books_for_last_15_days()
    {
        $response = $this->book_service->no_of_books_for_last_15_days($this->session->userdata('token'));
        if($response['http_code'] == 401 || $response['http_code'] == 403)
        {
            redirect('/logout');
        }
        $data['no_of_books'] = $response['response']->no_of_books;
        $this->load->view('no_of_books_for_last_15_days', $data);
    }

    public function list_of_books()
    {
        $page = isset($_GET['page'])?$_GET['page']:1;
        $response = $this->book_service->list_of_books($page, $this->session->userdata('token'));
        if($response['http_code'] == 401 || $response['http_code'] == 403)
        {
            redirect('/logout');
        }
        $data['books'] = $response['response'];
        $this->load->view('list_of_books', $data);
    }
}
