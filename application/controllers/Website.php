<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Website extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

	}

	public function page()
	{
		$this->load->view('website/layout/header.php');
		$this->load->view('website/layout/nav.php');
		$this->load->view('website/website.php');
		$this->load->view('website/layout/footer.php');
	}
	public function register()
	{
		$this->load->view('website/register.php');
	}
	public function bsp_login()
	{
		$this->load->view('website/login.php');
	}
	
		public function bsp_auth_login()
	{

		$this->load->view('website/login.php');
	}

}
