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
			'title' => $this->title['tabel_b8_alias_v3'],
			'konten' => $this->v3['tabel_b8'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b8']),
			'tbl_b8' => $this->tl_b8->get_all_b8(),
		);

		$this->load_page('tabel_b8', 'layouts/template_admin', $data1);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => $this->title['tabel_b8_alias_v4'],
			'konten' => $this->v4['tabel_b8'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b8']),
			'tbl_b8' => $this->tl_b8->get_all_b8(),
		);

		$this->load_page('tabel_b8', 'layouts/printpage', $data1);
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

		// $id = get_next_code($this->aliases['tabel_e1'], 'id', 'FK');
		// 'id' => $id,

		$data = array(
			'id' => '',
			$this->aliases['tabel_b8_field2'] => $this->v_post['tabel_b8_field2'],
			$this->aliases['tabel_b8_field3'] => $this->v_post['tabel_b8_field3'],
			$this->aliases['tabel_b8_field4'] => $this->v_post['tabel_b8_field4'],
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
		);

		$aksi = $this->tl_b8->update_b8($data, $code);
		$this->insert_history('tabel_b8', $data);

		$notif = $this->handle_4c($aksi, 'tabel_a1', $code);

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
}

