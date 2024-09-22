<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_d3 extends Omnitags
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
			'title' => lang('tabel_d3_alias_v3_title'),
			'konten' => $this->v3['tabel_d3'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_d3']),
			'tbl_d3' => $this->tl_d3->get_all_d3(),
		);

		$this->load_page('tabel_d3', '_layouts/template', $data1);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_d3_alias_v4_title'),
			'konten' => $this->v4['tabel_d3'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_d3']),
			'tbl_d3' => $this->tl_d3->get_all_d3(),
		);

		$this->load_page('tabel_d3', '_layouts/printpage', $data1);
	}

	// Print one data



	// Functions
	// Add data
	public function tambah()
	{
		$this->declarew();
		$this->session_3();

		// $id = get_next_code($this->aliases['tabel_d3'], $this->aliases['tabel_d3_field1'], 'USR');

		$data = array(
			// $this->aliases['tabel_d3_field1'] => $id,
			$this->aliases['tabel_d3_field1'] => '',
			$this->aliases['tabel_d3_field2'] => userdata($this->aliases['tabel_c2_field1']),

			'created_at' => date("Y-m-d\TH:i:s"),
			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_d3->insert_d3($data);
	}
	
	//Soft Delete Data
	public function soft_delete($tabel_d3_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_d3->get_d3_by_field('tabel_d3_field1', $tabel_d3_field1)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_d3->update_d3($data, $tabel_d3_field1);
		$this->insert_history('tabel_d3', $data);

		$notif = $this->handle_4e($aksi, 'tabel_d3', $tabel_d3_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Soft Delete data
	public function restore($tabel_d3_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_d3->get_d3_by_field_archive('tabel_d3_field1', $tabel_d3_field1)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => NULL,
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_d3->update_d3($data, $tabel_d3_field1);
		$this->insert_history('tabel_d3', $data);

		$notif = $this->handle_4e($aksi, 'tabel_d3', $tabel_d3_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_d3_alias_v9_title'),
			'konten' => $this->v9['tabel_d3'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_d3']),
			'tbl_d3' => $this->tl_d3->get_all_d3_archive(),
		);

		$this->load_page('tabel_d3', '_layouts/template', $data1);
	}

	// Public Pages
	public function detail_archive($param1 = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_d3->get_d3_by_field('tabel_d3_field1', $param1)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => lang('tabel_d3_alias_v10_title'),
			'konten' => $this->v10['tabel_d3'],
			'dekor' => $this->tl_d3->dekor($this->theme_id, $this->aliases['tabel_d3']),
			'tbl_d3' => $this->tl_d3->get_d3_by_field_archive('tabel_d3_field1', $param1),
		);

		$this->load_page('tabel_d3', '_layouts/template', $data1);
	}
	
	public function history($param1 = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_d3->get_d3_by_field('tabel_d3_field1', $param1)->result();
		$this->check_data($tabel);

		$data1 = array(
			'table_id' => $param1,
			'title' => lang('tabel_d3_alias_v11_title'),
			'konten' => $this->v11['tabel_d3'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_d3']),
			'tbl_d3' => $this->tl_ot->get_by_field_history('tabel_d3', 'tabel_d3_field1', $param1),
		);

		$this->load_page('tabel_d3', '_layouts/template', $data1);
	}
}
