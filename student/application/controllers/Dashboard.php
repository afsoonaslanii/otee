<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    function index()
    {
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $username = $_SESSION['username'];

            $this->load->model('student_model');
            $data['query'] = $this->student_model->select_st_by_user_id($user_id, $username);

            $data_session = array(
                'student_id'=>$data['query'][0]->student_id,
            );
            $this->session->set_userdata($data_session);

            $student_id = $_SESSION['student_id'];

            $this->load->model('exam_model');
            $data['active_exam'] = $this->exam_model->select_active_exam();
            $data['inactive_exam'] = $this->exam_model->select_inactive_exam();

            $this->load->model('st_class_model');
            $data['pass'] = $this->st_class_model->select_pass_record($student_id);
            $data['fail'] = $this->st_class_model->select_fail_record($student_id);


            if (isset($_SESSION['ms'])) {
                $data['ms'] = $_SESSION['ms'];
                $data['description'] = $_SESSION['description'];
            } else {
                $data['ms'] = '0';
                $data['description'] = '';
            }
            $this->load->view('dashboard', $data);
        }else{
            redirect('login');
        }
    }
}