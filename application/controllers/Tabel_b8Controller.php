<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'OmnitagsController.php';

class Tabel_b8Controller extends OmnitagsController
{
	// Pages
	// Public Pages


	// Account Only Pages


	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_b8_alias_v3_title'),
			'konten' => $this->v3['tabel_b8'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b8']),
			'tbl_b8' => $this->tl_b8->get_all_b8(),
		);

		$this->load_page('tabel_b8', '_layouts/template', $data1);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_b8_alias_v4_title'),
			'konten' => $this->v4['tabel_b8'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b8']),
			'tbl_b8' => $this->tl_b8->get_all_b8(),
		);

		$this->load_page('tabel_b8', '_layouts/printpage', $data1);
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
				$this->v_post['tabel_b8_field2'],
				$this->v_post['tabel_b8_field3'],
				$this->v_post['tabel_b8_field4'],
			),
			$this->views['flash2'],
			'tambah'
		);

		// $id = get_next_code($this->aliases['tabel_e1'], $this->aliases['tabel_e1_field1'], 'FK');
		// $this->aliases['tabel_e1_field1'] => $id,

		$data = array(
			$this->aliases['tabel_b8_field1'] => '',
			$this->aliases['tabel_b8_field2'] => $this->v_post['tabel_b8_field2'],
			$this->aliases['tabel_b8_field3'] => $this->v_post['tabel_b8_field3'],
			$this->aliases['tabel_b8_field4'] => $this->v_post['tabel_b8_field4'],

			'created_at' => date("Y-m-d\TH:i:s"),
			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_b8->insert_b8($data);
		$this->insert_history('tabel_b8', $data);

		$notif = $this->handle_4b($aksi, 'tabel_b8');

		redirect($_SERVER['HTTP_REFERER']);
	}


	// Update data
	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();
		$this->session_3();

		$code = $this->v_post['tabel_b8_field1'];

		$tabel_b8 = $this->tl_b8->get_b8_by_field('tabel_b8_field1', $code)->result();
		$this->check_data($tabel_b8);

		validate_all(
			array(
				$this->v_post['tabel_b8_field1'],
				$this->v_post['tabel_b8_field3'],
				$this->v_post['tabel_b8_field4'],
			),
			$this->views['flash3'],
			'ubah' . $code
		);


		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b8_field3'] => $this->v_post['tabel_b8_field3'],
			$this->aliases['tabel_b8_field4'] => $this->v_post['tabel_b8_field4'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_b8->update_b8($data, $code);
		$this->insert_history('tabel_b8', $data);

		$notif = $this->handle_4c($aksi, 'tabel_a1', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
	
	//Soft Delete Data
	public function soft_delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_b8->get_b8_by_field('tabel_b8_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_b8->update_b8($data, $code);
		$this->insert_history('tabel_b8', $data);

		$notif = $this->handle_4e($aksi, 'tabel_b8', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Soft Delete data
	public function restore($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_b8->get_b8_by_field_archive('tabel_b8_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => NULL,
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_b8->update_b8($data, $code);
		$this->insert_history('tabel_b8', $data);

		$notif = $this->handle_4e($aksi, 'tabel_b8', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel_b8 = $this->tl_b8->get_b8_by_field_archive('tabel_b8_field1', $code)->result();
		$this->check_data($tabel_b8);

		$aksi = $this->tl_b8->delete_b8_by_field('tabel_b8_field1', $code);

		$notif = $this->handle_4e($aksi, 'tabel_b8', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_b8_alias_v9_title'),
			'konten' => $this->v9['tabel_b8'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b8']),
			'tbl_b8' => $this->tl_b8->get_all_b8_archive(),
		);

		$this->load_page('tabel_b8', '_layouts/template', $data1);
	}

	// Public Pages
	public function detail_archive($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_b8->get_b8_by_field('tabel_b8_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => lang('tabel_b8_alias_v10_title'),
			'konten' => $this->v10['tabel_b8'],
			'dekor' => $this->tl_b8->dekor($this->theme_id, $this->aliases['tabel_b8']),
			'tbl_b8' => $this->tl_b8->get_b8_by_field_archive('tabel_b8_field1', $code),
		);

		$this->load_page('tabel_b8', '_layouts/template', $data1);
	}
	
	public function history($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_b8->get_b8_by_field('tabel_b8_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'table_id' => $code,
			'title' => lang('tabel_b8_alias_v11_title'),
			'konten' => $this->v11['tabel_b8'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b8']),
			'tbl_b8' => $this->tl_ot->get_by_field_history('tabel_b8', 'tabel_b8_field1', $code),
			'current' => $this->tl_ot->get_by_field('tabel_b8', 'tabel_b8_field1', $code),
		);

		$this->load_page('tabel_b8', '_layouts/template', $data1);
	}

	//Push History Data into current data
	public function push($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_ot->get_by_id_history('tabel_b8', $code)->result();
		$this->check_data($tabel);

		$code = $tabel[0]->{$this->aliases['tabel_b8_field1']};

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b8_field2'] => $tabel[0]->{$this->aliases['tabel_b8_field2']},

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_b8->update_b8($data, $code);

		$notif = $this->handle_4c($aksi, 'tabel_b8', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
}

