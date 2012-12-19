<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trainer extends CI_Controller {
	public function index()
	{
	    $this->load->view('templates/header');
		$this->load->view('pages/trainer_view');
		$this->load->view('templates/footer');
	}
}


