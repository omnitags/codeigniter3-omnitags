<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'OmnitagsController.php';

class Tabel_b10Controller extends OmnitagsController
{
	// Public Pages
	public function index()
	{
		$this->declarew();
		$this->page_session_all();

		$param1 = $this->v_get['tabel_b10_field4'];

		$filter = $this->tl_b10->get_b10_by_field('tabel_b10_field4', $param1);

		if (empty($param1)) {
			$result = $this->tl_b10->get_all_b10();
		} else {
			$result = $filter;
		}

		$data1 = array(
			'title' => lang('tabel_b10_alias_v1_title'),
			'konten' => $this->v1['tabel_b10'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b10']),
			'tbl_b10' => $result,
			'tbl_e4' => $this->tl_e4->get_all_e4(),
			'tabel_b10_field4_value' => $param1
		);

		$this->load_page('tabel_b10', '_layouts/template', $data1);
	}

	// Pages
	// Public Pages
	public function detail($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_b10->get_b10_by_field('tabel_b10_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => lang('tabel_b10_alias_v8_title'),
			'konten' => $this->v8['tabel_b10'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b10']),
			'tbl_b10' => $this->tl_b10->get_b10_by_field('tabel_b10_field1', $code),
		);

		$this->load_page('tabel_b10', '_layouts/template', $data1);
	}


	// Account Only Pages


	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_3();

		$param1 = $this->v_get['tabel_b10_field4'];

		$filter = $this->tl_b10->get_b10_by_field('tabel_b10_field4', $param1);

		if (empty($param1)) {
			$result = $this->tl_b10->get_all_b10();
		} else {
			$result = $filter;
		}

		$data1 = array(
			'title' => lang('tabel_b10_alias_v3_title'),
			'konten' => $this->v3['tabel_b10'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b10']),
			'tbl_b10' => $result,
			'tbl_e4' => $this->tl_e4->get_all_e4(),
			'tabel_b10_field4_value' => $param1
		);

		$this->load_page('tabel_b10', '_layouts/template', $data1);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_b10_alias_v4_title'),
			'konten' => $this->v4['tabel_b10'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b10']),
			'tbl_b10' => $this->tl_b10->get_all_b10(),
		);

		$this->load_page('tabel_b10', '_layouts/printpage', $data1);
	}

	// Functions
	// Add data
	public function tambah()
	{
		$this->declarew();
		$this->session_3();

		validate_all(
			array(
				$this->v_post['tabel_b10_field3'],
				$this->v_post['tabel_b10_field4'],
			),
			$this->views['flash2'],
			'tambah'
		);

		$tabel_b10_field3 = $this->v_post['tabel_b10_field3'];
		$method = $this->tl_b10->get_b10_by_field('tabel_b10_field3', $tabel_b10_field3);

		// mencari apakah jumlah data kurang dari 1
		if ($method->num_rows() < 1) {

			$gambar = $this->upload_new_image(
				$this->v_post['tabel_b10_field3'],
				$this->v_upload_path['tabel_b10'],
				'tabel_b10_field2',
				$this->file_type1,
				$method
			);

			$code = $this->add_code('tabel_b10', $this->aliases['tabel_b10_field1'], 5, '10');

			$data = array(
				$this->aliases['tabel_b10_field1'] => $code,
				$this->aliases['tabel_b10_field2'] => $gambar,
				$this->aliases['tabel_b10_field3'] => $this->v_post['tabel_b10_field3'],
				$this->aliases['tabel_b10_field4'] => $this->v_post['tabel_b10_field4'],

				'created_at' => date("Y-m-d\TH:i:s"),
				'updated_at' => date("Y-m-d\TH:i:s"),
				'updated_by' => userdata($this->aliases['tabel_c2_field1']),
			);

			$aksi = $this->tl_b10->insert_b10($data);

			$notif = $this->handle_4b($aksi, 'tabel_b10');

			redirect(site_url($this->language_code . '/' . $this->aliases['tabel_b10'] . '/admin'));
		} else {
			set_flashdata($this->views['flash1'], $this->aliases['tabel_b10_field2'] . ' telah digunakan!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	// Update data
	public function update()
	{
		$this->declarew();
		$this->session_3();

		$code = $this->v_post['tabel_b10_field1'];

		$tabel = $this->tl_b10->get_b10_by_field('tabel_b10_field1', $code)->result();
		$this->check_data($tabel);

		validate_all(
			array(
				$this->v_post['tabel_b10_field1'],
				$this->v_post['tabel_b10_field2_old'],
				$this->v_post['tabel_b10_field3'],
				$this->v_post['tabel_b10_field4'],
			),
			$this->views['flash3'],
			'ubah' . $code,
		);

		$tabel = $this->tl_b10->get_b10_by_field('tabel_b10_field1', $code)->result();

		$gambar = $this->change_image_advanced(
			'tabel_b10_field3',
			$this->v_upload_path['tabel_b10'],
			'tabel_b10_field2',
			$this->file_type1,
			$tabel
		);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b10_field2'] => $gambar,
			$this->aliases['tabel_b10_field3'] => $this->v_post['tabel_b10_field3'],
			$this->aliases['tabel_b10_field4'] => $this->v_post['tabel_b10_field4'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_b10->update_b10($data, $code);
		$this->insert_history('tabel_b10', $data);

		$notif = $this->handle_4c($aksi, 'tabel_b10', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
	
	//Soft Delete Data
	public function soft_delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_b10->get_b10_by_field('tabel_b10_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_b10->update_b10($data, $code);
		$this->insert_history('tabel_b10', $data);

		$notif = $this->handle_4e($aksi, 'tabel_b10', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Soft Delete data
	public function restore($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_b10->get_b10_by_field_archive('tabel_b10_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => NULL,
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_b10->update_b10($data, $code);
		$this->insert_history('tabel_b10', $data);

		$notif = $this->handle_4e($aksi, 'tabel_b10', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel_b10 = $this->tl_b10->get_b10_by_field_archive('tabel_b10_field1', $code)->result();
		$this->check_data($tabel_b10);

		$img = $tabel_b10[0]->{$this->aliases['tabel_b10_field2']};

		unlink($this->v_upload_path['tabel_b10'] . $img);

		$aksi = $this->tl_b10->delete_b10_by_field('tabel_b10_field1', $code);

		$notif = $this->handle_4e($aksi, 'tabel_b10', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Print one data

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_b10_alias_v9_title'),
			'konten' => $this->v9['tabel_b10'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b10']),
			'tbl_b10' => $this->tl_b10->get_all_b10_archive(),
		);

		$this->load_page('tabel_b10', '_layouts/template', $data1);
	}

	// Public Pages
	public function detail_archive($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_b10->get_b10_by_field('tabel_b10_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => lang('tabel_b10_alias_v10_title'),
			'konten' => $this->v10['tabel_b10'],
			'dekor' => $this->tl_b10->dekor($this->theme_id, $this->aliases['tabel_b10']),
			'tbl_b10' => $this->tl_b10->get_b10_by_field_archive('tabel_b10_field1', $code),
		);

		$this->load_page('tabel_b10', '_layouts/template', $data1);
	}
	
	public function history($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_b10->get_b10_by_field('tabel_b10_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'table_id' => $code,
			'title' => lang('tabel_b10_alias_v11_title'),
			'konten' => $this->v11['tabel_b10'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b10']),
			'tbl_b10' => $this->tl_ot->get_by_field_history('tabel_b10', 'tabel_b10_field1', $code),
			'current' => $this->tl_ot->get_by_field('tabel_b10', 'tabel_b10_field1', $code),
		);

		$this->load_page('tabel_b10', '_layouts/template', $data1);
	}

	//Push History Data into current data
	public function push($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_ot->get_by_id_history('tabel_b10', $code)->result();
		$this->check_data($tabel);

		$code = $tabel[0]->{$this->aliases['tabel_b10_field1']};

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b10_field2'] => $tabel[0]->{$this->aliases['tabel_b10_field2']},

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_b10->update_b10($data, $code);

		$notif = $this->handle_4c($aksi, 'tabel_b10', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
}

