<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller
{

	function index()
	{
		if (isset($_SESSION['user_id'])) {
			$this->load->model('user_model');
			$data['query1'] = $this->user_model->get_user_info($_SESSION['username'], $_SESSION['user_id']);

			$data['query2'] = $this->user_model->select_students_teacher();

			$data['active_teachers'] = $this->user_model->select_active_teachers();

			if (isset($_SESSION['ms'])) {
				$data['ms'] = $_SESSION['ms'];
				$data['description'] = $_SESSION['description'];
			} else {
				$data['ms'] = '0';
				$data['description'] = '';
			}

			$this->load->view('students', $data);
		} else {
			redirect('login');
		}
	}

	function generate_pointer()
	{
		$chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$len = strlen($chars);

		$result = '';

		for ($i = 0; $i < 8; $i++)
			$result .= $chars[mt_rand(0, $len - 1)];

		return $result;
	}

	function drop_sd($sid)
	{
		$this->load->model('joined_model');
		$query = $this->joined_model->delete_student($sid);
		$this->session->set_flashdata('ms', '1');
		$this->session->set_flashdata('description', 'delete student');
		redirect('students');
	}

	function addStudent()
	{
		//search for username
		$this->load->model('user_model');
		$out = $this->user_model->select_student_by_username($_POST['username']);

		if (count($out) == 0) {
			$pointer = $this->generate_pointer();
			$data = array(
				'username' => $_POST['username'],
				'firstname' => $_POST['fname'],
				'lastname' => $_POST['lname'],
				'gender' => $_POST['gender'],
				'password' => $_POST['phone'],
				'phone' => $_POST['phone'],
				'email' => $_POST['email'],
				'role' => 'student',
				'pointer' => $pointer,
			);

			$this->user_model->insert_user($data);

			//get user_id from table user
			$this->load->model('user_model');
			$query = $this->user_model->select_by_pointer($pointer);
			$new_user_id = $query[0]->user_id;

			$teacher_student_data = array(
				'student_id' => $new_user_id,
				'teacher_id' =>  $_POST['teacher_id'],
			);

			// set tbl_teacher_students
			$this->load->model('teacher_students_model');
			$this->teacher_students_model->insert_teacher_student($teacher_student_data);

			$this->session->set_flashdata('ms', '1');
			$this->session->set_flashdata('description', 'student added');
			redirect('students');
		} else {
			//send error username is taken
			$this->session->set_flashdata('ms', '1');
			$this->session->set_flashdata('description', 'invalid username');
			redirect('students');
		}
	}

	function inactive_st($user_id)
	{
		$data = array(
			'status' => 0,
		);
		$this->load->model('user_model');
		$query = $this->user_model->update_user($user_id, $data);
		if ($query == '1') {
			$this->session->set_flashdata('ms', '1');
			$this->session->set_flashdata('description', 'inactive student');
		} else {
			$this->session->set_flashdata('ms', '1');
			$this->session->set_flashdata('description', 'inactive fail');
		}
		redirect('students');
	}


	function active_st($user_id)
	{
		$data = array(
			'status' => 1,
		);
		$this->load->model('user_model');
		$query = $this->user_model->update_user($user_id, $data);
		if ($query == '1') {
			$this->session->set_flashdata('ms', '1');
			$this->session->set_flashdata('description', 'active student');
		} else {
			$this->session->set_flashdata('ms', '1');
			$this->session->set_flashdata('description', 'active fail');
		}
		redirect('students');
	}


	function view_student($user_id, $student_id)
	{
		$this->load->model('user_model');
		$data['query1'] = $this->user_model->get_user_info($_SESSION['username'], $_SESSION['user_id']);

		$data['query'] = $this->user_model->select_student_by_id($user_id);

		$this->load->model('joined_model');
		$data['class'] = $this->joined_model->get_exam_inf_st($student_id);

		if (isset($_SESSION['ms'])) {
			$data['ms'] = $_SESSION['ms'];
			$data['description'] = $_SESSION['description'];
		} else {
			$data['ms'] = '0';
			$data['description'] = '';
		}

		$this->load->view('view_student', $data);
	}

	function edit_student($user_id)
	{
		if (isset($_SESSION['user_id'])) {
			$this->load->model('user_model');
			$data['query1'] = $this->user_model->get_user_info($_SESSION['username'], $_SESSION['user_id']);

			$data['query'] = $this->user_model->select_student_by_id($user_id);

			if (isset($_SESSION['ms'])) {
				$data['ms'] = $_SESSION['ms'];
				$data['description'] = $_SESSION['description'];
			} else {
				$data['ms'] = '0';
				$data['description'] = '';
			}

			$this->load->view('edit_student', $data);
		} else {
			redirect('login');
		}
	}

	function update_student()
	{
		$user_id = $_POST['user_id'];
		$data = array(
			'firstname' => $_POST['fname'],
			'lastname' => $_POST['lname'],
			'gender' => $_POST['gender'],
			'email' => $_POST['email'],
			'phone' => $_POST['phone'],
		);

		$this->load->model('user_model');
		$req = $this->user_model->update_user($user_id, $data);

		if ($req == '1') {
			$this->session->set_flashdata('ms', '1');
			$this->session->set_flashdata('description', 'update student');
		} else {
			$this->session->set_flashdata('ms', '1');
			$this->session->set_flashdata('description', 'update student fail');
		}
		redirect('students');
	}
}

?>
