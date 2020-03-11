<?php
class Alert_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function showAlert($rp){
        $this->db->select('*');
        $this->db->where('code',$rp);
        $this->db->from('tbl_alert');

        $query = $this->db->get();
        return $query->result();
    }

}