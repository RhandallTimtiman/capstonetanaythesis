<?php
if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class Hf extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('home_model');
	}

  public function index(){
    $data = [
      'err_msg' => $_GET['err_msg'] ?? ''
    ];

    $template = ENV['default_template'];

    $this->template->build_template (
      'Home', //Page Title
      array( // Views
        array(
          'view' => 'hf/hf',
          'data' => $data
        )
      ),
      array( // JavaScript Files
        "assets/js/hanesearch.js"
      ),
      array( // CSS Files
        "assets/css/hane.css"
      ),
      array( // Meta Tags

      ),
      $template // template page
    );
  }

   public function search() {
     $params = $this->input->post();
     $params['search'] = empty($params['search']) ? ' ' : $params['search'];

     $path = ENV['api_path'];
     $api_name = 'hf_management/searchHane';
     $creds = ENV['credentials'];
     $client = new GuzzleHttp\Client(['verify' => FALSE]);

     $url = $path . $api_name;

     $request = $client->request(
       'POST',
       $url,
       array_merge($creds, ['form_params' => $params])
     );

     $res = $request->getBody()->getContents();
     $res = json_decode($res, TRUE);

     if (!$res['response']) {
       $err_msg = urlencode('No results found.');
       redirect('hf?err='.$err_msg);
     }


     $data = [
       'data' => $res['data']
     ];

     $template = ENV['default_template'];

     $this->template->build_template (
       'Home', //Page Title
        array( // Views
         array(
        'view' => 'hf/search',
          'data' => $data
        )
       ),
      array( // JavaScript Files
       "assets/js/searchhotel.js"
      ),
      array( // CSS Files
        "assets/css/search.css"
      ),
       array( // Meta Tags

       ),
       $template // template page
     );
 }

public function hotelinfo($id = NULL ) {
  $data = [];
  $id = decrypt(urldecode($id));

  $path = ENV['api_path'];
  $api_name = 'hf_management/searchHane';
  $creds = ENV['credentials'];
  $client = new GuzzleHttp\Client(['verify' => FALSE]);

  $searchkey = $post['search'] ?? " ";
  $pricerange = $post['est_price'] ?? NULL;
  $hotelid = $id ?? NULL;


  if(!empty($hotelid)){
    $params = [
      'searchkey' => $searchkey,
      'hotel_id' => $hotelid,
      'pricerange' => 0
    ];

    $url = $path . $api_name;

    $request = $client->request(
      'POST',
      $url,
      array_merge($creds, ['form_params' => $params])
    );

    $res = $request->getBody()->getContents();
    $res = json_decode($res, TRUE);
  }
  else{
    if ($pricerange == NULL ) {
      throw new Exception("LOAD HANE: Invalid parameter(s)");
    }

    $params = [
      'searchkey' => $searchkey,
      'hotel_id' => '',
      'pricerange' => $pricerange
    ];

    $url = $path . $api_name;

    $request = $client->request(
      'POST',
      $url,
      array_merge($creds, ['form_params' => $params])
    );

    $res = $request->getBody()->getContents();
    $res = json_decode($res, TRUE);
  }

  $data = [
    'data' => $res['data']
  ];

  $template = ENV['default_template'];

  $this->template->build_template (
    'Home', //Page Title
     array( // Views
      array(
     'view' => 'hf/hotelinfo',
       'data' => $data
     )
    ),
   array( // JavaScript Files
     'assets/js/haneimageclick.js'
   ),
   array( // CSS Files
     "assets/css/hotelinfo.css"
   ),
    array( // Meta Tags

    ),
    $template // template page
  );
}

  public function get_rooms($params = [], $ajax = TRUE){
    $response = [
      'response' => FALSE
    ];

    try {
      if (!empty($params)) {
        $post = $params;
      } else {
        $post = (isJsonPostContentType()) ? decodeJsonPost($this->security->xss_clean($this->input->raw_input_stream)) : $this->input->post();
      }

      if (empty($post)) {
        throw new Exception('Invalid parameter(s)');
      }

      $path = ENV['api_path'];
      $api_name = 'hf_management/get_hane_rooms';
      $creds = ENV['credentials'];
      $client = new GuzzleHttp\Client(['verify' => FALSE]);

      $id = $post['id'] ?? 'all';
      $start = $post['start'] ?? 0;
      $limit = $post['limit'] ?? 0;
      $searchkey = $post['searchkey'] ?? '';
      $hane = $post['hane'] ?? '';

      $args = [
        'searchkey' => $searchkey,
        'start' => $start,
        'limit' => $limit,
        'id' => $id,
        'hane' => $hane
      ];

      $url = $path . $api_name;

      $request = $client->request(
        'POST',
        $url,
        array_merge($creds, ['form_params' => $args])
      );

      $res = $request->getBody()->getContents();


      if (isJson($res)) {
        $response = array_merge($response, json_decode($res, TRUE));
      }
    } catch (Exception $e) {
      $response['message'] = $e->getMessage();
    }

    if ($ajax) {
      header( 'Content-Type: application/x-json' );
  		echo json_encode($response);
    }
    return $response;
  }

  public function hotel_click($id){
    debug($id,TRUE);
    $path = ENV['api_path'];
    $api_name = 'dashboard/add_hotelclick';
    $creds = ENV['credentials'];
    $client = new GuzzleHttp\Client(['verify' => FALSE]);

    $args = [
    "hotel_id" => $id
    ];

    $url = $path . $api_name;

    $request = $client->request(
    'POST',
    $url,
    array_merge($creds, ['form_params' => $args])
    );

    $res = $request->getBody()->getContents();
  }
}

?>
