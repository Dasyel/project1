<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Install extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
        $this->load->model('database_creation_model');
	}

    public function index()
    {
        $this->database_creation_model->create_schools_table();
        $this->database_creation_model->create_teachers_table();
        $this->database_creation_model->create_students_table();
        $this->database_creation_model->create_classes_table();
        $this->database_creation_model->create_classes_teachers_table();
        $this->database_creation_model->create_students_statistics_table();
        $this->load->view('succes');
    }
}
