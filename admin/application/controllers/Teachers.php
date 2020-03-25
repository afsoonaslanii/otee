<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers extends CI_Controller{

    function index()
    {

        if (isset($_SESSION['user_id'])) {
            $this->load->model('user_model');
            $data['query1'] = $this->user_model->get_user_info($_SESSION['username'], $_SESSION['user_id']);

            $data['query2'] = $this->user_model->select_teachers();

            if(isset($_SESSION['ms'])){
                $data['ms']=$_SESSION['ms'];
                $data['description']=$_SESSION['description'];
            }else{
                $data['ms']='0';
                $data['description']='';
            }

            $this->load->view('teachers', $data);
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

    function drop_t($tid){

        $this->load->model('user_model');
        $query = $this->user_model->delete_user($tid);
        if ($query == true){

            $this->session->set_flashdata('ms', '1');
            $this->session->set_flashdata('description', 'drop teacher');
            redirect('teachers');
        }

    }

    function add_teacher(){
        $pointer = $this->generate_pointer();
        $userdata = array(
            'username'=>$_POST['username'],
            'firstname'=>$_POST['fname'],
            'lastname'=>$_POST['lname'],
            'password'=>$_POST['phone'],
			'phone'=>$_POST['phone'],
            'role'=>'teacher',
            'pointer'=>$pointer,
        );
        // set tbl_user
        $this->load->model('user_model');
        $this->user_model->insert_user($userdata);

        $this->session->set_flashdata('ms', '1');
        $this->session->set_flashdata('description', 'add teacher');
        redirect('teachers');
    }

    function inactive_te($user_id){
        $data = array(
            'status'=>0,
        );
        $this->load->model('user_model');
        $this->user_model->update_user($user_id,$data);

        $this->session->set_flashdata('ms', '1');
        $this->session->set_flashdata('description', 'inactive teacher');
        redirect('teachers');
    }

    function active_te($user_id){
        $data = array(
            'status'=>1,
        );
        $this->load->model('user_model');
        $this->user_model->update_user($user_id,$data);

        $this->session->set_flashdata('ms', '1');
        $this->session->set_flashdata('description', 'active teacher');
        redirect('teachers');
    }

    function view_teacher($user_id , $teacher_id){
        $this->load->model('user_model');
        $data['query1'] = $this->user_model->get_user_info($_SESSION['username'], $_SESSION['user_id']);

        $data['query'] = $this->user_model->select_teacher_by_id($user_id);

        $this->load->model('joined_model');
        $data['course'] = $this->joined_model->get_class_inf_tch($teacher_id);

        if(isset($_SESSION['ms'])){
            $data['ms']=$_SESSION['ms'];
            $data['description']=$_SESSION['description'];
        }else{
            $data['ms']='0';
            $data['description']='';
        }

        $this->load->view('view_teacher',$data);
    }

    function edit_teacher($user_id){
        if (isset($_SESSION['user_id'])) {
            $this->load->model('user_model');
            $data['query1'] = $this->user_model->get_user_info($_SESSION['username'], $_SESSION['user_id']);

            $data['query'] = $this->user_model->select_teacher_by_id($user_id);

            if(isset($_SESSION['ms'])){
                $data['ms']=$_SESSION['ms'];
                $data['description']=$_SESSION['description'];
            }else{
                $data['ms']='0';
                $data['description']='';
            }

            $this->load->view('edit_teacher', $data);
        } else {
            redirect('login');
        }
    }

    function update_teacher(){
        $user_id = $_POST['user_id'];
        $data = array(
			'firstname'=>$_POST['fname'],
			'lastname'=>$_POST['lname'],
            'gender'=>$_POST['gender'],
            'email'=>$_POST['email'],
            'phone'=>$_POST['phone'],
        );

        $this->load->model('user_model');
        $req = $this->user_model->update_user($user_id,$data);

        if ($req == '1'){
            $this->session->set_flashdata('ms', '1');
            $this->session->set_flashdata('description', 'update teacher');
        }
        redirect('teachers');

    }
}
?>
