<?php


class Teacher_students_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function insert_teacher_student($data)
	{
		$this->db->insert('tbl_teacher_students', $data);
	}
}
