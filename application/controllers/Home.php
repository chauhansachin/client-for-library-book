<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('display_errors', 1);
error_reporting(E_ALL);

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('home');
	}
}
