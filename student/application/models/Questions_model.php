<?php
class Questions_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function select_question_by_id($exam_id){
        $this->db->select('*');
        $this->db->from('tbl_question');
        $this->db->where('exam_id',$exam_id);
        $query = $this->db->get();
        return $query->result();
    }

}