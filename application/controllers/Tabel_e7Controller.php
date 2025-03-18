<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'OmnitagsController.php';

class Tabel_e7Controller extends OmnitagsController
{
	// Pages
	// Public Pages
	public function index()
	{
		$this->declarew();
		$this->session_all();

		$data1 = array(
			'title' => $this->title['tabel_e7_alias_v1'],
			'konten' => $this->v1['tabel_e7'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e7']),
			'tbl_e7' => $this->tl_e7->get_all_e7(),
		);

		$this->load_page('tabel_e7', 'layouts/template', $data1);
	}

	// Account Only Pages

	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_3();
		
		$data1 = array(
			'title' => $this->title['tabel_e7_alias_v3'],
			'konten' => $this->v3['tabel_e7'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e7']),
			'tbl_e7' => $this->tl_e7->get_all_e7(),
			'tbl_c1' => $this->tl_c1->get_all_c1(),
		);

		$this->load_page('tabel_e7', 'layouts/template_admin', $data1);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => $this->title['tabel_e7_alias_v4'],
			'konten' => $this->v4['tabel_e7'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e7']),
			'tbl_e7' => $this->tl_e7->get_all_e7(),
		);

		$this->load_page('tabel_e7', 'layouts/printpage', $data1);
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

		$code = $this->add_code('tabel_e7', 'id', 5, '07');

		$data = array(
			'id' => $code,
			$this->aliases['tabel_e7_field2'] => $this->v_post['tabel_e7_field2'],
			$this->aliases['tabel_e7_field3'] => $this->v_post['tabel_e7_field3'],

			'created_at' => date("Y-m-d\TH:i:s"),
			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_e7->insert_e7($data);
		$this->insert_history('tabel_e7', $data);

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

		$code = $this->v_post['tabel_e7_field1'];

		$tabel_e7 = $this->tl_e7->get_e7_by_field('tabel_e7_field1', $code)->result();
		$this->check_data($tabel_e7);

		validate_all(
			array(
				$this->v_post['tabel_e7_field1'],
				$this->v_post['tabel_e7_field2'],
			),
			$this->views['flash3'],
			'ubah' . $code
		);

		$data = array(
			$this->aliases['tabel_e7_field2'] => $this->v_post['tabel_e7_field2'],
			$this->aliases['tabel_e7_field3'] => $this->v_post['tabel_e7_field3'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_e7->update_e7($data, $code);
		$this->insert_history('tabel_e7', $data);

		$notif = $this->handle_4c($aksi, 'tabel_e7', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
	
	//Soft Delete Data
	public function soft_delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_e7->get_e7_by_field('tabel_e7_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_e7->update_e7($data, $code);
		$this->insert_history('tabel_e7', $data);

		$notif = $this->handle_4e($aksi, 'tabel_e7', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Soft Delete data
	public function restore($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_e7->get_e7_by_field_archive('tabel_e7_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => NULL,
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_e7->update_e7($data, $code);
		$this->insert_history('tabel_e7', $data);

		$notif = $this->handle_4e($aksi, 'tabel_e7', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel_e7 = $this->tl_e7->get_e7_by_field_archive('tabel_e7_field1', $code)->result();
		$this->check_data($tabel_e7);

		$aksi = $this->tl_e7->delete_e7_by_field('tabel_e7_field1', $code);

		$notif = $this->handle_4e($aksi, 'tabel_e7', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Print one data

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => $this->title['tabel_e7_alias_v9'],
			'konten' => $this->v9['tabel_e7'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e7']),
			'tbl_e7' => $this->tl_e7->get_all_e7_archive(),
		);

		$this->load_page('tabel_e7', 'layouts/template', $data1);
	}
	
	public function detai_archive($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_e7->get_e7_by_field('tabel_e7_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => $this->title['tabel_e7_alias_v10'],
			'konten' => $this->v10['tabel_e7'],
			'dekor' => $this->tl_e7->dekor($this->theme_id, $this->aliases['tabel_e7']),
			'tbl_e7' => $this->tl_e7->get_e7_by_field_archive('tabel_e7_field1', $code),
		);

		$this->load_page('tabel_e7', 'layouts/template', $data1);
	}
	
	public function history($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_e7->get_e7_by_field('tabel_e7_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'table_id' => $code,
			'title' => $this->title['tabel_e7_alias_v11'],
			'konten' => $this->v11['tabel_e7'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e7']),
			'tbl_e7' => $this->tl_ot->get_by_field_history('tabel_e7', 'tabel_e7_field1', $code),
			'current' => $this->tl_ot->get_by_field('tabel_e7', 'tabel_e7_field1', $code),
		);

		$this->load_page('tabel_e7', 'layouts/template_admin', $data1);
	}

	//Push History Data into current data
	public function push($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_ot->get_by_id_history('tabel_e7', $code)->result();
		$this->check_data($tabel);

		$code = $tabel[0]->id;

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_e7_field2'] => $tabel[0]->{$this->aliases['tabel_e7_field2']},

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_e7->update_e7($data, $code);

		$notif = $this->handle_4c($aksi, 'tabel_e7', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
}

