<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabel_d4 extends CI_Model
{
	public function get_all_d4()
	{
		$this->db->where('deleted_at', NULL);
		$this->db->order_by($this->aliases['tabel_d4_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_d4']);
	}
	
	public function get_all_d4_archive()
	{
		$this->db->where('deleted_at IS NOT NULL');
		$this->db->order_by($this->aliases['tabel_d4_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_d4']);
	}
	
	public function get_d4_by_field($fields, $params)
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
		$this->db->order_by($this->aliases['tabel_d4_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_d4']);
	}
	
	public function get_d4_by_field_archive($fields, $params)
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
		$this->db->order_by($this->aliases['tabel_d4_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_d4']);
	}

	public function insert_d4($data)
	{
		return $this->db->insert($this->aliases['tabel_d4'], $data);
	}

	public function update_d4($data, $param1)
	{
		$this->db->where($this->aliases['tabel_d4_field1'], $param1);
		return $this->db->update($this->aliases['tabel_d4'], $data);
	}

	public function delete_d4_by_field($fields, $params)
	{
		if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}

		return $this->db->delete($this->aliases['tabel_d4']);
	}
}
