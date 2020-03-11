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
        $query = $this->db->get();

        return $query->result();
    }

    function select_exam_by_id($exam_id){
        $this->db->select('*');
        $this->db->where('exam_id',$exam_id);
        $this->db->from('tbl_exam');
        $query = $this->db->get();
        return $query->result();
    }

    function update_exam($exam_id,$data){
        $this->db->where('exam_id', $exam_id);
        $this->db->update('tbl_exam', $data);
    }

    function delete_exam($exam_id){
        $this->db->where('exam_id', $exam_id);
        $this->db->delete('tbl_exam');
        return true;
    }

    function insert_exam($data){
        $this->db->insert('tbl_exam', $data);
    }

}