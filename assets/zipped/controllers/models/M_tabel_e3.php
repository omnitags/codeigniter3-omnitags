<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_e3 extends CI_Model
{
	public function get_all_e3()
	{
		$this->db->order_by($this->aliases['tabel_e3_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_e3']);
	}

	public function get_e3_with_e4()
	{
		$sql = "SELECT * FROM {$this->aliases['tabel_e3']} 
		JOIN {$this->aliases['tabel_e4']} 
		ON {$this->aliases['tabel_e3']}.{$this->aliases['tabel_e3_field2']} = {$this->aliases['tabel_e4']}.{$this->aliases['tabel_e3_field2']}
		ORDER BY {$this->aliases['tabel_e3']}.{$this->aliases['tabel_e3_field1']} DESC";
		return $this->db->query($sql);
	}

	public function get_e3_by_e3_field1($param1)
	{
		$this->db->where($this->aliases['tabel_e3_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_e3_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_e3']);
	}

	public function get_e3_field4_by_e3_field1($param1)
	{
		$this->db->where($this->aliases['tabel_e3_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_e3_field1'], 'DESC');
		$query = $this->db->get($this->aliases['tabel_e3']);

		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->{$this->aliases['tabel_e3_field4']};
		} else {
			return null; // or handle the case when no rows are found
		}
	}

	public function insert_e3($data)
	{
		return $this->db->insert($this->aliases['tabel_e3'], $data);
	}

	public function update_e3($data, $param1)
	{
		$this->db->where($this->aliases['tabel_e3_field1'], $param1);
		return $this->db->update($this->aliases['tabel_e3'], $data);
	}

	public function delete_e3($param1)
	{
		$this->db->where($this->aliases['tabel_e3_field1'], $param1);
		return $this->db->delete($this->aliases['tabel_e3']);
	}
}
