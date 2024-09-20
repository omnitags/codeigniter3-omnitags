<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_b11 extends Omnitags
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
			'title' => lang('tabel_b11_alias_v3_title'),
			'konten' => $this->v3['tabel_b11'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b11']),
			'tbl_b11' => $this->tl_b11->get_all_b11(),
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
			'title' => lang('tabel_b11_alias_v4_title'),
			'konten' => $this->v4['tabel_b11'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b11']),
			'tbl_b11' => $this->tl_b11->get_all_b11(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		$this->track_page();
		load_view_data('_layouts/printpage', $data);
	}

	// Print one data



	// Functions
	// Add data
	public function tambah()
	{
		$this->declarew();
		$this->session_3();

		// $id = get_next_code($this->aliases['tabel_b11'], $this->aliases['tabel_b11_field1'], 'USR');

		$data = array(
			// $this->aliases['tabel_b11_field1'] => $id,
			$this->aliases['tabel_b11_field1'] => '',
			$this->aliases['tabel_b11_field2'] => userdata($this->aliases['tabel_c2_field1']),

			'created_at' => date("Y-m-d\TH:i:s"),
			'updated_at' => date("Y-m-d\TH:i:s"),
		);

		$aksi = $this->tl_b11->insert_b11($data);
	}
	
	//Soft Delete Data
	public function soft_delete($tabel_b11_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_b11->get_b11_by_field('tabel_b11_field1', $tabel_b11_field1)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
		); 

		$aksi = $this->tl_b11->update_b11($data, $tabel_b11_field1);

		$notif = $this->handle_4e($aksi, 'tabel_b11', $tabel_b11_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}
}
