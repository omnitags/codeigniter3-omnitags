<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_e3 extends CI_Model
{
	public function ambildata()
	{
		$this->db->order_by($this->aliases['tabel_e3_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_e3']);
	}

	public function ambil_tabel_e3_field1($param1)
	{
		$this->db->where($this->aliases['tabel_e3_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_e3_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_e3']);
	}

	public function ambil_tabel_c1_field1($param1)
	{
		$subquery = "(SELECT {$this->aliases['tabel_e4_field1']} FROM {$this->aliases['tabel_e4']} WHERE {$this->aliases['tabel_c1_field1']} = {$param1})";

		$this->db->where("{$this->aliases['tabel_e4_field1']} IN $subquery", NULL, FALSE);
		$this->db->order_by($this->aliases['tabel_e3_field1'], 'DESC');

		return $this->db->get($this->aliases['tabel_e3']);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->aliases['tabel_e3'], $data);
	}

	public function update($data, $param1)
	{
		$this->db->where($this->aliases['tabel_e3_field1'], $param1);
		return $this->db->update($this->aliases['tabel_e3'], $data);
	}

	public function hapus($param1)
	{
		$this->db->where($this->aliases['tabel_e3_field1'], $param1);
		return $this->db->delete($this->aliases['tabel_e3']);
	}
}
