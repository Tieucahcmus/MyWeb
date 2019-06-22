<?php


class Auth extends CI_Controller
 {
	//  public $bare_url = 'tieuca.000webhostapp.com';

	 function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->library('session');

		}
	
        public function index()
        {
			$this->load->view('home/index');
		}

		public function loginForm()
		{
			$this->load->view('Auth/login');
		}

		public function login()
		{
			$bare_url = 'http://localhost/CodeIgniter';
			$data['username'] = $_POST['username'];
			$data['password'] = $_POST['password'];
			$query = 'SELECT * FROM account WHERE username = "'.$data['username'].'" AND password = "'.$data['password'].'"';
			$result = $this->query($query);

			$this->setSession('userSession',$result[0]);

			if(!empty($result))
				redirect($bare_url);
			else
				echo 'login that bai';
		}

		public function logout()
		{
			$this->removeSession('userSession');
			return redirect($bare_url);
		}
		public function query($query)
		{
			$this->load->database();
			return $this->db->query($query)->result_array();
		}

		public function setSession($sessionName,$value)
		{
			return $this->session->set_userdata($sessionName,$value);
		}

		public function getSession($sessionName,$value)
		{
			return $_SESSION($sessionName);
		}

		public function removeSession($sessionName)
		{
			$this->session->unset_userdata($sessionName);
		}

}
