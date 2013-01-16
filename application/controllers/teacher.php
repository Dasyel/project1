<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher extends CI_Controller
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

    public function index()
    {
        $tid = $this->session->userdata('tid');
        if_not_logged_in_redirect($tid);
        $data['teacher'] = $this->teacher_model->get_teacher($tid);
        $this->load->view('teacher/main', $data);
    }

    public function login()
    {
        $tid = $this->session->userdata('tid');
        if($tid != FALSE)
        {
            redirect('teacher/index');
        }
	    else
	    {
	        $this->load->helper('form');
	        $this->load->library('form_validation');
	        $this->form_validation->set_rules('tid', 'Teacher Id', 'required');
	        $this->form_validation->set_rules('password', 'Password', 'required');

	        if ($this->form_validation->run() === FALSE)
	        {
		        $this->load->view('teacher/login');
	        }
	        else
	        {
	            $tid = $this->input->post('tid');
	            $pass = $this->input->post('password');
	            $dbPass = $this->teacher_model->get_login_credentials($tid);

	            if($dbPass == sha1($pass))
	            {
	                $this->session->set_userdata('tid', $tid);
	                redirect('teacher/index');
	            }
		        else
		        {
            		$this->load->view('teacher/login');
		        }
		    }
		}
	}

    public function logout()
    {
        $this->session->unset_userdata('tid');
        redirect('teacher/login');
    }

    public function classes()
    {
        $tid = $this->session->userdata('tid');
        if_not_logged_in_redirect($tid);
        $data['classes'] = $this->teacher_model->get_teacher_classes($tid);
        $this->load->view('teacher/classes', $data);
    }

    public function students()
    {
        $tid = $this->session->userdata('tid');
        if_not_logged_in_redirect($tid);
        $data['students'] = $this->student_model->get_students_by_teacher($tid);
        $this->load->view('teacher/students', $data);
    }

    public function account()
    {
        $tid = $this->session->userdata('tid');
        if_not_logged_in_redirect($tid);
        $data['teacher'] = $this->teacher_model->get_teacher($tid);
        $this->load->view('teacher/account', $data);
    }

    public function edit()
    {
        $tid = $this->session->userdata('tid');
        if_not_logged_in_redirect($tid);

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstName', 'First Name', 'required');
        $this->form_validation->set_rules('lastName', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email Adress', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['teacher'] = $this->teacher_model->get_teacher($tid);
            $this->load->view('teacher/edit', $data);
        }
        else
        {
            $firstName = $this->input->post('firstName');
            $middleName = $this->input->post('middleName');
            $lastName = $this->input->post('lastName');
            $email = $this->input->post('email');
            $newPassword = $this->input->post('newPassword');
            $newPass = sha1($newPassword);
            $password = $this->input->post('password');
            $pass = sha1($password);
            $dbPass = $this->teacher_model->get_login_credentials($tid);

            if($dbPass == $pass)
            {
                $this->teacher_model->update_teacher($tid, 'teacher_first_name', $firstName);
                $this->teacher_model->update_teacher($tid, 'teacher_last_name', $lastName);
                $this->teacher_model->update_teacher($tid, 'teacher_email', $email);

                if($middleName != NULL)
                {
                    $this->teacher_model->update_teacher($tid, 'teacher_middle_name', $middleName);
                }

                if($newPassword != NULL)
                {
                    $this->teacher_model->update_teacher($tid, 'teacher_password', $newPass);
                }

                redirect('teacher/account');
            }

            redirect('teacher/edit');
        }
    }
}
