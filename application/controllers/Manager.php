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
	
	public function newpost()
	{
		$session =(array)$_SESSION['userSession'];
		if(empty($session) && $session['type']!=1){redirect($this->bareUrl);}
		
		$this->load->view('manager/layout/header');
		$this->load->view('manager/layout/footer');
	}

}
