<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reading extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('Bible_model', 'bible', TRUE);
	}

	public function index($serial='gen.1.1')
	{
		$_serial = explode('.', $serial);
		if (empty($_serial[0])) $_serial[0] = 'gen';
		$data['info']['book'] = $this->bible->book_id_by_abbr($_serial[0]);
		if (empty($_serial[1])) $_serial[1] = 1;
		$data['info']['chapter'] = $_serial[1];
		if (empty($_serial[2])) $_serial[2] = 1;
		$data['info']['verse'] = $_serial[2];

		$data['info']['book_chinese'] = $this->bible->book_name($data['info']['book'], 'chinese');
		$data['info']['book_hebrew'] = $this->bible->book_name($data['info']['book'], 'hebrew');
		$data['info']['book_english'] = $this->bible->book_name($data['info']['book'], 'english');

		$words_array = $this->bible->read_by_serial($_serial);
		$data['word']['with_strongs'] = $this->bible->strongs_version($words_array);
		$data['word']['lang_type'] = 'hebrew';
		$data['word']['translation']['en'] = array(
			'cjb' => $this->bible->translation_by_serial_version($_serial, 'cjb'),
			'kjv' => $this->bible->translation_by_serial_version($_serial, 'kjv')
		);

		$data['word']['translation']['zh-hant'] = array(
			'cunp' => $this->bible->translation_by_serial_version($_serial, 'cunp'),
		);

		$data['lexicon'] = $this->bible->make_lexicon($words_array);

		$data['layout']['next'] = implode('.', $this->bible->next_serial($_serial));
		$data['layout']['prev'] = implode('.', $this->bible->prev_serial($_serial));

		$data['layout']['bible']['tanakh'] = $this->bible->book_list('tanakh');
		$data['layout']['bible']['torah'] = $this->bible->book_list('torah');

		$this->load->view('reading_view', $data);
	}



	function _remap($method)
	{
	  $param_offset = 2;

	  // Default to index
	  if ( ! method_exists($this, $method))
	  {
	    // We need one more param
	    $param_offset = 1;
	    $method = 'index';
	  }

	  // Since all we get is $method, load up everything else in the URI
	  $params = array_slice($this->uri->rsegment_array(), $param_offset);

	  // Call the determined method with all params
	  call_user_func_array(array($this, $method), $params);
	}

}


/* End of file homepage.php */
/* Location: ./application/controllers/homepage.php */