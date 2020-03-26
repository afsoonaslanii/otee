<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function index()
	{

		if (isset($_SESSION['user_id'])) {
			$this->load->model('user_model');
			$data['query'] = $this->user_model->get_user_info($_SESSION['username'], $_SESSION['user_id']);

			$this->load->model('joined_model');

			$data['students_count'] = count($this->joined_model->select_teacher_students($_SESSION['user_id']));
			$data['exam_count'] = count($this->joined_model->teacher_exam_result($_SESSION['user_id']));
			$data['active_class_count'] = count($this->joined_model->get_active_class_info($_SESSION['user_id']));
			$data['teacher_class_count'] = count($this->joined_model->get_all_class_info($_SESSION['user_id']));

			$this->load->model('st_class_model');
			$data['pass_exam_count'] = count($this->st_class_model->pass_st());
			$data['fail_exam_count'] = count($this->st_class_model->fail_st());

			$this->load->view('dashboard', $data);

		} else {
			redirect('login');
		}
	}
}
