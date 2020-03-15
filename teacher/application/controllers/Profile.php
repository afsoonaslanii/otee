<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{

    function index(){

        if (isset($_SESSION['user_id'])) {
            $this->load->model('joined_model');
            $data['query'] = $this->joined_model->get_user_profile_inf($_SESSION['username'], $_SESSION['user_id']);
            if(isset($_SESSION['ms'])){
                $data['ms']=$_SESSION['ms'];
                $data['description']=$_SESSION['description'];
            }else{
                $data['ms']='0';
                $data['description']='';
            }
            $this->load->view('profile', $data);

        }else{
            redirect('login');
        }
    }

    function updateProfile(){
        $data = array(
            'teacher_fname' => $_POST['fname'],
            'teacher_lname' => $_POST['lname'],
            'gender' => $_POST['gender'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
        );
        $this->load->model('teacher_model');
        $this->teacher_model->update_teacher_profile($data , $_SESSION['user_id']);

        $this->session->set_flashdata('ms', '1');
        $this->session->set_flashdata('description', 'update your profile secsesful');
        redirect('profile');
    }

    function updatePicture(){
        if (isset($_FILES['image'])){
            $uploadDir ='../assets/images/';
            $_FILES['image']['name'] .='_'.rand(100,999);
            $uploadFilePath = $uploadDir. $_FILES['image']['name'];
            $s=move_uploaded_file($_FILES['image']['tmp_name'],$uploadFilePath);
            if ($s == true){
                $data = array(
                    'teacher_picture'=> $_FILES['image']['name'] ,
                );
                $this->load->model('teacher_model');
                $this->teacher_model->update_user_profile($data , $_SESSION['user_id']);

                $this->session->set_flashdata('ms', '1');
                $this->session->set_flashdata('description', 'update your picture sucsesful');
                redirect('profile');
            }
        }

    }

    function new_password(){
        $password1 = $_POST['pass1'];
        $password2 = $_POST['pass2'];
        if ($password1!=='' && $password2!==''){
            if ($password1==$password2) {
                $this->load->model('user_model');
                $this->user_model->change_password($password1, $_SESSION['user_id']);

                $this->session->set_flashdata('ms', '1');
                $this->session->set_flashdata('description', 'your password change');

                redirect('profile');
            }
        }else{
            if ($password1 !== $password2){
                $this->session->set_flashdata('ms', '1');
                $this->session->set_flashdata('description', 'password not match');
                redirect('profile');
            }

        }
    }
}
?>