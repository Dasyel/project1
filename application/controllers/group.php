<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
        $this->load->model('student_model');
        $this->load->model('teacher_model');
        $this->load->model('class_model');
        $this->load->model('school_model');
        $this->load->helper('login');
        $this->load->helper('url');
	}

    public function view($classId)
    {
        $tid = $this->session->userdata('tid');
        if_not_logged_in_redirect($tid);

        $data['teachers'] = $this->teacher_model->get_teachers_by_class($classId);
        $data['students'] = $this->student_model->get_students_by_class($classId);
        $data['className'] = $this->class_model->get_class_name($classId);
        $this->load->view('group/view', $data);
    }

    public function add()
    {
        $tid = $this->session->userdata('tid');
        if_not_logged_in_redirect($tid);

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Class Name', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('group/add');
        }
        else
        {
            $name = $this->input->post('name');

            $inputData = array(
               'class_name' => $name ,
            );

            $this->class_model->create_class($inputData);
            $classId = $this->class_model->get_last_class_id();
            $this->teacher_model->set_teacher_class($tid, $classId, 3);
            redirect('teacher/classes');
        }
    }

    public function edit($classId)
    {
        $tid = $this->session->userdata('tid');
        if_not_logged_in_redirect($tid);

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Class Name', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['className'] = $this->class_model->get_class_name($classId);
            $data['cid'] = $classId;
            $this->load->view('group/edit', $data);
        }
        else
        {
            $name = $this->input->post('name');
            $cid = $this->input->post('classId');
            $this->class_model->update_class($cid, 'class_name', $name);
            redirect('teacher/classes');
        }
    }

    public function remove($classId)
    {
        $tid = $this->session->userdata('tid');
        if_not_logged_in_redirect($tid);

        $this->class_model->remove_class($classId);
        $this->class_model->unset_teacher_class($classId);
        $this->class_model->unset_student_class($classId);
        redirect('teacher/classes');
    }

}
