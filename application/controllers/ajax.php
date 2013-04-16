<?php

class Ajax extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('generate_sum');
	}

    public function evaluateAnswer()
    {
        
        $checkanswerResult = $this->checkAnswer();
        if ($checkanswerResult == "TRUE"){
            $equationArray = generate_equation($numberAmount = 2,$operatorLevel = 3);
            $data['equation'] = equationArray_to_string($equationArray);
            $this->session->set_userdata('equation', $equationArray);

            $arr = array('correctAnswer' => $checkanswerResult, 'equation' => $data['equation']);
            echo json_encode($arr);
        }
        else if($checkanswerResult == "FALSE"){
            $arr = array('correctAnswer' => $checkanswerResult, 'equation' => null);
            echo json_encode($arr);
        }
        else{
            echo "error";
        }

       
    }

    public function checkAnswer()
	{

	        $answerToBeChecked = $this->input->post('answer');
            
            if (is_numeric($answerToBeChecked)) 
            {
                $ajaxArray = array();
                $equation = $this->session->userdata('equation');
                $result = answer_check($equation, $answerToBeChecked);

                
                return $result;
                

	        }

    }
    
}
/* End of file ajax.php */
/* Location: ./system/application/controllers/ajax.php */


