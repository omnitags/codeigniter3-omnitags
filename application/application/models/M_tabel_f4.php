<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_f4 extends CI_Model
{
	public function get_all_f4()
	{
		$this->db->order_by($this->aliases['tabel_f4_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_f4']);
	}

	public function get_f4_by_f4_field1($param1)
	{
		$this->db->where($this->aliases['tabel_f4_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_f4_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_f4']);
	}

	public function insert_f4($data)
	// public function insert_f4($query)
	{
		// include "application/config/database.php";
		// return mysqli_query($db(''), $query);
		return $this->db->insert($this->aliases['tabel_f4'], $data);
	}

	public function update_f4($data, $param1)
	{
		$this->db->where($this->aliases['tabel_f4_field1'], $param1);
		return $this->db->update($this->aliases['tabel_f4'], $data);
	}

	// public function delete_f4($param1)
	// {
	// 	$this->db->where($this->aliases['tabel_f4_field1'], $param1);
	// 	return $this->db->delete($this->aliases['tabel_f4']);
	// }
}
