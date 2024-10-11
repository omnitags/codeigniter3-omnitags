<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_c1 extends CI_Model
{
	public function ambildata()
	{
		$this->db->order_by($this->aliases['tabel_c1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_c1']);
	}

	public function ambil_tabel_c1_field1($param1)
	{
		$this->db->where($this->aliases['tabel_c1_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_c1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_c1']);
	}

	public function cek_tabel_c1_field1($param1)
	{
		$this->db->where($this->aliases['tabel_c1_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_c1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_c1']);
	}

	public function cek_tabel_c1_field3($param1)
	{
		$this->db->where($this->aliases['tabel_c1_field3'], $param1);
		$this->db->order_by($this->aliases['tabel_c1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_c1']);
	}

	public function ceklogin($param1, $param2)
	{
		$this->db->where($this->aliases['tabel_c1_field1'], $param1);
		$this->db->where($this->aliases['tabel_c1_field4'], $param2);
		$this->db->order_by($this->aliases['tabel_c1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_c1']);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->aliases['tabel_c1'], $data);
	}

	public function update($data, $param1)
	{
		$this->db->where($this->aliases['tabel_c1_field1'], $param1);
		return $this->db->update($this->aliases['tabel_c1'], $data);
	}

	public function updateCount($param1)
	{
		$this->db->set('login_count', 'login_count + 1', FALSE);
		$this->db->where($this->aliases['tabel_c1_field1'], $param1);
		return $this->db->update($this->aliases['tabel_c1']);
	}

	// public function hapus($param1)
	// {
	//   $this->db->where($this->aliases['tabel_c1_field1'], $param1);
	// 	return $this->db->delete($this->aliases['tabel_c1']);
	// }
}
