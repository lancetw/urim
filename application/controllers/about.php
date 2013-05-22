<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('Bible_model', 'bible', TRUE);
    }

    public function index()
    {
        $data['layout']['bible']['torah'] = $this->bible->book_list('torah', 'chinese', true);
        $data['layout']['bible']['prophets'] = $this->bible->book_list('prophets', 'chinese', true);
        $data['layout']['bible']['writings'] = $this->bible->book_list('writings', 'chinese', true);
        $data['layout']['bible']['goodnews'] = $this->bible->book_list('goodnews', 'chinese', true);
        $data['layout']['bible']['acts'] = $this->bible->book_list('acts', 'chinese', true);
        $data['layout']['bible']['letters_paul_public'] = $this->bible->book_list('letters_paul_public', 'chinese', true);
        $data['layout']['bible']['letters_paul_private'] = $this->bible->book_list('letters_paul_private', 'chinese', true);
        $data['layout']['bible']['letters_general'] = $this->bible->book_list('letters_general', 'chinese', true);
        $data['layout']['bible']['revelation'] = $this->bible->book_list('revelation', 'chinese', true);

        $this->load->view('about_view', $data);
    }
}