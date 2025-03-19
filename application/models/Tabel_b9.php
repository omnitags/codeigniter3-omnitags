<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabel_b9 extends CI_Model
{
	public function get_all_b9()
	{
		$this->db->where('deleted_at', NULL);
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_b9']);
	}

	public function get_all_b9_archive()
	{
		$this->db->where('deleted_at IS NOT NULL');
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_b9']);
	}

	public function get_b9_by_field($fields, $params)
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
		return $this->db->get($this->aliases['tabel_b9']);
	}

	public function get_b9_by_field_archive($fields, $params)
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
		return $this->db->get($this->aliases['tabel_b9']);
	}

	// 	This is a method in a PHP model class that retrieves a limited number of records 
	// from two related tables (tabel_b9 and tabel_b8) based on a given parameter _by_field($fields, $params).
	// The SQL query selects all columns from tabel_b9 and tabel_b8 
	// and joins them on where the tabel_b9_field2 column in tabel_b9 matches the given parameter. 
	// The results are ordered by a case statement that puts rows with a null read_at value first,
	// followed then by read_at in descending order, and finally by tabel_b9_field1 in descending order. 
	// The LIMIT 15 clause limits the number of results to 15.
	// The method returns the result of the query, which is a CI_DB_mysqli_result object.

	public function get_b9_with_b8_limit($param1)
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_b9']} 
		JOIN {$this->aliases['tabel_b8']} 
		ON {$this->aliases['tabel_b9']}.{$this->aliases['tabel_b9_field3']} = {$this->aliases['tabel_b8']}.{$this->aliases['tabel_b8_field2']}
		WHERE {$this->aliases['tabel_b9']}.{$this->aliases['tabel_b9_field2']} = '$param1'
		ORDER BY CASE WHEN read_at IS NULL THEN 0
		ELSE 1 END, read_at DESC, {$this->aliases['tabel_b9']}.id DESC LIMIT 15";
		return $this->db->query($sql);
	}

	public function get_b9_with_b8_by_b9_field2($param1)
	{
		$sql = "SELECT 

		{$this->aliases['tabel_b9']}.id, 
		{$this->aliases['tabel_b9']}.{$this->aliases['tabel_b9_field4']}, 
		{$this->aliases['tabel_b9']}.created_at, 
		{$this->aliases['tabel_b9']}.read_at, 
		{$this->aliases['tabel_b8']}.{$this->aliases['tabel_b8_field3']}

		FROM {$this->aliases['tabel_b9']}
		JOIN {$this->aliases['tabel_b8']}

		ON {$this->aliases['tabel_b9']}.{$this->aliases['tabel_b9_field3']} =
		 {$this->aliases['tabel_b8']}.{$this->aliases['tabel_b8_field2']}

		WHERE {$this->aliases['tabel_b9']}.{$this->aliases['tabel_b9_field2']} = '$param1'
		AND {$this->aliases['tabel_b9']}.deleted_at IS NULL
		ORDER BY CASE WHEN read_at IS NULL THEN 0
		ELSE 1 END, read_at DESC, id DESC";
		return $this->db->query($sql);
	}

	public function insert_b9($data)
	// public function insert_b9($query)
	{
		// include "application/config/database.php";
		// return mysqli_query($db(''), $query);
		return $this->db->insert($this->aliases['tabel_b9'], $data);
	}

	public function update_b9($data, $param1)
	{
		$this->db->where('id', $param1);
		return $this->db->update($this->aliases['tabel_b9'], $data);
	}

	public function update_null($data, $param1)
	{
		$this->db->where('read_at', NULL);
		$this->db->where($this->aliases['tabel_b9_field2'], $param1);
		return $this->db->update($this->aliases['tabel_b9'], $data);
	}

	public function update_satu($data, $param1, $param2)
	{
		$this->db->where('id', $param1);
		$this->db->where($this->aliases['tabel_b9_field2'], $param2);
		return $this->db->update($this->aliases['tabel_b9'], $data);
	}

	public function delete_b9_by_field($fields, $params)
	{
		if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}

		return $this->db->delete($this->aliases['tabel_b9']);
	}
}
