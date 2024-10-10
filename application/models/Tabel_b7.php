<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabel_b7 extends CI_Model
{
	public function get_all_b7()
	{
		$this->db->where('deleted_at', NULL);
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_b7']);
	}
	
	public function get_all_b7_archive()
	{
		$this->db->where('deleted_at IS NOT NULL');
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_b7']);
	}
	
	public function get_b7_by_field($fields, $params)
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
		return $this->db->get($this->aliases['tabel_b7']);
	}
	
	public function get_b7_by_field_archive($fields, $params)
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
		return $this->db->get($this->aliases['tabel_b7']);
	}

	public function theme($param1)
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_a1']} 
		JOIN {$this->aliases['tabel_b7']} 
		ON {$this->aliases['tabel_a1']}.{$this->aliases['tabel_a1_field6']} = {$this->aliases['tabel_b7']}.id
		WHERE {$this->aliases['tabel_a1']}.id = $param1";
		return $this->db->query($sql);
	}

	public function insert_b7($data)
	// public function insert_b7($query)
	{
		// include "application/config/database.php";
		// return mysqli_query($db(''), $query);
		return $this->db->insert($this->aliases['tabel_b7'], $data);
	}

	public function update_b7($data, $param1)
	{
		$this->db->where('id', $param1);
		return $this->db->update($this->aliases['tabel_b7'], $data);
	}

	public function delete_b7_by_field($fields, $params)
	{
		if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}

		return $this->db->delete($this->aliases['tabel_b7']);
	}
}
