<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
	public function __construct()
	{
		parent::__construct();
		if(empty($_SESSION['email'])) {
			redirect(base_url('login'));
		}
		$this->layout = 'template';
	}
	
	public function index()
	{
		$data = [];
		$this->load->view('admin/dashboard/index', $data);
	}

}
