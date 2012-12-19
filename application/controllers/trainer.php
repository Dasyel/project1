<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trainer extends CI_Controller {
	public function index()
	{
	    $data['numberOne'] = 10;
	    $data['numberTwo'] = 20;
	    $this->load->view('templates/header');
		$this->load->view('pages/trainer_view',$data);
		$this->load->view('templates/footer');
	}
	
	public function generateNumbers(){
	    $numberOne = rand(0,10);
	    $numberTwo = rand(0,10);
	    
	   
	}
	
	public function checkAnswer()
	{
	    $answerToBeChecked = $this->input->post('answer');
        
        if (is_numeric($answerToBeChecked)) {
            print $answerToBeChecked;
           
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



