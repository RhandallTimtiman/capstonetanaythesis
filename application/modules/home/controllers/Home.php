<?php
if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class Home extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('home_model');
	}

  public function index(){
    // Record site visit
    $path = ENV['api_path'];
    $api_name = 'dashboard/record_site_visit';
    $creds = ENV['credentials'];
    $client = new GuzzleHttp\Client(['verify' => FALSE]);
    $url = $path . $api_name;
    $request = $client->request(
      'GET',
      $url,
      $creds
    );
    $res = $request->getBody()->getContents();

    $data = [];

    $template = ENV['default_template'];

    $this->template->build_template (
      'Home', //Page Title
      array( // Views
        array(
          'view' => 'home/home',
          'data' => $data
        )
      ),
      array( // JavaScript Files
        "assets/js/home.js"
      ),
      array( // CSS Files
        "assets/css/home.css"
      ),
      array( // Meta Tags

      ),
      $template // template page
    );
  }

  public function load_news($params = [], $ajax = TRUE){
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
      $api_name = 'news/load_news';
      $creds = ENV['credentials'];
      $client = new GuzzleHttp\Client(['verify' => FALSE]);

      $slug = $post['slug'] ?? NULL;
      $id = $post['id'] ?? 'all';
      $start = $post['start'] ?? 0;
      $limit = $post['limit'] ?? 0;
      $searchkey = $post['searchkey'] ?? '';
      $status = $post['status'] ?? 'all';
      $newsslug = $post['newsslug'] ?? 'all';

      $args = [
        "slug" => $slug,
        "id" => $id,
        "start" => $start,
        "limit" => $limit,
        "searchkey" => $searchkey,
        "status" => $status,
        "newsslug" => $newsslug
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

}
?>
