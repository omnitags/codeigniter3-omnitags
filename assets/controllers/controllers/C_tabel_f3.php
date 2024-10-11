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
	// Halaman publik


	// Halaman khusus akun
	public function daftar()
	{
		$this->declarew();

		$tabel_c2_field1 = $this->session->userdata($this->aliases['tabel_c2_field1']);
		$data1 = array(
			'title' => $this->v2_title['tabel_f3_alias'],
			'konten' => $this->v2['tabel_f3'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_f3'])->result(),
			'tbl_f3' => $this->tl_f3->join_tabel_f2_tamu($tabel_c2_field1)->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function daftar_history()
	{
		$this->declarew();

		$tabel_c2_field1 = $this->session->userdata($this->aliases['tabel_c2_field1']);
		$data1 = array(
			'title' => $this->views['tabel_f3_v2_alt_title'],
			'konten' => $this->views['tabel_f3_v2_alt'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_f3'])->result(),
			'tbl_f3' => $this->tl_f3->join_tabel_f1_tamu($tabel_c2_field1)->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	// Halaman admin
	public function admin()
	{
		$this->declarew();

		// nilai min dan max sudah diinput sebelumnya
		// $param1 = $this->v_filter1_get['tabel_f3_field7'];
		// $param2 = $this->v_filter2_get['tabel_f3_field7'];

		$data1 = array(
			'title' => $this->v3_title['tabel_f3_alias'],
			'konten' => $this->v3['tabel_f3'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_f3'])->result(),
			'tbl_f3' => $this->tl_f3->join_tabel_f2()->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			// 'tgl_transaksi_min' => $param1,
			// 'tgl_transaksi_max' => $param2,
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	// Fungsi di bawah ini sebaiknya menggunakan fungsi join untuk menampilkan data yang sesuai kebutuhan yang telah ditentukan
	public function history()
	{
		$this->declarew();

		// nilai min dan max sudah diinput sebelumnya
		// $param1 = $this->v_filter1_get['tabel_f3_field7'];
		// $param2 = $this->v_filter2_get['tabel_f3_field7'];

		$data1 = array(
			'title' => $this->views['tabel_f3_v3_alt_title'],
			'konten' => $this->views['tabel_f3_v3_alt'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_f3'])->result(),
			'tbl_f3' => $this->tl_f3->join_tabel_f1()->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			// 'tgl_transaksi_min' => $param1,
			// 'tgl_transaksi_max' => $param2,
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}


	public function tambah()
	{
		// Masih membutuhkan kode untuk mencegah hal ini terjadi lebih dari satu kali dengan id tabel_f2 yang sama
		$this->declarew();

		$tabel_f3_field3 = $this->v_post['tabel_f3_field3'];
		$tabel_f3_field6 = $this->v_post['tabel_f3_field6'];

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tabel_f3_field7 = date("Y-m-d") . " " . date("h:m:s", time());

		// $kembalian = $this->tl_f2->get('harga_total') - $bayar;

		$data = array(
			$this->aliases['tabel_f3_field1'] => '',
			$this->aliases['tabel_f3_field2'] => $this->session->userdata($this->aliases['tabel_c2_field1']),
			$this->aliases['tabel_f3_field3'] => $tabel_f3_field3,
			$this->aliases['tabel_f3_field4'] => $this->v_post['tabel_f3_field4'],
			$this->aliases['tabel_f3_field5'] => $this->v_post['tabel_f3_field5'],
			$this->aliases['tabel_f3_field6'] => $tabel_f3_field6,
			$this->aliases['tabel_f3_field7'] => $tabel_f3_field7,
		);

		$this->session->set_tempdata($this->aliases['tabel_c2_field3'] . '_' . $this->aliases['tabel_f3'], $tabel_f3_field3, 300);

		// Session kembalian_transaksi sebenarnya digunakan ketika menggunakan cash, namun fungsi ini akan tetap disimpan untuk pengembangan lebih lanjut
		// $this->session->set_tempdata('kembalian_transaksi', $kembalian, 300);


		// $query = 'INSERT INTO transaksi VALUES('.$data.')';

		$aksi = $this->tl_f3->simpan($data);
		// $aksi = $this->tl_f3->simpan($query);

		$notif = $this->handle_1($aksi, 'tabel_f3');

		// fitur mengubah status ini seharusnya berada di bagian pesanan cman saya belum bisa menemukan algoritma yang pas jadi akan disimpan untuk pengembangan di kemudian hari
		$tabel_f3_field4 = $this->v_post['tabel_f3_field4'];
		$status = array(
			$this->aliases['tabel_f2_field12'] => $this->v_post['tabel_f2_field12'],
		);

		if ($this->v_post['tabel_f2_field12'] === $this->aliases['tabel_f2_field12_value3']) {

			// hanya merubah status pesanan
			$aksi2 = $this->tl_f2->update($status, $tabel_f3_field4);

			$notif = $this->handle_2($aksi2, 'tabel_f2', $tabel_f3_field4);

		} else {
			$this->session->set_flashdata($this->views['flash1'], $this->flash_msg3['tabel_f3_alias']);
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		redirect(site_url('c_tabel_f3/konfirmasi'));
	}


	public function update()
	{
		$this->declarew();

		$tabel_f3_field1 = $this->v_post['tabel_f3_field1'];

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tabel_f3_field7 = date("Y-m-d H:i:s");

		$data = array(
			$this->aliases['tabel_f3_field5'] => $this->v_post['tabel_f3_field5'],
			$this->aliases['tabel_f3_field6'] => $this->v_post['tabel_f3_field6'],
			$this->aliases['tabel_f3_field7'] => $tabel_f3_field7,
		);

		$aksi = $this->tl_f3->update($data, $tabel_f3_field1);

		$notif = $this->handle_2($aksi, 'tabel_f3', $tabel_f3_field1);

		redirect(site_url('c_tabel_f3/admin'));
	}

	public function hapus($tabel_f3_field1 = null)
	{
		$this->declarew();

		$tabel_f3 = $this->tl_f3->ambil_tabel_f3_field1($tabel_f3_field1)->result();
		$aksi = $this->tl_f3->hapus($tabel_f3_field1);

		$notif = $this->handle_3($aksi, 'tabel_f3_field1', $tabel_f3_field1);

		redirect(site_url('c_tabel_f3/admin'));
	}

	// Fitur filter untuk saat ini akan tidak digunakan terlebih dahulu
	public function filter()
	{
		$this->declarew();

		// nilai min dan max sudah diinput sebelumnya
		$tabel_f3_field7_filter1 = $this->v_filter1_get['tabel_f3_field7'];
		$tabel_f3_field7_filter2 = $this->v_filter2_get['tabel_f3_field7'];

		$data1 = array(
			'title' => $this->v3_title['tabel_f3_alias'],
			'konten' => $this->v3['tabel_f3'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_f3'])->result(),
			'tbl_f3' => $this->tl_f3->filter($tabel_f3_field7_filter1, $tabel_f3_field7_filter2)->result(),
			'tbl_f2' => $this->tl_f2->ambildata()->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'tabel_f3_field7_filter1' => $tabel_f3_field7_filter1,
			'tabel_f3_field7_filter2' => $tabel_f3_field7_filter2,
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel_f3_alias'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_f3'])->result(),
			'tbl_f3' => $this->tl_f3->ambildata()->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result(),
			'tbl_f2' => $this->tl_f2->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v4['tabel_f3'], $data);
	}

	// Cetak satu data

	// Fitur print menurutku tidak memerlukan fitur join sama sekali 
	// karena sudah menggunakan parameter yang memilki nilai
	public function print($tabel_f3_field1 = null)
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v5_title['tabel_f3'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_f3'])->result(),
			'tbl_f3' => $this->tl_f3->ambil_tabel_f3_field1($tabel_f3_field1)->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result()
		);


		// Di bawah ini adalah kode untuk memisahkan antara transaksi yang id pesanannya masih berada di tabel pesanann
		// Dan transaksi yang id pesanananya sudah berada di tabel history

		$param1 = $this->tl_f3->ambil_tabel_f3_field1($tabel_f3_field1)->result();
		$param2 = $param1[0]->id_pesanan;

		$method = $this->tl_f1->ambil_tabel_f1_field2($param2);


		if ($method->num_rows() > 0) {
			$data2 = array(
				'tbl_f1' => $this->tl_f1->ambildata()->result(),
			);
			$data = array_merge($data1, $data2, $this->views, $this->aliases);
			$this->load->view($this->v5['tabel_f1'], $data);
		} else {
			$data2 = array(
				'tbl_f2' => $this->tl_f2->ambildata()->result(),
			);
			$data = array_merge($data1, $data2, $this->views, $this->aliases);
			$this->load->view($this->v5['tabel_f3'], $data);
		}
	}

	// Fungsi khusus
	public function konfirmasi()
	{
		$this->declarew();

		$tabel_f3_field3 = $this->session->tempdata($this->aliases['tabel_f3_field3'] . '_' . $this->aliases['tabel_f3']);
		$data1 = array(
			'title' => $this->v7_title['tabel_f3_alias'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_f3'])->result(),

			// mengembalikan data baris terakhir/terbaru sesuai ketentuan dalam database untuk ditampilkan
			'tbl_f3' => $this->tl_f3->ambil_tabel_c2_field3($tabel_f3_field3)->last_row(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v7['tabel_f3'], $data);
	}
}
