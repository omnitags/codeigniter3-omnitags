<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_b5 extends CI_Model
{
	public function ambildata()
	{
		$this->db->order_by($this->aliases['tabel_b5_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b5']);
	}

	public function ambil_tabel_a1_field1($param1)
	{
		$this->db->where($this->aliases['tabel_a1_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_b5_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b5']);
	}

	public function ambil_tabel_b5_field1($param1)
	{
		$this->db->where($this->aliases['tabel_b5_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_b5_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_b5']);
	}

	public function simpan($data)
	// public function simpan($query)
	{
		// include "application/config/database.php";
		// return mysqli_query($db(''), $query);
		return $this->db->insert($this->aliases['tabel_b5'], $data);
	}

	public function update($data, $param1)
	{
		$this->db->where($this->aliases['tabel_b5_field1'], $param1);
		return $this->db->update($this->aliases['tabel_b5'], $data);
	}

	public function update_tabel_e3_field7($data, $param1, $param2)
	{
		$this->db->where($this->aliases['tabel_b5_field2'], $param1);
		$this->db->where($this->aliases['tabel_b5_field5'], $param2);
		return $this->db->update($this->aliases['tabel_b5'], $data);
	}

	public function hapus($param1)
	{
		$this->db->where($this->aliases['tabel_b5_field1'], $param1);
		return $this->db->delete($this->aliases['tabel_b5']);
	}
}
