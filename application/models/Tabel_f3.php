<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabel_f3 extends CI_Model
{
	// 4 fungsi di bawah ini bisa dibilang pengganti fungsi get_all_ atau ambil atau get_c2_field1
	public function get_f3_with_f2_with_e4()
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_f3']} 
		LEFT JOIN {$this->aliases['tabel_f2']} 
		ON {$this->aliases['tabel_f2']}.{$this->aliases['tabel_f3_field4']} = {$this->aliases['tabel_f3']}.{$this->aliases['tabel_f3_field4']}
		LEFT JOIN {$this->aliases['tabel_e4']} 
		ON {$this->aliases['tabel_f2']}.{$this->aliases['tabel_f2_field7']} = {$this->aliases['tabel_e4']}.id
		AND {$this->aliases['tabel_f3']}.deleted_at IS NULL
		ORDER BY id DESC";
		return $this->db->query($sql);
	}

	public function get_f3_with_f1_with_e4_by_f3_field1($param1, $param2)
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_f3']} 
		LEFT JOIN {$this->aliases['tabel_f1']} 
		ON {$this->aliases['tabel_f1']}.{$this->aliases['tabel_f3_field4']} = {$this->aliases['tabel_f3']}.{$this->aliases['tabel_f3_field4']}
		LEFT JOIN {$this->aliases['tabel_e4']} 
		ON {$this->aliases['tabel_f1']}.{$this->aliases['tabel_f2_field7']} = {$this->aliases['tabel_e4']}.id
		WHERE {$this->aliases['tabel_f3']}.id = {$param1}
		AND {$this->aliases['tabel_f3']}.id = {$param2}
		AND {$this->aliases['tabel_f3']}.deleted_at IS NULL
		ORDER BY id DESC";
		return $this->db->query($sql);
	}

	public function get_f3_with_f2_with_e4_by_c2_field1($param1)
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_f3']} 
		JOIN {$this->aliases['tabel_f2']} 
		ON {$this->aliases['tabel_f2']}.{$this->aliases['tabel_f3_field4']} = {$this->aliases['tabel_f3']}.{$this->aliases['tabel_f3_field4']}
		JOIN {$this->aliases['tabel_e4']} 
		ON {$this->aliases['tabel_f2']}.{$this->aliases['tabel_f2_field7']} = {$this->aliases['tabel_e4']}.id
		WHERE {$this->aliases['tabel_f3']}.id = {$param1}
		AND {$this->aliases['tabel_f3']}.deleted_at IS NULL
		ORDER BY id DESC";
		return $this->db->query($sql);
	}

	public function get_all_f3()
	{
		$this->db->where('deleted_at', NULL);
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_f3']);
	}

	public function get_all_f3_archive()
	{
		$this->db->where('deleted_at IS NOT NULL');
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_f3']);
	}

	public function get_f3_by_field($fields, $params)
	{
		if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}

		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->aliases['tabel_f3']);
	}

	public function get_f3_by_field_archive($fields, $params)
	{
		if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}

		$this->db->where('deleted_at IS NOT NULL');
		$this->db->order_by('id', 'DESC');
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
		BETWEEN '{$min}' AND '{$max}' ORDER BY id DESC";
		return $this->db->query($sql);
	}

	public function insert_f3($data)
	{
		return $this->db->insert($this->aliases['tabel_f3'], $data);
	}

	public function update_f3($data, $param1)
	{
		$this->db->where('id', $param1);
		return $this->db->update($this->aliases['tabel_f3'], $data);
	}

	public function delete_f3_by_field($fields, $params)
	{
		if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}

		return $this->db->delete($this->aliases['tabel_f3']);
	}
}
