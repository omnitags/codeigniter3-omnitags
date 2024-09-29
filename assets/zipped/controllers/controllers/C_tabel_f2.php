<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Masih banyak fitur-fitur yang kurang pada fitur pesanan seperti fitur cancel pesanan.
// Dan juga seharusnya ketika user melakukan pesanan seharusnya stok kamar tidak langsung berkurang
// // Melainkan harus menunggu tamu membooking kamar untuk customer terlebih dulu
// Saya baru berpikir untuk mengubah juga query sql pada trigger tambah kamar
// Yaitu untuk menambah stok kamar dan input ke history jika status pesannanya NOT IN (pending)
// Hal ini akan diperbaiki pada waktu-waktu mendatang. 

include 'Omnitags.php';
session_write_close();
class C_tabel_f2 extends Omnitags
{
	// Pages
	// Public Pages/khusus akun
	public function index()
	{
		$this->declarew();
		$this->page_session_all();

		switch (userdata($this->aliases['tabel_c2_field6'])) {
			case $this->aliases['tabel_c2_field6_value5']:
				$data1 = array(
					'title' => lang('tabel_f2_alias_v1_title'),
					'konten' => $this->v1['tabel_f2'],
					'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f2']),
					'tbl_b5' => $this->tl_b5->get_all_b5(),
					'tbl_b7' => $this->tl_b7->get_all_b7(),
					'tbl_a1' => $this->tl_a1->get_a1_by_a1_field1($this->tabel_a1_field1),
					'tbl_e4' => $this->tl_e4->get_all_e4(),

					'tabel_f2_field10_value' => $this->v_get['tabel_f2_field10'],
					'tabel_f2_field11_value' => $this->v_get['tabel_f2_field11'],
					'tabel_f2_field8_value' => $this->v_get['tabel_f2_field8'],
				);

				set_flashdata($this->views['flash1'], $this->views['flash1_note2']);
				set_flashdata('toast', $this->views['flash1_func1']);

				$halaman = '_layouts/template';
				break;

			default:
				redirect(site_url($this->language_code . '/login'));
				break;
		}

		$data = array_merge($data1, $this->package);


		set_userdata('previous_url', current_url());
		load_view_data($halaman, $data);
	}

	// Account Only Pages
	public function daftar()
	{
		$this->declarew();
		$this->page_session_3();

		// nilai min dan max di sini belum ada
		$param1 = $this->v_get['tabel_f2_field10_filter1'];
		$param2 = $this->v_get['tabel_f2_field10_filter2'];
		$param3 = $this->v_get['tabel_f2_field11_filter1'];
		$param4 = $this->v_get['tabel_f2_field11_filter2'];

		$tabel_c2_field1 = userdata($this->aliases['tabel_c2_field1']);

		$filter = $this->tl_f2->filter_user_with_e4($param1, $param2, $param3, $param4, $tabel_c2_field1);

		if (empty($param1)) {
			$result = $this->tl_f2->get_f2_with_e4_by_c2_field1($tabel_c2_field1);
		} else {
			$result = $filter;
		}


		$data1 = array(
			'title' => lang('tabel_f2_alias_v2_title'),
			'konten' => $this->v2['tabel_f2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f2']),
			'tbl_f2' => $result,

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'tabel_f2_field10_filter1_value' => $param1,
			'tabel_f2_field10_filter2_value' => $param2,
			'tabel_f2_field11_filter1_value' => $param3,
			'tabel_f2_field11_filter2_value' => $param4

		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}


	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_f2_alias_v3_title'),
			'konten' => $this->v3['tabel_f2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f2']),
			'tbl_f2' => $this->tl_f2->get_all_f2(),
			'tbl_e4' => $this->tl_e4->get_all_e4(),
			'tbl_e1' => $this->tl_e1->get_all_e1(),
			'tbl_e3' => $this->tl_e3->get_all_e3(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_3();
		
		$data1 = array(
			'title' => lang('tabel_f2_alias_v4_title'),
			'konten' => $this->v4['tabel_f2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f2']),
			'tbl_f2' => $this->tl_f2->get_all_f2(),
		);
		
		$data = array_merge($data1, $this->package);
		
		set_userdata('previous_url', current_url());
		load_view_data('_layouts/printpage', $data);
	}
	
	// Print one data
	public function print($tabel_f2_field1 = null)
	{
		$this->declarew();
		$this->page_session_3();
		
		$tabel = $this->tl_f2->get_f2_by_f2_field1($tabel_f2_field1);
		$this->check_data($tabel);

		$data1 = array(
			'title' => lang('tabel_f2_alias_v5_title'),
			'konten' => $this->v5['tabel_f2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f2']),
			'tbl_f2' => $this->tl_f2->get_f2_by_f2_field1($tabel_f2_field1),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/printpage', $data);
	}



	// Fungsi khusus

	// Di bawah ini adalah fitur yang ingin kutambahkan ketika ingin memasukkan fitur filter di halaman daftar
	// Jika user menggunakan tombol cari untuk mencari pesanan, namun pada views masih menggunakan v_pesanan, 
	// maka fitur ini dibutuhkan untuk membedakan user mana yang sedang mencari daftar pesanan/history/transaksi 
	// atau hanya membuka halaman saja
	// Namun fitur di bawah tidak akan berguna jika halaman yang digunakan untuk menampilkan hasil cari berbeda dan
	// bukan v_pesanan
	// if (!userdata('id_pesanan')) {}
	// 	} else {  -->
	// 	 }  -->

	public function cari()
	{
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value4'],
			$this->aliases['tabel_c2_field6_value5']
		];
		$this->page_session_check($allowed_values);

		$param1 = $this->v_get['tabel_f2_field1'];
		$param2 = $this->v_get['tabel_f2_field4'];

		$data1 = array(
			'title' => lang('tabel_f2_alias_v1_title'),
			'konten' => $this->v1['tabel_f2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f2']),

			// mencari dan menampilkan id pesanan berdasarkan id_pesanan yang telah diinput
			'tbl_f2' => $this->tl_f2->cari($param1, $param2),
			'tbl_e4' => $this->tl_e4->get_all_e4(),
			'tbl_e3' => $this->tl_e3->get_all_e3(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}


	public function konfirmasi()
	{
		$this->declarew();
		$this->page_session_3();

		$tabel_c2_field3 = userdata($this->aliases['tabel_c2_field3'] . '_' . $this->aliases['tabel_f2']);

		$data1 = array(
			'title' => lang('tabel_f2_alias_v4_title'),
			'konten' => $this->v7['tabel_f2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f2']),

			// mengembalikan data baris terakhir/terbaru sesuai ketentuan dalam database untuk ditampilkan
			'tbl_f2' => $this->tl_f2->get_f2_by_c2_field3($tabel_c2_field3)->last_row(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/blank', $data);
	}

	// Functions
	// Add data
	public function tambah()
	{
		// Functional requirement: Declare necessary configurations
		$this->declarew();
		$this->session_3();

		validate_all(
			array(
				$this->v_post['tabel_f2_field2'],
				$this->v_post['tabel_f2_field3'],
				$this->v_post['tabel_f2_field4'],
			),
			$this->views['flash2'],
			'tambah'
		);

		$base_price = $this->tl_e4->get_e4_field4_by_e4_field1($this->v_post['tabel_f2_field2']);
		$level_price = $this->tl_e3->get_e3_field4_by_e3_field1($this->v_post['tabel_f2_field3']);
		$difficulty_price = $this->tl_e1->get_e1_field4_by_e1_field1($this->v_post['tabel_f2_field4']);

		$total = $base_price + $level_price + $difficulty_price;

		$data = [
			$this->aliases['tabel_f2_field1'] => '',
			$this->aliases['tabel_f2_field2'] => $this->v_post['tabel_f2_field2'],
			$this->aliases['tabel_f2_field3'] => $this->v_post['tabel_f2_field3'],
			$this->aliases['tabel_f2_field4'] => $this->v_post['tabel_f2_field4'],
			$this->aliases['tabel_f2_field5'] => $total,
		];
		$aksi = $this->tl_f2->insert_f2($data);
		$notif = $this->handle_4b($aksi, 'tabel_f2');
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function update()
	{
		// Functional requirement: Declare necessary configurations
		$this->declarew();
		$this->session_3();

		$tabel_f2_field1 = $this->v_post['tabel_f2_field1'];

		$tabel_f2 = $this->tl_f2->get_f2_by_f2_field1($tabel_f2_field1)->result();
		$this->check_data($tabel_f2);

		validate_all(
			array(
				$this->v_post['tabel_f2_field1'],
				$this->v_post['tabel_f2_field2'],
				$this->v_post['tabel_f2_field3'],
				$this->v_post['tabel_f2_field4'],
			),
			$this->views['flash2'],
			'ubah'
		);

		$base_price = $this->tl_e4->get_e4_field4_by_e4_field1($this->v_post['tabel_f2_field2']);
		$level_price = $this->tl_e3->get_e3_field4_by_e3_field1($this->v_post['tabel_f2_field3']);
		$difficulty_price = $this->tl_e1->get_e1_field4_by_e1_field1($this->v_post['tabel_f2_field4']);

		$total = $base_price + $level_price + $difficulty_price;

		$data = [
			$this->aliases['tabel_f2_field2'] => $this->v_post['tabel_f2_field2'],
			$this->aliases['tabel_f2_field3'] => $this->v_post['tabel_f2_field3'],
			$this->aliases['tabel_f2_field4'] => $this->v_post['tabel_f2_field4'],
			$this->aliases['tabel_f2_field5'] => $total,
		];
		$aksi = $this->tl_f2->update_f2($data, $tabel_f2_field1);
		$notif = $this->handle_4b($aksi, 'tabel_f2');
		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($tabel_f2_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_f2->get_f2_by_f2_field1($tabel_f2_field1)->result();
		$this->check_data($tabel);

		$tabel_f2_field1 = $this->v_post['tabel_f2_field1'];
		$status = $this->v_post['tabel_f2_field12'];

		$hapus = $this->tl_f2->delete_f2($tabel_f2_field1);

		// memasukkan nama resepsionis yang melakukan operasi
		$data = array(
			$this->aliases['tabel_f1_field14'] => userdata($this->aliases['tabel_c2_field2'])
		);

		// mengupdate history dengan nama user yang aktif
		$update_f1 = $this->tl_f1->update_f1($data, $tabel_f2_field1);

		$aksi = $hapus && $update_f1;

		$notif = $this->handle_4e($aksi, 'tabel_f2', $tabel_f2_field1);
		redirect($_SERVER['HTTP_REFERER']);
	}
}
