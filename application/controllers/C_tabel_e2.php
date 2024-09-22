<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_e2 extends Omnitags
{
	// Pages
	// Public Pages
	public function index()
	{
		$this->declarew();
		$this->session_all();

		$data1 = array(
			'title' => lang('tabel_e2_alias_v1_title'),
			'konten' => $this->v1['tabel_e2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e2']),
			'tbl_e2' => $this->tl_e2->get_all_e2(),
			'tbl_e4' => $this->tl_e4->get_all_e4(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		$this->track_page();
		load_view_data('_layouts/template', $data);
	}

	public function detail($param1 = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_e2->get_e2_by_field('tabel_e2_field1', $param1)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => lang('tabel_e2_alias_v8_title'),
			'konten' => $this->v8['tabel_e2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b2']),
			'tbl_e2' => $this->tl_e2->get_e2_by_field('tabel_e2_field1', $param1),
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

		$param1 = $this->v_get['tabel_e2_field3'];

		$filter = $this->tl_e2->get_e2_by_field('tabel_e2_field3', $param1);

		if (empty($param1)) {
			$result = $this->tl_e2->get_all_e2();
		} else {
			$result = $filter;
		}

		$data1 = array(
			'title' => lang('tabel_e2_alias_v3_title'),
			'konten' => $this->v3['tabel_e2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e2']),
			'tbl_e2' => $result,
			'tbl_e4' => $this->tl_e4->get_all_e4(),
			'tabel_e2_field3_value' => $param1,
			'stuff' => firebase_get_data('/teachers')
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
			'title' => lang('tabel_e2_alias_v4_title'),
			'konten' => $this->v4['tabel_e2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e2']),
			'tbl_e2' => $this->tl_e2->get_all_e2(),
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

		validate_all(
			array(
				$this->v_post['tabel_e2_field2'],
				$this->v_post['tabel_e2_field3'],
				$this->v_post['tabel_e2_field4'],
				$this->v_post['tabel_e2_field5'],
				$this->v_post['tabel_e2_field6'],
			),
			$this->views['flash2'],
			'tambah'
		);

		// $id = get_next_code($this->aliases['tabel_e2'], $this->aliases['tabel_e2_field1'], 'FH');

		$code = $this->add_code('tabel_e2', $this->aliases['tabel_e2_field1'], 5, '02');

		$data = array(
			// $this->aliases['tabel_e2_field1'] => $id,
			$this->aliases['tabel_e2_field1'] => $code,
			$this->aliases['tabel_e2_field2'] => $this->v_post['tabel_e2_field2'],
			$this->aliases['tabel_e2_field3'] => $this->v_post['tabel_e2_field3'],
			$this->aliases['tabel_e2_field4'] => $this->v_post['tabel_e2_field4'],
			$this->aliases['tabel_e2_field5'] => $this->v_post['tabel_e2_field5'],
			$this->aliases['tabel_e2_field6'] => $this->v_post['tabel_e2_field6'],

			'created_at' => date("Y-m-d\TH:i:s"),
			'updated_at' => date("Y-m-d\TH:i:s"),
		);

		// $query = 'INSERT INTO tabel_e2 VALUES('.$data.')';

		$aksi = $this->tl_e2->insert_e2($data);
		// $aksi = $this->tl_e2->insert_e2($query);

		$notif = $this->handle_4b($aksi, 'tabel_e2');

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

		$tabel_e2_field1 = $this->v_post['tabel_e2_field1'];

		$tabel_e2 = $this->tl_e2->get_e2_by_field('tabel_e2_field1', $tabel_e2_field1)->result();
		$this->check_data($tabel_e2);

		validate_all(
			array(
				$this->v_post['tabel_e2_field1'],
				$this->v_post['tabel_e2_field2'],
				$this->v_post['tabel_e2_field3'],
				$this->v_post['tabel_e2_field4'],
				$this->v_post['tabel_e2_field5'],
				$this->v_post['tabel_e2_field6'],
			),
			$this->views['flash3'],
			'ubah' . $tabel_e2_field1
		);

		$data = array(
			$this->aliases['tabel_e2_field2'] => $this->v_post['tabel_e2_field2'],
			$this->aliases['tabel_e2_field3'] => $this->v_post['tabel_e2_field3'],
			$this->aliases['tabel_e2_field4'] => $this->v_post['tabel_e2_field4'],
			$this->aliases['tabel_e2_field5'] => $this->v_post['tabel_e2_field5'],
			$this->aliases['tabel_e2_field6'] => $this->v_post['tabel_e2_field6'],

			'updated_at' => date("Y-m-d\TH:i:s"),
		);

		$aksi = $this->tl_e2->update_e2($data, $tabel_e2_field1);

		$notif = $this->handle_4c($aksi, 'tabel_e2', $tabel_e2_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}
	
	//Soft Delete Data
	public function soft_delete($tabel_e2_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_e2->get_e2_by_field('tabel_e2_field1', $tabel_e2_field1)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
		);

		$aksi = $this->tl_e2->update_e2($data, $tabel_e2_field1);

		$notif = $this->handle_4e($aksi, 'tabel_e2', $tabel_e2_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Soft Delete data
	public function restore($tabel_e2_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_e2->get_e2_by_field_archive('tabel_e2_field1', $tabel_e2_field1)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => NULL,
		);

		$aksi = $this->tl_e2->update_e2($data, $tabel_e2_field1);

		$notif = $this->handle_4e($aksi, 'tabel_e2', $tabel_e2_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($tabel_e2_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel_e2 = $this->tl_e2->get_e2_by_field_archive('tabel_e2_field1', $tabel_e2_field1)->result();
		$this->check_data($tabel_e2);

		$aksi = $this->tl_e2->delete_e2_by_field('tabel_e2_field1', $tabel_e2_field1);

		$notif = $this->handle_4e($aksi, 'tabel_e2', $tabel_e2_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_e2_alias_v9_title'),
			'konten' => $this->v9['tabel_e2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e2']),
			'tbl_e2' => $this->tl_e2->get_all_e2_archive(),
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

		$tabel = $this->tl_e2->get_e2_by_field('tabel_e2_field1', $param1)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => lang('tabel_e2_alias_v10_title'),
			'konten' => $this->v10['tabel_e2'],
			'dekor' => $this->tl_e2->dekor($this->theme_id, $this->aliases['tabel_e2']),
			'tbl_e2' => $this->tl_e2->get_e2_by_field_archive('tabel_e2_field1', $param1),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		$this->track_page();
		load_view_data('_layouts/template', $data);
	}




}
