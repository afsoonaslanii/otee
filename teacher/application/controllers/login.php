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
                'field'=>'remember',
                'lable','remember',
                'rules'=>'numeric'
            )
        );
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false){
            //$this->load->view('login');
            redirect('login');
        }else{
            $username = $this->input->post('username',true);
            $password = $this->input->post('password',true);

            $this->load->model('User_model');
            $sql = $this->User_model->select_valid_user($username , $password);
            if (count($sql) > 0){
                $user_id = $sql[0]->user_id;
                $username_sess = $sql[0]->username;
                $fname = $sql[0]->firstname;
                $lname = $sql[0]->lastname;
                $rol = $sql[0]->user_type;

                $data_session = array(
                    'user_id'=>$user_id,
                    'username'=>$username_sess,
                    'firstname'=>$fname,
                    'lastname'=>$lname,
                );
                // data set in session
                $this->session->set_userdata($data_session);

                    redirect('dashboard');
            }
            else{
                redirect('login');
            }

        }
    }
}

?>