<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{	
		$data['title'] = "Login Page";
		$this->load->view('templates_admin/header',$data);
		$this->load->view('formLogin');
	}
}
