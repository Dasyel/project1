<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_students($classId)
	{
	    $this->db->select('student_id, student_first_name, student_middle_name, student_last_name');
        $this->db->from('Students');
        $this->db->where('class_id',$classId);
        $query = $this->db->get();
        return $query->result_array();
	}
	
	public function get_student($studentId)
	{
	    $this->db->select('*');
        $this->db->from('Students');
        $this->db->where('student_id',$studentId);
        $query = $this->db->get();
        return $query->row();
	}
	
	public function get_login_credentials($studentId)
	{
	    $this->db->select('student_password');
        $this->db->from('Students');
        $this->db->where('student_id',$studentId);
        $query = $this->db->get();
        $passObject = $query->row();
        return $passObject->student_password;
	}
	
	public function create_student($data)
	{     
        $this->db->insert('Students', $data);
	}
	
	public function remove_student($studentId)
	{
	    $this->db->where('student_id', $studentId);
	    $this->db->delete('Students');
	}
	
	public function update_student($studentId, $column, $data)
	{
	    $updateData = array(
               $column => $data
            );

        $this->db->where('student_id', $studentId);
        $this->db->update('Students', $updateData);
	}
	
	public function update_student_by_class($classId, $column, $data)
	{
	    $updateData = array(
               $column => $data
            );

        $this->db->where('class_id', $classId);
        $this->db->update('Students', $updateData);
	}
	
	public function update_student_by_school($schoolId, $column, $data)
	{
	    $updateData = array(
               $column => $data
            );

        $this->db->where('school_id', $schoolId);
        $this->db->update('Students', $updateData);
	}
}
