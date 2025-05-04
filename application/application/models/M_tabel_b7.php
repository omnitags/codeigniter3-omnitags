<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_b7 extends CI_Model
{
	public function get_all_b7()
	{
		$this->db->order_by($this->aliases['tabel_b7_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b7']);
	}

	public function tema($param1)
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_a1']} 
		JOIN {$this->aliases['tabel_b7']} 
		ON {$this->aliases['tabel_a1']}.{$this->aliases['tabel_a1_field6']} = {$this->aliases['tabel_b7']}.{$this->aliases['tabel_b7_field1']}
		WHERE {$this->aliases['tabel_a1']}.{$this->aliases['tabel_a1_field1']} = $param1";
		return $this->db->query($sql);
	}

	public function get_b7_by_a1_field1($param1)
	{
		$this->db->where($this->aliases['tabel_b7_field2'], $param1);
		$this->db->order_by($this->aliases['tabel_b7_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b7']);
	}

	public function get_b7_by_b7_field1($param1)
	{
		$this->db->where($this->aliases['tabel_b7_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_b7_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b7']);
	}

	public function get_b7_by_b7_field2($param1)
	{
		$this->db->where($this->aliases['tabel_b7_field2'], $param1);
		$this->db->order_by($this->aliases['tabel_b7_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b7']);
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
		$this->db->where($this->aliases['tabel_b7_field1'], $param1);
		return $this->db->update($this->aliases['tabel_b7'], $data);
	}

	public function delete_b7($param1)
	{
		$this->db->where($this->aliases['tabel_b7_field1'], $param1);
		return $this->db->delete($this->aliases['tabel_b7']);
	}
}
