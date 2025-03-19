<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabel_c2 extends CI_Model
{
	public function get_all_c2()
	{
		$this->db->where('deleted_at', NULL);
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_c2']);
	}

	public function get_all_c2_archive()
	{
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_c2']);
	}

	public function get_c2_by_field($fields, $params)
	{
		$this->db->where($fields, $params);
		$this->db->where('deleted_at', NULL);
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_c2']);
	}

	public function get_c2_by_field_special($fields, $params)
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
		return $this->db->get($this->aliases['tabel_c2']);
	}

	public function get_c2_by_field_archive($fields, $params)
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
		return $this->db->get($this->aliases['tabel_c2']);
	}

	public function ceklogin($param1, $param2)
	{
		$this->db->where('email', $param1);
		$this->db->where('password', $param2);
		$this->db->where('deleted_at', NULL);
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_c2']);
	}

	public function insert_c2($data)
	{
		return $this->db->insert($this->aliases['tabel_c2'], $data);
	}

	public function update_c2($data, $param1)
	{
		$this->db->where('id', $param1);
		return $this->db->update($this->aliases['tabel_c2'], $data);
	}

	public function updateCount($param1)
	{
		$this->db->set($this->aliases['tabel_c2_field7'], $this->aliases['tabel_c2_field7'] . ' + 1', FALSE);
		$this->db->where('id', $param1);
		return $this->db->update($this->aliases['tabel_c2']);
	}

	public function delete_c2_by_field($fields, $params)
	{
		if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}

		return $this->db->delete($this->aliases['tabel_c2']);
	}
}
