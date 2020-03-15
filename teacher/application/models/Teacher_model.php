<?php

class Teacher_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_teacher_inf($username , $user_id){
        $this->db->select('*');
        $this->db->where('username',"$username");
        $this->db->where('user_id',"$user_id");
        $this->db->from('tbl_teacher');

        $query = $this->db->get();
        return $query->result();
    }

    function update_teacher_profile($data , $user_id){
        $this->db->update('tbl_teacher', $data, "user_id = $user_id");
    }

    function select_active_teachers()
    {
        $this->db->select('*');
        $this->db->from('tbl_teacher');
        $this->db->where('acc_stat','1');
        $query = $this->db->get();
        return $query->result();
    }

}