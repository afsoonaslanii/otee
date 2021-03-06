<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller
{

    function index()
    {
        if (isset($_SESSION['user_id'])) {
            $this->load->model('admin_model');
            $data['query1'] = $this->admin_model->get_admin_inf($_SESSION['username'], $_SESSION['user_id']);

            $this->load->model('exam_model');
            $data['query']= $this->exam_model->select_exam();

            $this->load->model('joined_model');
            $data['showClass'] = $this->joined_model->get_all_class_info();
            $data['showActiveClass'] = $this->joined_model->get_active_class_info();

            $this->load->model('teachers_model');
            $data['teachers']= $this->teachers_model->select_active_teachers();

            if(isset($_SESSION['ms'])){
                $data['ms']=$_SESSION['ms'];
                $data['description']=$_SESSION['description'];
            }else{
                $data['ms']='0';
                $data['description']='';
            }

            $this->load->view('exam',$data);
        }else{
            redirect('login');
        }
    }

    function add_course(){
        $data_course = array(
            'course_name' => $_POST['coursename'],
            'course_code' => $_POST['coursecode'],
        );
        $data_class = array(
            'course_code' => $_POST['coursecode'],
            'teacher_id' => $_POST['teacherid'],
        );
        $this->load->model('course_class_model');
        $this->course_class_model->add_course_class($data_course,$data_class);

        $this->session->set_flashdata('ms', '1');
        $this->session->set_flashdata('description', 'course added');
        redirect('exam');
    }

    function drop_course($course_code){

        $this->load->model('course_class_model');
        $this->course_class_model->delete_course_class($course_code);

        $this->session->set_flashdata('ms', '1');
        $this->session->set_flashdata('description', 'course droped');
        redirect('exam');
    }

    function inactive_crs($course_id){
        $data = array(
            'course_status'=>'0'
        );
        $this->load->model('course_class_model');
        $this->course_class_model->update_course($data,$course_id);

        $this->session->set_flashdata('ms', '1');
        $this->session->set_flashdata('description', 'inactive course');
        redirect('exam');
    }
    function active_crs($course_id){
        $data = array(
            'course_status'=>'1'
        );
        $this->load->model('course_class_model');
        $this->course_class_model->update_course($data,$course_id);

        $this->session->set_flashdata('ms', '1');
        $this->session->set_flashdata('description', 'inactive course');
        redirect('exam');
    }

    function inactive_ex($exam_id){
        $data = array(
            'exam_status'=>0,
        );
        $this->load->model('exam_model');
        $this->exam_model->update_exam($exam_id,$data);

        $this->session->set_flashdata('ms', '1');
        $this->session->set_flashdata('description', 'inactive exam');
        redirect('exam');
    }

    function active_ex($exam_id){
        $data = array(
            'exam_status'=>1,
        );
        $this->load->model('exam_model');
        $this->exam_model->update_exam($exam_id,$data);

        $this->session->set_flashdata('ms', '1');
        $this->session->set_flashdata('description', 'active exam');
        redirect('exam');
    }
    function drop_exam($exam_id){
        $this->load->model('exam_model');
        $query = $this->exam_model->delete_exam($exam_id);
        if ($query == true){
            $this->session->set_flashdata('ms', '1');
            $this->session->set_flashdata('description', 'drop exam');
            redirect('exam');
        }
    }

    function add_exam(){
        $data = array(
            'class_id'=>$_POST['class_name'],
            'exam_title'=> $_POST['title'],
            'exam_date'=> $_POST['date'],
            'exam_duration'=> $_POST['duration'],
            'passmark'=> $_POST['passmark'],
            're_exam'=>$_POST['reexam'],
            'exam_status'=>'1',
            'exam_terms'=>$_POST['terms'],
        );
        $this->load->model('exam_model');
        $this->exam_model->insert_exam($data);

        $this->session->set_flashdata('ms', '1');
        $this->session->set_flashdata('description', 'add exam');
        redirect('exam');
    }

    function edit_exam($exam_id){

            if (isset($_SESSION['user_id'])) {
                $this->load->model('admin_model');
                $data['query1'] = $this->admin_model->get_admin_inf($_SESSION['username'], $_SESSION['user_id']);

                $this->load->model('exam_model');
                $data['query']= $this->exam_model->select_exam_by_id($exam_id);

                if(isset($_SESSION['ms'])){
                    $data['ms']=$_SESSION['ms'];
                    $data['description']=$_SESSION['description'];
                }else{
                    $data['ms']='0';
                    $data['description']='';
                }

                $this->load->view('edit_exam',$data);
            }else{
                redirect('login');
            }
    }

    function update_exam(){
        if (isset($_SESSION['user_id'])) {
            $exam_id = $_POST['exam_id'];
            $data = array(
                'exam_title'=>$_POST['examtitle'],
                'exam_duration'=>$_POST['duration'],
                'passmark'=>$_POST['passmark'],
                're_exam'=>$_POST['reexam'],
                'exam_date'=>$_POST['date'],
            );
            $this->load->model('exam_model');
            $this->exam_model->update_exam($exam_id,$data);

            redirect('exam');

        }else{
            redirect('login');
        }
    }

    function question($exam_id){
        if (isset($_SESSION['user_id'])) {
            $this->load->model('admin_model');
            $data['query1'] = $this->admin_model->get_admin_inf($_SESSION['username'], $_SESSION['user_id']);

            $this->load->model('exam_model');
            $data['query']= $this->exam_model->select_exam_by_id($exam_id);


            if(isset($_SESSION['ms'])){
                $data['ms']=$_SESSION['ms'];
                $data['description']=$_SESSION['description'];
            }else{
                $data['ms']='0';
                $data['description']='';
            }

            $this->load->view('add_question',$data);
        }else{
            redirect('login');
        }
    }
//    function add_question(){
//        $data = array(
//            'exam_id' => $_POST['exam_id'],
//            'opt1' => $_POST['opt1'],
//            'opt2' => $_POST['opt2'],
//            'opt3' => $_POST['opt3'],
//            'opt4' => $_POST['opt4'],
//            'answer' => $_POST['answer'],
//        );
//
//
//
//        $this->load->view('add_question',$data);
//    }

}