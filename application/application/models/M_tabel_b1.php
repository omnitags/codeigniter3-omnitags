<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tabel_b1 extends CI_Model
{
    // Retrieves all records from the tabel_b1 table in descending order of tabel_b1_field1
    public function get_all_b1()
    {
        $this->db->order_by($this->aliases['tabel_b1_field1'], 'DESC');
        return $this->db->get($this->aliases['tabel_b1']);
    }

    // Retrieves records from the tabel_b1 table where tabel_b1_field7 equals $param1 and tabel_b1_field2 equals $param2, in descending order of tabel_b1_field1
    public function dekor($param1, $param2)
    {
        $this->db->where($this->aliases['tabel_b1_field7'], $param1);
        $this->db->where($this->aliases['tabel_b1_field2'], $param2);
        $this->db->order_by($this->aliases['tabel_b1_field1'], 'DESC');
        return $this->db->get($this->aliases['tabel_b1']);
    }

    // Retrieves records from the tabel_b1 table where tabel_b1_field7 equals $param1, in descending order of tabel_b1_field1
    public function filter($param1)
    {
        $this->db->where($this->aliases['tabel_b1_field7'], $param1);
        $this->db->order_by($this->aliases['tabel_b1_field1'], 'DESC');
        return $this->db->get($this->aliases['tabel_b1']);
    }

    // Retrieves records from the tabel_b1 table where tabel_b1_field1 equals $param1, in descending order of tabel_b1_field1
    public function get_b1_by_b1_field1($param1)
    {
        $this->db->where($this->aliases['tabel_b1_field1'], $param1);
        $this->db->order_by($this->aliases['tabel_b1_field1'], 'DESC');
        return $this->db->get($this->aliases['tabel_b1']);
    }

    // Retrieves records from the tabel_b1 table where tabel_b1_field2 equals $param1, in descending order of tabel_b1_field1
    public function get_b1_by_b1_field2($param1)
    {
        $this->db->where($this->aliases['tabel_b1_field2'], $param1);
        $this->db->order_by($this->aliases['tabel_b1_field1'], 'DESC');
        return $this->db->get($this->aliases['tabel_b1']);
    }

    // Retrieves records from the tabel_b1 table where tabel_b1_field2 equals $param1 and tabel_b1_field7 equals $param2, in descending order of tabel_b1_field1
    public function get_b1_by_b1_field2_by_b1_field7($param1, $param2)
    {
        $this->db->where($this->aliases['tabel_b1_field2'], $param1);
        $this->db->where($this->aliases['tabel_b1_field7'], $param2);
        $this->db->order_by($this->aliases['tabel_b1_field1'], 'DESC');
        return $this->db->get($this->aliases['tabel_b1']);
    }

    // Inserts a new record into the tabel_b1 table
    public function insert_b1($data)
    {
        return $this->db->insert($this->aliases['tabel_b1'], $data);
    }

    // Updates a record in the tabel_b1 table where tabel_b1_field1 equals $param1
    public function update_b1($data, $param1)
    {
        $this->db->where($this->aliases['tabel_b1_field1'], $param1);
        return $this->db->update($this->aliases['tabel_b1'], $data);
    }

    // Updates all records in the tabel_b1 table
    public function update_all_b1($data)
    {
        return $this->db->update($this->aliases['tabel_b1'], $data);
    }

    // Deletes a record from the tabel_b1 table where tabel_b1_field1 equals $param1
    public function delete_b1($param1)
    {
        $this->db->where($this->aliases['tabel_b1_field1'], $param1);
        return $this->db->delete($this->aliases['tabel_b1']);
    }

    // Deletes records from the tabel_b1 table where tabel_b1_field7 equals $param1
    public function delete_b1_by_b1_field7($param1)
    {
        $this->db->where($this->aliases['tabel_b1_field7'], $param1);
        return $this->db->delete($this->aliases['tabel_b1']);
    }
}
