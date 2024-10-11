<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_c2 extends CI_Model
{
	public function ambildata()
	{
		$this->db->order_by($this->aliases['tabel_c2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_c2']);
	}

	public function ambil_tabel_c2_field1($param1)
	{
		$this->db->where($this->aliases['tabel_c2_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_c2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_c2']);
	}

	public function ambil_tabel_c1_field1($param1)
	{
		$this->db->where($this->aliases['tabel_c2_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_c2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_c2']);
	}

	public function ambil_tabel_e4_field1($param1)
	{
		$this->db->where($this->aliases['tabel_c2_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_c2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_c2']);
	}

	public function cek_tabel_c2_field3($param1)
	{
		$this->db->where($this->aliases['tabel_c2_field3'], $param1);
		$this->db->order_by($this->aliases['tabel_c2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_c2']);
	}

	public function ceklogin($param1, $param2)
	{
		$this->db->where($this->aliases['tabel_c2_field3'], $param1);
		$this->db->where($this->aliases['tabel_c2_field4'], $param2);
		$this->db->order_by($this->aliases['tabel_c2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_c2']);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->aliases['tabel_c2'], $data);
	}

	public function update($data, $param1)
	{
		$this->db->where($this->aliases['tabel_c2_field1'], $param1);
		return $this->db->update($this->aliases['tabel_c2'], $data);
	}

	public function updateCount($param1)
	{
		$this->db->set($this->aliases['tabel_c2_field7'], $this->aliases['tabel_c2_field7'] . ' + 1', FALSE);
		$this->db->where($this->aliases['tabel_c2_field1'], $param1);
		return $this->db->update($this->aliases['tabel_c2']);
	}

	// public function hapus($param1)
	// {
	//   $this->db->where($this->aliases['tabel_c2_field1'], $param1);
	// 	return $this->db->delete($this->aliases['tabel_c2']);
	// }
}
