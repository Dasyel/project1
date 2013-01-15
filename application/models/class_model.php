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
}
