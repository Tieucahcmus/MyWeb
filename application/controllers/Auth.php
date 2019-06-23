<?php


class Auth extends CI_Controller
 {

	 function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->library('session');
		}

		public function loginForm()
		{
			$this->load->view('Auth/login');
		}

		public function registerForm()
		{
			$this->load->view('Auth/register');
		}

		public function register()
		{
			$data= array(
				'username'=>$_POST['username'],
				'name'=>$_POST['name'],
				'password'=>$_POST['password'],
				'confirm'=>$_POST['confirm'],
				'address'=>$_POST['address']
			);

			$account = array(
				'username'=>$_POST['username'],
				'password'=>$_POST['password']
			);
			
			$InsertAccount = 'INSERT INTO account (username,password) VALUES("'.$data["username"].'" , "'.$data["password"].'")';
			$InsertInfo = 'INSERT INTO info (name,address,username) VALUES("'.$data["name"].'" , "'.$data["address"].'" , "'.$data["username"].'")';

			$this->insert($InsertAccount);
			$this->insert($InsertInfo);
			$this->login($account);
			redirect($bare_url);
		}

		public function login($sessionLogin = [])
		{
			$bare_url = base_url();	
			if(empty($sessionLogin))
			{
				$data['username'] = $_POST['username'];
				$data['password'] = $_POST['password'];
			}else
			{
				$data['username'] = $sessionLogin['username'];
				$data['password'] = $sessionLogin['password'];
			}
		
			// $query = 'SELECT * FROM account WHERE is_delete = 0 AND username = "'.$data['username'].'" AND password = "'.$data['password'].'"';
			$query = 'SELECT * FROM account a INNER JOIN info i on a.username = i.username WHERE a.is_delete = 0 AND a.username = "'.$data['username'].'" AND a.password = "'.$data['password'].'"';
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

		public function insert($query)
		{
			$this->load->database();
			return $this->db->query($query);
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
