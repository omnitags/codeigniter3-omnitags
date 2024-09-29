<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Declaring class the model
class M_tabel_a1 extends CI_Model
{
	// Get all data
	public function get_all_a1()
	{
		$this->db->order_by($this->aliases['tabel_a1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_a1']);
	}

	// Get the data by field1
	public function get_a1_by_a1_field1($param1)
	{
		$this->db->where($this->aliases['tabel_a1_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_a1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_a1']);
	}

	// Insert the data to the database
	public function insert_a1($data)
	{
		return $this->db->insert($this->aliases['tabel_a1'], $data);
	}

	// Update the data
	public function update_a1($data, $param1)
	{
		$this->db->where($this->aliases['tabel_a1_field1'], $param1);
		return $this->db->update($this->aliases['tabel_a1'], $data);
	}

	// Delete data
	public function delete_a1($param1)
	{
		$this->db->where($this->aliases['tabel_a1_field1'], $param1);
		return $this->db->delete($this->aliases['tabel_a1']);
	}
}
