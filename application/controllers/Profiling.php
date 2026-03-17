<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profiling extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

	}

	public function landing_profile()
	{
		$this->load->view('profiling/layout/header.php');
		$this->load->view('profiling/layout/sidebar.php');
		$this->load->view('profiling/layout/nav.php');
		$this->load->view('profiling/profile.php');
		$this->load->view('profiling/layout/footer.php');
	}
	public function aur_table()
	{
		$this->load->view('profiling/layout/header.php');
		$this->load->view('profiling/layout/sidebar.php');
		$this->load->view('profiling/layout/nav.php');
		$this->load->view('profiling/aur_table.php');
		$this->load->view('profiling/layout/footer.php');
	}
	public function asr_table()
	{
		$this->load->view('profiling/layout/header.php');
		$this->load->view('profiling/layout/sidebar.php');
		$this->load->view('profiling/layout/nav.php');
		$this->load->view('profiling/asr_table.php');
		$this->load->view('profiling/layout/footer.php');
	}
	public function aur_form()
	{
		$this->load->view('profiling/create_aur.php');
	}
}
