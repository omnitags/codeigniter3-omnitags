<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabel_e3 extends CI_Model
{
	public function get_all_e3()
	{
		$this->db->where('deleted_at', NULL);
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_e3']);
	}

	public function get_all_e3_archive()
	{
		$this->db->where('deleted_at IS NOT NULL');
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_e3']);
	}

	public function get_e3_by_field($fields, $params)
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
		return $this->db->get($this->aliases['tabel_e3']);
	}

	public function get_e3_by_field_archive($fields, $params)
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
		return $this->db->get($this->aliases['tabel_e3']);
	}

	public function get_e3_with_e4()
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_e3']} 
		JOIN {$this->aliases['tabel_e4']} 
		ON {$this->aliases['tabel_e3']}.{$this->aliases['tabel_e3_field2']} = {$this->aliases['tabel_e4']}.id
		WHERE {$this->aliases['tabel_e3']}.deleted_at IS NULL
		ORDER BY {$this->aliases['tabel_e3']}.id DESC";
		return $this->db->query($sql);
	}

	public function insert_e3($data)
	{
		return $this->db->insert($this->aliases['tabel_e3'], $data);
	}

	public function update_e3($data, $param1)
	{
		$this->db->where('id', $param1);
		return $this->db->update($this->aliases['tabel_e3'], $data);
	}

	public function delete_e3_by_field($fields, $params)
	{
		if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}

		return $this->db->delete($this->aliases['tabel_e3']);
	}
}
