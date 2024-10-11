<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_a1 extends CI_Model
{
	public function ambildata()
	{
		$this->db->order_by($this->aliases['tabel_a1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_a1']);
	}

	public function ambil_tabel_a1_field1($param1)
	{
		$this->db->where($this->aliases['tabel_a1_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_a1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_a1']);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->aliases['tabel_a1'], $data);
	}

	public function update($data, $param1)
	{
		$this->db->where($this->aliases['tabel_a1_field1'], $param1);
		return $this->db->update($this->aliases['tabel_a1'], $data);
	}

	public function hapus($param1)
	{
		$this->db->where($this->aliases['tabel_a1_field1'], $param1);
		return $this->db->delete($this->aliases['tabel_a1']);
	}
}
