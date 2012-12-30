<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Database_creation_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
		$this->load->dbforge();
	}

	public function create_schools_table()
	{
		$fields = array(
						'school_id' => array(
												 'type' => 'INT',
												 'constraint' => 9,
												 'unsigned' => TRUE,
												 'auto_increment' => TRUE
										  ),
						'school_name' => array(
												 'type' => 'VARCHAR',
												 'constraint' => '128',
										  ),
						'school_city' => array(
												 'type' => 'VARCHAR',
												 'constraint' => '255',
										  ),
				);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('school_id', TRUE);
		$this->dbforge->create_table('Schools', TRUE);
	}

	public function create_classes_table()
	{
		$fields = array(
						'class_id' => array(
												 'type' => 'INT',
												 'constraint' => 9,
												 'unsigned' => TRUE,
												 'auto_increment' => TRUE
										  ),
						'class_name' => array(
												 'type' => 'VARCHAR',
												 'constraint' => '32',
										  ),
				);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('class_id', TRUE);
		$this->dbforge->create_table('Classes', TRUE);
	}

	public function create_teachers_table()
	{
		$fields = array(
						'teacher_id' => array(
												 'type' => 'INT',
												 'constraint' => 9,
												 'unsigned' => TRUE,
												 'auto_increment' => TRUE
										  ),
						'teacher_first_name' => array(
												 'type' => 'VARCHAR',
												 'constraint' => '128',
										  ),
						'teacher_middle_name' => array(
												 'type' => 'VARCHAR',
												 'constraint' => '128',
										  ),
						'teacher_last_name' => array(
												 'type' => 'VARCHAR',
												 'constraint' => '128',
										  ),
						'teacher_email' => array(
												 'type' => 'VARCHAR',
												 'constraint' => '255',
										  ),
						'teacher_school_id' => array(
												 'type' => 'INT',
												 'constraint' => '9',
												 'unsigned' => TRUE
										  ),
						'teacher_join_date' => array(
												 'type' => 'TIMESTAMP',
										  ),
						'teacher_last_login' => array(
												 'type' => 'TIMESTAMP',
										  ),
				);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('teacher_id', TRUE);
		$this->dbforge->create_table('Teachers', TRUE);
	}

		public function create_students_table()
	{
		$fields = array(
						'student_id' => array(
												 'type' => 'INT',
												 'constraint' => 9,
												 'unsigned' => TRUE,
												 'auto_increment' => TRUE
										  ),
						'student_first_name' => array(
												 'type' => 'VARCHAR',
												 'constraint' => '128',
										  ),
						'student_middle_name' => array(
												 'type' => 'VARCHAR',
												 'constraint' => '128',
										  ),
						'student_last_name' => array(
												 'type' => 'VARCHAR',
												 'constraint' => '128',
										  ),
						'student_email' => array(
												 'type' => 'VARCHAR',
												 'constraint' => '255',
										  ),
						'student_parent_email' => array(
												 'type' => 'VARCHAR',
												 'constraint' => '255',
										  ),
						'student_school_id' => array(
												 'type' => 'INT',
												 'constraint' => '9',
												 'unsigned' => TRUE
										  ),
						'student_class_id' => array(
												 'type' => 'INT',
												 'constraint' => '9',
												 'unsigned' => TRUE
										  ),
						'student_join_date' => array(
												 'type' => 'TIMESTAMP',
										  ),
						'student_last_login' => array(
												 'type' => 'TIMESTAMP',
										  ),
				);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('student_id', TRUE);
		$this->dbforge->create_table('Students', TRUE);
	}

	public function create_classes_teachers_table()
	{
		$fields = array(
						'class_teacher_id' => array(
												 'type' => 'INT',
												 'constraint' => 9,
												 'unsigned' => TRUE,
												 'auto_increment' => TRUE
										  ),
						'class_id' => array(
												 'type' => 'INT',
												 'constraint' => 9,
										  ),
						'teacher_id' => array(
												 'type' => 'INT',
												 'constraint' => 9,
										  ),
						'class_teacher_acces' => array(
												 'type' => 'INT',
												 'constraint' => 1,
										  ),
				);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('class_teacher_id', TRUE);
		$this->dbforge->create_table('Classes_Teachers', TRUE);
	}

	public function create_students_statistics_table()
	{
		$fields = array(
						'students_statistics_id' => array(
												 'type' => 'INT',
												 'constraint' => 9,
												 'unsigned' => TRUE,
												 'auto_increment' => TRUE
										  ),
						'student_id' => array(
												 'type' => 'INT',
												 'constraint' => 9,
										  ),
						'student_statistics_score' => array(
												 'type' => 'INT',
												 'constraint' => 9,
										  ),
						'student_statistics_timestamp' => array(
												 'type' => 'TIMESTAMP',
										  ),
				);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('students_statistics_id', TRUE);
		$this->dbforge->create_table('Students_Statistics', TRUE);
	}
}
