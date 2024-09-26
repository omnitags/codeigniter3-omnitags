<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'OmnitagsController.php';

class Tabel_b6Controller extends OmnitagsController
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

		$filter = $this->tl_b6->get_b6_by_field('tabel_b6_field7', $param1);

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

		$this->load_page('tabel_b6', '_layouts/template', $data1);
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

		$this->load_page('tabel_b6', '_layouts/printpage', $data1);
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

			'created_at' => date("Y-m-d\TH:i:s"),
			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_b6->insert_b6($data);
		$this->insert_history('tabel_b6', $data);

		$notif = $this->handle_4b($aksi, 'tabel_b6');

		redirect($_SERVER['HTTP_REFERER']);
	}


	// Update data
	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();
		$this->session_3();

		$code = $this->v_post['tabel_b6_field1'];

		$tabel = $this->tl_b6->get_b6_by_field('tabel_b6_field1', $code)->result();
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
			'ubah' . $code
		);


		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b6_field1'] => $code,
			$this->aliases['tabel_b6_field2'] => $this->v_post['tabel_b6_field2'],
			$this->aliases['tabel_b6_field3'] => $this->v_post['tabel_b6_field3'],
			$this->aliases['tabel_b6_field4'] => $this->v_post['tabel_b6_field4'],
			$this->aliases['tabel_b6_field5'] => $this->v_post['tabel_b6_field5'],
			$this->aliases['tabel_b6_field7'] => $this->v_post['tabel_b6_field7'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_b6->update_b6($data, $code);
		$this->insert_history('tabel_b6', $data);

		$notif = $this->handle_4c($aksi, 'tabel_b6', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function aktifkan($code = null) //update tidak diperlukan di sini
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_b6->get_b6_by_field('tabel_b6_field1', $code);

		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b6_field6'] => $this->aliases['tabel_b6_field6_value1'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_b6->update_b6($data, $code);
		$this->insert_history('tabel_b6', $data);

		$notif = $this->handle_4c($aksi, 'tabel_b6_field6', $code);

		redirect($_SERVER['HTTP_REFERER']);

	}

	public function nonaktifkan($code = null) //update tidak diperlukan di sini
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_b6->get_b6_by_field('tabel_b6_field1', $code);

		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b6_field6'] => $this->aliases['tabel_b6_field6_value2'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_b6->update_b6($data, $code);
		$this->insert_history('tabel_b6', $data);

		$notif = $this->handle_4c($aksi, 'tabel_b6_field6', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
	
	//Soft Delete Data
	public function soft_delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_b6->get_b6_by_field('tabel_b6_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_b6->update_b6($data, $code);
		$this->insert_history('tabel_b6', $data);

		$notif = $this->handle_4e($aksi, 'tabel_b6', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Soft Delete data
	public function restore($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_b6->get_b6_by_field_archive('tabel_b6_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => NULL,
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_b6->update_b6($data, $code);
		$this->insert_history('tabel_b6', $data);

		$notif = $this->handle_4e($aksi, 'tabel_b6', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel_b6 = $this->tl_b6->get_b6_by_field_archive('tabel_b6_field1', $code);

		$this->check_data($tabel_b6);
		$aksi = $this->tl_b6->delete_b6_by_field('tabel_b6_field1', $code);
		
		$notif = $this->handle_4e($aksi, 'tabel_b6', $code);
		redirect($_SERVER['HTTP_REFERER']);
	}

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_b6_alias_v9_title'),
			'konten' => $this->v9['tabel_b6'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b6']),
			'tbl_b6' => $this->tl_b6->get_all_b6_archive(),
		);

		$this->load_page('tabel_b6', '_layouts/template', $data1);
	}

	// Public Pages
	public function detail_archive($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_b6->get_b6_by_field('tabel_b6_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => lang('tabel_b6_alias_v10_title'),
			'konten' => $this->v10['tabel_b6'],
			'dekor' => $this->tl_b6->dekor($this->theme_id, $this->aliases['tabel_b6']),
			'tbl_b6' => $this->tl_b6->get_b6_by_field_archive('tabel_b6_field1', $code),
		);

		$this->load_page('tabel_b6', '_layouts/template', $data1);
	}
	
	public function history($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_b6->get_b6_by_field('tabel_b6_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'table_id' => $code,
			'title' => lang('tabel_b6_alias_v11_title'),
			'konten' => $this->v11['tabel_b6'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b6']),
			'tbl_b6' => $this->tl_ot->get_by_field_history('tabel_b6', 'tabel_b6_field1', $code),
			'current' => $this->tl_ot->get_by_field('tabel_b6', 'tabel_b6_field1', $code),
		);

		$this->load_page('tabel_b6', '_layouts/template', $data1);
	}

	//Push History Data into current data
	public function push($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_ot->get_by_id_history('tabel_b6', $code)->result();
		$this->check_data($tabel);

		$code = $tabel[0]->{$this->aliases['tabel_b6_field1']};

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b6_field2'] => $tabel[0]->{$this->aliases['tabel_b6_field2']},

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_b6->update_b6($data, $code);

		$notif = $this->handle_4c($aksi, 'tabel_b6', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
}

