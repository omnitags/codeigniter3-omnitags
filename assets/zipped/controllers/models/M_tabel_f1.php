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

	// Retrieves records from the tabel_f1 table joined with tabel_e4 table, ordered by tabel_f1_field1 in descending order
	public function get_f1_with_e4()
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_f1']} 
		JOIN {$this->aliases['tabel_e4']} 
		ON {$this->aliases['tabel_f1']}.{$this->aliases['tabel_e4_field1']} = {$this->aliases['tabel_e4']}.{$this->aliases['tabel_e4_field1']}
		ORDER BY {$this->aliases['tabel_f1_field1']} DESC";
		return $this->db->query($sql);
	}

	// Retrieves records from the tabel_f1 table joined with tabel_e4 table, filtered by tabel_f1_field1, ordered by tabel_f1_field1 in descending order
	public function get_f1_with_e4_by_f1_field1($param1)
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_f1']} 
		JOIN {$this->aliases['tabel_e4']} 
		ON {$this->aliases['tabel_f1']}.{$this->aliases['tabel_e4_field1']} = {$this->aliases['tabel_e4']}.{$this->aliases['tabel_e4_field1']}
		WHERE {$this->aliases['tabel_f1']}.{$this->aliases['tabel_f1_field1']} = {$param1}
		ORDER BY {$this->aliases['tabel_f1_field1']} DESC";
		return $this->db->query($sql);
	}

	// Retrieves records from the tabel_f1 table joined with tabel_e4 table, filtered by tabel_c2_field1, ordered by tabel_f1_field1 in descending order
	public function get_f1_with_e4_by_c2_field1($param1)
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_f1']} 
		JOIN {$this->aliases['tabel_e4']} 
		ON {$this->aliases['tabel_f1']}.{$this->aliases['tabel_e4_field1']} = {$this->aliases['tabel_e4']}.{$this->aliases['tabel_e4_field1']}
		WHERE {$this->aliases['tabel_f1']}.{$this->aliases['tabel_c2_field1']} = {$param1}
		ORDER BY {$this->aliases['tabel_f1_field1']} DESC";
		return $this->db->query($sql);
	}

	// Retrieves records from the tabel_f1 table joined with tabel_f3 and tabel_e4 tables, filtered by tabel_f1_field1, ordered by tabel_f3_field1 in descending order
	public function get_f1_with_f3_with_e4_by_f1_field1($param1)
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_f1']} 
		LEFT JOIN {$this->aliases['tabel_f3']} 
		ON {$this->aliases['tabel_f1']}.{$this->aliases['tabel_f3_field4']} = {$this->aliases['tabel_f3']}.{$this->aliases['tabel_f3_field4']}
		LEFT JOIN {$this->aliases['tabel_e4']} 
		ON {$this->aliases['tabel_f1']}.{$this->aliases['tabel_e4_field1']} = {$this->aliases['tabel_e4']}.{$this->aliases['tabel_e4_field1']}
		WHERE {$this->aliases['tabel_f1']}.{$this->aliases['tabel_f1_field1']} = {$param1}
		ORDER BY {$this->aliases['tabel_f3_field1']} DESC";
		return $this->db->query($sql);
	}

	// Retrieves records from the tabel_f1 table joined with tabel_f3 and tabel_e4 tables, filtered by tabel_f3_field1, ordered by tabel_f3_field1 in descending order
	public function get_f1_with_f3_with_e4_by_f3_field1($param1)
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_f1']} 
		LEFT JOIN {$this->aliases['tabel_f3']} 
		ON {$this->aliases['tabel_f1']}.{$this->aliases['tabel_f3_field4']} = {$this->aliases['tabel_f3']}.{$this->aliases['tabel_f3_field4']}
		LEFT JOIN {$this->aliases['tabel_e4']} 
		ON {$this->aliases['tabel_f1']}.{$this->aliases['tabel_e4_field1']} = {$this->aliases['tabel_e4']}.{$this->aliases['tabel_e4_field1']}
		WHERE {$this->aliases['tabel_f3']}.{$this->aliases['tabel_f3_field1']} = {$param1}
		ORDER BY {$this->aliases['tabel_f3_field1']} DESC";
		return $this->db->query($sql);
	}

	// Retrieves records from the tabel_f1 table joined with tabel_f3 and tabel_e4 tables, filtered by tabel_c2_field1, ordered by tabel_f3_field1 in descending order
	public function get_f1_with_f3_with_e4_by_c2_field1($param1)
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_f1']} 
		JOIN {$this->aliases['tabel_f3']} 
		ON {$this->aliases['tabel_f1']}.{$this->aliases['tabel_f3_field4']} = {$this->aliases['tabel_f3']}.{$this->aliases['tabel_f3_field4']}
		JOIN {$this->aliases['tabel_e4']} 
		ON {$this->aliases['tabel_f1']}.{$this->aliases['tabel_e4_field1']} = {$this->aliases['tabel_e4']}.{$this->aliases['tabel_e4_field1']}
		WHERE {$this->aliases['tabel_f3']}.{$this->aliases['tabel_c2_field1']} = {$param1}
		ORDER BY {$this->aliases['tabel_f3_field1']} DESC";
		return $this->db->query($sql);
	}	

	// Retrieves records from the tabel_f1 table filtered by tabel_f1_field1, ordered by tabel_f1_field1 in descending order
	public function get_f1_by_f1_field1($param1)
	{
		$this->db->where($this->aliases['tabel_f1_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_f1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_f1']);
	}

	// Retrieves records from the tabel_f1 table filtered by tabel_c2_field1, ordered by tabel_c2_field1 in descending order
	public function get_f1_by_c2_field1($param1)
	{
		$this->db->where($this->aliases['tabel_c2_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_c2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_f1']);
	}

	// Retrieves records from the tabel_f1 table filtered by tabel_f1_field2, ordered by tabel_f1_field2 in descending order
	public function get_f1_by_f1_field2($param1)
	{
		$this->db->where($this->aliases['tabel_f1_field2'], $param1);
		$this->db->order_by($this->aliases['tabel_f1_field2'], 'DESC');
		return $this->db->get($this->aliases['tabel_f1']);
	}


	// Eventhought the codes below works, there's still flasws inside the code
	// To apply the filter, I actualy have two options, 
	// first, is to make the filter must be fill altogether so that the filter will perfectly work,
	// but it will make the website seems a bit messy and a lot of codes
	// second, is to make the a dropdown or a toggle that can switch between cek in or cek out filter
	// three, is to make a javascript that can switch the button from the one that using the filter function with OR 
	// and the filter function with AND, with that, the fiter will be fine
	
	// Retrieves records from the tabel_f1 table filtered by a range of values for tabel_f1_field11 and tabel_f1_field12, ordered by tabel_f1_field1 in descending order
	public function filter($param1, $param2, $param3, $param4)
	{
		$filter = "SELECT * FROM {$this->aliases['tabel_f1']} WHERE 
		
		{$this->aliases['tabel_f1_field11']} BETWEEN '$param1' AND '$param2'
		 OR 
		 {$this->aliases['tabel_f1_field12']} BETWEEN '$param3' AND '$param4'
		ORDER BY {$this->aliases['tabel_f1_field1']} DESC";
		return $this->db->query($filter);
	}

	// Retrieves records from the tabel_f1 table joined with tabel_e4 table, filtered by tabel_f1_field3, tabel_c2_field1, and a range of values for tabel_f1_field11 and tabel_f1_field12, ordered by tabel_f1_field1 in descending order
	public function filter_user_with_e4($param1, $param2, $param3, $param4, $param5)
	{
		$filter = "SELECT * FROM {$this->aliases['tabel_f1']}
		JOIN {$this->aliases['tabel_e4']} 
		ON {$this->aliases['tabel_f1']}.{$this->aliases['tabel_e4_field1']} = {$this->aliases['tabel_e4']}.{$this->aliases['tabel_e4_field1']}
		WHERE {$this->aliases['tabel_f1']}.{$this->aliases['tabel_f1_field3']} = {$param1}
		AND
		{$this->aliases['tabel_c2_field1']} IN ($param5) AND
		{$this->aliases['tabel_f1_field11']} BETWEEN '$param1' AND '$param2'
		OR
		{$this->aliases['tabel_f1_field12']} BETWEEN '$param3' AND '$param4'
		ORDER BY {$this->aliases['tabel_f1_field1']} DESC";
		return $this->db->query($filter);
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
	public function delete_f1($param1)
	{
		$this->db->where($this->aliases['tabel_f1_field1'], $param1);
		return $this->db->delete($this->aliases['tabel_f1']);
	}
}
