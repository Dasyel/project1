<?php

class Ajax extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('generate_sum');
	}

    public function checkAnswer()
	{
	        $answerToBeChecked = $this->input->post('answer');
            
            if (is_numeric($answerToBeChecked)) 
            {
                $ajaxArray = array();
                $equation = $this->session->userdata('equation');
                $result = answer_check($equation, $answerToBeChecked);

                
                echo $result;
                

	        }

    }
    
}
/* End of file ajax.php */
/* Location: ./system/application/controllers/ajax.php */


