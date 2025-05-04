<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_c1 extends CI_Model
{
    // Retrieves all records from the tabel_c1 table in descending order of tabel_c1_field1
    public function get_all_c1()
    {
        $this->db->order_by($this->aliases['tabel_c1_field1'], 'DESC');
        return $this->db->get($this->aliases['tabel_c1']);
    }

    // Retrieves records from the tabel_c1 table where tabel_c1_field1 matches the given parameter, in descending order of tabel_c1_field1
    public function get_c1_by_c1_field1($param1)
    {
        $this->db->where($this->aliases['tabel_c1_field1'], $param1);
        $this->db->order_by($this->aliases['tabel_c1_field1'], 'DESC');
        return $this->db->get($this->aliases['tabel_c1']);
    }

    // Searches for records in the tabel_c1 table where tabel_c1_field1 matches the given parameter, in descending order of tabel_c1_field1
    public function search_c1_by_c1_field1($param1)
    {
        $this->db->where($this->aliases['tabel_c1_field1'], $param1);
        $this->db->order_by($this->aliases['tabel_c1_field1'], 'DESC');
        return $this->db->get($this->aliases['tabel_c1']);
    }

    // Retrieves records from the tabel_c1 table where tabel_c1_field2 matches the given parameter, in descending order of tabel_c1_field1
    public function get_c1_by_c1_field2($param1)
    {
        $this->db->where($this->aliases['tabel_c1_field2'], $param1);
        $this->db->order_by($this->aliases['tabel_c1_field1'], 'DESC');
        return $this->db->get($this->aliases['tabel_c1']);
    }

    // Checks for a record in the tabel_c1 table where tabel_c1_field1 and tabel_c1_field5 match the given parameters, in descending order of tabel_c1_field1
    public function ceklogin($param1, $param2)
    {
        $this->db->where($this->aliases['tabel_c1_field1'], $param1);
        $this->db->where($this->aliases['tabel_c1_field5'], $param2);
        $this->db->order_by($this->aliases['tabel_c1_field1'], 'DESC');
        return $this->db->get($this->aliases['tabel_c1']);
    }

    // Inserts a new record into the tabel_c1 table
    public function insert_c1($data)
    {
        return $this->db->insert($this->aliases['tabel_c1'], $data);
    }

    // Updates a record in the tabel_c1 table where tabel_c1_field1 matches the given parameter
    public function update_c1($data, $param1)
    {
        $this->db->where($this->aliases['tabel_c1_field1'], $param1);
        return $this->db->update($this->aliases['tabel_c1'], $data);
    }

    // Increments the login_count field by 1 for the record in the tabel_c1 table where tabel_c1_field1 matches the given parameter
    public function updateCount($param1)
    {
        $this->db->set('login_count', 'login_count + 1', FALSE);
        $this->db->where($this->aliases['tabel_c1_field1'], $param1);
        return $this->db->update($this->aliases['tabel_c1']);
    }

    // Deletes the record from the tabel_c1 table where tabel_c1_field1 matches the given parameter
    public function delete_c1($param1)
    {
        $this->db->where($this->aliases['tabel_c1_field1'], $param1);
        return $this->db->delete($this->aliases['tabel_c1']);
    }
}
