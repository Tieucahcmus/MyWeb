<?php


class Manager extends CI_Controller
{

	public $bareUrl;

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->bareUrl = base_url();
	}

	public function index()
	{
		$session =(array)$_SESSION['userSession'];
		if(empty($session) && $session['type']!=1){redirect($this->bareUrl);}

		$this->load->view('manager/layout/header');
		$this->load->view('manager/index');
		$this->load->view('manager/layout/footer');
	}
	
	public function new_post()
	{
		$session =(array)$_SESSION['userSession'];
		if(empty($session) || $session['type']!=1){redirect($this->bareUrl);}

		$categoryQuery = "SELECT * FROM category WHERE is_delete = 0";

		$somePostNearQuery = "SELECT * , p.name AS postName
						 FROM post p 
						 INNER JOIN category c
						 ON p.catID = c.id
						 ORDER BY ABS( DATEDIFF( p.postDate, NOW() ) ) 
						 LIMIT 8 ";

		$somePostNear = $this->query($somePostNearQuery)->result_array();

		$categories = $this->query($categoryQuery)->result_array();

//		echo '<pre>';
//		print_r($somePostNear); die;

		$data = array(
			'categories' => $categories,
			'somePostNear' => $somePostNear
		);


//		echo '<pre>';
//		print_r($category); die;

		$this->load->view('manager/layout/header');
		$this->load->view('manager/manage/add',$data);
		$this->load->view('manager/layout/footer');
	}

	public function add_post()
	{
		$data = $_POST;
		$date = date('Y-m-d H:i:s');

		$query = " INSERT 
 				   INTO post ( name,content,catID,postDate,updateDate,status,is_delete)
 				   VALUES ('{$data["post_name"]}','{$data["content"]}','{$data["cat_id"]}','{$date}','{$date}','{$data["status"]}','0') ";
		$this->query($query);
		$id = ((array)($this->query('SELECT MAX(id) As id FROM post ')->result())[0])['id'];
		$query2 = "INSERT 
				   INTO image (postID,image)
				   VALUES ('{$id}','{$data["image"]}')";
		$this->query($query2);

		redirect($this->bareUrl.'index.php/manager');
	}

	public function query($query)
	{
		$this->load->database();
		return $this->db->query($query);
	}


//SELECT *
//FROM post
//ORDER BY ABS( DATEDIFF( postDate, NOW() ) )
//LIMIT 3
}
