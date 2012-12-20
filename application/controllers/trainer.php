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
	    $data['numbers'] = generate_equation($numberAmount,$operatorLevel);
	    $this->load->view('templates/header');
		$this->load->view('pages/trainer_view',$data);
		$this->load->view('templates/footer');
	}
	
	public function generate_sum($operatorLevel = 3, $numberAmount = 2)
	{
	    $operatorAmount = $numberAmount - 1;
	    $data['numberAmount'] = $numberAmount;
	    $data['numbers'] = generate_equation($numberAmount,$operatorLevel);
		$this->load->view('pages/trainer_view',$data);
	}
	
	public function checkAnswer()
	{
	    $answerToBeChecked = $this->input->post('answer');
        

        if (is_numeric($answerToBeChecked)) 
        {
            $numbers = $this->input->post('numbers');
            $operators = $this->input->post('operators');
            $result = answer_check($numbers, $answerToBeChecked);
            
            if($result == 'TRUE')
            {
                print "GOED ZO!";
                //$this->index();
            }
            else
            {
                echo $result;
            }

        }
        elseif($answerToBeChecked == "")
        {
            print "Laat je antwoord niet leeg :P";
        }
        else
        {
            print "Voer een nummer in en niets anders!";
        }
	}
	
	
}



