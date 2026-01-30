<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . 'services/MyServices.php');

class Auth extends CI_Controller
{
	public $apiService;

	public function __construct()
	{
		parent::__construct();

		$this->myServices = new MyServices();
		$this->load->library('session');


		// if($this->session->userdata('user_id') !== TRUE){
		//     redirect('login');

	}


	public function login() {
        $this->load->view('auth/login.php');
	}


	public function logout() {
		
	}


	function generate_id_with_datetime()
	{

		$datetime = date('ymdHis');

		$random_number = mt_rand(1000, 9999);

		$unique_id = $datetime . $random_number;

		$unique_id = substr($unique_id, 0, 10);

		return $unique_id;
	}


	private function usertype($type) {}
}
