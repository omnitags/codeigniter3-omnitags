<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_e1 extends CI_Model
{
    public function __construct() {
        parent::__construct();
        // Load SSH library or helper here
    }

    // Code to connect to SSH server and fetch data
    public function fetchDataViaSSH() {
    }
	
    // Retrieves all records from the tabel_e1 table in descending order of tabel_e1_field1
    public function get_all_e1()
    {
        $this->db->order_by($this->aliases['tabel_e1_field1'], 'DESC');
        return $this->db->get($this->aliases['tabel_e1']);
    }

    // Filters records from the tabel_e1 table based on the value of tabel_e1_field2 and sorts them in descending order of tabel_e1_field1
    public function filter($param1)
    {
        $this->db->where($this->aliases['tabel_e1_field2'], $param1);
        $this->db->order_by($this->aliases['tabel_e1_field1'], 'DESC');
        return $this->db->get($this->aliases['tabel_e1']);
    }

    // Retrieves records from the tabel_e1 table where tabel_e1_field1 matches the given value and sorts them in descending order of tabel_e1_field1
    public function get_e1_by_e1_field1($param1)
    {
        $this->db->where($this->aliases['tabel_e1_field1'], $param1);
        $this->db->order_by($this->aliases['tabel_e1_field1'], 'DESC');
        return $this->db->get($this->aliases['tabel_e1']);
    }

    public function get_e1_field4_by_e1_field1($param1)
	{
		$this->db->where($this->aliases['tabel_e1_field1'], $param1);
		$this->db->order_by($this->aliases['tabel_e1_field1'], 'DESC');
		$query = $this->db->get($this->aliases['tabel_e1']);

		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->{$this->aliases['tabel_e1_field4']};
		} else {
			return null; // or handle the case when no rows are found
		}
	}

    // Inserts a new record into the tabel_e1 table
    public function insert_e1($data)
    // public function insert_e1($query)
    {
        // include "application/config/database.php";
        // return mysqli_query($db(''), $query);
        return $this->db->insert($this->aliases['tabel_e1'], $data);
    }

    // Updates a record in the tabel_e1 table based on the value of tabel_e1_field1
    public function update_e1($data, $param1)
    {
        $this->db->where($this->aliases['tabel_e1_field1'], $param1);
        return $this->db->update($this->aliases['tabel_e1'], $data);
    }

    // Deletes a record from the tabel_e1 table based on the value of tabel_e1_field1
    public function delete_e1($param1)
    {
        $this->db->where($this->aliases['tabel_e1_field1'], $param1);
        return $this->db->delete($this->aliases['tabel_e1']);
    }
}
