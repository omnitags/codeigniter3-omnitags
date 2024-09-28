<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'OmnitagsController.php';

class Tabel_e2Controller extends OmnitagsController
{
	// Pages
	// Public Pages
	public function index()
	{
		$this->declarew();
		$this->session_all();

		$data1 = array(
			'title' => $this->title['tabel_e2_alias_v1'],
			'konten' => $this->v1['tabel_e2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e2']),
			'tbl_e2' => $this->tl_e2->get_all_e2(),
			'tbl_e4' => $this->tl_e4->get_all_e4(),
		);

		$this->load_page('tabel_e2', 'layouts/template', $data1);
	}

	public function detail($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_e2->get_e2_by_field('tabel_e2_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => $this->title['tabel_e2_alias_v8'],
			'konten' => $this->v8['tabel_e2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b2']),
			'tbl_e2' => $this->tl_e2->get_e2_by_field('tabel_e2_field1', $code),
		);

		$this->load_page('tabel_e2', 'layouts/template_admin', $data1);
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
			'title' => $this->title['tabel_e2_alias_v3'],
			'konten' => $this->v3['tabel_e2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e2']),
			'tbl_e2' => $result,
			'tbl_e4' => $this->tl_e4->get_all_e4(),
			'tabel_e2_field3_value' => $param1,
			'stuff' => firebase_get_data('/teachers')
		);

		$this->load_page('tabel_e2', 'layouts/template_admin', $data1);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => $this->title['tabel_e2_alias_v4'],
			'konten' => $this->v4['tabel_e2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e2']),
			'tbl_e2' => $this->tl_e2->get_all_e2(),
		);

		$this->load_page('tabel_e2', 'layouts/printpage', $data1);
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

		// $id = get_next_code($this->aliases['tabel_e2'], 'id', 'FH');

		$code = $this->add_code('tabel_e2', 'id', 5, '02');

		$data = array(
			// 'id' => $id,
			'id' => $code,
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
		$this->insert_history('tabel_e2', $data);

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

		$code = $this->v_post['tabel_e2_field1'];

		$tabel_e2 = $this->tl_e2->get_e2_by_field('tabel_e2_field1', $code)->result();
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
			'ubah' . $code
		);

		$data = array(
			$this->aliases['tabel_e2_field2'] => $this->v_post['tabel_e2_field2'],
			$this->aliases['tabel_e2_field3'] => $this->v_post['tabel_e2_field3'],
			$this->aliases['tabel_e2_field4'] => $this->v_post['tabel_e2_field4'],
			$this->aliases['tabel_e2_field5'] => $this->v_post['tabel_e2_field5'],
			$this->aliases['tabel_e2_field6'] => $this->v_post['tabel_e2_field6'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_e2->update_e2($data, $code);
		$this->insert_history('tabel_e2', $data);

		$notif = $this->handle_4c($aksi, 'tabel_e2', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
	
	//Soft Delete Data
	public function soft_delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_e2->get_e2_by_field('tabel_e2_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_e2->update_e2($data, $code);
		$this->insert_history('tabel_e2', $data);

		$notif = $this->handle_4e($aksi, 'tabel_e2', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Soft Delete data
	public function restore($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_e2->get_e2_by_field_archive('tabel_e2_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => NULL,
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_e2->update_e2($data, $code);
		$this->insert_history('tabel_e2', $data);

		$notif = $this->handle_4e($aksi, 'tabel_e2', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel_e2 = $this->tl_e2->get_e2_by_field_archive('tabel_e2_field1', $code)->result();
		$this->check_data($tabel_e2);

		$aksi = $this->tl_e2->delete_e2_by_field('tabel_e2_field1', $code);

		$notif = $this->handle_4e($aksi, 'tabel_e2', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => $this->title['tabel_e2_alias_v9'],
			'konten' => $this->v9['tabel_e2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e2']),
			'tbl_e2' => $this->tl_e2->get_all_e2_archive(),
		);

		$this->load_page('tabel_e2', 'layouts/template', $data1);
	}
	
	public function detai_archive($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_e2->get_e2_by_field('tabel_e2_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => $this->title['tabel_e2_alias_v10'],
			'konten' => $this->v10['tabel_e2'],
			'dekor' => $this->tl_e2->dekor($this->theme_id, $this->aliases['tabel_e2']),
			'tbl_e2' => $this->tl_e2->get_e2_by_field_archive('tabel_e2_field1', $code),
		);

		$this->load_page('tabel_e2', 'layouts/template', $data1);
	}
	
	public function history($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_e2->get_e2_by_field('tabel_e2_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'table_id' => $code,
			'title' => $this->title['tabel_e2_alias_v11'],
			'konten' => $this->v11['tabel_e2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e2']),
			'tbl_e2' => $this->tl_ot->get_by_field_history('tabel_e2', 'tabel_e2_field1', $code),
			'current' => $this->tl_ot->get_by_field('tabel_e2', 'tabel_e2_field1', $code),
		);

		$this->load_page('tabel_e2', 'layouts/template_admin', $data1);
	}

	//Push History Data into current data
	public function push($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_ot->get_by_id_history('tabel_e2', $code)->result();
		$this->check_data($tabel);

		$code = $tabel[0]->id;

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_e2_field2'] => $tabel[0]->{$this->aliases['tabel_e2_field2']},

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_e2->update_e2($data, $code);

		$notif = $this->handle_4c($aksi, 'tabel_e2', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
}

