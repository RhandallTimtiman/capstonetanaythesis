<?php
if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class Pages extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
	}

  public function load_pages($params = [], $ajax = TRUE){
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
      $api_name = 'pages/load_pages';
      $creds = ENV['credentials'];
      $client = new GuzzleHttp\Client(['verify' => FALSE]);

      $args = $post['params'];

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

  public function details($page_slug = NULL, $tag = NULL, $content_slug = NULL) {
    try {
      if (empty($page_slug) || empty($tag) || empty($content_slug)) {
        throw new Exception('Invalid parameter(s).');
      }

      $args = '
        {
          "'.$page_slug.'" : {
            "'.$tag.'" : {
              "searchkey" : "",
              "start" : 0,
              "limit" : 1,
              "isShown" : 1,
              "content_slug" : "'.$content_slug.'"
            }
          }
        }
      ';

      $args = json_decode($args, TRUE);

      $result = $this->load_pages(['params' => $args], FALSE);

      if (!$result['response']) {
        throw new Exception($result['message']);
      }
    } catch (Exception $e) {
      show_404();
    }

    return $result;
  }
}
?>
