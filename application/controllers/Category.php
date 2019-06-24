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
            $session = (array)$this->getSession('userSession');
            if(empty($session)){ redirect($this->bareUrl); }
            $id = $_GET['id'];
            
            if($id == 4 && $session['type'] != 1){ redirect($this->bareUrl);}
			else if($id == 3 && $session['type'] != 1){ redirect($this->bareUrl);}
            else 
            {
                $singleCat = $this->query("SELECT * FROM category WHERE id =  '{$id}' AND is_delete = 0")->result();
                $postByCat = $this->query("SELECT * FROM post p inner join image i
                 on p.id = i.postID 
                 WHERE p.catid = '{$id}' AND p.is_delete = 0")->result();
                
                if(!empty($singleCat)){
                        $category = $this->query('SELECT * FROM category WHERE is_delete = 0')->result_array();
                        $data = array(
                            'category'=>$category,
                            'singleCat'=>(array)$singleCat[0],
                            'postByCat'=>(array)$postByCat
                        );

                        $this->load->view('header',$data);
                        $this->load->view('category/singleCat');
                        $this->load->view('footer',$data);

                }else { redirect($this->bareUrl); }
            }
        }
        public function getSession($sessionName)
		{
			return $_SESSION[$sessionName];
		}
        public function query($query)
		{
			$this->load->database();
			return $this->db->query($query);
		}
}
