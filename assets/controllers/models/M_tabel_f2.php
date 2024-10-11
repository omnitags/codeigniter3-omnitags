<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_f2 extends CI_Model
{
	public function ambildata()
	{
		$this->db->order_by($this->aliases['tabel_f2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_f2']);
	}

	public function ambil_tabel_f2_field1($param1)
	{
		$this->db->where($this->aliases['tabel_f2_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_f2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_f2']);
	}

	public function ambil_tabel_e3_field1($param1)
	{
		$this->db->where($this->aliases['tabel_e3_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_f2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_f2']);
	}

	public function ambil_tabel_f2_field2($param1)
	{
		$this->db->where($this->aliases['tabel_f2_field2'], $param1);
		$this->db->order_by($this->aliases['tabel_f2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_f2']);
	}

	public function ambil_tabel_c1_field1($param1)
	{
		$this->db->where($this->aliases['tabel_f2_field2'], $param1);
		$this->db->order_by($this->aliases['tabel_f2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_f2']);
	}

	public function ambil_tabel_c2_field1($param1)
	{
		$this->db->where($this->aliases['tabel_c2_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_c2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_f2']);
	}

	public function ambil_tabel_c2_field3($param1)
	{
		$this->db->where($this->aliases['tabel_c2_field3'], $param1);
		$this->db->order_by($this->aliases['tabel_c2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_f2']);
	}

	public function cari($param1, $param2)
	{
		$this->db->where($this->aliases['tabel_f2_field1'], $param1);
		$this->db->where($this->aliases['tabel_c2_field3'], $param2);
		$this->db->order_by($this->aliases['tabel_f2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_f2']);
	}

	public function filter($param1, $param2, $param3, $param4)
	{
		$filter = "SELECT * FROM {$this->aliases['tabel_f2']} WHERE 
		
		{$this->aliases['tabel_f2_field10']} BETWEEN '$param1' AND '$param2'
		OR {$this->aliases['tabel_f2_field11']} BETWEEN '$param3' AND '$param4'
		ORDER BY {$this->aliases['tabel_f2_field1']} DESC";
		return $this->db->query($filter);
	}

	public function filter_tabel_c2($param1, $param2)
	{
		$filter = "SELECT * FROM {$this->aliases['tabel_f3']} WHERE 
		{$this->aliases['tabel_c2_field1']} IN ($param2) AND
		{$this->aliases['tabel_c2_field1']} LIKE  '%$param1%' ORDER BY {$this->aliases['tabel_c2_field1']} DESC";
		return $this->db->query($filter);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->aliases['tabel_f2'], $data);
	}

	public function update($data, $param1)
	{
		$this->db->where($this->aliases['tabel_f2_field1'], $param1);
		return $this->db->update($this->aliases['tabel_f2'], $data);
	}

	public function hapus($param1)
	{
		$sql = "DELETE FROM {$this->aliases['tabel_f2']} WHERE {$this->aliases['tabel_f2_field1']} =  $param1;";
		return $this->db->query($sql);
	}

	public function hapus_status($param12)
	{

		$this->db->where($this->aliases['tabel_f2_field12'], $param12);
		return $this->db->delete($this->aliases['tabel_f2']);
	}
}
