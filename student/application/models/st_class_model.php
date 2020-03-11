<?php
class St_class_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function insert_st_record($data){
        $q = $this->db->insert('tbl_st_class', $data);
        return $q;
    }

    function delete_st_record($student_id,$exam_id){
        $this->db->where('student_id', $student_id);
        $this->db->where('exam_id', $exam_id);
        $this->db->delete('tbl_st_class');
    }

    function select_pass_record($student_id){
        $this->db->select('*');
        $this->db->from('tbl_st_class');
        $this->db->where('student_id',$student_id);
        $this->db->where('status_student','PASS');
        $query = $this->db->get();
        return $query->result();
    }
    function select_fail_record($student_id){
        $this->db->select('*');
        $this->db->from('tbl_st_class');
        $this->db->where('student_id',$student_id);
        $this->db->where('status_student','FAIL');
        $query = $this->db->get();
        return $query->result();
    }


}