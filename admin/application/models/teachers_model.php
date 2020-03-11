<?php
class Teachers_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function select_teachers()
    {
        $this->db->select('*');
        $this->db->from('tbl_teacher');

        $query = $this->db->get();
        return $query->result();
    }

    function select_active_teachers()
    {
        $this->db->select('*');
        $this->db->from('tbl_teacher');
        $this->db->where('acc_stat','1');
        $query = $this->db->get();
        return $query->result();
    }

    function delete_teacher($tid){
        $this->db->where('user_id', $tid);
        $this->db->delete('tbl_teacher');
        return true;
    }
    function insert_teacher($data){
        $this->db->insert('tbl_teacher', $data);
    }

    function update_teacher($user_id , $data){
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_teacher', $data);
    }

    function select_tch($user_id){
        $this->db->select('*');
        $this->db->where('user_id', $user_id);
        $this->db->from('tbl_teacher');

        $query = $this->db->get();
        return $query->result();
    }

    function select_active_tch(){
        $this->db->select('*');
        $this->db->where('acc_stat', '1');
        $this->db->from('tbl_teacher');

        $query = $this->db->get();
        return $query->result();
    }

    function select_inactive_tch(){
        $this->db->select('*');
        $this->db->where('acc_stat', '0');
        $this->db->from('tbl_teacher');

        $query = $this->db->get();
        return $query->result();
    }
}