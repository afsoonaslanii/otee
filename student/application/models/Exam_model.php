<?php
class Exam_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function select_exam(){
        $this->db->select('*');
        $this->db->from('tbl_exam');
        $this->db->where('exam_status',1);
        $query = $this->db->get();
        return $query->result();
    }

    function select_exam_by_id($exam_id){
        $this->db->select('*');
        $this->db->from('tbl_exam');
        $this->db->where('exam_id',$exam_id);
        $query = $this->db->get();
        return $query->result();
    }

    function select_active_exam(){
        $this->db->select('*');
        $this->db->from('tbl_exam');
        $this->db->where('exam_status','1');
        $query = $this->db->get();
        return $query->result();
    }

    function select_inactive_exam(){
        $this->db->select('*');
        $this->db->from('tbl_exam');
        $this->db->where('exam_status','0');
        $query = $this->db->get();
        return $query->result();
    }
}