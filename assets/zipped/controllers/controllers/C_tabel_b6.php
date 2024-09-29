<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_b6 extends Omnitags
{
	// Pages
	// Public Pages


	// Account Only Pages


	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_3();

		$param1 = $this->v_get['tabel_b6_field7'];

		$filter = $this->tl_b6->filter($param1);

		if (empty($param1)) {
			$result = $this->tl_b6->get_all_b6();
		} else {
			$result = $filter;
		}

		$data1 = array(
			'title' => lang('tabel_b6_alias_v3_title'),
			'konten' => $this->v3['tabel_b6'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b6']),
			'tbl_b6' => $result,
			'tbl_b7' => $this->tl_b7->get_all_b7(),
			'tabel_b6_field7_value' => $param1,
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_b6_alias_v4_title'),
			'konten' => $this->v4['tabel_b6'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b6']),
			'tbl_b6' => $this->tl_b6->get_all_b6(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/printpage', $data);
	}

	// Print one data

	// Functions
	// Add data
	public function tambah()
	{
		$this->declarew();
		$this->session_3();

		validate_all(
			array(
				$this->v_post['tabel_b6_field2'],
				$this->v_post['tabel_b6_field3'],
				$this->v_post['tabel_b6_field4'],
				$this->v_post['tabel_b6_field5'],
				$this->v_post['tabel_b6_field7'],
			),
			$this->views['flash2'],
			'tambah'
		);


		// Check if the field contains "https://" at the beginning
		if (strpos($this->v_post['tabel_b6_field4'], 'https://') === 0) {
			// It contains "https://" at the beginning
			// Additional actions if needed
			$tabel_b6_field4 = $this->v_post['tabel_b6_field4'];
		} else {
			// It does not contain "https://" at the beginning
			// Additional actions if needed
			$tabel_b6_field4 = 'https://' . $this->v_post['tabel_b6_field4'];
		}

		// $id = get_next_code($this->aliases['tabel_e1'], $this->aliases['tabel_e1_field1'], 'FK');
		// $this->aliases['tabel_e1_field1'] => $id,

		$data = array(
			$this->aliases['tabel_b6_field1'] => '',
			$this->aliases['tabel_b6_field2'] => $this->v_post['tabel_b6_field2'],
			$this->aliases['tabel_b6_field3'] => $this->v_post['tabel_b6_field3'],
			$this->aliases['tabel_b6_field4'] => $tabel_b6_field4,
			$this->aliases['tabel_b6_field5'] => $this->v_post['tabel_b6_field5'],
			$this->aliases['tabel_b6_field6'] => $this->aliases['tabel_b6_field6_value2'],
			$this->aliases['tabel_b6_field7'] => $this->v_post['tabel_b6_field7'],
		);

		$aksi = $this->tl_b6->insert_b6($data);

		$notif = $this->handle_4b($aksi, 'tabel_b6');

		redirect($_SERVER['HTTP_REFERER']);
	}


	// Update data
	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();
		$this->session_3();

		$tabel_b6_field1 = $this->v_post['tabel_b6_field1'];

		$tabel = $this->tl_b6->get_b6_by_b6_field1($tabel_b6_field1)->result();
		$this->check_data($tabel);

		validate_all(
			array(
				$this->v_post['tabel_b6_field1'],
				$this->v_post['tabel_b6_field2'],
				$this->v_post['tabel_b6_field3'],
				$this->v_post['tabel_b6_field4'],
				$this->v_post['tabel_b6_field5'],
				$this->v_post['tabel_b6_field7'],
			),
			$this->views['flash3'],
			'ubah' . $tabel_b6_field1
		);


		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b6_field2'] => $this->v_post['tabel_b6_field2'],
			$this->aliases['tabel_b6_field3'] => $this->v_post['tabel_b6_field3'],
			$this->aliases['tabel_b6_field4'] => $this->v_post['tabel_b6_field4'],
			$this->aliases['tabel_b6_field5'] => $this->v_post['tabel_b6_field5'],
			$this->aliases['tabel_b6_field7'] => $this->v_post['tabel_b6_field7'],
		);

		$aksi = $this->tl_b6->update_b6($data, $tabel_b6_field1);

		$notif = $this->handle_4c($aksi, 'tabel_b6', $tabel_b6_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function aktifkan($tabel_b6_field1 = null) //update tidak diperlukan di sini
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_b6->get_b6_by_b6_field1($tabel_b6_field1);

		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b6_field6'] => $this->aliases['tabel_b6_field6_value1'],
		);

		$aksi = $this->tl_b6->update_b6($data, $tabel_b6_field1);

		$notif = $this->handle_4c($aksi, 'tabel_b6_field6', $tabel_b6_field1);

		redirect($_SERVER['HTTP_REFERER']);

	}

	public function nonaktifkan($tabel_b6_field1 = null) //update tidak diperlukan di sini
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_b6->get_b6_by_b6_field1($tabel_b6_field1);

		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b6_field6'] => $this->aliases['tabel_b6_field6_value2'],
		);

		$aksi = $this->tl_b6->update_b6($data, $tabel_b6_field1);

		$notif = $this->handle_4c($aksi, 'tabel_b6_field6', $tabel_b6_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}


	// Delete data
	public function delete($tabel_b6_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel_b6 = $this->tl_b6->get_b6_by_b6_field1($tabel_b6_field1);

		$this->check_data($tabel_b6);
		$aksi = $this->tl_b6->delete_b6($tabel_b6_field1);
		$notif = $this->handle_4e($aksi, 'tabel_b6', $tabel_b6_field1);
		redirect($_SERVER['HTTP_REFERER']);

	}
}
