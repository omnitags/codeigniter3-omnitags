<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'OmnitagsController.php';

class Tabel_e4Controller extends OmnitagsController
{
	// Pages
	// Public Pages
	public function index()
	{
		$this->declarew();
		$this->session_all();

		$data1 = array(
			'title' => lang('tabel_e4_alias_v1_title'),
			'konten' => $this->v1['tabel_e4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e4']),
			'tbl_e4' => $this->tl_e4->get_all_e4(),
			'tbl_e2' => $this->tl_e2->get_all_e2(),
		);

		$this->load_page('tabel_e4', '_layouts/template', $data1);
	}

	// Public Pages
	public function detail($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_e4->get_e4_by_field('tabel_e4_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => lang('tabel_e4_alias_v8_title'),
			'konten' => $this->v8['tabel_e4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b2']),
			'tbl_e4' => $this->tl_e4->get_e4_by_field('tabel_e4_field1', $code),
		);

		$this->load_page('tabel_e4', '_layouts/template', $data1);
	}

	// Account Only Pages

	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_e4_alias_v3_title'),
			'konten' => $this->v3['tabel_e4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e4']),
			'tbl_e4' => $this->tl_e4->get_all_e4(),
		);

		$this->load_page('tabel_e4', '_layouts/template', $data1);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_e4_alias_v4_title'),
			'konten' => $this->v4['tabel_e4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e4']),
			'tbl_e4' => $this->tl_e4->get_all_e4(),
		);

		$this->load_page('tabel_e4', '_layouts/printpage', $data1);
	}

	/**
	 * Handles the submission of the form for adding new data to the 'tabel_e4' table.
	 *
	 * This function validates the form input and if successful, inserts the data into the 'tabel_e4' table.
	 * It then redirects the user back to the previous page with a notification message.
	 *
	 * @return void
	 */
	// Functions
	// Add data
	public function tambah()
	{
		$this->declarew();
		$this->session_3();

		validate_all(
			array(
				$this->v_post['tabel_e4_field2'],
			),
			$this->views['flash2'],
			'tambah'
		);

		$gambar = $this->upload_new_image(
			$this->v_post['tabel_e4_field2'],
			$this->v_upload_path['tabel_e4'],
			'tabel_e4_field3',
			$this->file_type1,
			''
		);

		$code = $this->add_code('tabel_e4', $this->aliases['tabel_e4_field1'], 5, '04');

		$data = array(
			$this->aliases['tabel_e4_field1'] => $code,
			$this->aliases['tabel_e4_field2'] => $this->v_post['tabel_e4_field2'],
			$this->aliases['tabel_e4_field3'] => $gambar,

			'created_at' => date("Y-m-d\TH:i:s"),
			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_e4->insert_e4($data);
		$this->insert_history('tabel_e4', $data);

		$notif = $this->handle_4b($aksi, 'tabel_e4');

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Update data
	public function update()
	{
		// Di sini aku masih ada perdebatan apakah akan menggunakan gambar dengan nama file yang sama atau tidak
		// Atau menggunakan menggunakan data dari field lain sebagai nama gambar
		// Hal itu tentunya tergantung preferensi user
		// Fitur update gambar di bawah sudah selesai
		// Bisa mengupload gambar dengan tulisan yang dihapus, tentunya dengan minim data double

		$this->declarew();
		$this->session_3();

		$code = $this->v_post['tabel_e4_field1'];

		$tabel = $this->tl_e4->get_e4_by_field('tabel_e4_field1', $code)->result();
		$this->check_data($tabel);

		validate_all(
			array(
				$this->v_post['tabel_e4_field1'],
				$this->v_post['tabel_e4_field2'],
			),
			$this->views['flash3'],
			'ubah' . $code
		);

		$gambar = $this->change_image(
			$this->v_post['tabel_e4_field2'] . "_" . $this->aliases['tabel_e4_field3'],
			$tabel[0]->{$this->aliases['tabel_e4_field3']},
			$this->v_upload_path['tabel_e4'],
			'tabel_e4_field3',
			$this->file_type1,
			$tabel
		);

		$data = array(
			$this->aliases['tabel_e4_field2'] => $this->v_post['tabel_e4_field2'],
			$this->aliases['tabel_e4_field3'] => $gambar,

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_e4->update_e4($data, $code);
		$this->insert_history('tabel_e4', $data);

		$notif = $this->handle_4c($aksi, 'tabel_e4', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
	
	//Soft Delete Data
	public function soft_delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_e4->get_e4_by_field('tabel_e4_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_e4->update_e4($data, $code);
		$this->insert_history('tabel_e4', $data);

		$notif = $this->handle_4e($aksi, 'tabel_e4', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Soft Delete data
	public function restore($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_e4->get_e4_by_field_archive('tabel_e4_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => NULL,
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_e4->update_e4($data, $code);
		$this->insert_history('tabel_e4', $data);

		$notif = $this->handle_4e($aksi, 'tabel_e4', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel_e4 = $this->tl_e4->get_e4_by_field_archive('tabel_e4_field1', $code)->result();
		$this->check_data($tabel_e4);

		$aksi = $this->tl_e4->delete_e4_by_field('tabel_e4_field1', $code);

		$notif = $this->handle_4e($aksi, 'tabel_e4', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Print one data

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_e4_alias_v9_title'),
			'konten' => $this->v9['tabel_e4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e4']),
			'tbl_e4' => $this->tl_e4->get_all_e4_archive(),
		);

		$this->load_page('tabel_e4', '_layouts/template', $data1);
	}

	// Public Pages
	public function detail_archive($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_e4->get_e4_by_field('tabel_e4_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => lang('tabel_e4_alias_v10_title'),
			'konten' => $this->v10['tabel_e4'],
			'dekor' => $this->tl_e4->dekor($this->theme_id, $this->aliases['tabel_e4']),
			'tbl_e4' => $this->tl_e4->get_e4_by_field_archive('tabel_e4_field1', $code),
		);

		$this->load_page('tabel_e4', '_layouts/template', $data1);
	}
	
	public function history($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_e4->get_e4_by_field('tabel_e4_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'table_id' => $code,
			'title' => lang('tabel_e4_alias_v11_title'),
			'konten' => $this->v11['tabel_e4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e4']),
			'tbl_e4' => $this->tl_ot->get_by_field_history('tabel_e4', 'tabel_e4_field1', $code),
			'current' => $this->tl_ot->get_by_field('tabel_e4', 'tabel_e4_field1', $code),
		);

		$this->load_page('tabel_e4', '_layouts/template', $data1);
	}	

	//Push History Data into current data
	public function push($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_ot->get_by_id_history('tabel_e4', $code)->result();
		$this->check_data($tabel);

		$code = $tabel[0]->{$this->aliases['tabel_e4_field1']};

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_e4_field2'] => $tabel[0]->{$this->aliases['tabel_e4_field2']},

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_e4->update_e4($data, $code);

		$notif = $this->handle_4c($aksi, 'tabel_e4', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
}

