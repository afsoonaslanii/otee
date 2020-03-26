<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Results extends CI_Controller{

    function index(){

        if (isset($_SESSION['user_id'])) {
            $this->load->model('user_model');
            $data['query'] = $this->user_model->get_user_info($_SESSION['username'] , $_SESSION['user_id']);

            $this->load->model('joined_model');
            $data['query1'] = $this->joined_model->teacher_exam_result($_SESSION['user_id']);

            if(isset($_SESSION['ms'])){
                $data['ms']=$_SESSION['ms'];
                $data['description']=$_SESSION['description'];
            }else{
                $data['ms']='0';
                $data['description']='';
            }

            $this->load->view('results', $data);

        }else{
            redirect('login');
        }
    }

    function view_results($exam_id){

        if (isset($_SESSION['user_id'])) {
            $this->load->model('user_model');
            $data['query'] = $this->user_model->get_user_info($_SESSION['username'] , $_SESSION['user_id']);

            $this->load->model('joined_model');
            $data['query1'] = $this->joined_model->select_record_st($exam_id);

            if(isset($_SESSION['ms'])){
                $data['ms']=$_SESSION['ms'];
                $data['description']=$_SESSION['description'];
            }else{
                $data['ms']='0';
                $data['description']='';
            }

            $this->load->view('view-results', $data);

        }else{
            redirect('login');
        }
    }

    function summary($exam_id){
        if (isset($_SESSION['user_id'])) {
            $this->load->model('user_model');
            $data['query'] = $this->user_model->get_user_info($_SESSION['username'] , $_SESSION['user_id']);

            $this->load->model('exam_model');
            $data['query1'] = $this->exam_model->select_exam_by_id($exam_id);

            $this->load->model('st_class_model');
            $data['query2'] = $this->st_class_model->select_exam_record($exam_id);

            if(isset($_SESSION['ms'])){
                $data['ms']=$_SESSION['ms'];
                $data['description']=$_SESSION['description'];
            }else{
                $data['ms']='0';
                $data['description']='';
            }

            $this->load->view('summary', $data);

        }else{
            redirect('login');
        }
    }
}
?>
