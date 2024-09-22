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
					'tbl_a1' => $this->tl_a1->get_a1_by_field('tabel_a1_field1', $this->tabel_a1_field1),
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

		$this->load_page('tabel_f2', $halaman, $data1);
	}

	// Account Only Pages
	public function daftar()
	{
		$this->declarew();
		$this->page_session_5();

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

		$this->load_page('tabel_f2', '_layouts/template', $data1);
	}


	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_3();

		// nilai min dan max di sini belum ada
		// $param1 = $this->v_get['tabel_f2_field10_filter1'];
		// $param2 = $this->v_get['tabel_f2_field10_filter2'];
		// $param3 = $this->v_get['tabel_f2_field11_filter1'];
		// $param4 = $this->v_get['tabel_f2_field11_filter2'];

		// $filter = $this->tl_f2->filter_with_e4($param1, $param2, $param3, $param4);

		// if (empty($param1)) {
		// 	$result = $this->tl_f2->get_f2_with_e4();
		// } else {
		// 	$result = $filter;
		// }

		$data1 = array(
			'title' => lang('tabel_f2_alias_v3_title'),
			'konten' => $this->v3['tabel_f2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f2']),
			'tbl_f2' => $this->tl_f2->get_all_f2(),
			'tbl_e3' => $this->tl_e3->get_all_e3(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			// 'tabel_f2_field10_filter1_value' => $param1,
			// 'tabel_f2_field10_filter2_value' => $param2,
			// 'tabel_f2_field11_filter1_value' => $param3,
			// 'tabel_f2_field11_filter2_value' => $param4
		);

		$this->load_page('tabel_f2', '_layouts/template', $data1);
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
			'tbl_f2' => $this->tl_f2->get_f2_with_e4(),
		);

		$this->load_page('tabel_f2', '_layouts/printpage', $data1);
	}

	// Print one data
	public function print($tabel_f2_field1 = null)
	{
		$this->declarew();
		$allowed_values = [
                $this->aliases['tabel_c2_field6_value4'],
                $this->aliases['tabel_c2_field6_value5']
            ];
            $this->page_session_check($allowed_values);

		$tabel = $this->tl_f2->get_f2_by_field('tabel_f2_field1', $tabel_f2_field1);
		$this->check_data($tabel);

		$data1 = array(
			'title' => lang('tabel_f2_alias_v5_title'),
			'konten' => $this->v5['tabel_f2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f2']),
			'tbl_f2' => $this->tl_f2->get_f2_with_e4_by_f2_field1($tabel_f2_field1),
		);

		$this->load_page('tabel_f2', '_layouts/printpage', $data1);
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

		$this->load_page('tabel_f2', '_layouts/template', $data1);
	}


	public function konfirmasi()
	{
		$this->declarew();
		$this->page_session_5();

		$tabel_c2_field3 = userdata($this->aliases['tabel_c2_field3'] . '_' . $this->aliases['tabel_f2']);

		$data1 = array(
			'title' => lang('tabel_f2_alias_v4_title'),
			'konten' => $this->v7['tabel_f2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f2']),

			// mengembalikan data baris terakhir/terbaru sesuai ketentuan dalam database untuk ditampilkan
			'tbl_f2' => $this->tl_f2->get_f2_by_field('tabel_c2_field3', $tabel_c2_field3)->last_row(),
		);

		$this->load_page('tabel_f2', '_layouts/blank', $data1);
	}

	// Functions
	// Add data
	public function tambah()
	{
		// Functional requirement: Declare necessary configurations
		$this->declarew();
		$this->session_5();

		// Security: Input Sanitization and Validation
		$inputs = [
			'tabel_f2_field4',
			'tabel_f2_field8',
			'tabel_f2_field10',
			'tabel_f2_field11',
			'tabel_f2_field2',
			'tabel_f2_field3',
			'tabel_f2_field5',
			'tabel_f2_field6',
			'tabel_f2_field7'
		];

		foreach ($inputs as $input) {
			$input_value = htmlspecialchars(trim($this->v_post[$input]));
			if (empty($input_value)) {
				// Error Handling: Set error flash message for invalid input
				set_flashdata($this->views['flash1'], "Invalid input. Please provide valid data.");
				set_flashdata($this->views['flash1'], $this->views['flash1_func1']);
				// Functional requirement: Redirect user to 'tabel_f2' confirmation page
				redirect(site_url($this->language_code . '/' . $this->aliases['tabel_f2'] . '/konfirmasi'));
			}
		}

		// Calculate total price based on date difference
		$startTimeStamp = strtotime($this->v_post['tabel_f2_field10']);
		$endTimeStamp = strtotime($this->v_post['tabel_f2_field11']);
		$timedif = $endTimeStamp - $startTimeStamp;
		$numberdays = $timedif / 60 / 60 / 24; // 86400 seconds in one day

		$tabel_e4_field1 = $this->v_post['tabel_f2_field7'];
		$tabel_e4 = $this->tl_e4->get_e4_by_field('tabel_e4_field1', $tabel_e4_field1)->result();

		// Calculate total price
		$harga_total = ($numberdays * $tabel_e4[0]->harga);

		// $id = get_next_code($this->aliases['tabel_e1'], $this->aliases['tabel_e1_field1'], 'FK');
		// $this->aliases['tabel_e1_field1'] => $id,

		$data = [
			$this->aliases['tabel_f2_field1'] => '',
			$this->aliases['tabel_f2_field2'] => $this->v_post['tabel_f2_field2'],
			$this->aliases['tabel_f2_field3'] => $this->v_post['tabel_f2_field3'],
			$this->aliases['tabel_f2_field4'] => $this->v_post['tabel_f2_field4'],
			$this->aliases['tabel_f2_field5'] => $this->v_post['tabel_f2_field5'],
			$this->aliases['tabel_f2_field6'] => $this->v_post['tabel_f2_field6'],
			$this->aliases['tabel_f2_field7'] => $this->v_post['tabel_f2_field7'],
			$this->aliases['tabel_f2_field8'] => $this->v_post['tabel_f2_field8'],
			$this->aliases['tabel_f2_field9'] => $harga_total,
			$this->aliases['tabel_f2_field10'] => $this->v_post['tabel_f2_field10'],
			$this->aliases['tabel_f2_field11'] => $this->v_post['tabel_f2_field11'],
			$this->aliases['tabel_f2_field12'] => $this->aliases['tabel_f2_field12_value1'],

			'created_at' => date("Y-m-d\TH:i:s"),
			'updated_at' => date("Y-m-d\TH:i:s"),
		];

		// Create temporary session for a specific duration
		set_userdata($this->aliases['tabel_c2_field3'] . '_' . $this->aliases['tabel_f2'], $this->v_post['tabel_f2_field4']);

		try {
			// Security: Prepared Statements to prevent SQL injection
			// Functional requirement: Save data to the database
			$aksi = $this->tl_f2->insert_f2($data);

			$notif = $this->handle_4b($aksi, 'tabel_f2');

		} catch (Exception $e) {
			// Error Handling: Handle database operation errors
			set_flashdata($this->views['flash2'], "Error occurred while adding data: " . $e->getMessage());
			set_flashdata('modal', $this->views['flash2_func1']);
		}

		// Functional requirement: Redirect user to 'tabel_f2' confirmation page
		redirect($this->language_code . '/' . $this->aliases['tabel_f2'] . '/konfirmasi');
	}


	// Update data
	public function update()
	{
		// this function is not really reccessary since only status that can be changed
	}

	// bagian update status untuk sementara kubiarkan tidak menggunakan variabel untuk sementara waktu
	// hal ini ditujukan untuk keperluan penelitian penggunaan array
	public function update_status()
	{
		$this->declarew();
		$allowed_values = [
                $this->aliases['tabel_c2_field6_value4'],
                $this->aliases['tabel_c2_field6_value5']
            ];
            $this->session_check($allowed_values);

		$tabel_f2_field1 = $this->v_post['tabel_f2_field1'];

		$tabel_f2 = $this->tl_f2->get_f2_by_field('tabel_f2_field1', $tabel_f2_field1)->result();
		$this->check_data($tabel_f2);

		validate_all(
			array(
				$this->v_post['tabel_f2_field1'],
				$this->v_post['tabel_f2_field12'],
			),
			$this->views['flash1'],
			'ubah_status' . $tabel_f2_field1
		);


		$data = array(
			$this->aliases['tabel_f2_field12'] => $this->v_post['tabel_f2_field12'],
		);

		// jika status pesanan cek in
		if ($this->v_post['tabel_f2_field12'] == $this->aliases['tabel_f2_field12_value4']) {

			// hanya merubah status pesanan
			$aksi = $this->tl_f2->update_f2($data, $tabel_f2_field1);

			// jika status pesanan cek out
		} elseif ($this->v_post['tabel_f2_field12'] == $this->aliases['tabel_f2_field12_value5']) {

			// menghapus data pesanan supaya trigger tambah_kamar dapat berjalan
			$aksi = $this->tl_f2->delete_f2_by_field('tabel_f2_field1', $tabel_f2_field1);

			// memasukkan nama resepsionis yang melakukan operasi
			$data = array(
				$this->aliases['tabel_f1_field15'] => userdata($this->aliases['tabel_c2_field1'])
			);

			// mengupdate pesanan dengan nama user yang aktif
			$aksi = $this->tl_f1->update_f1($data, $tabel_f2_field1);
		}

		$notif = $this->handle_4c($aksi, 'tabel_f2_field12', $tabel_f2_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}
	
	//Soft Delete Data
	public function soft_delete($tabel_f2_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_f2->get_f2_by_field('tabel_f2_field1', $tabel_f2_field1)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_f2->update_f2($data, $tabel_f2_field1);
		$this->insert_history('tabel_f2', $data);

		$notif = $this->handle_4e($aksi, 'tabel_f2', $tabel_f2_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Soft Delete data
	public function restore($tabel_f2_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_f2->get_f2_by_field_archive('tabel_f2_field1', $tabel_f2_field1)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => NULL,
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_f2->update_f2($data, $tabel_f2_field1);
		$this->insert_history('tabel_f2', $data);

		$notif = $this->handle_4e($aksi, 'tabel_f2', $tabel_f2_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}


	// Delete data
	public function delete($tabel_f2_field1 = null)
	{
		$this->declarew();
		$this->session_4();

		$tabel = $this->tl_f2->get_f2_by_field_archive('tabel_f2_field1', $tabel_f2_field1)->result();
		$this->check_data($tabel);

		$tabel_f2_field1 = $this->v_post['tabel_f2_field1'];
		$status = $this->v_post['tabel_f2_field12'];

		$hapus = $this->tl_f2->delete_f2_by_field('tabel_f2_field1', $tabel_f2_field1);

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



	// Ini adalah fitur untuk membooking kamar berdasarkan pesanan oleh resepsionis
	// Pada fitur ini, saya akan mencoba menggunakan gabungan dari jumlah kamar dan tipe kamar, 
	// Oleh karena itu bakal ada 2 fungsi yang menggunakan parameter ini yakni, book dan ubah status. 
	// Semoga besok bisa kelar karena ini merupakan fitur yang paling rumit di antara yang lain
	public function book()
	{
		$this->declarew();
		$this->session_4();

		$tabel_f2_field1 = $this->v_post['tabel_f2_field1'];

		$tabel = $this->tl_f2->get_f2_by_field('tabel_f2_field1', $tabel_f2_field1)->result();
		$this->check_data($tabel);

		validate_all(
			array(
				$this->v_post['tabel_f2_field1'],
				$this->v_post['tabel_f2_field12'],
				$this->v_post['tabel_f2_field13'],
			),
			$this->views['flash1'],
			'ubah_status' . $tabel_f2_field1
		);

		// hanya merubah status pesanan berdasarkan id pesanan
		$data = array(
			$this->aliases['tabel_f2_field12'] => $this->aliases['tabel_f2_field12_value2'],
			$this->aliases['tabel_f2_field13'] => $this->v_post['tabel_f2_field13'],

		);

		$aksi = $this->tl_f2->update_f2($data, $tabel_f2_field1);

		// hanya merubah id pesanan di tabel kamar berdasarkan no kamar
		$param = $this->v_post['tabel_f2_field13'];
		$data2 = array(
			$this->aliases['tabel_e3_field3'] => $this->v_post['tabel_f2_field1'],
			$this->aliases['tabel_e3_field4'] => $this->aliases['tabel_e3_field4_value3'],
		);
		$aksi = $this->tl_e3->update_e3($data2, $param);
		$this->insert_history('tabel_f2', $data);

		$notif = $this->handle_4c($aksi, 'tabel_f2', $tabel_f2_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_f2_alias_v9_title'),
			'konten' => $this->v9['tabel_f2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f2']),
			'tbl_f2' => $this->tl_f2->get_all_f2_archive(),
		);

		$this->load_page('tabel_f2', '_layouts/template', $data1);
	}

	// Public Pages
	public function detail_archive($param1 = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_f2->get_f2_by_field('tabel_f2_field1', $param1)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => lang('tabel_f2_alias_v10_title'),
			'konten' => $this->v10['tabel_f2'],
			'dekor' => $this->tl_f2->dekor($this->theme_id, $this->aliases['tabel_f2']),
			'tbl_f2' => $this->tl_f2->get_f2_by_field_archive('tabel_f2_field1', $param1),
		);

		$this->load_page('tabel_f2', '_layouts/template', $data1);
	}
	
	public function history($param1 = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_f2->get_f2_by_field('tabel_f2_field1', $param1)->result();
		$this->check_data($tabel);

		$data1 = array(
			'table_id' => $param1,
			'title' => lang('tabel_f2_alias_v11_title'),
			'konten' => $this->v11['tabel_f2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f2']),
			'tbl_f2' => $this->tl_ot->get_by_field_history('tabel_f2', 'tabel_f2_field1', $param1),
		);

		$this->load_page('tabel_f2', '_layouts/template', $data1);
	}
}
