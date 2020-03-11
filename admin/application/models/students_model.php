<?php

class Students_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function select_students(){
        $this->db->select('*');
        $this->db->from('tbl_student');

        $query = $this->db->get();
        return $query->result();
    }
    function delete_student($sid){
        $tables = array('tbl_student','tbl_user');
        $this->db->where('user_id', $sid);
        $query= $this->db->delete($tables);
        return $query;
    }
    function insert_student($data){
        $this->db->insert('tbl_student', $data);
    }

    function update_student($user_id , $data){
        $query = $this->db->update('tbl_student', $data,"user_id = $user_id");
        return $query;
    }

    function select_st($user_id){
        $this->db->select('*');
        $this->db->where('user_id', $user_id);
        $this->db->from('tbl_student');

        $query = $this->db->get();
        return $query->result();
    }

    function select_st_by_username($username){
        $this->db->select('*');
        $this->db->where('username', $username);
        $this->db->from('tbl_student');

        $query = $this->db->get();
        return $query->result();
    }
}