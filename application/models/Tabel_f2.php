<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabel_f2 extends CI_Model
{
	public function get_all_f2()
	{
		$this->db->where('deleted_at', NULL);
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_f2']);
	}
	
	public function get_all_f2_archive()
	{
		$this->db->where('deleted_at IS NOT NULL');
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_f2']);
	}

	public function get_f2_by_field($fields, $params)
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
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_f2']);
	}

	public function get_f2_by_field_archive($fields, $params)
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
		return $this->db->get($this->aliases['tabel_f2']);
	}

	public function get_f2_with_e4()
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_f2']} 
		JOIN {$this->aliases['tabel_e4']} 
		ON {$this->aliases['tabel_f2']}.id = {$this->aliases['tabel_e4']}.id
		WHERE {$this->aliases['tabel_f2']}.deleted_at IS NULL
		ORDER BY id DESC";
		return $this->db->query($sql);
	}

	public function get_f2_with_f3_with_e4_by_f3_field1($param1)
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_f2']} 
		LEFT JOIN {$this->aliases['tabel_f3']} 
		ON {$this->aliases['tabel_f2']}.{$this->aliases['tabel_f3_field4']} = {$this->aliases['tabel_f3']}.{$this->aliases['tabel_f3_field4']}
		LEFT JOIN {$this->aliases['tabel_e4']} 
		ON {$this->aliases['tabel_f2']}.id = {$this->aliases['tabel_e4']}.id
		WHERE {$this->aliases['tabel_f3']}.id = {$param1}
		WHERE {$this->aliases['tabel_f2']}.deleted_at IS NULL
		ORDER BY id DESC";
		return $this->db->query($sql);
	}

	public function get_f2_with_e4_by_c2_field1($param1)
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_f2']} 
		JOIN {$this->aliases['tabel_e4']} 
		ON {$this->aliases['tabel_f2']}.id = {$this->aliases['tabel_e4']}.id
		WHERE {$this->aliases['tabel_f2']}.id = {$param1}
		WHERE {$this->aliases['tabel_f2']}.deleted_at IS NULL
		ORDER BY {$this->aliases['tabel_f2_field12']} DESC, id DESC";
		return $this->db->query($sql);
	}

	public function get_f2_with_e4_by_f2_field2($param1)
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_f2']} 
		JOIN {$this->aliases['tabel_e4']} 
		ON {$this->aliases['tabel_f2']}.id = {$this->aliases['tabel_e4']}.id
		WHERE {$this->aliases['tabel_f2']}.{$this->aliases['tabel_f2_field2']} = {$param1}
		WHERE {$this->aliases['tabel_f2']}.deleted_at IS NULL
		ORDER BY id DESC";
		return $this->db->query($sql);
	}

	public function get_f2_with_e4_by_f2_field1($param1)
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_f2']} 
		JOIN {$this->aliases['tabel_e4']} 
		ON {$this->aliases['tabel_f2']}.{$this->aliases['tabel_e4']} = {$this->aliases['tabel_e4']}.id
		WHERE {$this->aliases['tabel_f2']}.id = {$param1}
		WHERE {$this->aliases['tabel_f2']}.deleted_at IS NULL
		ORDER BY id DESC";
		return $this->db->query($sql);
	}

	public function filter_with_e4($param1, $param2, $param3, $param4)
	{
		$filter = "SELECT * FROM {$this->aliases['tabel_f2']} 
		JOIN {$this->aliases['tabel_e4']} 
		ON {$this->aliases['tabel_f2']}.id = {$this->aliases['tabel_e4']}.id
		WHERE {$this->aliases['tabel_f2_field10']} BETWEEN '$param1' AND '$param2'
		OR {$this->aliases['tabel_f2_field11']} BETWEEN '$param3' AND '$param4'
		WHERE {$this->aliases['tabel_f2']}.deleted_at IS NULL
		ORDER BY id DESC";
		return $this->db->query($filter);
	}
	
	public function filter_user_with_e4($param1, $param2, $param3, $param4, $param5)
	{
		$filter = "SELECT * FROM {$this->aliases['tabel_f2']} 
		JOIN {$this->aliases['tabel_e4']} 
		ON {$this->aliases['tabel_f2']}.id = {$this->aliases['tabel_e4']}.id 
		WHERE id IN ($param5) AND
		{$this->aliases['tabel_f2_field10']} BETWEEN '$param1' AND '$param2'
		OR {$this->aliases['tabel_f2_field11']} BETWEEN '$param3' AND '$param4'
		WHERE {$this->aliases['tabel_f2']}.deleted_at IS NULL
		ORDER BY id DESC";
		return $this->db->query($filter);
	}

	public function insert_f2($data)
	{
		return $this->db->insert($this->aliases['tabel_f2'], $data);
	}

	public function update_f2($data, $param1)
	{
		$this->db->where('id', $param1);
		return $this->db->update($this->aliases['tabel_f2'], $data);
	}

	public function delete_f2_by_field($fields, $params)
	{
		if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}

		return $this->db->delete($this->aliases['tabel_f2']);
	}
}
