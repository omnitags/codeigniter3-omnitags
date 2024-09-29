<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_e4 extends CI_Model
{
	public function get_all_e4()
	{
		$this->db->order_by($this->aliases['tabel_e4_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_e4']);
	}

	public function getCharttabel_f2()
	{
		// Query to fetch data from the database
		$query = $this->db->query("SELECT t6.{$this->aliases['tabel_e4_field2']} AS label, 
		COUNT(t8.{$this->aliases['tabel_f2_field1']}) AS value
		FROM {$this->aliases['tabel_e4']} AS t6
        LEFT JOIN {$this->aliases['tabel_f2']} AS t8 
		ON t6.{$this->aliases['tabel_e4_field1']} = t8.{$this->aliases['tabel_e4_field1']}
        GROUP BY t6.{$this->aliases['tabel_e4_field1']}");

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
		ON t6.{$this->aliases['tabel_e4_field1']} = t2.{$this->aliases['tabel_e4_field1']}
		GROUP BY t6.{$this->aliases['tabel_e4_field1']};");

		// Convert query result to associative array
		$result = $query->result_array();

		return $result;
	}

	public function get_e4_by_e4_field1($param1)
	{
		$this->db->where($this->aliases['tabel_e4_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_e4_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_e4']);
	}
	
	public function get_e4_by_e4_field9($param1)
	{
		$this->db->where($this->aliases['tabel_e4_field9'], $param1);
		$this->db->order_by($this->aliases['tabel_e4_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_e4']);
	}

	public function get_e4_by_e4_field2($param1)
	{
		$this->db->where($this->aliases['tabel_e4_field2'], $param1);
		$this->db->order_by($this->aliases['tabel_e4_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_e4']);
	}

	public function get_e4_field4_by_e4_field1($param1)
	{
		$this->db->where($this->aliases['tabel_e4_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_e4_field1'], 'DESC');
		$query = $this->db->get($this->aliases['tabel_e4']);

		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->{$this->aliases['tabel_e4_field4']};
		} else {
			return null; // or handle the case when no rows are found
		}
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
		$this->db->where($this->aliases['tabel_e4_field1'], $param1);
		return $this->db->update($this->aliases['tabel_e4'], $data);
	}

	public function delete_e4($param1)
	{
		$this->db->where($this->aliases['tabel_e4_field1'], $param1);
		return $this->db->delete($this->aliases['tabel_e4']);
	}
}
