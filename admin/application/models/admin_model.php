<?php

class Admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_admin_inf($username , $user_id){
        $this->db->select('*');
        $this->db->where('username',"$username");
        $this->db->where('user_id',"$user_id");
        $this->db->from('tbl_admin');

        $query = $this->db->get();
        return $query->result();
    }

    function update_user_profile($data , $user_id){
        $this->db->update('tbl_admin', $data, "user_id = $user_id");
    }

}