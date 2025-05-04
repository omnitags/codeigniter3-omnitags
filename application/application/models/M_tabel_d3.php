<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_d3 extends CI_Model
{
	public function get_all_d3()
	{
		$this->db->order_by($this->aliases['tabel_d3_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_d3']);
	}

	public function get_d3_by_d3_field1($param1)
	{
		$this->db->where($this->aliases['tabel_d3_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_d3_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_d3']);
	}

	public function get_d3_by_c2_field1($param1)
	{
		$this->db->where($this->aliases['tabel_c2_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_d3_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_d3']);
	}

	public function insert_d3($data)
	{
		return $this->db->insert($this->aliases['tabel_d3'], $data);
	}

	public function update_d3($data, $param1)
	{
		$this->db->where($this->aliases['tabel_d3_field1'], $param1);
		return $this->db->update($this->aliases['tabel_d3'], $data);
	}

	public function delete_d3($param1)
	{
		$this->db->where($this->aliases['tabel_d3_field1'], $param1);
		return $this->db->delete($this->aliases['tabel_d3']);
	}
}
