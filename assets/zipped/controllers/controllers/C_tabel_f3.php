<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

// Jujurly masih banyak bagian di controller ini yang masih menggunakan variabel biasa dan bukan menggunakan declare
// Aku juga ingin membuat sebuah fitur history transaksi dimana pesanan yang sudah masuk history bakal masuk ke sana


// Saat ini ketika data yang ada di tabel transaksi dan history, data-data yang berada di tabel transaksi bakal hilang
// Hal ini merupakan hal yang sedang aku coba teliti kepentingannya
// Aku perlu meneliti lebih jauh, ini adalah kedua pilihan yang kumiliki :
// 1. Menambahkan fitur untuk melihat data transksi saja, lalu diberi opsi apakah user ingin melihat data pesanan
// atau data history yang terhubung dengan data transaksi, jika perlu maka akan dicek data pesanan atau history tersebut.
// Jika data ada, maka akan ditampilkan, jika tidak akan muncul notifikasi data tidak ada
// 2. Opsi kedua adalah untuk membiarkannya tidak menampilkan data 

class C_tabel_f3 extends Omnitags
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
		$param1 = $this->v_get['tabel_f3_field7_filter1'];
		$param2 = $this->v_get['tabel_f3_field7_filter2'];

		$param3 = userdata($this->aliases['tabel_c2_field1']);

		$filter = $this->tl_f1->filter_user_with_e4($param1, $param2, $param3);

		if (empty($param1)) {
			$result = $this->tl_f3->get_f3_with_f2_with_e4_by_c2_field1($param3);
		} else {
			$result = $filter;
		}

		$data1 = array(
			'title' => lang('tabel_f3_alias_v2_title'),
			'konten' => $this->v2['tabel_f3'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f3']),
			'tbl_f3' => $result,
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
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
		$param1 = $this->v_get['tabel_f3_field7_filter1'];
		$param2 = $this->v_get['tabel_f3_field7_filter2'];

		$param3 = userdata($this->aliases['tabel_c2_field1']);

		$filter = $this->tl_f1->filter_user_with_e4($param1, $param2, $param3);

		if (empty($param1)) {
			$result = $this->tl_f1->get_f1_with_f3_with_e4_by_c2_field1($param3);
		} else {
			$result = $filter;
		}

		$data1 = array(
			'title' => lang('tabel_f3_alias_past'),
			'konten' => '_contents/tabel_f3/daftar_history',
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f3']),
			'tbl_f3' => $result,

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'tabel_f3_field7_filter1_value' => $param1,
			'tabel_f3_field7_filter2_value' => $param2,
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}

	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_2();

		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->v_get['tabel_f3_field7_filter1'];
		$param2 = $this->v_get['tabel_f3_field7_filter2'];

		$filter = $this->tl_f3->filter($param1, $param2);

		if (empty($param1)) {
			$result = $this->tl_f3->get_f3_with_f2_with_e4();
		} else {
			$result = $filter;
		}

		$data1 = array(
			'title' => lang('tabel_f3_alias_v3_title'),
			'konten' => $this->v3['tabel_f3'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f3']),
			'tbl_f3' => $result,

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'tabel_f3_field7_filter1_value' => $param1,
			'tabel_f3_field7_filter2_value' => $param2,
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_2();

		$data1 = array(
			'title' => lang('tabel_f3_alias_v4_title'),
			'konten' => $this->v4['tabel_f3'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f3']),
			'tbl_f3' => $this->tl_f3->get_all_f3(),
			'tbl_e4' => $this->tl_e4->get_all_f3(),
			'tbl_f2' => $this->tl_f2->get_all_f3(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/printpage', $data);
	}

	// Print one data

	// Fitur print menurutku tidak memerlukan fitur join sama sekali 
	// karena sudah menggunakan parameter yang memilki nilai
	public function print($tabel_f3_field1 = null)
	{
		$this->declarew();
		$allowed_values = [
                $this->aliases['tabel_c2_field6_value4'],
                $this->aliases['tabel_c2_field6_value5']
            ];
            $this->page_session_check($allowed_values);

		$param1 = $this->tl_f3->get_f3_by_f3_field1($tabel_f3_field1)->result();
		$this->check_data($param1);

		$data1 = array(
			'title' => lang('tabel_f3_alias_v5_title'),
			'konten' => $this->v5['tabel_f3'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f3']),
		);


		// Di bawah ini adalah kode untuk memisahkan antara transaksi yang id pesanannya masih berada di tabel pesanann
		// Dan transaksi yang id pesanananya sudah berada di tabel history

		$param2 = $param1[0]->id_pesanan;

		$method = $this->tl_f1->get_f1_by_f1_field2($param2);


		if ($method->num_rows() > 0) {
			$data2 = array(
				'tbl_f3' => $this->tl_f3->get_f3_with_f1_with_e4_by_f3_field1($tabel_f3_field1, userdata($this->aliases['tabel_c2_field1'])),
			);
			$data = array_merge($data1, $data2, $this->views, $this->aliases);
			load_view_data('_layouts/printpage', $data);
		} else {
			$data2 = array(
				'tbl_f3' => $this->tl_f2->get_f2_with_f3_with_e4_by_f3_field1($tabel_f3_field1),
			);
			$data = array_merge($data1, $data2, $this->views, $this->aliases);
			load_view_data('_layouts/printpage', $data);
		}
	}

	// Fungsi khusus
	public function konfirmasi()
	{
		$this->declarew();
		$this->page_session_5();

		$tabel_f3_field3 = userdata($this->aliases['tabel_f3_field3'] . '_' . $this->aliases['tabel_f3']);
		$data1 = array(
			'title' => lang('tabel_f3_alias_v4_title'),
			'konten' => $this->v7['tabel_f3'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f3']),

			// mengembalikan data baris terakhir/terbaru sesuai ketentuan dalam database untuk ditampilkan
			'tbl_f3' => $this->tl_f3->get_f3_by_c2_field3($tabel_f3_field3)->last_row(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/blank', $data);
	}

	// Functions
	// Add data
	public function tambah()
	{
		// Masih membutuhkan kode untuk mencegah hal ini terjadi lebih dari satu kali dengan id tabel_f2 yang sama
		$this->declarew();
		$allowed_values = [
                $this->aliases['tabel_c2_field6_value2'],
                $this->aliases['tabel_c2_field6_value4'],
                $this->aliases['tabel_c2_field6_value5']
            ];
            $this->session_check($allowed_values);

		$tabel_f3_field3 = $this->v_post['tabel_f3_field3'];
		$tabel_f3_field6 = $this->v_post['tabel_f3_field6'];

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tabel_f3_field7 = date("Y-m-d") . " " . date("h:m:s", time());

		// $kembalian = $this->tl_f2->get('harga_total') - $bayar;

		// $id = get_next_code($this->aliases['tabel_e1'], $this->aliases['tabel_e1_field1'], 'FK');
		// $this->aliases['tabel_e1_field1'] => $id,

		$data = array(
			$this->aliases['tabel_f3_field1'] => '',
			$this->aliases['tabel_f3_field2'] => userdata($this->aliases['tabel_c2_field1']),
			$this->aliases['tabel_f3_field3'] => $tabel_f3_field3,
			$this->aliases['tabel_f3_field4'] => $this->v_post['tabel_f3_field4'],
			$this->aliases['tabel_f3_field5'] => $this->v_post['tabel_f3_field5'],
			$this->aliases['tabel_f3_field6'] => $tabel_f3_field6,
			$this->aliases['tabel_f3_field7'] => $tabel_f3_field7,
		);

		set_userdata($this->aliases['tabel_c2_field3'] . '_' . $this->aliases['tabel_f3'], $tabel_f3_field3);

		// Session kembalian_transaksi sebenarnya digunakan ketika menggunakan cash, namun fungsi ini akan tetap disimpan untuk pengembangan lebih lanjut
		// set_tempdata('kembalian_transaksi', $kembalian, 300);


		// $query = 'INSERT INTO transaksi VALUES('.$data.')';

		$aksi = $this->tl_f3->insert_f3($data);
		// $aksi = $this->tl_f3->insert_f3($query);

		$notif = $this->handle_4b($aksi, 'tabel_f3');

		// fitur mengubah status ini seharusnya berada di bagian pesanan cman saya belum bisa menemukan algoritma yang pas jadi akan disimpan untuk pengembangan di kemudian hari
		$tabel_f3_field4 = $this->v_post['tabel_f3_field4'];
		$data2 = array(
			$this->aliases['tabel_f2_field12'] => $this->v_post['tabel_f2_field12'],
		);

		if ($this->v_post['tabel_f2_field12'] === $this->aliases['tabel_f2_field12_value3']) {

			// hanya merubah status pesanan
			$aksi2 = $this->tl_f2->update_f2($data2, $tabel_f3_field4);

			$notif = $this->handle_4c($aksi2, 'tabel_f2', $tabel_f3_field4);

		} else {
			set_flashdata($this->views['flash1'], $this->flash_msg3['tabel_f3_alias']);
			set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url($this->language_code . '/' . $this->aliases['tabel_f3'] . '/konfirmasi'));
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

		$tabel_f3_field1 = $this->v_post['tabel_f3_field1'];

		$tabel_f3 = $this->tl_f3->get_f3_by_f3_field1($tabel_f3_field1)->result();
		$this->check_data($tabel_f3);

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tabel_f3_field7 = date("Y-m-d\TH:i:s");

		$data = array(
			$this->aliases['tabel_f3_field5'] => $this->v_post['tabel_f3_field5'],
			$this->aliases['tabel_f3_field6'] => $this->v_post['tabel_f3_field6'],
			$this->aliases['tabel_f3_field7'] => $tabel_f3_field7,
		);

		$aksi = $this->tl_f3->update_f3($data, $tabel_f3_field1);

		$notif = $this->handle_4c($aksi, 'tabel_f3', $tabel_f3_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($tabel_f3_field1 = null)
	{
		$this->declarew();
		$allowed_values = [
                $this->aliases['tabel_c2_field6_value2'],
                $this->aliases['tabel_c2_field6_value4']
            ];
            $this->session_check($allowed_values);

		$tabel_f3 = $this->tl_f3->get_f3_by_f3_field1($tabel_f3_field1)->result();
		$this->check_data($tabel_f3);

		$aksi = $this->tl_f3->delete_f3($tabel_f3_field1);

		$notif = $this->handle_4e($aksi, 'tabel_f3', $tabel_f3_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}
}
