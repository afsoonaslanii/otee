<?php
class Joined_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function select_record_class($student_id,$exam_id){
        $this->db->select('*');
        $this->db->from('tbl_st_class');
        $this->db->join('tbl_class', 'tbl_class.class_id = tbl_st_class.class_id');
        $this->db->join('tbl_course','tbl_course.course_code = tbl_class.course_code');
        $this->db->where('tbl_st_class.student_id',$student_id);
        $this->db->where('tbl_st_class.exam_id',$exam_id);
        $query = $this->db->get();

        return $query->result();
    }

    function select_st_class($exam_id,$student_id){
        $this->db->select('*');
        $this->db->from('tbl_st_class');
        $this->db->join('tbl_exam','tbl_exam.exam_id = tbl_st_class.exam_id');
        $this->db->where('tbl_st_class.exam_id',$exam_id);
        $this->db->where('tbl_st_class.student_id',$student_id);
        $query = $this->db->get();
        return $query->result();
    }

    function select_record_st($student_id){
        $this->db->select('*');
		$this->db->from('tbl_st_class');
		$this->db->where('tbl_st_class.student_id',$student_id);
		$this->db->join('tbl_exam','tbl_exam.exam_id = tbl_st_class.exam_id');
		$this->db->join('tbl_class','tbl_class.class_id = tbl_exam.class_id');
		$this->db->join('tbl_user','tbl_user.user_id = tbl_class.teacher_id');
		$this->db->join('tbl_course','tbl_course.course_code = tbl_class.course_code');

        $query = $this->db->get();
        return $query->result();
    }

    function select_exam_detail(){
        $this->db->select('*');
        $this->db->from('tbl_exam');
        $this->db->join('tbl_class','tbl_class.class_id = tbl_exam.class_id');
        $this->db->join('tbl_course','tbl_course.course_code = tbl_class.course_code');
        $this->db->join('tbl_user','tbl_user.user_id = tbl_class.teacher_id');
        $query = $this->db->get();
        return $query->result();
    }

}
