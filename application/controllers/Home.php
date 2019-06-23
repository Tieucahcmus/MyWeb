<?php
class Home extends CI_Controller
 {
 	public $bareUrl;
	 function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			$this->load->helper('url');
            $this->load->library('session');
            $this->load->library('parser');
			$this->bareUrl = base_url();
		}
	
        public function index()
        {
			$category = $this->query('SELECT * FROM category WHERE is_delete = 0')->result_array();
            $data = array('category'=>$category);
            if(!empty($data))
			{
				$this->load->view('header',$data);
				$this->load->view('home/index',$data);
				$this->load->view('footer',$data);
			}else { redirect($this->bareUrl);}

        }

        public function query($query)
		{
			$this->load->database();
			return $this->db->query($query);
		}
}
