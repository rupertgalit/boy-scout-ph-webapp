<?php



defined('BASEPATH') or exit('No direct script access allowed');


require_once(APPPATH . 'services/MyServices.php');

class Dashboard extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();

      date_default_timezone_set('Asia/Manila');
      $this->myServices = new MyServices();
      $this->load->library('form_validation');

    //   if ($this->session->userdata('logged_in') === TRUE) {
    //   } else {
    //      redirect();
    //   }
   }

// ====================FOR DASHBOARD CONTROLLER========================
   public function dashboard_page()
    {
        $this->load->view('dashboard/templates/tp_header.php');
        $this->load->view('dashboard/templates/tp_sidebar.php');
        $this->load->view('dashboard/templates/tp_navbar.php');
        $this->load->view('dashboard/dashboard.php');
        $this->load->view('dashboard/templates/tp_footer.php');
    }
    public function transactions_page()
    {
        $this->load->view('dashboard/templates/tp_header.php');
        $this->load->view('dashboard/templates/tp_sidebar.php');
        $this->load->view('dashboard/templates/tp_navbar.php');
        $this->load->view('dashboard/transactions.php');
        $this->load->view('dashboard/templates/tp_footer.php');
    }
    public function transactions_summary_page()
    {
        $this->load->view('dashboard/templates/tp_header.php');
        $this->load->view('dashboard/templates/tp_sidebar.php');
        $this->load->view('dashboard/templates/tp_navbar.php');
        $this->load->view('dashboard/transactions-summary.php');
        $this->load->view('dashboard/templates/tp_footer.php');
    }
    public function accounts_page()
    {
        $this->load->view('dashboard/templates/tp_header.php');
        $this->load->view('dashboard/templates/tp_sidebar.php');
        $this->load->view('dashboard/templates/tp_navbar.php');
        $this->load->view('dashboard/accounts.php');
        $this->load->view('dashboard/templates/tp_footer.php');
    }
    public function blank_page()
    {
        $this->load->view('dashboard/templates/tp_header.php');
        $this->load->view('dashboard/templates/tp_sidebar.php');
        $this->load->view('dashboard/templates/tp_navbar.php');
        $this->load->view('dashboard/blankpage.php');
        $this->load->view('dashboard/templates/tp_footer.php');
    }
 
}
