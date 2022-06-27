<?php
class Users_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function show()
	{
		$query = $this->db->get('pegawai');
		return $query->result();
	}

	public function insert($user)
	{
		return $this->db->insert('pegawai', $user);
	}

	public function getuser($id)
	{
		$query = $this->db->get_where('pegawai', array('id' => $id));
		return $query->row_array();
	}

	public function updateuser($user, $id)
	{
		$this->db->where('pegawai.id', $id);
		return $this->db->update('pegawai', $user);
	}

	public function delete($id)
	{
		$this->db->where('pegawai.id', $id);
		return $this->db->delete('pegawai');
	}
}
