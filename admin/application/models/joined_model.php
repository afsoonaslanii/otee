<?php

class Joined_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_class_inf_tch($teacher_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_class');
        $this->db->join('tbl_course', 'tbl_course.course_code = tbl_class.course_code');
        $this->db->where('tbl_class.user_id',$teacher_id);
        $query = $this->db->get();

        return $query->result();
    }

    function get_exam_inf_st($student_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_class');
        $this->db->join('tbl_st_class', 'tbl_st_class.class_id = tbl_class.class_id');
        $this->db->join('tbl_course','tbl_course.course_code = tbl_class.course_code');
        $this->db->where('tbl_st_class.student_id',$student_id);
        $query = $this->db->get();

        return $query->result();
    }

    function get_all_class_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_class');
        $this->db->join('tbl_course', 'tbl_course.course_code = tbl_class.course_code');
        $this->db->join('tbl_user','tbl_user.user_id = tbl_class.teacher_id');
        $query = $this->db->get();

        return $query->result();
    }

    function get_active_class_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_class');
        $this->db->join('tbl_course', 'tbl_course.course_code = tbl_class.course_code');
        $this->db->join('tbl_user','tbl_user.user_id = tbl_class.teacher_id');
        $this->db->where('tbl_course.course_status = 1');
        $query = $this->db->get();

        return $query->result();
    }

    function select_record_st($exam_id){
		$this->db->select('*');
		$this->db->from('tbl_st_class');
		$this->db->where('tbl_st_class.exam_id',$exam_id);
		$this->db->join('tbl_user','tbl_user.user_id = tbl_st_class.student_id');
		$this->db->join('tbl_exam','tbl_exam.exam_id = tbl_st_class.exam_id');
		$this->db->join('tbl_class','tbl_class.class_id = tbl_exam.class_id');
		$this->db->join('tbl_course','tbl_course.course_code = tbl_class.course_code');

        $query = $this->db->get();
        return $query->result();
    }

}
