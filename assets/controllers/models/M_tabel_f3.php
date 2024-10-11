<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_f3 extends CI_Model
{
	// 4 fungsi di bawah ini bisa dibilang pengganti fungsi ambildata atau ambil atau ambil_tabel_c2_field1
	public function join_tabel_f2()
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_f3']}
		JOIN {$this->aliases['tabel_f2']}
		ON {$this->aliases['tabel_f3']}.{$this->aliases['tabel_f2_field1']} = {$this->aliases['tabel_f2']}.{$this->aliases['tabel_f2_field1']}";
		return $this->db->query($sql);
	}

	public function join_tabel_f2_tamu($param1)
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_f3']} 
		JOIN {$this->aliases['tabel_f2']} 
		ON {$this->aliases['tabel_f3']}.{$this->aliases['tabel_f2_field1']} = {$this->aliases['tabel_f2']}.{$this->aliases['tabel_f2_field1']}
		WHERE {$this->aliases['tabel_f3']}. {$this->aliases['tabel_c2_field1']} = $param1";
		return $this->db->query($sql);
	}

	public function join_tabel_f1()
	{
		$sql = "SELECT DISTINCT * FROM {$this->aliases['tabel_f3']} 
		JOIN {$this->aliases['tabel_f1']} 
		ON {$this->aliases['tabel_f3']}.{$this->aliases['tabel_f2_field1']} = {$this->aliases['tabel_f1']}.{$this->aliases['tabel_f2_field1']}";
		return $this->db->query($sql);
	}

	public function join_tabel_f1_tamu($param1)
	{
		$sql = "SELECT DISTINCT * FROM {$this->aliases['tabel_f3']} 
		JOIN {$this->aliases['tabel_f1']} 
		ON {$this->aliases['tabel_f3']}.{$this->aliases['tabel_f2_field1']} = {$this->aliases['tabel_f1']}.{$this->aliases['tabel_f2_field1']} 
		WHERE {$this->aliases['tabel_f3']}.{$this->aliases['tabel_c2_field1']} = $param1";
		return $this->db->query($sql);
	}


	public function ambildata()
	{
		$this->db->order_by($this->aliases['tabel_f3_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_f3']);
	}

	public function ambil_tabel_f3_field1($param1)
	{
		$this->db->where($this->aliases['tabel_f3_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_f3_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_f3']);
	}

	public function ambil_tabel_c2_field1($param1)
	{
		$this->db->where($this->aliases['tabel_c2_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_c2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_f3']);
	}

	public function ambil_tabel_f3_field2($param1)
	{
		$this->db->where($this->aliases['tabel_f2_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_f2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_f3']);
	}

	public function ambil_tabel_c2_field3($param1)
	{
		$this->db->where($this->aliases['tabel_c2_field3'], $param1);
		$this->db->order_by($this->aliases['tabel_c2_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_f3']);
	}

	public function cari($param1, $param2)
	{
		$this->db->where($this->aliases['tabel_f3_field1'], $param1);
		$this->db->where($this->aliases['tabel_c2_field3'], $param2);
		$this->db->order_by($this->aliases['tabel_f3_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_f3']);
	}

	// Saat ini aku akan menghilangkan fitur filter karena ingin fokus pada penerapan join terlebih dahulu
	// Alasannya karena tabel_f3 transaksi merupakan tabel_f3 yang sangat unik
	// karena melibatkan 2 tabel_f3 sekaligus yaitu tabel_f3 pesanan dan tabel_f3 history

	// Sebenarnya ada cara, namun itu memerlukanku untuk membuat sebuah tabel_f3 baru
	// yaitu tabel_f3 transaksi_history yang akan menggunakan trigger ketika data tabel_f3 pesanan dihapus

	// Hanya saja aku ingin mencoba bereksperimen terlebih dahulu dengan fitur JOIN
	public function filter($min, $max)
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_f3']}
		WHERE {$this->aliases['tabel_f3_field7']}
		BETWEEN '{$min}' AND '{$max}' ORDER BY {$this->aliases['tabel_f3_field1']} DESC";
		return $this->db->query($sql);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->aliases['tabel_f3'], $data);
	}

	public function update($data, $param1)
	{
		$this->db->where($this->aliases['tabel_f3_field1'], $param1);
		return $this->db->update($this->aliases['tabel_f3'], $data);
	}

	public function hapus($param1)
	{
		$this->db->where($this->aliases['tabel_f3_field1'], $param1);
		return $this->db->delete($this->aliases['tabel_f3']);
	}
}
