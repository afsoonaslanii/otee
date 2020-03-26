<?php

class Joined_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_all_class_info($teacher_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_class');
		$this->db->join('tbl_course', 'tbl_course.course_code = tbl_class.course_code');
		$this->db->join('tbl_user', 'tbl_user.user_id = tbl_class.teacher_id');
		$this->db->where('tbl_class.teacher_id', $teacher_id);
		$query = $this->db->get();

		return $query->result();
	}

	function get_class_inf_tch($teacher_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_class');
		$this->db->join('tbl_course', 'tbl_course.course_code = tbl_class.course_code');
		$this->db->where('tbl_class.teacher_id', $teacher_id);
		$query = $this->db->get();

		return $query->result();
	}

	function get_active_class_info($teacher_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_class');
		$this->db->join('tbl_course', 'tbl_course.course_code = tbl_class.course_code');
		$this->db->join('tbl_user', 'tbl_user.user_id = tbl_class.teacher_id');
		$this->db->where('tbl_course.course_status = 1');
		$this->db->where('tbl_class.teacher_id', $teacher_id);
		$query = $this->db->get();

		return $query->result();
	}

	function select_record_st($exam_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_st_class');
		$this->db->where('tbl_st_class.exam_id', $exam_id);
		$this->db->join('tbl_user', 'tbl_user.user_id = tbl_st_class.student_id');
		$this->db->join('tbl_exam', 'tbl_exam.exam_id = tbl_st_class.exam_id');
		$this->db->join('tbl_class', 'tbl_class.class_id = tbl_exam.class_id');
		$this->db->join('tbl_course', 'tbl_course.course_code = tbl_class.course_code');

		$query = $this->db->get();
		return $query->result();
	}

	///////
	function teacher_exam_result($teacher_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_exam');
		$this->db->join('tbl_class', 'tbl_class.class_id = tbl_exam.class_id');
		$this->db->where('tbl_class.teacher_id ', $teacher_id);

		$query = $this->db->get();
		return $query->result();
	}

	/*student*/
	function get_exam_inf_st($student_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_class');
		$this->db->join('tbl_st_class', 'tbl_st_class.class_id = tbl_class.class_id');
		$this->db->join('tbl_course', 'tbl_course.course_code = tbl_class.course_code');
		$this->db->where('tbl_st_class.student_id', $student_id);

		$query = $this->db->get();
		return $query->result();
	}

	function select_teacher_students($teacher_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_teacher_students');
		$this->db->where('teacher_id', $teacher_id);
		$this->db->join('tbl_user', 'tbl_user.user_id = tbl_teacher_students.student_id');
		$this->db->where('role', 'student');

		$query = $this->db->get();
		return $query->result();
	}

	function delete_student($student_id)
	{
		$this->db->where('user_id', $student_id);
		$this->db->where('role', 'student');
		$query = $this->db->delete('tbl_user');

		$this->db->where('student_id', $student_id);
		$query2 = $this->db->delete(' tbl_teacher_students');

		return $query;
	}

}
