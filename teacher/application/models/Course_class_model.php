<?php
class Course_class_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function add_course_class($data_course,$data_class){
        $this->db->insert('tbl_course', $data_course);
        $this->db->insert('tbl_class', $data_class);
    }

    function delete_course_class($course_code){
        $tables = array('tbl_course', 'tbl_class');
        $this->db->where('course_code', $course_code);
        $this->db->delete($tables);
    }
    function update_course($data,$course_id){
        $this->db->where('course_id',$course_id);
        $this->db->update('tbl_course',$data);
    }
}
