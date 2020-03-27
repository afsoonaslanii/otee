<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller
{

    function index()
    {
        if (isset($_SESSION['user_id'])) {
            $this->load->model('user_model');
            $data['query1'] = $this->user_model->get_user_info($_SESSION['username'], $_SESSION['user_id']);

            $this->load->model('joined_model');
            $data['exam'] = $this->joined_model->teacher_exam_result($_SESSION['user_id']);

            if (isset($_SESSION['ms'])) {
                $data['ms'] = $_SESSION['ms'];
                $data['description'] = $_SESSION['description'];
            } else {
                $data['ms'] = '0';
                $data['description'] = '';
            }

            $this->load->view('question', $data);
        } else {
            redirect('login');
        }
    }

    function add_question(){
        $data = array(
            'exam_id'=>$_POST['exam'],
            'question'=>$_POST['question'],
            'option1'=>$_POST['opt1'],
            'option2'=>$_POST['opt2'],
            'option3'=>$_POST['opt3'],
            'option4'=>$_POST['opt4'],
            'answer'=>$_POST['answer'],
            'point'=>$_POST['point'],
        );

        $this->load->model('question_model');
        $query = $this->question_model->insert_question($data);

        if ($query == '1') {

            $this->session->set_flashdata('ms', '1');
            $this->session->set_flashdata('description', 'question added');

            redirect('question');
        }
    }

    function drop_question($question_id, $exam_id){
        $this->load->model('question_model');
        $query = $this->question_model->delete_question($question_id);
        if ($query == '1'){
            $this->session->set_flashdata('ms', '1');
            $this->session->set_flashdata('description', 'delete question');
			$this->view_question($exam_id);
        }
    }

    function view_question($exam_id){
        if (isset($_SESSION['user_id'])) {
            $this->load->model('user_model');
            $data['query1'] = $this->user_model->get_user_info($_SESSION['username'], $_SESSION['user_id']);

            $this->load->model('exam_model');
            $data['exam'] = $this->exam_model->select_exam_by_id($exam_id);

            $this->load->model('question_model');
            $data['question'] = $this->question_model->select_question_by_id($exam_id);

            if (isset($_SESSION['ms'])) {
                $data['ms'] = $_SESSION['ms'];
                $data['description'] = $_SESSION['description'];
            } else {
                $data['ms'] = '0';
                $data['description'] = '';
            }

            $this->load->view('view_question', $data);
        } else {
            redirect('login');
        }
    }
}
