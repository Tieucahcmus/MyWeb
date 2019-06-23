<?php
class Home extends CI_Controller
 {
	 function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			$this->load->helper('url');
            $this->load->library('session');
            $this->load->library('parser');

		}
	
        public function index()
        {
            $category = $this->query('SELECT * FROM category WHERE is_delete = 0');
            $data = array('category'=>$category);
            $this->load->view('header',$data);
            $this->load->view('home/index',$data);
            $this->load->view('footer',$data);

        }

        public function query($query)
		{
			$this->load->database();
			return $this->db->query($query)->result_array();
		}
}