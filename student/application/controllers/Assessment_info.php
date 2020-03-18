<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Assessment_info extends CI_Controller
{
    function index()
    {
        if (isset($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
            $username = $_SESSION['username'];
            $this->load->model('student_model');
            $data['query'] = $this->student_model->select_st_by_user_id($user_id,$username);

            $student_id = $_SESSION['student_id'];
            $exam_id = $_SESSION['current_examid'];
            $this->load->model('joined_model');
            $data['record'] = $this->joined_model->select_st_class($exam_id, $student_id);

            $this->load->view('assessment-info',$data);
        }else{
            redirect('login');
        }
    }
}