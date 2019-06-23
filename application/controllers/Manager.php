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
		$this->load->view('manager/header');
		$this->load->view('manager/index');
	}

}
