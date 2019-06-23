<?php
class Category extends CI_Controller
 {
	//  public $bare_url = 'tieuca.000webhostapp.com';

	 function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			$this->load->helper('url');
            $this->load->library('session');
            $this->load->library('parser');
        }

        public function viewByCategory()
        {
            $id = $_GET['id'];
            print_r($id);
        }
}