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

   public function form_page()
   {

      $this->load->view('form/form.php');
   }

   // public function generate_token(){

   // 	echo  $this->myServices->generate_token();
   // }

   private function generate_id_with_datetime()
   {

      $month = date('m');

      $day = date('d');

      // Seconds since midnight (0–86399) → keep last 4 digits
      $seconds = date('H') * 3600 + date('i') * 60 + date('s');
      $seconds = str_pad($seconds % 10000, 4, '0', STR_PAD_LEFT);

      $random = mt_rand(10, 99);

      return $month . $day . $seconds . $random;
   }


   public function generate_qr()
   {


      $reference_number    = 'BSP-' . $this->generate_id_with_datetime();
      $redirect_url        = $this->security->xss_clean($this->input->post("mobile-number"));

      $payment_for         = $this->security->xss_clean($this->input->post("amount"));
      $council_code        = $this->security->xss_clean($this->input->post("email"));
      $district_code       = $this->security->xss_clean($this->input->post("name"));
      $sub_district_code   = $this->security->xss_clean($this->input->post("mobile-number"));
      $shool_code          = $this->security->xss_clean($this->input->post("mobile-number"));
      $description_code    = $this->security->xss_clean($this->input->post("mobile-number"));
      $scout_code          = $this->security->xss_clean($this->input->post("mobile-number"));
      $payment_type_code   = $this->security->xss_clean($this->input->post("mobile-number"));
      $amount              = $this->security->xss_clean($this->input->post("mobile-number"));
      $email               = $this->security->xss_clean($this->input->post("mobile-number"));
      $phone               = $this->security->xss_clean($this->input->post("mobile-number"));
      $full_name           = $this->security->xss_clean($this->input->post("mobile-number"));



      // echo $reference_number .
      // 	'<br>CLUB CODE = ' . $club_code_post .
      // 	'<br>DESC CODE =' . $description_code .
      // 	'<br>REG CODE = ' . $region_code .
      // 	'<br>MOBILE = ' . $mobile_number .
      // 	'<br>AMOUNT = ' . $amount .
      // 	'<br>EMAIL = ' . $email .
      // 	'<br>NAME = ' .  $name .

      // 	'<br>OTHERS CLUB = ' . $others_club .
      // 	'<br>OTHERS REGION = ' . $others_region .
      // 	'<br>OTHERS DESC = ' . $others_description .
      // 	'<br>OTHERS PAYMENT FOR = ' . $others_payment_for;

      if (!is_numeric($amount) || $amount <= 0) {
         // $this->session->set_flashdata('error', 'Invalid amount.');
         redirect('/payment-form');
         // echo "Invalid amount";
         // return;
      }

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         // $this->session->set_flashdata('error', 'Invalid email address.');
         redirect('/payment-form');
         // echo "Invalid email address.";
         // return;
      }

      $param = [
         "reference_number"         => $reference_number,
         "redirect_url"             => $redirect_url,
         "payment_for"              => $payment_for,
         "council_code"             => $council_code,
         "district_code"            => $district_code,
         "sub_district_code"        => $sub_district_code,
         "shool_code"               => $shool_code,
         "description_code"         => $description_code,
         "scout_code"               => $scout_code,
         "payment_type_code"        => $payment_type_code,
         "amount"                   => $amount,
         "email"                    => $email,
         "phone"                    => $phone,
         "full_name"                => $full_name
      ];

      $endpoint_url = 'club/payment';

      try {
         $response = $this->myServices->external_api($param, $endpoint_url);

         if (!isset($response['body']) || empty($response['body'])) {
            throw new Exception("Empty API response");
         }

         $response_data = json_encode($response['body']);
         $records = json_decode($response_data, true);

         if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("Failed to parse API response");
         }

         $data['records']   = $records;



         if (!empty($records['status']) && !empty($records['data']['url'])) {
            // redirect($records['data']['url']);
            $data['qr'] = $records['data']['raw_string'];
            $data['reference_number'] = $param['reference_number'];
            $this->load->view('form/mv_qr.php', $data);
            // exit;
         } else {
            $this->session->set_flashdata('error', 'Failed to generate QR. Please try again.');
            // redirect();
            // echo "Failed to generate QR. Please try again" ;
            echo $response_data;
         }
      } catch (Exception $e) {
         log_message('error', 'generate_qr error: ' . $e->getMessage());
         $this->session->set_flashdata('error', 'Unexpected error occurred. Please try again later.');
         // redirect();
         echo "Unexpected error occurred. Please try again later";
      }
   }





   /* GENERIC API WRAPPER*/
   private function call_api($endpoint, $param = [], $method = 'POST')
   {
      header('Content-Type: application/json; charset=utf-8');
      try {

         $api_response = $this->myServices->external_api($param, $endpoint, $method);

         if (!$api_response) {
            throw new Exception("Empty response from API");
         }

         $decoded = json_decode($api_response, true);

         if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("Invalid JSON from API");
         }

         return [
            'status'      => $decoded['status'] ?? false,
            'status_code' => $decoded['status_code'] ?? 500,
            'message'     => $decoded['message'] ?? '',
            'data'        => $decoded['data'] ?? []
         ];
      } catch (Exception $e) {

         log_message('error', 'Scout API: ' . $e->getMessage());

         return [
            'status' => false,
            'message' => $e->getMessage(),
            'data' => []
         ];
      }
   }

   /*COUNCIL (GET)*/
   public function council_list()
   {
      $result = $this->call_api('/v1/council-list', [], 'GET');

      // normalize to array
      if (!empty($result['data']) && !isset($result['data'][0])) {
         $result['data'] = [$result['data']];
      }

      echo json_encode($result);
   }

   /*DISTRICT (POST) */
   public function district_list()
   {
      $council = $this->input->get('council_code', TRUE);

      if (!$council) {
         echo json_encode([
            'status' => false,
            'message' => 'council_code required',
            'data' => []
         ]);
         return;
      }

      echo json_encode(
         $this->call_api('/v1/district-list', [
            "council_code" => $council
         ])
      );
   }

   /*SUB DISTRICT */
   public function sub_district_list()
   {
      $district = $this->input->get('district_code', TRUE);

      // for test
      if (!$district) {
         $district = "DST001";
      }

      if (!$district) {
         echo json_encode([
            'status' => false,
            'message' => 'district_code required',
            'data' => []
         ]);
         return;
      }

      echo json_encode(
         $this->call_api('/v1/sub-district-list', [
            "district_code" => $district
         ])
      );
   }

   /* SCHOOL */
   public function school_list()
   {
      $council  = $this->input->get('council_code', TRUE);
      $district = $this->input->get('district_code', TRUE);
      $sub      = $this->input->get('sub_district_code', TRUE);

      if (!$council || !$district || !$sub) {
         echo json_encode([
            'status' => false,
            'message' => 'All parameters required',
            'data' => []
         ]);
         return;
      }

      echo json_encode(
         $this->call_api('/v1/school-list', [
            "council_code"      => $council,
            "district_code"     => $district,
            "sub_district_code" => $sub
         ])
      );
   }




   /* SCOUT TYPE – GET  */
   public function scout_list()
   {
      $result = $this->call_api('/v1/scout-list', [], 'GET');

      // normalize to array
      if (!empty($result['data']) && !isset($result['data'][0])) {
         $result['data'] = [$result['data']];
      }

      echo json_encode($result);
   }


   /* PAYMENT TYPE –GET  */
   public function scout_payment_type()
   {
      $result = $this->call_api('/v1/scout-payment-type', [], 'GET');

      // normalize to array
      if (!empty($result['data']) && !isset($result['data'][0])) {
         $result['data'] = [$result['data']];
      }

      echo json_encode($result);
   }


   /* ITEM CATEGORY – POST  */
   public function scout_payment_description()
   {
      header('Content-Type: application/json');

      $scout = $this->input->get('scout_code', TRUE);
      $type  = $this->input->get('payment_type_code', TRUE);



      if (!$scout || !$type) {
         echo json_encode([
            'status' => false,
            'message' => 'All parameters required',
            'data' => []
         ]);
         return;
      }

      echo json_encode(
         $this->call_api('/v1/scout-payment-description', [
            "scout_code"            => $scout,
            "payment_type_code"     => $type

         ])
      );
   }





   public function qr_page()
   {

      $this->load->view('form/qrph.php');
   }
   public function success_page()
   {

      $this->load->view('form/success_payment.php');
   }
}
