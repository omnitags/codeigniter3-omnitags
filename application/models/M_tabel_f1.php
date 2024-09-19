<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_f1 extends CI_Model
{
	// Retrieves all records from the tabel_f1 table in descending order of tabel_f1_field1
	public function get_all_f1()
	{
		$this->db->order_by($this->aliases['tabel_f1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_f1']);
	}

	public function get_f1_by_field($fields, $params)
	{
		if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}

		$this->db->order_by($this->aliases['tabel_f1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_f1']);
	}

	// Inserts a new record into the tabel_f1 table
	public function insert_f1($data)
	{
		return $this->db->insert($this->aliases['tabel_f1'], $data);
	}

	// Updates a record in the tabel_f1 table based on the value of tabel_f1_field2
	public function update_f1($data, $param1)
	{
		$this->db->where($this->aliases['tabel_f1_field2'], $param1);
		return $this->db->update($this->aliases['tabel_f1'], $data);
	}

	// Updates a record in the tabel_f1 table based on the value of tabel_f1_field2
	public function update_f1_by_f1_field2($data, $param1)
	{
		$this->db->where($this->aliases['tabel_f1_field2'], $param1);
		return $this->db->update($this->aliases['tabel_f1'], $data);
	}

	// Deletes a record from the tabel_f1 table based on the value of tabel_f1_field1
	public function delete_f1_by_fields($fields, $params)
	{
		if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}

		return $this->db->delete($this->aliases['tabel_f1']);
	}
}
