<?php
class St_class_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function pass_st(){
        $this->db->select('*');
        $this->db->from('tbl_st_class');
        $this->db->where('status_student','PASS');
        $query = $this->db->get();
        return $query->result();
    }

    function fail_st(){
        $this->db->select('*');
        $this->db->from('tbl_st_class');
        $this->db->where('status_student','FAIL');
        $query = $this->db->get();
        return $query->result();
    }

    function pass_student_by_exam_id($exam_id){
		$this->db->select('*');
		$this->db->from('tbl_st_class');
		$this->db->where('status_student','PASS');
		$this->db->where('exam_id',$exam_id);
		$query = $this->db->get();
		return $query->result();
	}
    function fail_student_by_exam_id($exam_id){
		$this->db->select('*');
		$this->db->from('tbl_st_class');
		$this->db->where('status_student','FAIL');
		$this->db->where('exam_id',$exam_id);
		$query = $this->db->get();
		return $query->result();
	}

    function select_exam_record($exam_id){
        $this->db->select('*');
        $this->db->from('tbl_st_class');
        $this->db->where('exam_id',$exam_id);
        $query = $this->db->get();
        return $query->result();
    }

}
