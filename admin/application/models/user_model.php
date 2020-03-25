<?php

class User_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_user_info($username, $user_id)
	{
		$this->db->select('*');
		$where = "username='$username' OR phone='$username' AND user_id='$user_id' AND role='admin' AND status='1' ";
		$this->db->where($where);
		$this->db->from('tbl_user');

		$query = $this->db->get();
		return $query->result();
	}

	function select_valid_user($username, $password)
	{

		$this->db->select('*');
		$this->db->where('username', "$username");
		$this->db->where('password', "$password");
		$this->db->where('role', "admin");
		$this->db->from('tbl_user');

		$query = $this->db->get();
		return $query->result();

	}

	function find_user($user_id)
	{
		$this->db->select('*');
		$this->db->where('user_id', "$user_id");
		$this->db->from('tbl_user');

		$query = $this->db->get();
		return $query->result();
	}

	function delete_user($id)
	{
		$this->db->where('user_id', $id);
		$query = $this->db->delete('tbl_user');
		return $query;
	}

	function change_password($password1, $user_id)
	{
		$this->db->set('password', $password1);
		$this->db->where('user_id', $user_id);
		$this->db->update('tbl_user');
	}

	function insert_user($data)
	{
		$this->db->insert('tbl_user', $data);
	}

	function select_by_pointer($pointer)
	{
		$this->db->select('*');
		$this->db->where('pointer', "$pointer");
		$this->db->from('tbl_user');

		$query = $this->db->get();
		return $query->result();
	}

	function update_user($user_id, $data)
	{
		$this->db->where('user_id', $user_id);
		$this->db->update('tbl_user', $data);
	}

	/*********************/
	/* teacher functions */
	/*********************/

	function select_teachers()
	{
		$this->db->select('*');
		$this->db->where('role', 'teacher');
		$this->db->from('tbl_user');

		$query = $this->db->get();
		return $query->result();
	}

	//from select_active_tch to select_active_teachers
	function select_active_teachers()
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('role', 'teacher');
		$this->db->where('status', '1');

		$query = $this->db->get();
		return $query->result();
	}


//	function update_teacher($user_id , $data){
//		$this->db->where('user_id', $user_id);
//		$this->db->where('role', 'teacher');
//		$this->db->update('tbl_user', $data);
//	}


// from select_tch to select_teacher_by_id
	function select_teacher_by_id($user_id)
	{
		$this->db->select('*');
		$this->db->where('user_id', $user_id);
		$this->db->where('role', 'teacher');
		$this->db->from('tbl_user');

		$query = $this->db->get();
		return $query->result();
	}

	// select_inactive_tch : select_inactive_teachers
	function select_inactive_teachers()
	{
		$this->db->select('*');
		$this->db->where('role', 'teacher');
		$this->db->where('status', '0');
		$this->db->from('tbl_user');

		$query = $this->db->get();
		return $query->result();
	}

	/*********************/
	/* student functions */
	/*********************/

	function select_students()
	{
		$this->db->select('*');
		$this->db->where('role', 'student');
		$this->db->from('tbl_user');

		$query = $this->db->get();
		return $query->result();
	}

//	function update_student($user_id , $data){
//		$query = $this->db->update('tbl_user', $data,"user_id = $user_id");
//		return $query;
//	}

//select_st: select_student_by_id
	function select_student_by_id($id)
	{
		$this->db->select('*');
		$this->db->where('user_id', $id);
		$this->db->where('role', 'student');
		$this->db->from('tbl_user');

		$query = $this->db->get();
		return $query->result();
	}

//select_st_by_username : select_student_by_username
	function select_student_by_username($username)
	{
		$this->db->select('*');
		$this->db->where('username', $username);
		$this->db->where('role', 'student');
		$this->db->from('tbl_user');

		$query = $this->db->get();
		return $query->result();
	}
}
