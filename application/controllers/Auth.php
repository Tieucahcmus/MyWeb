<?php


class Auth extends CI_Controller
 {

 	public $bareUrl;
	 function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->library('session');
			$this->bareUrl = base_url();
			$this->load->library('upload');

		}

		public function loginForm()
		{
			$this->load->view('Auth/login');
		}

		public function registerForm()
		{
			$this->load->view('Auth/register');
		}

		public function profile()
		{
			$_session = $this->getSession('userSession');
			if(!empty($_session))
				$this->load->view('Auth/profile');
			else
				redirect($this->bareUrl);
		}

		public function updateProfile()
		{
			$username = $_POST['username'];
			$data = array(
				'name' => $_POST['name'],
				'address' => $_POST['address']
			);
			if(!empty($data))
			{
				$this->query("UPDATE info set name = '{$data['name']}' , address = '{$data['address']}' WHERE username ='{$username}'");
				redirect($this->bareUrl);
			}else
				redirect($this->bareUrl);
		}

		public function register()
		{
			$data= array(
				'username'=>$_POST['username'],
				'name'=>$_POST['name'],
				'password'=>md5($_POST['password']),
				'confirm'=>$_POST['confirm'],
				'address'=>$_POST['address']
			);

			$account = array(
				'username'=>$_POST['username'],
				'password'=>md5($_POST['password'])
			);
			
			$InsertAccount = "INSERT INTO account (username,password) VALUES('{$data['username']}','{$data['password']}')";
			$InsertInfo = "INSERT INTO info (name,address,username) VALUES('{$data['name']}' , '{$data['address']}','{$data['username']}')";

			$this->query($InsertAccount);
			$this->query($InsertInfo);
			$this->login($account);
			redirect($this->bareUrl);
		}

		public function login($sessionLogin = [])
		{
			if(empty($sessionLogin))
			{
				$data['username'] = $_POST['username'];
				$data['password'] = md5($_POST['password']);
			}else
			{
				$data['username'] = $sessionLogin['username'];
				$data['password'] = $sessionLogin['password'];
			}
		
			$query = "SELECT * FROM account a INNER JOIN info i on a.username = i.username WHERE 
					  a.is_delete = 0 AND a.username = '{$data["username"]}' AND a.password = '{$data["password"]}'";


			$result = $this->query($query)->result();
			$this->setSession('userSession',$result[0]);

			if(!empty($result[0]))
				redirect($this->bareUrl);
			else
				$this->load->view('errors/index');
		}

		public function logout()
		{

			$this->removeSession('userSession');
			return redirect($this->bareUrl);
		}

		public function query($query)
		{
			$this->load->database();
			return $this->db->query($query);
		}

		public function setSession($sessionName,$value)
		{
			return $this->session->set_userdata($sessionName,$value);
		}

		public function getSession($sessionName)
		{
			return $_SESSION[$sessionName];
		}

		public function removeSession($sessionName)
		{
			$this->session->unset_userdata($sessionName);
		}

		

		
}
