<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfileAuth extends CI_Controller
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
	public function profile_login()
	{

		try {

			$this->load->library('form_validation');


			$this->form_validation->set_rules('username', 'Username', 'required|trim');
			$this->form_validation->set_rules('password', 'Password', 'required|trim');


			if ($this->form_validation->run() == FALSE) {

				$this->session->set_flashdata('error', validation_errors());
				redirect();
			}


			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);



			$endpoint_url = '/login';

			$param = array(
				'username' 	=> $username,
				'password' 	=> $password,
				// 'username' 	=> 'member_1',
				// 'password' 	=> 'zaq12345',
				'ip'         => $this->input->ip_address(),
				'user_agent'  => $this->input->user_agent()
			);


			$response = $this->myServices->external_api($param, $endpoint_url);
			$decoded_response = json_decode($response, true);


			if ($decoded_response['status']) {

				// $usertype = $this->usertype($decoded_response['data']['user_type']);
				// $sub_usertype = $this->sub_usertype($decoded_response['data']['sub_usertype']);

				$user_data = [
					'username'      => $decoded_response['data']['username'],
					'logged_in'     => $decoded_response['data']['logged_in'],
					'session_id'    => $decoded_response['data']['session_id'],
					'uid'     		=> $decoded_response['data']['user_id'],
					'usertype'     	=> $decoded_response['data']['user_type'],
					'name'     	=> $decoded_response['data']['name']

				];

				// echo json_encode($user_data);

				$this->session->set_userdata($user_data);

				if ($this->session->userdata('usertype') == 'SUPERADMIN' || $this->session->userdata('usertype') == 'ADMIN') {
					redirect('transactions');
				} else {
					redirect('transactions');
				}
			} else {

				$this->session->set_flashdata('error', $decoded_response['message']);
				log_message('error', 'Failed login attempt: Username not found: ' . $username);
				redirect();
			}
		} catch (Exception $e) {

			log_message('error', 'Error during login: ' . $e->getMessage());
			$this->session->set_flashdata('error', 'An unexpected error occurred. Please try again.');
			redirect();
		}
	}

	public function bsp_auth_login()
	{

		$this->load->view('website/login.php');
	}
}
