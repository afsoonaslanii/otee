<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CI_Controller
{
    function index()
    {
        $this->load->view('register');
    }

    function registerSt(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $rules = array(
            array(
                'field'=>'username',
                'lable','username',
                'rules'=>'required'
            ),
            array(
                'field'=>'password',
                'lable','password',
                'rules'=>'required'
            ),
            array(
                'field'=>'rePassword',
                'lable','rePassword',
                'rules'=>'required'
            )
        );
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false){
            $this->load->view('register');
        }
        else{
            $username = $this->input->post('username',true);
            $password = $this->input->post('password',true);
            $rePassword = $this->input->post('rePassword',true);
            if ($password == $rePassword){
                $data = array(
                   'username'=>$username,
                   'password'=>$password,
                    'role'=>'student',
                );
                $this->load->model('user_model');
                $sql = $this->user_model->insert_user($data);
                redirect('register');
            }else{
                echo 'password not match';
            }
        }
    }

//    function auth(){
//        $this->load->helper('form');
//        $this->load->library('form_validation');
//
//        $rules = array(
//            array(
//                'field'=>'username',
//                'lable','username',
//                'rules'=>'required'
//            ),
//            array(
//                'field'=>'password',
//                'lable','password',
//                'rules'=>'required'
//            ),
//            array(
//                'field'=>'remember',
//                'lable','remember',
//                'rules'=>'numeric'
//            )
//        );
//        $this->form_validation->set_rules($rules);
//
//        if ($this->form_validation->run() == false){
//            $this->load->view('login');
//        }else{
//            $username = $this->input->post('username',true);
//            $password = $this->input->post('password',true);
//
//            $this->load->model('User_model');
//            $sql = $this->User_model->select_valid_user($username , $password);
//            if (count($sql) > 0){
//
//                $user_id = $sql[0]->user_id;
//                $username_sess = $sql[0]->username;
//                $fname = $sql[0]->firstname;
//                $lname = $sql[0]->lastname;
//
//                $data_session = array(
//                    'user_id'=>$user_id,
//                    'username'=>$username_sess,
//                    'firstname'=>$fname,
//                    'lastname'=>$lname,
//                );
//                // data set in session
//                $this->session->set_userdata($data_session);
//                redirect('dashboard');
//            }
//            else{
//                redirect('login');
//            }
//
//        }
//    }
}

?>
