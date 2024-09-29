<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_b2 extends CI_Model
{
	public function get_all_b2()
	{
		$this->db->order_by($this->aliases['tabel_b2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b2']);
	}

	public function get_b2_by_b7_field1($param1)
	{
		$this->db->where($this->aliases['tabel_b7_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_b2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b2']);
	}

	public function get_b7_aktif($param1)
	{
		$this->db->where($this->aliases['tabel_b2_field6'], $this->aliases['tabel_b2_field6_value1']);
		$this->db->where($this->aliases['tabel_b2_field7'], $param1);
		$this->db->order_by($this->aliases['tabel_b2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b2']);
	}

	public function filter($param1)
	{
		$this->db->where($this->aliases['tabel_b2_field7'], $param1);
		$this->db->order_by($this->aliases['tabel_b2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b2']);
	}

	public function get_b2_by_b2_field1($param1)
	{
		$this->db->where($this->aliases['tabel_b2_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_b2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b2']);
	}

	public function get_b2_by_b2_field2($param1)
	{
		$this->db->where($this->aliases['tabel_b2_field2'], $param1);
		$this->db->order_by($this->aliases['tabel_b2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b2']);
	}

	public function insert_b2($data)
	{
		return $this->db->insert($this->aliases['tabel_b2'], $data);
	}

	public function update_b2($data, $param1)
	{
		$this->db->where($this->aliases['tabel_b2_field1'], $param1);
		return $this->db->update($this->aliases['tabel_b2'], $data);
	}

	public function delete_b2($param1)
	{
		$this->db->where($this->aliases['tabel_b2_field1'], $param1);
		return $this->db->delete($this->aliases['tabel_b2']);
	}

	public function delete_b2_by_b2_field7($param1)
	{
		$this->db->where($this->aliases['tabel_b1_field7'], $param1);
		return $this->db->delete($this->aliases['tabel_b2']);
	}
}
