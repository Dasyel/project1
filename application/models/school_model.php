<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class School_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

    public function get_schools()
	{
	    $this->db->select('*');
        $this->db->from('Schools');
        $this->db->order_by('school_name', 'asc');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function get_schools_by_city($city)
	{
	    $this->db->select('school_id, school_name');
        $this->db->from('Schools');
        $this->db->where('school_city',$city);
        $query = $this->db->get();
        return $query->result_array();
	}

    public function create_school($data)
	{
	    $this->db->insert('Schools', $data);
	}

	public function update_school($schoolId, $column, $data)
	{
	    $updateData = array(
               $column => $data
            );

        $this->db->where('school_id', $schoolId);
        $this->db->update('Schools', $updateData);
	}

	public function remove_school($schoolId)
	{
	    $this->db->where('school_id', $schoolId);
	    $this->db->delete('Schools');
	}
}
