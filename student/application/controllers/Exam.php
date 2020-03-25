<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Exam extends CI_Controller
{
    function index()
    {
        if (isset($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
            $username = $_SESSION['username'];
            $this->load->model('student_model');
            $data['query'] = $this->student_model->select_st_by_user_id($user_id,$username);

            $this->load->model('joined_model');
            $data['exam'] = $this->joined_model-> select_exam_detail();

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

    function Take_Assessment($exam_id,$student_id){

        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $username = $_SESSION['username'];

            $this->load->model('student_model');
            $data['query'] = $this->student_model->select_st_by_user_id($user_id, $username);

            $this->load->model('exam_model');
            $data['exam'] = $this->exam_model->select_exam_by_id($exam_id);

            $this->load->model('questions_model');
            $data['question'] = $this->questions_model->select_question_by_id($exam_id);

            $this->load->model('joined_model');
            $data['st_record'] = $this->joined_model->select_record_class($student_id, $exam_id);

            $this->load->view('take-assessment', $data);
        }else{
            redirect('login');
        }
    }

    function Assessment($exam_id){
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $username = $_SESSION['username'];
            $student_id = $_SESSION['student_id'];
            $retake_status = $_SESSION['student_retake'];

            $this->load->model('student_model');
            $data['query'] = $this->student_model->select_st_by_user_id($user_id, $username);

            if ($retake_status == '0') {
                //ag record bud pak she
                $this->load->model('st_class_model');
                $this->st_class_model->delete_st_record($student_id, $exam_id);
            }
            $this->load->model('exam_model');
            $data['exam'] = $this->exam_model->select_exam_by_id($exam_id);

            $this->load->model('questions_model');
            $data['question'] = $this->questions_model->select_question_by_id($exam_id);

            if (isset($_SESSION['ms'])) {
                $data['ms'] = $_SESSION['ms'];
                $data['description'] = $_SESSION['description'];
            } else {
                $data['ms'] = '0';
                $data['description'] = '';
            }

            $this->load->view('assessment', $data);
        }else{
            redirect('login');
        }
    }

    function submit_assessment(){

        if (isset($_SESSION['user_id'])) {
            $score = 0;
            $total_question = $_POST['totalquestion']; //tedad soal
            $exam_id = $_POST['examid'];
            $student_id = $_POST['studentid'];
            $passmark = $_POST['passmark'];  //nomre ghabuli
            $class_id = $_POST['classid'];
            $retake_date = $_POST['retake'];

            for ($i = 1; $i <= $total_question; $i++) {

                $right_answer = base64_decode($_POST['ran' . $i]);
                $point = $_POST['point' . $i];

                if ($right_answer == $_POST['an' . $i]) {
                    $score += $point;
                }
            }


            if ($score >= $passmark) {
                $status = 'PASS';
            } else {
                $status = 'FAIL';
            }

            $st_record = array(
                'class_id' => $class_id,
                'exam_id' => $exam_id,
                'student_id' => $student_id,
                'score' => $score,
                'status_student' => $status,
                'take_date' => date('Y/m/d'),
                'retake_date' => $retake_date,
            );
            $this->load->model('st_class_model');
            $this->st_class_model->insert_st_record($st_record);

            redirect('assessment_info');
        }else{
            redirect('login');
        }
    }
}
