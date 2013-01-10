<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Class_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_classes($schoolId)
	{
	
	}
	
	public function update_class($classId, $column, $data)
	{
	
	}
	
	public function remove_class($classId, $studentRemove = FALSE)
	{
	
	} 
}
