<?php

class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function insert_user($data){
        $this->db->insert('tbl_user', $data);
        return true;
    }

    function select_valid_user($username,$password){
        $this->db->select('*');
        $this->db->where('username',"$username");
        $this->db->where('password',"$password");
        $this->db->from('tbl_user');

        $query = $this->db->get();
        return $query->result();
    }

    function find_user($user_id){
        $this->db->select('*');
        $this->db->where('user_id',"$user_id");
        $this->db->from('tbl_user');

        $query = $this->db->get();
        return $query->result();
    }

    function change_password($password1 , $user_id)
    {
        $this->db->set('password', $password1);
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_user');
    }
}