<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
	    $this->load->view('templates/header');
		$this->load->view('pages/login_student_view');
		$this->load->view('templates/footer');
	}
}
