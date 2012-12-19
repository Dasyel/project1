<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trainer extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('generate_sum');
	}
	
	public function index($operatorLevel = 3, $numberAmount = 2)
	{
	    $operatorAmount = $numberAmount - 1;
	    $data['numberAmount'] = $numberAmount;
	    $data['numbers'] = generate_numbers($numberAmount);
	    $data['operators'] = generate_operators($operatorLevel, $operatorAmount);
	    $this->load->view('templates/header');
		$this->load->view('pages/trainer_view',$data);
		$this->load->view('templates/footer');
	}
	
	public function generate_sum($operatorLevel = 3, $numberAmount = 2)
	{
	    $operatorAmount = $numberAmount - 1;
	    $data['numberAmount'] = $numberAmount;
	    $data['numbers'] = generate_numbers($numberAmount);
	    $data['operators'] = generate_operators($operatorLevel, $operatorAmount);
		$this->load->view('pages/trainer_view',$data);
	}
	
	public function checkAnswer()
	{
	    $answerToBeChecked = $this->input->post('answer');
        
        if (is_numeric($answerToBeChecked)) {
            $numberOne = $this->generateNumber();
            $numberTwo = $this->generateNumber();
            print $answerToBeChecked;
            print $numberOne;
            print $numberTwo;
        }
        elseif($answerToBeChecked == "")
        {
            print "Laat je antwoord niet leeg :P";
        }
        else
        {
            print "Voer een nummber in en niets anders!";
        }
	}
	
	
}



