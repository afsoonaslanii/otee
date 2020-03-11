<?php
class Student_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function select_st_by_user_id($user_id,$username){
        $this->db->select('*');
        $this->db->where('user_id',$user_id);
        $this->db->where('username',$username);
        $this->db->from('tbl_student');
        $query = $this->db->get();
        return $query->result();
    }

}