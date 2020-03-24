<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller{

    function index()
    {
        if (isset($_SESSION['user_id'])) {
            $this->load->model('admin_model');
            $data['query1'] = $this->admin_model->get_admin_inf($_SESSION['username'], $_SESSION['user_id']);

            $this->load->model('students_model');
            $data['query2'] = $this->students_model->select_students();

            if(isset($_SESSION['ms'])){
                $data['ms']=$_SESSION['ms'];
                $data['description']=$_SESSION['description'];
            }else{
                $data['ms']='0';
                $data['description']='';
            }

            $this->load->view('students', $data);
        } else {
            redirect('login');
        }
    }

    function generate_pointer()
    {
        $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $len = strlen( $chars );

        $result = '';

        for ( $i = 0; $i < 8; $i ++ )
            $result .= $chars[ mt_rand( 0, $len - 1 ) ];

        return $result;
    }

    function drop_sd($sid){
        $this->load->model('students_model');
        $query = $this->students_model->delete_student($sid);
//        if ($query == '1'){
            $this->session->set_flashdata('ms', '1');
            $this->session->set_flashdata('description', 'delete student');
            redirect('students');
//        }
    }

        function addStudent()
        {
            //search for username
            $this->load->model('students_model');
            $out = $this->students_model->select_st_by_username($_POST['username']);

            if (count($out) == 0) {
                $pointer = $this->generate_pointer();
                $userdata = array(
                    'username' => $_POST['username'],
                    'firstname' => $_POST['fname'],
                    'lastname' => $_POST['lname'],
                    'password' => $_POST['phone'],
					'phone' => $_POST['phone'],
                    'user_type' => 'student',
                    'pointer' => $pointer,
                );

                // set tbl_user
                $this->load->model('user_model');
                $this->user_model->insert_user($userdata);


                //get user_id from table user
                $this->load->model('user_model');
                $query = $this->user_model->select_by_pointer($pointer);
                $user_id = $query[0]->user_id;

                $stdata = array(
                    'student_fname' => $_POST['fname'],
                    'student_lname' => $_POST['lname'],
                    'gender' => $_POST['gender'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'username' => $_POST['username'],
                    'user_id' => $user_id,

                );

                // set tbl_student
                $this->load->model('students_model');
                $this->students_model->insert_student($stdata);

                $this->session->set_flashdata('ms', '1');
                $this->session->set_flashdata('description', 'student added');
                redirect('students');
            }else{
                //send error username is taken
                $this->session->set_flashdata('ms', '1');
                $this->session->set_flashdata('description', 'invalid username');
                redirect('students');
            }
        }

        function inactive_st($user_id){
            $data = array(
                'acc_stat'=>0,
            );
            $this->load->model('students_model');
            $query = $this->students_model->update_student($user_id,$data);
            if ($query == '1') {
                $this->session->set_flashdata('ms', '1');
                $this->session->set_flashdata('description', 'inactive student');
            }else{
                $this->session->set_flashdata('ms', '1');
                $this->session->set_flashdata('description', 'inactive fail');
            }
            redirect('students');
        }


    function active_st($user_id){
        $data = array(
            'acc_stat'=>1,
        );
        $this->load->model('students_model');
        $query = $this->students_model->update_student($user_id,$data);
        if ($query == '1') {
            $this->session->set_flashdata('ms', '1');
            $this->session->set_flashdata('description', 'active student');
        }else{
            $this->session->set_flashdata('ms', '1');
            $this->session->set_flashdata('description', 'active fail');
        }
        redirect('students');
    }


    function view_student($user_id,$student_id){
        $this->load->model('admin_model');
        $data['query1'] = $this->admin_model->get_admin_inf($_SESSION['username'], $_SESSION['user_id']);

        $this->load->model('students_model');
        $data['query'] = $this->students_model->select_st($user_id);

        $this->load->model('joined_model');
        $data['class'] = $this->joined_model->get_exam_inf_st($student_id);

        if(isset($_SESSION['ms'])){
            $data['ms']=$_SESSION['ms'];
            $data['description']=$_SESSION['description'];
        }else{
            $data['ms']='0';
            $data['description']='';
        }

        $this->load->view('view_student',$data);
    }

    function edit_student($user_id){
        if (isset($_SESSION['user_id'])) {
            $this->load->model('admin_model');
            $data['query1'] = $this->admin_model->get_admin_inf($_SESSION['username'], $_SESSION['user_id']);

            $this->load->model('students_model');
            $data['query'] = $this->students_model->select_st($user_id);

            if(isset($_SESSION['ms'])){
                $data['ms']=$_SESSION['ms'];
                $data['description']=$_SESSION['description'];
            }else{
                $data['ms']='0';
                $data['description']='';
            }

            $this->load->view('edit_student', $data);
        } else {
            redirect('login');
        }
    }

    function update_student(){
        $user_id = $_POST['user_id'];
        $data = array(
            'student_fname'=>$_POST['fname'],
            'student_lname'=>$_POST['lname'],
            'gender'=>$_POST['gender'],
            'email'=>$_POST['email'],
            'phone'=>$_POST['phone'],
        );
        //update in tbl_student
        $this->load->model('students_model');
        $req = $this->students_model->update_student($user_id,$data);

        $data2 = array(
            'firstname'=>$_POST['fname'],
            'lastname'=>$_POST['lname'],
        );
        //update in tbl_user
        $this->load->model('user_model');
        $this->user_model->update_user($user_id,$data2);

        if ($req == '1'){
            $this->session->set_flashdata('ms', '1');
            $this->session->set_flashdata('description', 'update student');
        }else{
            $this->session->set_flashdata('ms', '1');
            $this->session->set_flashdata('description', 'update student fail');
        }
        redirect('students');
    }
}
?>
