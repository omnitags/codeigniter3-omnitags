<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_e7 extends Omnitags
{
	// Pages
	// Public Pages
	public function index()
	{
		$this->declarew();
		$this->session_all();

		$data1 = array(
			'title' => lang('tabel_e7_alias_v1_title'),
			'konten' => $this->v1['tabel_e7'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e7']),
			'tbl_e7' => $this->tl_e7->get_all_e7(),
		);
		
		$data = array_merge($data1, $this->package);
		
		set_userdata('previous_url', current_url());
		$this->track_page();
		load_view_data('_layouts/template', $data);
	}

	// Account Only Pages

	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_3();
		
		$data1 = array(
			'title' => lang('tabel_e7_alias_v3_title'),
			'konten' => $this->v3['tabel_e7'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e7']),
			'tbl_e7' => $this->tl_e7->get_all_e7(),
			'tbl_c1' => $this->tl_c1->get_all_c1(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		$this->track_page();
		load_view_data('_layouts/template', $data);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_e7_alias_v4_title'),
			'konten' => $this->v4['tabel_e7'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e7']),
			'tbl_e7' => $this->tl_e7->get_all_e7(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		$this->track_page();
		load_view_data('_layouts/printpage', $data);
	}

	/**
	 * Handles the submission of the form for adding new data to the 'tabel_e7' table.
	 *
	 * This function validates the form input and if successful, inserts the data into the 'tabel_e7' table.
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
				$this->v_post['tabel_e7_field2'],
			),
			$this->views['flash2'],
			'tambah'
		);

		$code = $this->add_code('tabel_e7', $this->aliases['tabel_e7_field1'], 5, '07');

		$data = array(
			$this->aliases['tabel_e7_field1'] => $code,
			$this->aliases['tabel_e7_field2'] => $this->v_post['tabel_e7_field2'],
			$this->aliases['tabel_e7_field3'] => $this->v_post['tabel_e7_field3'],

			'created_at' => date("Y-m-d\TH:i:s"),
			'updated_at' => date("Y-m-d\TH:i:s"),
		);

		$aksi = $this->tl_e7->insert_e7($data);

		$notif = $this->handle_4b($aksi, 'tabel_e7');

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

		$tabel_e7_field1 = $this->v_post['tabel_e7_field1'];

		$tabel_e7 = $this->tl_e7->get_e7_by_field('tabel_e7_field1', $tabel_e7_field1)->result();
		$this->check_data($tabel_e7);

		validate_all(
			array(
				$this->v_post['tabel_e7_field1'],
				$this->v_post['tabel_e7_field2'],
			),
			$this->views['flash3'],
			'ubah' . $tabel_e7_field1
		);

		$data = array(
			$this->aliases['tabel_e7_field2'] => $this->v_post['tabel_e7_field2'],
			$this->aliases['tabel_e7_field3'] => $this->v_post['tabel_e7_field3'],

			'updated_at' => date("Y-m-d\TH:i:s"),
		);

		$aksi = $this->tl_e7->update_e7($data, $tabel_e7_field1);

		$notif = $this->handle_4c($aksi, 'tabel_e7', $tabel_e7_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}
	
	//Soft Delete Data
	public function soft_delete($tabel_e7_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_e7->get_e7_by_field('tabel_e7_field1', $tabel_e7_field1)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
		);

		$aksi = $this->tl_e7->update_e7($data, $tabel_e7_field1);

		$notif = $this->handle_4e($aksi, 'tabel_e7', $tabel_e7_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Soft Delete data
	public function restore($tabel_e7_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_e7->get_e7_by_field_archive('tabel_e7_field1', $tabel_e7_field1)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => NULL,
		);

		$aksi = $this->tl_e7->update_e7($data, $tabel_e7_field1);

		$notif = $this->handle_4e($aksi, 'tabel_e7', $tabel_e7_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($tabel_e7_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel_e7 = $this->tl_e7->get_e7_by_field_archive('tabel_e7_field1', $tabel_e7_field1)->result();
		$this->check_data($tabel_e7);

		$aksi = $this->tl_e7->delete_e7_by_field('tabel_e7_field1', $tabel_e7_field1);

		$notif = $this->handle_4e($aksi, 'tabel_e7', $tabel_e7_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Print one data

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_e7_alias_v9_title'),
			'konten' => $this->v9['tabel_e7'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e7']),
			'tbl_e7' => $this->tl_e7->get_all_e7_archive(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		$this->track_page();
		load_view_data('_layouts/template', $data);
	}

	// Public Pages
	public function detail_archive($param1 = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_e7->get_e7_by_field('tabel_e7_field1', $param1)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => lang('tabel_e7_alias_v10_title'),
			'konten' => $this->v10['tabel_e7'],
			'dekor' => $this->tl_e7->dekor($this->theme_id, $this->aliases['tabel_e7']),
			'tbl_e7' => $this->tl_e7->get_e7_by_field_archive('tabel_e7_field1', $param1),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		$this->track_page();
		load_view_data('_layouts/template', $data);
	}

}
