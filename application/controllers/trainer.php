<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trainer extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('generate_sum');
	}
	
	public function addition($operatorLevel = 1, $numberAmount = 2)
	{
		$this->initialze_trainer($operatorLevel,$numberAmount);
	}
	
	public function subtraction($operatorLevel = 2, $numberAmount = 2)
	{
		$this->initialze_trainer($operatorLevel,$numberAmount);
	}
	public function multiplication($operatorLevel = 3, $numberAmount = 2)
	{
		$this->initialze_trainer($operatorLevel,$numberAmount);
	}

	public function division($operatorLevel = 4, $numberAmount = 2)
	{
		$this->initialze_trainer($operatorLevel,$numberAmount);
	}

	public function initialze_trainer($operatorLevel,$numberAmount){
	    $equationArray = generate_equation($numberAmount,$operatorLevel);
	    $data['equation'] = equationArray_to_string($equationArray);
	    $sessionArray = array(
                   'equation'  => $equationArray,
                   'goodCount'     => '0',
                   'operatorLevel' => $operatorLevel,

                   'numberAmount' => $numberAmount
        			);
	    $this->session->set_userdata($sessionArray);
	    
	    $this->load->view('templates/header');
		$this->load->view('pages/trainer_view',$data);
		$this->load->view('templates/footer');
	}
	
}



