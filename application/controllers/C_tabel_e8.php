<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_e8 extends Omnitags
{
	// Pages
	// Public Pages
	public function index()
	{
		$this->declarew();
		$this->session_all();

		$data1 = array(
			'title' => lang('tabel_e8_alias_v1_title'),
			'konten' => $this->v1['tabel_e8'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e8']),
			'tbl_e8' => $this->tl_e8->get_all_e8(),
		);

		$this->load_page('tabel_e8', '_layouts/template', $data1);
	}

	// Account Only Pages

	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_e8_alias_v3_title'),
			'konten' => $this->v3['tabel_e8'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e8']),
			'tbl_e8' => $this->tl_e8->get_all_e8(),
			'tbl_c1' => $this->tl_c1->get_all_c1(),
			'tbl_e3' => $this->tl_e3->get_all_e3(),
		);

		$this->load_page('tabel_e8', '_layouts/template', $data1);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_e8_alias_v4_title'),
			'konten' => $this->v4['tabel_e8'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e8']),
			'tbl_e8' => $this->tl_e8->get_all_e8(),
		);

		$this->load_page('tabel_e8', '_layouts/printpage', $data1);
	}

	/**
	 * Handles the submission of the form for adding new data to the 'tabel_e8' table.
	 *
	 * This function validates the form input and if successful, inserts the data into the 'tabel_e8' table.
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
				$this->v_post['tabel_e8_field2'],
			),
			$this->views['flash2'],
			'tambah'
		);

		$code = $this->add_code('tabel_e8', $this->aliases['tabel_e8_field1'], 5, '08');

		$data = array(
			$this->aliases['tabel_e8_field1'] => $code,
			$this->aliases['tabel_e8_field2'] => $this->v_post['tabel_e8_field2'],
			$this->aliases['tabel_e8_field3'] => $this->v_post['tabel_e8_field3'],

			'created_at' => date("Y-m-d\TH:i:s"),
			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_e8->insert_e8($data);
		$this->insert_history('tabel_e8', $data);

		$notif = $this->handle_4b($aksi, 'tabel_e8');

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

		$code = $this->v_post['tabel_e8_field1'];

		$tabel_e8 = $this->tl_e8->get_e8_by_field('tabel_e8_field1', $code)->result();
		$this->check_data($tabel_e8);

		validate_all(
			array(
				$this->v_post['tabel_e8_field1'],
				$this->v_post['tabel_e8_field2'],
			),
			$this->views['flash3'],
			'ubah' . $code
		);

		$data = array(
			$this->aliases['tabel_e8_field2'] => $this->v_post['tabel_e8_field2'],
			$this->aliases['tabel_e8_field3'] => $this->v_post['tabel_e8_field3'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_e8->update_e8($data, $code);
		$this->insert_history('tabel_e8', $data);

		$notif = $this->handle_4c($aksi, 'tabel_e8', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	//Soft Delete Data
	public function soft_delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_e8->get_e8_by_field('tabel_e8_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_e8->update_e8($data, $code);
		$this->insert_history('tabel_e8', $data);

		$notif = $this->handle_4e($aksi, 'tabel_e8', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Soft Delete data
	public function restore($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_e8->get_e8_by_field_archive('tabel_e8_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => NULL,
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_e8->update_e8($data, $code);
		$this->insert_history('tabel_e8', $data);

		$notif = $this->handle_4e($aksi, 'tabel_e8', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel_e8 = $this->tl_e8->get_e8_by_field_archive('tabel_e8_field1', $code)->result();
		$this->check_data($tabel_e8);

		$aksi = $this->tl_e8->delete_e8_by_field('tabel_e8_field1', $code);

		$notif = $this->handle_4e($aksi, 'tabel_e8', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Print one data

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_e8_alias_v9_title'),
			'konten' => $this->v9['tabel_e8'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e8']),
			'tbl_e8' => $this->tl_e8->get_all_e8_archive(),
		);

		$this->load_page('tabel_e8', '_layouts/template', $data1);
	}

	// Public Pages
	public function detail_archive($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_e8->get_e8_by_field('tabel_e8_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => lang('tabel_e8_alias_v10_title'),
			'konten' => $this->v10['tabel_e8'],
			'dekor' => $this->tl_e8->dekor($this->theme_id, $this->aliases['tabel_e8']),
			'tbl_e8' => $this->tl_e8->get_e8_by_field_archive('tabel_e8_field1', $code),
		);

		$this->load_page('tabel_e8', '_layouts/template', $data1);
	}

	public function history($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_e8->get_e8_by_field('tabel_e8_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'table_id' => $code,
			'title' => lang('tabel_e8_alias_v11_title'),
			'konten' => $this->v11['tabel_e8'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e8']),
			'tbl_e8' => $this->tl_ot->get_by_field_history('tabel_e8', 'tabel_e8_field1', $code),
		);

		$this->load_page('tabel_e8', '_layouts/template', $data1);
	}

	//Push History Data into current data
	public function push($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_ot->get_by_id_history('tabel_e8', $code)->result();
		$this->check_data($tabel);

		$code = $tabel[0]->{$this->aliases['tabel_e8_field1']};

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_e8_field2'] => $tabel[0]->{$this->aliases['tabel_e8_field2']},

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_e8->update_e8($data, $code);

		$notif = $this->handle_4c($aksi, 'tabel_e8', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
}

