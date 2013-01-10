<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistics_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_student_stats($studentId)
	{
	
	}
	
	public function get_student_last_stats($studentId)
	{
	
	}
	
	public function get_class_stats($classId)
	{
	
	}
	
	public function set_student_score($studentId, $data)
	{
	
	}
	
    public function remove_student_stats($studentId)
    {
    
    }
    
    public function limit_student_stats($studentId, $limit)
    {
    
    }
}
