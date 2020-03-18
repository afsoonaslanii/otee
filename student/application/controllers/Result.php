<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Result extends CI_Controller
{
    function index()
    {
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $username = $_SESSION['username'];
            $student_id = $_SESSION['student_id'];

            $this->load->model('student_model');
            $data['query'] = $this->student_model->select_st_by_user_id($user_id, $username);

            $this->load->model('joined_model');
            $data['record'] = $this->joined_model->select_record_st($student_id);

            if (isset($_SESSION['ms'])) {
                $data['ms'] = $_SESSION['ms'];
                $data['description'] = $_SESSION['description'];
            } else {
                $data['ms'] = '0';
                $data['description'] = '';
            }
            $this->load->view('result', $data);
        }else{
            redirect('login');
        }
    }
}