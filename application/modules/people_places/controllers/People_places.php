<?php
if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class People_places extends MX_Controller {

  private $page_template;
	public function __construct()
	{
		parent::__construct();
		$this->page_template = ENV['default_template'];
	}

  public function index(){
    $data = [];

    $this->template->build_template (
      'Home', //Page Title
      array( // Views
        array(
          'view' => 'people_places/pp',
          'data' => $data
        )
      ),
      array( // JavaScript Files
        "assets/js/people.js"
      ),
      array( // CSS Files
        "assets/css/people.css"
      ),
      array( // Meta Tags

      ),
      $this->page_template // template page
    );
  }

  public function details($tag = NULL, $slug = NULL) {
    try {
      if (empty($tag) || empty($slug)) {
        throw new Exception('Invalid parameter(s).');
      }

      // Retrieve page content
      $result = modules::run('pages/details', 'pp', $tag, $slug);

      // Record page click
      $path = ENV['api_path'];
      $api_name = 'dashboard/add_pageclick';
      $creds = ENV['credentials'];
      $client = new GuzzleHttp\Client(['verify' => FALSE]);

      $args = [
        "content_id" => $result['data']['records'][0]['content_id']
      ];

      $url = $path . $api_name;

      $request = $client->request(
        'POST',
        $url,
        array_merge($creds, ['form_params' => $args])
      );

      $res = $request->getBody()->getContents();

      if (!$result['response']) {
        throw new Exception($result['message']);
      }

      $this->template->build_template (
        'People and Places', //Page Title
        array( // Views
          array(
            'view' => 'people_places/details',
            'data' => [
              'details' => $result['data']['records'][0]
            ]
          )
        ),
        array( // JavaScript Files

        ),
        array( // CSS Files

        ),
        array( // Meta Tags

        ),
        $this->page_template // template page
      );
    } catch (Exception $e) {
      show_404();
    }
  }

  public function allpages($slug = NULL) {
    if (empty($slug)) {
      show_404();
    }

    $pagetitle = 'ALL ' . strtoupper($slug);

    $data = [
      'slug' => $slug,
      'pagetitle' => $pagetitle
    ];

    $template = ENV['default_template'];

    $this->template->build_template (
      'People and Places', //Page Title
      array( // Views
        array(
          'view' => 'people_places/allpp',
          'data' => $data
        )
      ),
      array( // JavaScript Files
        "assets/js/allpp.js"
      ),
      array( // CSS Files
        "assets/css/allnews.css"
      ),
      array( // Meta Tags

      ),
      $template // template page
    );
  }
}
?>
