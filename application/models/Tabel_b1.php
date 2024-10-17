<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabel_b1 extends CI_Model
{
	// Retrieves all records from the tabel_b1 table in descending order of tabel_b1_field1
	public function get_all_b1()
	{
		$this->db->where('deleted_at', NULL);
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_b1']);
	}

	public function get_all_b1_archive()
	{
		$this->db->where('deleted_at IS NOT NULL');
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_b1']);
	}

	// Retrieves records from the tabel_b1 table where tabel_b1_field7 equals $param1 and tabel_b1_field2 equals $param2, in descending order of tabel_b1_field1
	public function dekor($param1, $param2)
	{
		$this->db->where($this->aliases['tabel_b1_field7'], $param1);
		$this->db->where($this->aliases['tabel_b1_field2'], $param2);
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_b1']);
	}

	public function get_b1_by_field($fields, $params)
	{
		if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}

		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_b1']);
	}

	public function get_b1_by_field_archive($fields, $params)
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
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_b1']);
	}

	// Inserts a new record into the tabel_b1 table
	public function insert_b1($data)
	{
		return $this->db->insert($this->aliases['tabel_b1'], $data);
	}

	// Updates a record in the tabel_b1 table where tabel_b1_field1 equals $param1
	public function update_b1($data, $param1)
	{
		$this->db->where('id', $param1);
		return $this->db->update($this->aliases['tabel_b1'], $data);
	}

	// Updates all records in the tabel_b1 table
	public function update_all_b1($data)
	{
		return $this->db->update($this->aliases['tabel_b1'], $data);
	}

	// Deletes a record from the tabel_b1 table where tabel_b1_field1 equals $param1
	public function delete_b1_by_field($fields, $params)
	{
		if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}

		return $this->db->delete($this->aliases['tabel_b1']);
	}
}

