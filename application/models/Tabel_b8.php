<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabel_b8 extends CI_Model
{
	public function get_all_b8()
	{
		$this->db->order_by('id_notif_type', 'DESC');
		return $this->db->get($this->aliases['tabel_b8']);
	}

	public function get_all_b8_archive()
	{
		$this->db->order_by('id_notif_type', 'DESC');
		return $this->db->get($this->aliases['tabel_b8']);
	}

	public function get_b8_by_field($fields, $params)
	{
		if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}

		$this->db->order_by('id_notif_type', 'DESC');
		return $this->db->get($this->aliases['tabel_b8']);
	}

	public function get_b8_by_field_archive($fields, $params)
	{
		if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}

		$this->db->order_by('id_notif_type', 'DESC');
		return $this->db->get($this->aliases['tabel_b8']);
	}

	public function insert_b8($data)
	// public function insert_b8($query)
	{
		// include "application/config/database.php";
		// return mysqli_query($db(''), $query);
		return $this->db->insert($this->aliases['tabel_b8'], $data);
	}

	public function update_b8($data, $param1)
	{
		$this->db->where('id_notif_type', $param1);
		return $this->db->update($this->aliases['tabel_b8'], $data);
	}
	public function delete_b8_by_field($fields, $params)
	{
		if (is_array($fields) && is_array($params)) {
			foreach ($fields as $key => $field) {
				$param = $params[$key]; // Get the corresponding param value
				$this->db->where($this->aliases[$field], $param);
			}
		} else {
			$this->db->where($this->aliases[$fields], $params);
		}

		return $this->db->delete($this->aliases['tabel_b8']);
	}
}
