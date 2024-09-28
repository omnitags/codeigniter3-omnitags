<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabel_e4 extends CI_Model
{
	public function get_all_e4()
	{
		$this->db->where('deleted_at', NULL);
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_e4']);
	}
	
	public function get_all_e4_archive()
	{
		$this->db->where('deleted_at IS NOT NULL');
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_e4']);
	}
	
	public function get_e4_by_field($fields, $params)
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
		return $this->db->get($this->aliases['tabel_e4']);
	}

	public function get_e4_by_field_archive($fields, $params)
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
		return $this->db->get($this->aliases['tabel_e4']);
	}

	public function getCharttabel_f2()
	{
		// Query to fetch data from the database
		$query = $this->db->query("SELECT t6.{$this->aliases['tabel_e4_field2']} AS label, 
		COUNT(t8.id) AS value
		FROM {$this->aliases['tabel_e4']} AS t6
        LEFT JOIN {$this->aliases['tabel_f2']} AS t8 
		ON t6.id = t8.id
        GROUP BY t6.id");

		// Convert query result to associative array
		$result = $query->result_array();

		return $result;
	}

	public function getCharttabel_f1()
	{
		// Query to fetch data from the database
		$query = $this->db->query("SELECT t6.{$this->aliases['tabel_e4_field2']} AS label, 
		COUNT(t2.{$this->aliases['tabel_f1_field2']}) AS value
		FROM {$this->aliases['tabel_e4']} AS t6
		LEFT JOIN {$this->aliases['tabel_f1']} AS t2 
		ON t6.id = t2.{$this->aliases['tabel_f2_field3']}
		GROUP BY t6.id;");

		// Convert query result to associative array
		$result = $query->result_array();

		return $result;
	}

	public function insert_e4($data)
	// public function insert_e4($query)
	{
		// include "application/config/database.php";
		// return mysqli_query($db(''), $query);
		return $this->db->insert($this->aliases['tabel_e4'], $data);
	}

	public function update_e4($data, $param1)
	{
		$this->db->where('id', $param1);
		return $this->db->update($this->aliases['tabel_e4'], $data);
	}

	public function delete_e4_by_field($fields, $params)
	{
		if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}

		return $this->db->delete($this->aliases['tabel_e4']);
	}
}
