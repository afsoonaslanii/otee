<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
    function index()
    {
        if(isset($_SESSION['ms'])){
            $data['ms']=$_SESSION['ms'];
            $data['description']=$_SESSION['description'];
        }else{
            $data['ms']='0';
            $data['description']='';
        }
        $this->load->view('login',$data);
    }

    function auth(){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $this->load->model('user_model');
        $query = $this->user_model->select_valid_user($username,$password);

        if (count($query)>0){

            $user_id = $query[0]->user_id;
            $username_sess = $query[0]->username;
            $fname = $query[0]->firstname;
            $lname = $query[0]->lastname;
            $rol = $query[0]->user_type;

            $data_session = array(
                'user_id'=>$user_id,
                'username'=>$username_sess,
                'firstname'=>$fname,
                'lastname'=>$lname,
            );
            // data set in session
            $this->session->set_userdata($data_session);
            redirect('dashboard');
        }else{
            redirect('login');
        }

    }
}