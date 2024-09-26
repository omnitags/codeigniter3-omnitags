<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Declaring class the model
class Tabel_a1 extends CI_Model
{
	// Get all data
	public function get_all_a1()
	{
		$this->db->where('deleted_at', NULL);
		$this->db->order_by($this->aliases['tabel_a1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_a1']);
	}
	
	public function get_all_a1_archive()
	{
		$this->db->where('deleted_at IS NOT NULL');
		$this->db->order_by($this->aliases['tabel_a1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_a1']);
	}
	
	public function get_a1_by_field($fields, $params)
	{
		if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}

		$this->db->where('deleted_at', NULL);
		$this->db->order_by($this->aliases['tabel_a1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_a1']);
	}
	
	public function get_a1_by_field_archive($params, $fields)
	{
		if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}
		
		$this->db->where('deleted_at IS NOT NULL');
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
	public function delete_a1_by_field($fields, $params)
	{
		if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}

		return $this->db->delete($this->aliases['tabel_a1']);
	}
}
