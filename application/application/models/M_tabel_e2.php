<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_e2 extends CI_Model
{
	public function get_all_e2()
	{
		$this->db->order_by($this->aliases['tabel_e2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_e2']);
	}

	public function get_e2_by_e2_field1($param1)
	{
		$this->db->where($this->aliases['tabel_e2_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_e2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_e2']);
	}

	public function insert_e2($data)
	// public function insert_e2($query)
	{
		// include "application/config/database.php";
		// return mysqli_query($db(''), $query);
		return $this->db->insert($this->aliases['tabel_e2'], $data);
	}

	public function update_e2($data, $param1)
	{
		$this->db->where($this->aliases['tabel_e2_field1'], $param1);
		return $this->db->update($this->aliases['tabel_e2'], $data);
	}

	public function delete_e2($param1)
	{
		$this->db->where($this->aliases['tabel_e2_field1'], $param1);
		return $this->db->delete($this->aliases['tabel_e2']);
	}
}
