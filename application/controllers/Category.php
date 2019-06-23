<?php
class Category extends CI_Controller
 {
	//  public $bare_url = 'tieuca.000webhostapp.com';
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

        public function viewByCategory()
        {
            $id = $_GET['id'];
            $singleCat = $this->query('SELECT * FROM category WHERE id = "'.$id.' " AND is_delete = 0')->result_array();
            if(!empty($singleCat)){
                $category = $this->query('SELECT * FROM category WHERE is_delete = 0')->result_array();
                $data = array('category'=>$category);
                $this->load->view('header',$data);
                $this->load->view('category/single');
                $this->load->view('footer',$data);
            }else { redirect($this->bareUrl); }

        }

        public function query($query)
		{
			$this->load->database();
			return $this->db->query($query);
		}
}
