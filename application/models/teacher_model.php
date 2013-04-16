<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_login_credentials($email)
	{
	    $this->db->select('teacher_password');
        $this->db->from('Teachers');
        $this->db->where('teacher_email',$email);
        $query = $this->db->get();
        $passObject = $query->row();
        if($passObject != NULL)
        {
            return $passObject->teacher_password;
        }
        else
        {
            return FALSE;
        }
	}

    public function get_teacher_id($email)
    {
        $this->db->select('teacher_id');
        $this->db->from('Teachers');
        $this->db->where('teacher_email',$email);
        $query = $this->db->get();
        $idObject = $query->row();
        if($idObject != NULL)
        {
            return $idObject->teacher_id;
        }
        else
        {
            return FALSE;
        }
    }

	public function get_teacher($teacherId)
	{
	    $this->db->select('*');
        $this->db->from('Teachers');
        $this->db->Join('Schools', 'Teachers.school_id = Schools.school_id');
        $this->db->where('teacher_id',$teacherId);
        $query = $this->db->get();
        return $query->row();
	}

	public function get_teacher_classes($teacherId)
	{
	    $this->db->select('Classes.class_id, Classes.class_name, Classes_Teachers.class_teacher_access_level');
        $this->db->from('Classes');
        $this->db->join('Classes_Teachers','Classes.class_id = Classes_Teachers.class_id');
        $this->db->join('Teachers','Classes_Teachers.teacher_id = Teachers.teacher_id');
        $this->db->where('Teachers.teacher_id',$teacherId);
        $query = $this->db->get();
        return $query->result_array();
	}

    public function get_teachers_by_class($classId)
    {
        $this->db->select('*');
        $this->db->from('Teachers');
        $this->db->Join('Classes_Teachers', 'Teachers.teacher_id = Classes_Teachers.teacher_id');
        $this->db->where('Classes_Teachers.class_id',$classId);
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

	public function remove_teachers_by_school($schoolId)
	{
	    $this->db->where('school_id', $schoolId);
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
	    $updateData = array(
               $column => $data
            );

        $this->db->where('teacher_id', $teacherId);
        $this->db->update('Teachers', $updateData);
	}
}
