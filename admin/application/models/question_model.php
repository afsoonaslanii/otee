<?php

class Question_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function insert_question($data)
	{
		$q = $this->db->insert('tbl_question', $data);
		return $q;
	}

	function delete_question($question_id)
	{
		$this->db->where('question_id', $question_id);
		$query = $this->db->delete('tbl_question');
		return $query;
	}

	function select_question_by_id($exam_id)
	{
		$this->db->select('*');
		$this->db->where('exam_id', $exam_id);
		$this->db->from('tbl_question');

		$query = $this->db->get();
		return $query->result();
	}

	function select_question_by_question_id($question_id)
	{
		$this->db->select('*');
		$this->db->where('question_id', $question_id);
		$this->db->from('tbl_question');

		$query = $this->db->get();
		return $query->result();
	}

	function update_question_data($question_id, $data)
	{
		$this->db->where('question_id', $question_id);
		$this->db->update('tbl_question', $data);
	}

}
