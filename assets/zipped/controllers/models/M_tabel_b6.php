<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_b6 extends CI_Model
{
	public function get_all_b6()
	{
		$this->db->order_by($this->aliases['tabel_b6_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b6']);
	}

	public function filter($param1)
	{
		$this->db->where($this->aliases['tabel_b6_field7'], $param1);
		$this->db->order_by($this->aliases['tabel_b6_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b6']);
	}

	public function get_b6_by_b6_field7($param1)
	{
		$this->db->where($this->aliases['tabel_b6_field2'], $param1);
		$this->db->order_by($this->aliases['tabel_b6_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b6']);
	}

	public function get_b6_by_b6_field1($param1)
	{
		$this->db->where($this->aliases['tabel_b6_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_b6_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b6']);
	}

	
	public function get_b6_by_b6_field6_by_b6_field7($param1)
	{
		$this->db->where($this->aliases['tabel_b6_field7'], $param1);
		$this->db->where($this->aliases['tabel_b6_field6'], $this->aliases['tabel_b6_field6_value1']);
		$this->db->order_by($this->aliases['tabel_b6_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b6']);
	}

	public function insert_b6($data)
	// public function insert_b6($query)
	{
		// include "application/config/database.php";
		// return mysqli_query($db(''), $query);
		return $this->db->insert($this->aliases['tabel_b6'], $data);
	}

	public function update_b6($data, $param1)
	{
		$this->db->where($this->aliases['tabel_b6_field1'], $param1);
		return $this->db->update($this->aliases['tabel_b6'], $data);
	}
	public function delete_b6($param1)
	{
		$this->db->where($this->aliases['tabel_b6_field1'], $param1);
		return $this->db->delete($this->aliases['tabel_b6']);
	}
	
	public function delete_b6_by_b1_field7($param1)
	{
		$this->db->where($this->aliases['tabel_b1_field7'], $param1);
		return $this->db->delete($this->aliases['tabel_b6']);
	}
}
