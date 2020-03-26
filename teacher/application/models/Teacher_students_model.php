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

//	function get_teacher_students($teacher_id){
//		$this->db->select('*');
//		$this->db->where('teacher_id', $teacher_id);
//		$this->db->from('tbl_teacher_students');
//
//		$query = $this->db->get();
//		return $query->result();
//	}
}
