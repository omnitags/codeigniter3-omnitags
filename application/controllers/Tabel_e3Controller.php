<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'OmnitagsController.php';

class Tabel_e3Controller extends OmnitagsController
{
	// Pages
	// Public Pages


	// Account Only Pages


	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value3'],
			$this->aliases['tabel_c2_field6_value4']
		];
		$this->page_session_check($allowed_values);

		$data1 = array(
			'title' => $this->title['tabel_e3_alias_v3'],
			'konten' => $this->v3['tabel_e3'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e3']),
			'tbl_e3' => $this->tl_e3->get_all_e3(),
			'tbl_e4' => $this->tl_e4->get_all_e4(),
			// 'tbl_c1' => $this->tl_c1->get_all_c1(),
		);

		$this->load_page('tabel_e3', 'layouts/template_admin', $data1);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value3'],
			$this->aliases['tabel_c2_field6_value4']
		];
		$this->page_session_check($allowed_values);

		$data1 = array(
			'title' => $this->title['tabel_e3_alias_v4'],
			'konten' => $this->v4['tabel_e3'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e3']),
			'tbl_e3' => $this->tl_e3->get_all_e3(),
		);

		$this->load_page('tabel_e3', 'layouts/printpage', $data1);
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
				$this->v_post['tabel_e3_field2'],
				$this->v_post['tabel_e3_field3'],
			),
			$this->views['flash2'],
			'tambah'
		);

		$code = $this->add_code('tabel_e3', 'id', 5, '03');

		$data = array(
			'id' => $code,
			$this->aliases['tabel_e3_field2'] => $this->v_post['tabel_e3_field2'],
			$this->aliases['tabel_e3_field3'] => $this->v_post['tabel_e3_field3'],

			'created_at' => date("Y-m-d\TH:i:s"),
			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_e3->insert_e3($data);
		$this->insert_history('tabel_e3', $data);

		$notif = $this->handle_4b($aksi, 'tabel_e3');

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Update data
	public function update()
	{
		$this->declarew();
		$this->session_3();

		$code = $this->v_post['tabel_e3_field1'];

		$tabel = $this->tl_e3->get_e3_by_field('tabel_e3_field1', $code)->result();
		$this->check_data($tabel);

		validate_all(
			array(
				$this->v_post['tabel_e3_field1'],
				$this->v_post['tabel_e3_field2'],
				$this->v_post['tabel_e3_field3'],
			),
			$this->views['flash3'],
			'ubah' . $code
		);

		$data = array(
			$this->aliases['tabel_e3_field2'] => $this->v_post['tabel_e3_field2'],
			$this->aliases['tabel_e3_field3'] => $this->v_post['tabel_e3_field3'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_e3->update_e3($data, $code);
		$this->insert_history('tabel_e3', $data);

		$notif = $this->handle_4c($aksi, 'tabel_e3', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	//Soft Delete Data
	public function soft_delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_e3->get_e3_by_field('tabel_e3_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_e3->update_e3($data, $code);
		$this->insert_history('tabel_e3', $data);

		$notif = $this->handle_4e($aksi, 'tabel_e3', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Soft Delete data
	public function restore($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_e3->get_e3_by_field_archive('tabel_e3_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => NULL,
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_e3->update_e3($data, $code);
		$this->insert_history('tabel_e3', $data);

		$notif = $this->handle_4e($aksi, 'tabel_e3', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_e3->get_e3_by_field_archive('tabel_e3_field1', $code)->result();
		$this->check_data($tabel);

		$aksi = $this->tl_e3->delete_e3_by_field('tabel_e3_field1', $code);

		$notif = $this->handle_4e($aksi, 'tabel_e3', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => $this->title['tabel_e3_alias_v9'],
			'konten' => $this->v9['tabel_e3'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e3']),
			'tbl_e3' => $this->tl_e3->get_all_e3_archive(),
		);

		$this->load_page('tabel_e3', 'layouts/template', $data1);
	}
	
	public function detai_archive($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_e3->get_e3_by_field('tabel_e3_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => $this->title['tabel_e3_alias_v10'],
			'konten' => $this->v10['tabel_e3'],
			'dekor' => $this->tl_e3->dekor($this->theme_id, $this->aliases['tabel_e3']),
			'tbl_e3' => $this->tl_e3->get_e3_by_field_archive('tabel_e3_field1', $code),
		);

		$this->load_page('tabel_e3', 'layouts/template_admin', $data1);
	}

	public function history($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_e3->get_e3_by_field('tabel_e3_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'table_id' => $code,
			'title' => $this->title['tabel_e3_alias_v11'],
			'konten' => $this->v11['tabel_e3'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e3']),
			'tbl_e3' => $this->tl_ot->get_by_field_history('tabel_e3', 'tabel_e3_field1', $code),
			'current' => $this->tl_ot->get_by_field('tabel_e3', 'tabel_e3_field1', $code),
		);

		$this->load_page('tabel_e3', 'layouts/template_admin', $data1);
	}

	//Push History Data into current data
	public function push($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_ot->get_by_id_history('tabel_e3', $code)->result();
		$this->check_data($tabel);

		$code = $tabel[0]->id;

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_e3_field2'] => $tabel[0]->{$this->aliases['tabel_e3_field2']},

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_e3->update_e3($data, $code);

		$notif = $this->handle_4c($aksi, 'tabel_e3', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
}

