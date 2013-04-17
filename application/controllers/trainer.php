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
	    $equationArray = generate_equation($numberAmount,$operatorLevel);
	    $data['equation'] = equationArray_to_string($equationArray);
	    $this->session->set_userdata('equation', $equationArray);
	    
	    $this->load->view('templates/header');
		$this->load->view('pages/trainer_view',$data);
		$this->load->view('templates/footer');
	}
	
	public function generate_equation($operatorLevel = 3, $numberAmount = 2)
	{
	    $equationArray = generate_equation($numberAmount,$operatorLevel);
	    $data['equation'] = equationArray_to_string($equationArray);
	    $this->session->set_userdata('equation', $equationArray);
	    
	    $this->load->view('templates/header');
		$this->load->view('pages/trainer_view',$data);
		$this->load->view('templates/footer');
	}
	
	
	
	public function checkAnswer()
	{
	    $answerToBeChecked = $this->input->post('answer');
        

        if (is_numeric($answerToBeChecked)) 
        {
            $ajaxArray = array();
            $equation = $this->session->userdata('equation');
            $result = answer_check($equation, $answerToBeChecked);

            if($result == 'TRUE')
            {
                $message = "GOED ZO!";
                //$this->index();
            }
            else
            {
                $message = "DIT IS FOUT! Ik ben niet boos, ik ben gewoon teleurgesteld.";
            }

        }
        elseif($answerToBeChecked == "")
        {
            $message = "Laat je antwoord niet leeg :P";
        }
        else
        {
            $message = "Voer een nummer in en niets anders!";
        }
        
        return $message;
	}
	
	
}



