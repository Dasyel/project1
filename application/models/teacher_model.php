<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_login_credentials($teacherId)
	{
	    $this->db->select('teacher_password');
        $this->db->from('Teachers');
        $this->db->where('teacher_id',$teacherId);
        $query = $this->db->get();
        $passObject = $query->row();
        return $passObject->teacher_password;
	}
	
	public function get_teacher($teacherId)
	{
	    $this->db->select('*');
        $this->db->from('Teachers');
        $this->db->where('teacher_id',$teacherId);
        $query = $this->db->get();
        return $query->row();
	}
	
	public function get_teacher_classes($teacherId)
	{
	    $this->db->select('class_id, class_name');
        $this->db->from('Classes');
        $this->db->join('Classes_Teachers','Classes.class_id = Classes_Teachers.class_id');
        $this->db->join('Teachers','Classes_Teachers.teacher_id = Teachers.teacher_id');
        $this->db->where('teacher_id',$teacherId);
        $query = $this->db->get();
        return $query->result_array();
	}
	
	public function create_teacher($data)
	{
	    $this->db->insert('Teachers', $data);
	}
	
	public function remove_teacher($teacherId)
	{
	    $this->db->where('teacher_id', $teacherId);
	    $this->db->delete('Teachers');
	}
	
	public function set_teacher_class($teacherId, $classId, $accessLevel = 2)
	{
	    $data = array(
            'teacher_id' => $teacherId ,
            'class_id' => $classId ,
            'class_teacher_access_level' => $accessLevel
            );
            
            $this->db->insert('Classes_Teachers', $data);
	}
	
	public function update_teacher($teacherId, $column, $data)
	{
	
	}
}
