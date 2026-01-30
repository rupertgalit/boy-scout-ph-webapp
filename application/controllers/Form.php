<?php



defined('BASEPATH') or exit('No direct script access allowed');


require_once(APPPATH . 'services/MyServices.php');

class Form extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();

      date_default_timezone_set('Asia/Manila');
      $this->myServices = new MyServices();
      $this->load->library('form_validation');

      // if ($this->session->userdata('logged_in') === TRUE) {
      // } else {
      //    redirect();
      // }
   }

// ====================FOR FORM CONTROLLER========================

	public function form_page(){

		$this->load->view('form/form.php');
	}
 
}
