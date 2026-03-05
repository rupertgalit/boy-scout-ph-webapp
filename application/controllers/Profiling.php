<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profiling extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

	}

	public function Landing_profile()
	{
		$this->load->view('profiling/layout/header.php');
		$this->load->view('profiling/layout/sidebar.php');
		$this->load->view('profiling/layout/nav.php');
		$this->load->view('profiling/profile.php');
		$this->load->view('profiling/layout/footer.php');
	}
}
