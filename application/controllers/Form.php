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


   // public function generate_qr_old()
   // {


   //    $reference_number    = 'BSP-' . $this->generate_id_with_datetime();
   //    $redirect_url        = base_url('form');

   //    $payment_for         = $this->security->xss_clean($this->input->post("payment-for"));
   //    $council_code        = $this->security->xss_clean($this->input->post("council-code"));
   //    $district_code       = $this->security->xss_clean($this->input->post("district-code"));
   //    $sub_district_code   = $this->security->xss_clean($this->input->post("sub-district-code"));
   //    $school_code         = $this->security->xss_clean($this->input->post("school-code"));
   //    $description_code    = $this->security->xss_clean($this->input->post("description-code"));
   //    $scout_code          = $this->security->xss_clean($this->input->post("scout-code"));
   //    $payment_type_code   = $this->security->xss_clean($this->input->post("payment-type-code"));
   //    $amount              = $this->security->xss_clean($this->input->post("amount"));
   //    $email               = $this->security->xss_clean($this->input->post("email"));
   //    $phone               = $this->security->xss_clean($this->input->post("phone"));
   //    $full_name           = $this->security->xss_clean($this->input->post("fullname"));



   //    // echo $reference_number .
   //    // 	'<br>REF = ' . $reference_number .
   //    // 	'<br>URL =' . $redirect_url .
   //    // 	'<br>PAYMENT FOR = ' . $payment_for .
   //    // 	'<br>COUNCIL CODE = ' . $council_code .
   //    // 	'<br>DISTRICT CODE = ' . $district_code .
   //    // 	'<br>SUB DIST CODE = ' . $sub_district_code .
   //    // 	'<br>SCHOOL CODE = ' .  $school_code .

   //    // 	'<br>DESC CODE = ' . $description_code .
   //    // 	'<br>SCOUT CODE = ' . $scout_code .
   //    //    '<br>PAYMENT TYPE CODE = ' . $payment_type_code. 
   //    // 	'<br>AMOUNT = ' . $amount .
   //    // 	'<br>EMAIL = ' . $email.
   //    // 	'<br>PHONE = ' . $phone.
   //    // 	'<br>NAME = ' . $full_name;


   //    // if (!is_numeric($amount) || $amount <= 0) {
   //    //    // $this->session->set_flashdata('error', 'Invalid amount.');
   //    //    redirect('/payment-form');
   //    //    // echo "Invalid amount";
   //    //    // return;
   //    // }

   //    // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   //    //    // $this->session->set_flashdata('error', 'Invalid email address.');
   //    //    redirect('/payment-form');
   //    //    // echo "Invalid email address.";
   //    //    // return;
   //    // }

   //    $param = [
   //       "reference_number"         => $reference_number,
   //       "redirect_url"             => $redirect_url,
   //       "payment_for"              => $payment_for,
   //       "council_code"             => $council_code,
   //       "district_code"            => $district_code,
   //       "sub_district_code"        => $sub_district_code,
   //       "school_code"              => $school_code,
   //       "description_code"         => $description_code,
   //       "scout_code"               => $scout_code,
   //       "payment_type_code"        => $payment_type_code,
   //       "amount"                   => $amount,
   //       "email"                    => $email,
   //       "phone"                    => $phone,
   //       "full_name"                => $full_name
   //    ];

   //    $endpoint_url = '/v1/bsp-payment';

   //    try {
   //       $response = $this->myServices->external_api($param, $endpoint_url);

   //       if (!$response) {
   //          throw new Exception("Empty response from API");
   //       }


   //       $records = json_decode($response, true);

   //       if (json_last_error() !== JSON_ERROR_NONE) {
   //          throw new Exception("Failed to parse API response");
   //       }

   //       $data['records']   = $records;



   //       if (!empty($records['status']) && !empty($records['data']['url'])) {
   //          // redirect($records['data']['url']);
   //          $data['qr'] = $records['data']['raw_string'];
   //          $data['reference_number'] = $param['reference_number'];
   //          $this->load->view('form/qrph.php', $data);
   //          // exit;
   //       } else {
   //          $this->session->set_flashdata('error', 'Failed to generate QR. Please try again.');
   //          // redirect();
   //          // echo "Failed to generate QR. Please try again" ;
   //          echo $response;
   //       }
   //    } catch (Exception $e) {
   //       log_message('error', 'generate_qr error: ' . $e->getMessage());
   //       $this->session->set_flashdata('error', 'Unexpected error occurred. Please try again later.');
   //       // redirect();
   //       echo "Unexpected error occurred. Please try again later";
   //    }
   // }


   public function generate_qr()
   {
      
      $this->load->library('form_validation');

 

      $this->form_validation->set_rules('payment-for', 'Payment For', 'required|trim');
      $this->form_validation->set_rules('council-code', 'Council', 'required|trim');
      $this->form_validation->set_rules('district-code', 'District', 'required|trim');
      $this->form_validation->set_rules('description-code', 'Description', 'required|trim');
      $this->form_validation->set_rules('scout-code', 'Scout Type', 'required|trim');
      $this->form_validation->set_rules('payment-type-code', 'Payment Type', 'required|trim');

      $this->form_validation->set_rules('amount', 'Amount', 'required|numeric|greater_than[0]');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      $this->form_validation->set_rules('phone', 'Phone', 'required|min_length[7]|max_length[15]');
      $this->form_validation->set_rules('fullname', 'Full Name', 'required|min_length[3]');

      if ($this->form_validation->run() == FALSE) {

         // Return validation errors
         $this->session->set_flashdata('error', validation_errors());
         redirect('form');
         return;
      }


      $reference_number = 'BSP-' . $this->generate_id_with_datetime();
      $redirect_url     = base_url('form');

      $param = [
         "reference_number"  => $reference_number,
         "redirect_url"      => $redirect_url,

         "payment_for"       => $this->security->xss_clean($this->input->post("payment-for")),
         "council_code"      => $this->security->xss_clean($this->input->post("council-code")),
         "district_code"     => $this->security->xss_clean($this->input->post("district-code")),
         "sub_district_code" => $this->security->xss_clean($this->input->post("sub-district-code")),
         "school_code"       => $this->security->xss_clean($this->input->post("school-code")),

         "description_code"  => $this->security->xss_clean($this->input->post("description-code")),
         "scout_code"        => $this->security->xss_clean($this->input->post("scout-code")),
         "payment_type_code" => $this->security->xss_clean($this->input->post("payment-type-code")),

         "amount"            => number_format((float)$this->input->post("amount"), 2, '.', ''),

         "email"             => $this->security->xss_clean($this->input->post("email")),
         "phone"             => $this->security->xss_clean($this->input->post("phone")),
         "full_name"         => $this->security->xss_clean($this->input->post("fullname"))
      ];

      $endpoint_url = '/v1/bsp-payment';



      try {

         $response = $this->myServices->external_api($param, $endpoint_url);

         if (empty($response)) {
            throw new Exception("Empty response from API");
         }

         $records = json_decode($response, true);

         if (json_last_error() !== JSON_ERROR_NONE) {
            log_message('error', 'API raw response: ' . $response);
            throw new Exception("Invalid JSON response from API");
         }



         if (
            isset($records['status']) &&
            $records['status'] == true &&
            !empty($records['data']['url'])
         ) {

            $data = [
               'records'          => $records,
               'qr'               => $records['data']['raw_string'],
               'reference_number' => $reference_number
            ];

            $this->load->view('form/qrph.php', $data);
            return;
         }



         $message = isset($records['message'])
            ? $records['message']
            : 'Failed to generate QR. Please try again.';

         $this->session->set_flashdata('error', $message);
         redirect('/form');
         return;
      } catch (Exception $e) {

         log_message('error', 'generate_qr error: ' . $e->getMessage());

         $this->session->set_flashdata(
            'error',
            'Unexpected error occurred. Please try again later.'
         );

         redirect('/form');
         return;
      }
   }

   	public function check_ref()
	{
		// $ref_num = "BSP-0206284713";
		$ref_num = $this->input->post('refnum');

		// Validate reference number
		if (empty($ref_num) || !preg_match('/^\S+$/', $ref_num)) {
			$response = [
				'status' => false,
				'message' => 'Invalid reference number.'
			];
			header('Content-Type: application/json');
			echo json_encode($response);
			return;
		}

		$endpoint_url = '/transaction-status';
		$param = [
			'reference_number' => $ref_num
		];


		$api_response = $this->myServices->external_api($param, $endpoint_url);

		
		$response_decoded = json_decode($api_response, true);




		// if (!is_array($response_decoded) || !isset($response_decoded['status'])) {
		// 	$response = [
		// 		'status' => false,
		// 		'message' => 'Invalid API response.'
		// 	];
		// 	header('Content-Type: application/json');
		// 	echo json_encode($response);
		// 	return;
		// }

		$record_status = $response_decoded['data']['status'] ?? null;
		$redirect_url = null;
		$payment_status = 'UNKNOWN';


		if ($response_decoded['status']) {
			switch ($record_status) {
				case 'SUCCESS':
					$payment_status = 'SUCCESS';
					$redirect_url = base_url('/success') . '?refnum=' . urlencode($ref_num);
					break;

				case 'FAILED':
					$payment_status = 'FAILED';
					$redirect_url = base_url('/failed') . '?refnum=' . urlencode($ref_num);
					break;

				case 'PENDING':
				case 'CREATED':
				default:
					$payment_status = $record_status ?: 'CREATED';
					$redirect_url = null;
					break;
			}

			$result = [
				'status' => true,
				'message' => 'success',
				'payment_status' => $payment_status,
				'redirect_url' => $redirect_url,
				// 'data' => $response_decoded['data']
			];
		} else {
			$result = [
				'status' => false,
				'message' => $response_decoded['message'] ?? 'Unknown error'
			];
		}


		header('Content-Type: application/json');
		echo json_encode($result);
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
