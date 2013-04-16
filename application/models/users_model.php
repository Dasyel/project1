<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

    public function get_students_by_school($schoolID)
    {
        $this->db->select('student_id, student_name');
        $this->db->from('Students');
        $this->db->join('Classes', 'Students.class_id = Classes.class_id');
        $this->db->where('Classes.school_id', $schoolID);
        $this->db->order_by('Student.student_id','asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_students_by_class($classID)
    {
        $this->db->select('student_id, student_name');
        $this->db->from('Students');
        $this->db->where('Students.class_id', $classID);
        $this->db->order_by('Students.student_name','asc');
        $query = $this->db->get();
        return $query->result_array();
    }
}
