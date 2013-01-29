<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Class_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_classes($schoolId)
	{
	    $this->db->select('class_id, class_name');
        $this->db->from('Classes');
        $this->db->where('school_id',$schoolId);
        $query = $this->db->get();
        return $query->result_array();
	}

    public function get_class_name($classId)
	{
	    $this->db->select('class_name');
        $this->db->from('Classes');
        $this->db->where('class_id',$classId);
        $query = $this->db->get();
        $nameObject = $query->row();
        if($nameObject != NULL)
        {
            return $nameObject->class_name;
        }
        else
        {
            return FALSE;
        }
	}

    public function get_last_class_id()
	{
	    $this->db->select('class_id');
        $this->db->from('Classes');
        $this->db->order_by('class_id', 'desc');
        $query = $this->db->get();
        $nameObject = $query->row();
        if($nameObject != NULL)
        {
            return $nameObject->class_id;
        }
        else
        {
            return FALSE;
        }
	}

    public function create_class($data)
	{
	    $this->db->insert('Classes', $data);
	}

	public function update_class($classId, $column, $data)
	{
	    $updateData = array(
               $column => $data
            );

        $this->db->where('class_id', $classId);
        $this->db->update('Classes', $updateData);
	}

	public function remove_class($classId)
	{
	    $this->db->where('class_id', $classId);
	    $this->db->delete('Classes');
	}

	public function remove_classes_by_school($schoolId)
	{
	    $this->db->where('school_id', $schoolId);
	    $this->db->delete('Classes');
	}

    public function unset_teacher_class($classId)
	{
	    $this->db->where('class_id', $classId);
	    $this->db->delete('Classes_Teachers');
	}

    public function unset_student_class($classId)
	{
	    $updateData = array(
               'class_id' => ''
            );

        $this->db->where('class_id', $classId);
        $this->db->update('Students', $updateData);
	}
}
