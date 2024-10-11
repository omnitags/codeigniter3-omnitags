<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_e1 extends CI_Model
{
	public function __construct() {
        parent::__construct();
        // Load SSH library or helper here
    }

    public function fetchDataViaSSH() {
        // Code to connect to SSH server and fetch data
    }
	
	public function ambildata()
	{
		$this->db->order_by($this->aliases['tabel_e1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_e1']);
	}

	public function ambil_tabel_e1_field1($param1)
	{
		$this->db->where($this->aliases['tabel_e1_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_e1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_e1']);
	}

	public function ambil_tabel_e3_field1($param1)
	{
		$this->db->where($this->aliases['tabel_e3_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_e1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_e1']);
	}

	public function simpan($data)
	// public function simpan($query)
	{
		// include "application/config/database.php";
		// return mysqli_query($db(''), $query);
		return $this->db->insert($this->aliases['tabel_e1'], $data);
	}

	public function update($data, $param1)
	{
		$this->db->where($this->aliases['tabel_e1_field1'], $param1);
		return $this->db->update($this->aliases['tabel_e1'], $data);
	}

	public function hapus($param1)
	{
		$this->db->where($this->aliases['tabel_e1_field1'], $param1);
		return $this->db->delete($this->aliases['tabel_e1']);
	}
	
	public function hapus_tabel_e3_field1($param1)
	{
		$this->db->where($this->aliases['tabel_e2_field2'], $param1);
		return $this->db->delete($this->aliases['tabel_e1']);
	}
}
