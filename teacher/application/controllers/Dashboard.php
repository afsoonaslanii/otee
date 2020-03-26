<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

    function index(){

        if (isset($_SESSION['user_id'])) {
            $this->load->model('user_model');
            $data['query'] = $this->user_model->get_user_info($_SESSION['username'] , $_SESSION['user_id']);

//            $data['query_te'] = count( $this->user_model->select_teachers());
//            $data['active_tech'] = count( $this->user_model->select_active_tch());
//            $data['inactive_tech'] = count( $this->user_model->select_inactive_tch());

//            $this->load->model('exam_model');
//            $data['exam_cont'] = count( $this->exam_model->select_exam());
//
//            $this->load->model('st_class_model');
//            $data['pass_st'] = count($this->st_class_model->pass_st());
//
//            $this->load->model('st_class_model');
//            $data['fail_st'] = count($this->st_class_model->fail_st());

            $this->load->view('dashboard',$data);

        }else{
            redirect('login');
        }
    }
}
