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



   public function get_district_by_council()
   {
      header('Content-Type: application/json; charset=utf-8');

      try {


         $council = $this->input->get('council_code', TRUE);

         // remove on production
         if (empty($council)) {
            $council = "M001";
         }


         if (empty($council)) {
            http_response_code(400);
            echo json_encode([
               'status'  => false,
               'status_code' => 400,
               'message' => 'council_code is required',
               'data'    => []
            ]);
            return;
         }


         $param = [
            "council_code" => $council
         ];

         $endpoint_url = '/v1/district-list';

         $api_response = $this->myServices->external_api($param, $endpoint_url);

         if (!$api_response) {
            throw new Exception("No response from external API");
         }

         $response_decoded = json_decode($api_response, true);

         if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("Invalid JSON response from API");
         }

         // Safe checks to avoid undefined index
         $status      = $response_decoded['status'] ?? false;
         $status_code = $response_decoded['status_code'] ?? 500;
         $message     = $response_decoded['message'] ?? 'Unknown error';
         $data        = $response_decoded['data'] ?? [];

         if ($status) {
            http_response_code(200);
            echo json_encode([
               'status'      => true,
               'status_code' => $status_code,
               'message'     => 'Success',
               'data'        => $data
            ]);
         } else {
            http_response_code(200);
            echo json_encode([
               'status'      => false,
               'status_code' => $status_code,
               'message'     => $message,
               'data'        => []
            ]);
         }
      } catch (Exception $e) {

         log_message('error', 'get_district_by_council: ' . $e->getMessage());

         http_response_code(500);
         echo json_encode([
            'status'  => false,
            'status_code' => 500,
            'message' => 'Internal server error ',
            'data'    => []
         ]);
      }
   }

   public function get_subdistrict_by_district()
   {
      header('Content-Type: application/json; charset=utf-8');

      try {


         $district_code = $this->input->get('district_code', TRUE);

         // remove on production
         if (empty($council)) {
            $district_code = "DST001";
         }


         if (empty($district_code)) {
            http_response_code(400);
            echo json_encode([
               'status'  => false,
               'status_code' => 400,
               'message' => 'district_code is required',
               'data'    => []
            ]);
            return;
         }


         $param = [
            "district_code" => $district_code
         ];

         $endpoint_url = '/v1/sub-district-list';

         $api_response = $this->myServices->external_api($param, $endpoint_url);

         if (!$api_response) {
            throw new Exception("No response from external API");
         }

         $response_decoded = json_decode($api_response, true);

         if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("Invalid JSON response from API");
         }

         // Safe checks to avoid undefined index
         $status      = $response_decoded['status'] ?? false;
         $status_code = $response_decoded['status_code'] ?? 500;
         $message     = $response_decoded['message'] ?? 'Unknown error';
         $data        = $response_decoded['data'] ?? [];

         if ($status) {
            http_response_code(200);
            echo json_encode([
               'status'      => true,
               'status_code' => $status_code,
               'message'     => 'Success',
               'data'        => $data
            ]);
         } else {
            http_response_code(200);
            echo json_encode([
               'status'      => false,
               'status_code' => $status_code,
               'message'     => $message,
               'data'        => []
            ]);
         }
      } catch (Exception $e) {

         log_message('error', 'get_subdistrict_by_district: ' . $e->getMessage());

         http_response_code(500);
         echo json_encode([
            'status'  => false,
            'status_code' => 500,
            'message' => 'Internal server error ',
            'data'    => []
         ]);
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
      if (!$district){
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




   /* =========================================================
   SCOUT TYPE – GET /v1/scout-list
========================================================= */
   public function scout_list()
   {
      $result = $this->call_api('/v1/scout-list', [], 'GET');

      // normalize to array
      if (!empty($result['data']) && !isset($result['data'][0])) {
         $result['data'] = [$result['data']];
      }

      echo json_encode($result);
   }


   /* =========================================================
   PAYMENT TYPE – GET /v1/scout-payment-type
========================================================= */
   public function scout_payment_type()
   {
      $result = $this->call_api('/v1/scout-payment-type', [], 'GET');

      // normalize to array
      if (!empty($result['data']) && !isset($result['data'][0])) {
         $result['data'] = [$result['data']];
      }

      echo json_encode($result);
   }


   /* =========================================================
   ITEM CATEGORY – POST /v1/scout-payment-description
========================================================= */
   public function scout_payment_description()
   {
      header('Content-Type: application/json');

      $scout = $this->input->get('scout_code', TRUE);
      $type  = $this->input->get('payment_type_code', TRUE);



      if (!$scout|| !$type) {
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
