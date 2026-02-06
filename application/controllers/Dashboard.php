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

        if ($this->session->userdata('logged_in') === TRUE) {
        } else {
            redirect();
        }
    }

    // ====================FOR DASHBOARD CONTROLLER========================
    //    public function dashboard_page()
    //     {
    //         $this->load->view('dashboard/templates/tp_header.php');
    //         $this->load->view('dashboard/templates/tp_sidebar.php');
    //         $this->load->view('dashboard/templates/tp_navbar.php');
    //         $this->load->view('dashboard/dashboard.php');
    //         $this->load->view('dashboard/templates/tp_footer.php');
    //     }
    public function transactions_page()
    {

        //  Validate input dates and filters
        $input_date_from = $this->input->post('date-from', true);
        $input_date_to   = $this->input->post('date-to', true);
        $status          = $this->input->post('status', true) ?? 'ALL';
        $session_id      = $this->session->userdata('session_id');

        // Ensure valid date format default: today
        $input_date_from = ($input_date_from && strtotime($input_date_from)) ? $input_date_from : date('Y-m-d');
        $input_date_to   = ($input_date_to && strtotime($input_date_to)) ? $input_date_to : date('Y-m-d');


        $param = [
            'session_id'  => $session_id,
            'date_from'   => $input_date_from,
            'date_to'     => $input_date_to,
            'status'      => $status
        ];

        $endpoint_url = '/v1/bsp-transaction';

        $response = $this->myServices->external_api($param, $endpoint_url);
        $decoded_response = json_decode($response, true);

        $data['transactions'] = [];

        if (
            isset($decoded_response['status']) &&
            $decoded_response['status'] === false &&
            isset($decoded_response['message']) &&
            strtolower($decoded_response['message']) === 'session denied'
        ) {
           
            $data['transactions'] = [];
            $data['session_denied'] = true;
            $data['denied_message'] = $decoded_response['message'];
        } else if (
            isset($decoded_response['status']) &&
            $decoded_response['status'] === true &&
            !empty($decoded_response['data'])
        ) {
            $data['transactions'] = $decoded_response['data'];
        }

        $this->load->view('dashboard/templates/tp_header.php');
        $this->load->view('dashboard/templates/tp_sidebar.php');
        $this->load->view('dashboard/templates/tp_navbar.php');
        $this->load->view('dashboard/transactions.php', $data);
        $this->load->view('dashboard/templates/tp_footer.php');
    }
    // public function transactions_summary_page()
    // {
    //     $this->load->view('dashboard/templates/tp_header.php');
    //     $this->load->view('dashboard/templates/tp_sidebar.php');
    //     $this->load->view('dashboard/templates/tp_navbar.php');
    //     $this->load->view('dashboard/transactions-summary.php');
    //     $this->load->view('dashboard/templates/tp_footer.php');
    // }
    // public function accounts_page()
    // {
    //     $this->load->view('dashboard/templates/tp_header.php');
    //     $this->load->view('dashboard/templates/tp_sidebar.php');
    //     $this->load->view('dashboard/templates/tp_navbar.php');
    //     $this->load->view('dashboard/accounts.php');
    //     $this->load->view('dashboard/templates/tp_footer.php');
    // }
    // public function blank_page()
    // {
    //     $this->load->view('dashboard/templates/tp_header.php');
    //     $this->load->view('dashboard/templates/tp_sidebar.php');
    //     $this->load->view('dashboard/templates/tp_navbar.php');
    //     $this->load->view('dashboard/blankpage.php');
    //     $this->load->view('dashboard/templates/tp_footer.php');
    // }

}
