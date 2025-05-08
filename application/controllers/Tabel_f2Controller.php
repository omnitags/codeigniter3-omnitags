<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'OmnitagsController.php';

// Jujurly masih banyak bagian di controller ini yang masih menggunakan variabel biasa dan bukan menggunakan declare
// Aku juga ingin membuat sebuah fitur history transaksi dimana pesanan yang sudah masuk history bakal masuk ke sana


// Saat ini ketika data yang ada di tabel transaksi dan history, data-data yang berada di tabel transaksi bakal hilang
// Hal ini merupakan hal yang sedang aku coba teliti kepentingannya
// Aku perlu meneliti lebih jauh, ini adalah kedua pilihan yang kumiliki :
// 1. Menambahkan fitur untuk melihat data transksi saja, lalu diberi opsi apakah user ingin melihat data pesanan
// atau data history yang terhubung dengan data transaksi, jika perlu maka akan dicek data pesanan atau history tersebut.
// Jika data ada, maka akan ditampilkan, jika tidak akan muncul notifikasi data tidak ada
// 2. Opsi kedua adalah untuk membiarkannya tidak menampilkan data 

class Tabel_f2Controller extends OmnitagsController
{
	// Pages
	// Public Pages


	// Account Only Pages
	public function daftar()
	{
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value4'],
			$this->aliases['tabel_c2_field6_value5']
		];
		$this->page_session_check($allowed_values);

		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->v_get['tabel_f2_field7_filter1'];
		$param2 = $this->v_get['tabel_f2_field7_filter2'];

		$param3 = userdata('id');

		$filter = $this->tl_f1->filter_user_with_e4($param1, $param2, $param3);

		if (empty($param1)) {
			$result = $this->tl_f2->get_f2_with_e4_with_e3_by_c2_field1($param3);
		} else {
			$result = $filter;
		}

		$data1 = array(
			'title' => $this->title['tabel_f2_alias_v2'],
			'konten' => $this->v2['tabel_f2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f2']),
			'tbl_f2' => $result,
		);

		$this->load_page('tabel_f2', 'layouts/template', $data1);
	}

	public function daftar_history()
	{
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value2'],
			$this->aliases['tabel_c2_field6_value4'],
			$this->aliases['tabel_c2_field6_value5']
		];
		$this->session_check($allowed_values);

		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->v_get['tabel_f2_field7_filter1'];
		$param2 = $this->v_get['tabel_f2_field7_filter2'];

		$param3 = userdata('id');

		$filter = $this->tl_f1->filter_user_with_e4($param1, $param2, $param3);

		if (empty($param1)) {
			$result = $this->tl_f1->get_f1_with_f2_with_e4_by_c2_field1($param3);
		} else {
			$result = $filter;
		}

		$data1 = array(
			'title' => $this->title['tabel_f2_alias'],
			'konten' => 'contents/tabel_f2/daftar_history',
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f2']),
			'tbl_f2' => $result,

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'tabel_f2_field7_filter1_value' => $param1,
			'tabel_f2_field7_filter2_value' => $param2,
		);

		$this->load_page('tabel_f2', 'layouts/template', $data1);
	}

	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_2();

		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->v_get['tabel_f2_field7_filter1'];
		$param2 = $this->v_get['tabel_f2_field7_filter2'];

		$filter = $this->tl_f2->filter($param1, $param2);

		if (empty($param1)) {
			$result = $this->tl_f2->get_f2_with_e4_with_e4();
		} else {
			$result = $filter;
		}

		$data1 = array(
			'title' => $this->title['tabel_f2_alias_v3'],
			'konten' => $this->v3['tabel_f2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f2']),
			'tbl_f2' => $result,

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'tabel_f2_field7_filter1_value' => $param1,
			'tabel_f2_field7_filter2_value' => $param2,
		);

		$this->load_page('tabel_f2', 'layouts/template_admin', $data1);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_2();

		$data1 = array(
			'title' => $this->title['tabel_f2_alias_v4'],
			'konten' => $this->v4['tabel_f2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f2']),
			'tbl_f2' => $this->tl_f2->get_all_f2(),
			'tbl_e4' => $this->tl_e4->get_all_f2(),
			'tbl_e4' => $this->tl_e4->get_all_f2(),
		);

		$this->load_page('tabel_f2', 'layouts/printpage', $data1);
	}

	// Print one data

	// Fitur print menurutku tidak memerlukan fitur join sama sekali 
	// karena sudah menggunakan parameter yang memilki nilai
	public function print($code = null)
	{
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value4'],
			$this->aliases['tabel_c2_field6_value5']
		];
		$this->page_session_check($allowed_values);

		$param1 = $this->tl_f2->get_f2_by_field('tabel_f2_field1', $code)->result();
		$this->check_data($param1);

		$data1 = array(
			'title' => $this->title['tabel_f2_alias_v5'],
			'konten' => $this->v5['tabel_f2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f2']),
		);


		// Di bawah ini adalah kode untuk memisahkan antara transaksi yang id pesanannya masih berada di tabel pesanann
		// Dan transaksi yang id pesanananya sudah berada di tabel history

		$param2 = $param1[0]->id;

		$method = $this->tl_f1->get_f1_by_field('tabel_f1_field2', $param2);


		if ($method->num_rows() > 0) {
			$data2 = array(
				'tbl_f2' => $this->tl_f2->get_f2_with_f1_with_e4_by_f2_field1($code, userdata('id')),
			);
			$data = array_merge($data1, $data2);
			$this->load_page('tabel_f2', 'layouts/printpage', $data);
		} else {
			$data2 = array(
				'tbl_f2' => $this->tl_e4->get_e4_with_f2_with_e4_by_f2_field1($code),
			);
			$data = array_merge($data1, $data2);
			$this->load_page('tabel_f2', 'layouts/printpage', $data);
		}
	}

	// Fungsi khusus
	public function konfirmasi()
	{
		$this->declarew();
		$this->page_session_5();

		$tabel_f2_field3 = userdata($this->aliases['tabel_f2_field3'] . '_' . $this->aliases['tabel_f2']);
		$data1 = array(
			'title' => $this->title['tabel_f2_alias_v4'],
			'konten' => $this->v7['tabel_f2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f2']),

			// mengembalikan data baris terakhir/terbaru sesuai ketentuan dalam database untuk ditampilkan
			'tbl_f2' => $this->tl_f2->get_f2_by_field('field_c2_field3', $tabel_f2_field3)->last_row(),
		);

		$this->load_page('tabel_f2', 'layouts/blank', $data1);
	}

	// Functions
	// Add data
	public function tambah()
	{
		// Masih membutuhkan kode untuk mencegah hal ini terjadi lebih dari satu kali dengan id tabel_e4 yang sama
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value2'],
			$this->aliases['tabel_c2_field6_value4'],
			$this->aliases['tabel_c2_field6_value5']
		];
		$this->session_check($allowed_values);

		$data = array(
			'id' => '',
			$this->aliases['tabel_f2_field2'] => userdata('id'),
			$this->aliases['tabel_f2_field2'] => $this->v_post['tabel_f2_field2'],
			$this->aliases['tabel_f2_field3'] => $this->v_post['tabel_f2_field3'],
			$this->aliases['tabel_f2_field4'] => $this->v_post['tabel_f2_field4'],
			$this->aliases['tabel_f2_field5'] => $this->aliases['tabel_f2_field5_value1'],
			$this->aliases['tabel_f2_field6'] => $this->v_post['tabel_f2_field6'],
			$this->aliases['tabel_f2_field7'] => $this->v_post['tabel_f2_field7'],

			'created_at' => date("Y-m-d\TH:i:s"),
			'updated_at' => date("Y-m-d\TH:i:s"),
		);

		$aksi = $this->tl_f2->insert_f2($data);
		// $aksi = $this->tl_f2->insert_f2($query);
		$this->insert_history('tabel_f2', $data);

		$notif = $this->handle_4b($aksi, 'tabel_f2');

		redirect(site_url($this->aliases['tabel_f2'] . '/konfirmasi'));
	}


	// Update data
	public function update()
	{
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value2'],
			$this->aliases['tabel_c2_field6_value4']
		];
		$this->session_check($allowed_values);

		$code = $this->v_post['tabel_f2_field1'];

		$tabel_f2 = $this->tl_f2->get_f2_by_field('f3_field1', $code)->result();
		$this->check_data($tabel_f2);

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tabel_f2_field7 = date("Y-m-d\TH:i:s");

		$data = array(
			$this->aliases['tabel_f2_field1'] => $this->v_post['tabel_f2_field1'],
			$this->aliases['tabel_f2_field2'] => $this->v_post['tabel_f2_field2'],
			$this->aliases['tabel_f2_field3'] => $this->v_post['tabel_f2_field3'],
			$this->aliases['tabel_f2_field4'] => $this->v_post['tabel_f2_field4'],
			$this->aliases['tabel_f2_field5'] => $this->v_post['tabel_f2_field5'],
			$this->aliases['tabel_f2_field6'] => $this->v_post['tabel_f2_field6'],
			$this->aliases['tabel_f2_field7'] => $this->v_post['tabel_f2_field7'],
			$this->aliases['tabel_f2_field7'] => $tabel_f2_field7,

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_f2->update_f2($data, $code);
		$this->insert_history('tabel_f2', $data);

		$notif = $this->handle_4c($aksi, 'tabel_f2', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_status()
	{
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value3'],
			$this->aliases['tabel_c2_field6_value4'],
			$this->aliases['tabel_c2_field6_value5']
		];
		$this->session_check($allowed_values);

		$code = $this->v_post['tabel_f2_field1'];

		$tabel_f2 = $this->tl_f2->get_f2_by_field('tabel_f2_field1', $code)->result();
		$this->check_data($tabel_f2);

		validate_all(
			array(
				$this->v_post['tabel_f2_field1'],
				$this->v_post['tabel_f2_field5'],
			),
			$this->views['flash1'],
			'ubah_status' . $code
		);


		$data = array(
			$this->aliases['tabel_f2_field5'] => $this->v_post['tabel_f2_field5'],
		);
		
		$aksi = $this->tl_f2->update_f2($data, $code);
		$notif = $this->handle_4c($aksi, 'tabel_f2_field5', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	//Soft Delete Data
	public function soft_delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_f2->get_f2_by_field('tabel_f2_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_f2->update_f2($data, $code);
		$this->insert_history('tabel_f2', $data);

		$notif = $this->handle_4e($aksi, 'tabel_f2', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Soft Delete data
	public function restore($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_f2->get_f2_by_field_archive('tabel_f2_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => NULL,
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_f2->update_f2($data, $code);
		$this->insert_history('tabel_f2', $data);

		$notif = $this->handle_4e($aksi, 'tabel_f2', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($code = null)
	{
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value2'],
			$this->aliases['tabel_c2_field6_value4']
		];
		$this->session_check($allowed_values);

		$tabel_f2 = $this->tl_f2->get_f2_by_field_archive('tabel_f2_field1', $code)->result();
		$this->check_data($tabel_f2);

		$aksi = $this->tl_f2->delete_f2('tabel_f2_field1', $code);

		$notif = $this->handle_4e($aksi, 'tabel_f2', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => $this->title['tabel_f2_alias_v9'],
			'konten' => $this->v9['tabel_f2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f2']),
			'tbl_f2' => $this->tl_f2->get_all_f2_archive(),
		);

		$this->load_page('tabel_f2', 'layouts/template', $data1);
	}

	public function detai_archive($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_f2->get_f2_by_field('tabel_f2_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => $this->title['tabel_f2_alias_v10'],
			'konten' => $this->v10['tabel_f2'],
			'dekor' => $this->tl_f2->dekor($this->theme_id, $this->aliases['tabel_f2']),
			'tbl_f2' => $this->tl_f2->get_f2_by_field_archive('tabel_f2_field1', $code),
		);

		$this->load_page('tabel_f2', 'layouts/template_admin', $data1);
	}

	public function history($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_f2->get_f2_by_field('tabel_f2_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'table_id' => $code,
			'title' => $this->title['tabel_f2_alias_v11'],
			'konten' => $this->v11['tabel_f2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f2']),
			'tbl_f2' => $this->tl_ot->get_by_field_history('tabel_f2', 'tabel_f2_field1', $code),
			'current' => $this->tl_ot->get_by_field('tabel_f2', 'tabel_f2_field1', $code),
		);

		$this->load_page('tabel_f2', 'layouts/template_admin', $data1);
	}

	//Push History Data into current data
	public function push($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_ot->get_by_id_history('tabel_f2', $code)->result();
		$this->check_data($tabel);

		$code = $tabel[0]->id;

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_f2_field2'] => $tabel[0]->{$this->aliases['tabel_f2_field2']},

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_f2->update_f2($data, $code);

		$notif = $this->handle_4c($aksi, 'tabel_f2', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
}
