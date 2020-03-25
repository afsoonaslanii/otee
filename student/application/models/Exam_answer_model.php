<?php
class Exam_answer_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }

    function select_exam_an($exam_id,$student_id){
        $this->db->select('*');
        $this->db->from('tbl_exam_answers');
        $this->db->where('exam_id',$exam_id);
        $this->db->where('student_id',$student_id);
        $query = $this->db->get();
        return $query->result();
    }

    function insert_exam_an($data){
        $q = $this->db->insert('tbl_exam_answers', $data);
        return $q;
    }
}
