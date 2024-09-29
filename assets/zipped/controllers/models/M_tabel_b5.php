<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_b5 extends CI_Model
{
	public function get_all_b5()
	{
		$this->db->order_by($this->aliases['tabel_b5_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b5']);
	}

	public function filter($param1)
	{
		$this->db->where($this->aliases['tabel_b5_field7'], $param1);
		$this->db->order_by($this->aliases['tabel_b5_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b5']);
	}

	public function get_b5_by_a1_field1($param1)
	{
		$this->db->where($this->aliases['tabel_a1_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_b5_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b5']);
	}

	public function get_b5_by_b5_field6_by_b5_field7($param1)
	{
		$this->db->where($this->aliases['tabel_b5_field7'], $param1);
		$this->db->where($this->aliases['tabel_b5_field6'], $this->aliases['tabel_b5_field6_value1']);
		$this->db->order_by($this->aliases['tabel_b5_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b5']);
	}

	public function get_b5_by_b5_field1($param1)
	{
		$this->db->where($this->aliases['tabel_b5_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_b5_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b5']);
	}

	public function get_b5_by_b5_field7($param1)
	{
		$this->db->where($this->aliases['tabel_b5_field7'], $param1);
		$this->db->order_by($this->aliases['tabel_b5_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b5']);
	}

	public function insert_b5($data)
	// public function insert_b5($query)
	{
		// include "application/config/database.php";
		// return mysqli_query($db(''), $query);
		return $this->db->insert($this->aliases['tabel_b5'], $data);
	}

	public function update_b5($data, $param1)
	{
		$this->db->where($this->aliases['tabel_b5_field1'], $param1);
		return $this->db->update($this->aliases['tabel_b5'], $data);
	}

	public function update_all_b5($data)
	{
		return $this->db->update($this->aliases['tabel_b5'], $data);
	}

	public function delete_b5($param1)
	{
		$this->db->where($this->aliases['tabel_b5_field1'], $param1);
		return $this->db->delete($this->aliases['tabel_b5']);
	}
	
	public function delete_b5_by_b5_field7($param1)
	{
		$this->db->where($this->aliases['tabel_b1_field7'], $param1);
		return $this->db->delete($this->aliases['tabel_b5']);
	}
}
