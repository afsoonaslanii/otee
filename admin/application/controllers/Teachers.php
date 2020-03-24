<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers extends CI_Controller{

    function index()
    {

        if (isset($_SESSION['user_id'])) {
            $this->load->model('admin_model');
            $data['query1'] = $this->admin_model->get_admin_inf($_SESSION['username'], $_SESSION['user_id']);

            $this->load->model('teachers_model');
            $data['query2'] = $this->teachers_model->select_teachers();

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

        $this->load->model('teachers_model');
        $query = $this->teachers_model->delete_teacher($tid);
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
            'user_type'=>'teacher',
            'pointer'=>$pointer,
        );
        // set tbl_user
        $this->load->model('user_model');
        $this->user_model->insert_user($userdata);


        //get user_id from table user
        $this->load->model('user_model');
        $query = $this->user_model->select_by_pointer($pointer);
        $user_id = $query[0]->user_id;

        $tedata = array(
            'teacher_fname'=>$_POST['fname'],
            'teacher_lname'=>$_POST['lname'],
            'gender'=>$_POST['gender'],
            'email'=>$_POST['email'],
            'phone'=>$_POST['phone'],
            'username'=>$_POST['username'],
            'user_id'=>$user_id,

        );

        // set tbl_teacher
        $this->load->model('teachers_model');
        $this->teachers_model->insert_teacher($tedata);

        $this->session->set_flashdata('ms', '1');
        $this->session->set_flashdata('description', 'add teacher');
        redirect('teachers');
    }

    function inactive_te($user_id){
        $data = array(
            'acc_stat'=>0,
        );
        $this->load->model('teachers_model');
        $this->teachers_model->update_teacher($user_id,$data);

        $this->session->set_flashdata('ms', '1');
        $this->session->set_flashdata('description', 'inactive teacher');
        redirect('teachers');
    }

    function active_te($user_id){
        $data = array(
            'acc_stat'=>1,
        );
        $this->load->model('teachers_model');
        $this->teachers_model->update_teacher($user_id,$data);

        $this->session->set_flashdata('ms', '1');
        $this->session->set_flashdata('description', 'active teacher');
        redirect('teachers');
    }

    function view_teacher($user_id , $teacher_id){
        $this->load->model('admin_model');
        $data['query1'] = $this->admin_model->get_admin_inf($_SESSION['username'], $_SESSION['user_id']);

        $this->load->model('teachers_model');
        $data['query'] = $this->teachers_model->select_tch($user_id);

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
            $this->load->model('admin_model');
            $data['query1'] = $this->admin_model->get_admin_inf($_SESSION['username'], $_SESSION['user_id']);

            $this->load->model('teachers_model');
            $data['query'] = $this->teachers_model->select_tch($user_id);

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
            'teacher_fname'=>$_POST['fname'],
            'teacher_lname'=>$_POST['lname'],
            'gender'=>$_POST['gender'],
            'email'=>$_POST['email'],
            'phone'=>$_POST['phone'],
        );

        //update in tbl_teacher
        $this->load->model('teachers_model');
        $req = $this->teachers_model->update_teacher($user_id,$data);

        $data2 = array(
            'firstname'=>$_POST['fname'],
            'lastname'=>$_POST['lname'],
        );
        //update in tbl_user
        $this->load->model('user_model');
        $this->user_model->update_user($user_id,$data2);

        if ($req == '1'){
            $this->session->set_flashdata('ms', '1');
            $this->session->set_flashdata('description', 'update teacher');
        }
        redirect('teachers');

    }
}
?>
