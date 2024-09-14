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

    public function get_e1_by_field($fields, $params)
	{
		if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}

		$this->db->order_by($this->aliases['tabel_e1_field1'], 'DESC');
		return $this->db->get($this->aliases['tabel_e1']);
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
    public function delete_e1_by_field($fields, $params)
    {
        if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}

		return $this->db->delete($this->aliases['tabel_e1']);
	}
}
