<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'OmnitagsController.php';

class Tabel_c1Controller extends OmnitagsController
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
			'title' => $this->title['tabel_c1_alias_v3'],
			'konten' => $this->v3['tabel_c1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c1']),
			'tbl_c1' => $this->tl_c1->get_all_c1(),
			'tbl_e2' => $this->tl_e2->get_all_e2(),
			'tbl_e4' => $this->tl_e4->get_all_e4(),
		);

		$this->load_page('tabel_c1', 'layouts/template_admin', $data1);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => $this->title['tabel_c1_alias_v4'],
			'konten' => $this->v4['tabel_c1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c1']),
			'tbl_c1' => $this->tl_c1->get_all_c1(),
		);

		$this->load_page('tabel_c1', 'layouts/printpage', $data1);
	}

	// Show 1 data
	public function profil()
	{
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value2'],
			$this->aliases['tabel_c2_field6_value3'],
			$this->aliases['tabel_c2_field6_value4'],
			$this->aliases['tabel_c2_field6_value5']
		];
		$this->page_session_check($allowed_values);

		$code = userdata('id');
		$data1 = array(
			'title' => $this->title['tabel_c1_alias2_v6'],
			'konten' => $this->v6['tabel_c1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c1']),
			'tbl_c1' => $this->tl_c1->get_c1_by_field('tabel_c1_field1', $code),
		);

		$this->load_page('tabel_c1', 'layouts/template_admin', $data1);
	}

	// Login page
	public function login()
	{
		$this->declarew();
		$this->page_session_all();

		$data1 = array(
			'title' => 'Login Sebagai ' . $this->aliases['tabel_c1_alias'],
			'konten' => 'contents/tabel_c1Controller/login',
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c1']),
		);

		$this->load_page('', 'layouts/logpage', $data1);
	}

	// Signup page
	public function signup()
	{
		$this->declarew();
		$this->page_session_all();

		$data1 = array(
			'title' => 'Create Account',
			'konten' => 'signup',
			'dekor' => $this->tl_b1->dekor($this->theme_id, 'signup'),
		);

		$this->load_page('', 'layouts/logpage', $data1);
	}

	// Functions
	// Add data
	public function tambah()
	{
		$this->declarew();
		$this->session_all();

		$param = $this->v_post['tabel_c1_field5'];

		$tabel = $this->tl_c1->get_c1_by_field('tabel_c1_field5', $param)->result();
		$this->check_null($tabel);

		validate_all(
			array(
				$this->v_post['tabel_c1_field2'],
				$this->v_post['tabel_c1_field3'],
				$this->v_post['tabel_c1_field4'],
				$this->v_post['tabel_c1_field5'],
				$this->v_post['tabel_c1_field6'],
			),
			$this->views['flash2'],
			'tambah'
		);

		$code = $this->add_code('tabel_c1', 'id', 5, '01');

		$data = array(
			// 'id' => $id,
			'id' => $code,
			$this->aliases['tabel_c1_field2'] => $this->v_post['tabel_c1_field2'],
			$this->aliases['tabel_c1_field3'] => $this->v_post['tabel_c1_field3'],
			$this->aliases['tabel_c1_field4'] => $this->v_post['tabel_c1_field4'],
			$this->aliases['tabel_c1_field5'] => $this->v_post['tabel_c1_field5'],
			$this->aliases['tabel_c1_field6'] => $this->v_post['tabel_c1_field6'],

			'created_at' => date("Y-m-d\TH:i:s"),
			'updated_at' => date("Y-m-d\TH:i:s"),
		);


		$aksi = $this->tl_c1->insert_c1($data);
		$notif = $this->handle_4b($aksi, 'tabel_c1');

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Update data
	public function update()
	{
		// Di sini aku masih ada perdebatan apakah akan menggunakan gambar dengan nama file yang sama atau tidak
		// Atau menggunakan menggunakan data dari field lain sebagai nama gambar
		// Hal itu tentunya tergantung preferensi petugas
		// Fitur update gambar di bawah sudah selesai
		// Bisa mengupload gambar dengan tulisan yang dihapus, tentunya dengan minim data double

		$this->declarew();
		$this->session_3();

		$code = $this->v_post['tabel_c1_field1'];

		$tabel_c1 = $this->tl_c1->get_c1_by_field('tabel_c1_field1', $code)->result();
		$this->check_data($tabel_c1);

		validate_all(
			array(
				$this->v_post['tabel_c1_field1'],
				$this->v_post['tabel_c1_field2'],
				$this->v_post['tabel_c1_field3'],
				$this->v_post['tabel_c1_field5'],
				$this->v_post['tabel_c1_field6'],
			),
			$this->views['flash3'],
			'ubah' . $code
		);

		$tabel_c1 = $this->tl_c1->get_c1_by_field('tabel_c1_field1', $code)->result();

		$data = array(
			$this->aliases['tabel_c1_field2'] => $this->v_post['tabel_c1_field2'],
			$this->aliases['tabel_c1_field3'] => $this->v_post['tabel_c1_field3'],
			$this->aliases['tabel_c1_field4'] => $this->v_post['tabel_c1_field4'],
			$this->aliases['tabel_c1_field5'] => $this->v_post['tabel_c1_field5'],
			$this->aliases['tabel_c1_field6'] => $this->v_post['tabel_c1_field6'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_c1->update_c1($data, $code);
		$this->insert_history('tabel_c1', $data);

		$notif = $this->handle_4c($aksi, 'tabel_c1', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
	
	//Soft Delete Data
	public function soft_delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_c1->get_c1_by_field('tabel_c1_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_c1->update_c1($data, $code);
		$this->insert_history('tabel_c1', $data);

		$notif = $this->handle_4e($aksi, 'tabel_c1', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Soft Delete data
	public function restore($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_c1->get_c1_by_field_archive('tabel_c1_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => NULL,
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_c1->update_c1($data, $code);
		$this->insert_history('tabel_c1', $data);

		$notif = $this->handle_4e($aksi, 'tabel_c1', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_c1->get_c1_by_field_archive('tabel_c1_field1', $code)->result();
		$this->check_data($tabel);

		$aksi = $this->tl_c1->delete_c1_by_field('tabel_c1_field1', $code);

		$notif = $this->handle_4e($aksi, 'tabel_c1', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}



	public function update_profil()
	{
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value2'],
			$this->aliases['tabel_c2_field6_value3'],
			$this->aliases['tabel_c2_field6_value4'],
			$this->aliases['tabel_c2_field6_value5']
		];
		$this->session_check($allowed_values);

		$code = $this->v_post['tabel_c1_field1'];

		$tabel = $this->tl_c1->get_c1_by_field('tabel_c1_field1', $code)->result();
		$this->check_data($tabel);

		$data = array(
			$this->aliases['tabel_c1_field2'] => $this->v_post['tabel_c1_field2'],
			$this->aliases['tabel_c1_field3'] => $this->v_post['tabel_c1_field3'],
			$this->aliases['tabel_c1_field5'] => $this->v_post['tabel_c1_field5'],
			$this->aliases['tabel_c1_field7'] => $this->v_post['tabel_c1_field7'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_c1->update_c1($data, $code);
		$this->insert_history('tabel_c1', $data);

		$notif = $this->handle_4d($aksi, 'tabel_c1', $code);

		// mengambil data profil yang baru dirubah
		$tabel_c1 = $this->tl_c1->get_c1_by_field('tabel_c1_field1', $code)->result();

		$tabel_c1_field2 = $tabel_c1[0]->nama;
		$tabel_c1_field3 = $tabel_c1[0]->email;
		$tabel_c1_field5 = $tabel_c1[0]->phone;
		$tabel_c1_field7 = $tabel_c1[0]->role;

		// membuat session baru berdasarkan data yang telah diupdate
		set_userdata($this->aliases['tabel_c1_field2'], $tabel_c1_field2);
		set_userdata($this->aliases['tabel_c1_field3'], $tabel_c1_field3);
		set_userdata($this->aliases['tabel_c1_field5'], $tabel_c1_field5);
		set_userdata($this->aliases['tabel_c1_field7'], $tabel_c1_field7);

		// kembali ke halaman sebelumnya sesuai dengan masing-masing petugas dengan level yang berbeda
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_password()
	{
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value2'],
			$this->aliases['tabel_c2_field6_value3'],
			$this->aliases['tabel_c2_field6_value4'],
			$this->aliases['tabel_c2_field6_value5']
		];
		$this->session_check($allowed_values);

		$code = $this->v_post['tabel_c1_field1'];

		$cek_id = $this->tl_c1->get_c1_by_field('tabel_c1_field1', $code);

		// mencari apakah jumlah data lebih dari 0
		if ($cek_id->num_rows() > 0) {
			$tabel_c1 = $cek_id->result();
			$cek_tabel_c1_field4 = $tabel_c1[0]->password;

			$old_tabel_c1_field4 = $this->v_post['tabel_c1_field4_old'];

			// memverifikasi password lama dengan password di database
			if (password_verify($old_tabel_c1_field4, $cek_tabel_c1_field4)) {
				$tabel_c1_field4 = $this->v_post['tabel_c1_field4'];

				// jika konfirmasi password sama dengan password baru
				if ($this->v_post['tabel_c1_field4_confirm'] === $tabel_c1_field4) {
					$this->load->library('encryption');

					$data = array(
						// mengubah password menjadi password berenkripsi
						$this->aliases['tabel_c1_field4'] => password_hash($tabel_c1_field4, PASSWORD_DEFAULT),
					);

					$aksi = $this->tl_c1->update_c1($data, $code);

					redirect($_SERVER['HTTP_REFERER']);

					// jika konfirmasi password tidak sama dengan password baru
				} else {

					set_flashdata($this->flash['tabel_c1_field4'], $this->flash_msg3_alt2['tabel_c1_field4_alias']);
					set_flashdata('modal', $this->flash_func['tabel_c1_field4']);
					redirect($_SERVER['HTTP_REFERER']);
				}

				// jika password lama salah
			} else {

				set_flashdata($this->flash['tabel_c1_field4'], $this->flash_msg3_alt1['tabel_c1_field4_alias']);
				set_flashdata('modal', $this->flash_func['tabel_c1_field4']);
				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data kurang dari 0
		} else {

			set_flashdata($this->flash['tabel_c1_field4'], $this->flash_msg5['tabel_c1_alias2']);
			set_flashdata('modal', $this->flash_func['tabel_c1_field4']);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function ceklogin()
	{
		$this->declarew();
		$this->session_all();

		$code = $this->v_post['tabel_c1_field1'];
		$param8 = $this->v_post['tabel_c1_field8'];

		$method1 = $this->tl_c1->get_c1_by_field('tabel_c1_field1', $code);

		// mencari apakah jumlah data kurang dari 0
		if ($method1->num_rows() > 0) {
			$tabel_c1 = $method1->result();
			$method8 = $tabel_c1[0]->password;

			// memverifikasi password dengan password di database
			if (password_verify($param8, $method8)) {
				$code = $tabel_c1[0]->id_petugas;
				$tabel_c1_field2 = $tabel_c1[0]->nama;
				$tabel_c1_field3 = $tabel_c1[0]->email;
				$tabel_c1_field5 = $tabel_c1[0]->phone;
				$tabel_c1_field7 = $tabel_c1[0]->role;
				// $tabel_c2_field6 = $this->aliases['tabel_c2_field6_value5'];

				set_userdata('id', $code);
				set_userdata($this->aliases['tabel_c1_field2'], $tabel_c1_field2);
				set_userdata($this->aliases['tabel_c1_field3'], $tabel_c1_field3);
				set_userdata($this->aliases['tabel_c1_field5'], $tabel_c1_field5);
				set_userdata($this->aliases['tabel_c1_field7'], $tabel_c1_field7);
				// set_userdata('role', $tabel_c2_field6);


				redirect(site_url('home'));

				// jika password salah
			} else {

				// Selama ini hal yang menampilkan pesan hanyalah toast
				// Di sini aku akan mencoba menerapkan menampilkan modal secara otomatis ketika password salah
				// Namun nanti hanya ketika password salah saja, melainkan semua proses yang melibatkan elemen modal
				// Kemungkinan ke depannya bakal ada yang lain juga selain modal dan toast 
				// Hal ini tentunya akan menggunakan beberapa file diantara lain
				// Welcome.php, halaman template bagian javascript, dan masing-masing halaman tujuan
				// Selain itu aku ingin mencoba menerapkannya juga pada button notifikasi jika ada nanti
				// Supaya bisa menyimpan proses apa saja yang telah selesai dilakukan

				// Dan terakhir, aku perlu menambahkan fungsi flashdata baru selain 'panggil'
				// Alasannya karena ada banyak sekali jenis pesan yang tidak boleh digunakan dalam satu tempat
				// Kalau tidak bisa merusak experience dari petugas


				set_flashdata($this->views['flash1'], $this->aliases['tabel_c1_field5_alias'] . ' salah!');
				redirect(site_url($this->aliases['tabel_c1'] . '/login'));
			}

			// jika jumlah data lebih dari 0
		} else {

			set_flashdata($this->views['flash1'], $this->aliases['tabel_c1_field1_alias'] . ' tidak tersedia!');
			redirect(site_url($this->aliases['tabel_c1'] . '/login'));
		}

		// // mencari apakah jumlah data kurang dari 0
		// if ($cekemail->num_rows() > 0) {
		// 	$tabel_c1 = $cekemail->result();
		// 	$cekpass = $tabel_c1[0]->password;

		// 	// memverifikasi password dengan password di database
		// 	if (password_verify($password, $cekpass)) {
		// 		$codeuser = $tabel_c1[0]->id_petugas;
		// 		$nama = $tabel_c1[0]->nama;
		// 		$code = $tabel_c1[0]->email;
		// 		$hp = $tabel_c1[0]->phone;
		// 		$level = $tabel_c1[0]->level;

		// 		set_userdata('id_petugas', $codeuser);
		// 		set_userdata('nama', $nama);
		// 		set_userdata('email', $code);
		// 		set_userdata('hp', $hp);
		// 		set_userdata('level', $level);

		// 		redirect($_SERVER['HTTP_REFERER']); 
		redirect(site_url('home'));

		// 		// jika password salah
		// 	} else {

		// 		set_flashdata($this->views['flash1'], 'Password Salah!');
		// 		redirect($_SERVER['HTTP_REFERER']); 
		redirect(site_url('login'));
		// 	}

		// 	// jika jumlah data lebih dari 0
		// } else {

		// 	set_flashdata($this->views['flash1'], 'Email tidak tersedia!');
		// 	redirect($_SERVER['HTTP_REFERER']); 
		redirect(site_url('login'));
		// }	
	}

	// Logout function
	public function logout()
	{
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value2'],
			$this->aliases['tabel_c2_field6_value3'],
			$this->aliases['tabel_c2_field6_value4'],
			$this->aliases['tabel_c2_field6_value5']
		];
		$this->session_check($allowed_values);

		// menghapus session
		session_destroy();
		redirect($_SERVER['HTTP_REFERER']);
		redirect(site_url('home'));
	}

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => $this->title['tabel_c1_alias_v9'],
			'konten' => $this->v9['tabel_c1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c1']),
			'tbl_c1' => $this->tl_c1->get_all_c1_archive(),
		);

		$this->load_page('tabel_c1', 'layouts/template', $data1);
	}
	
	public function detai_archive($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_c1->get_c1_by_field('tabel_c1_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => $this->title['tabel_c1_alias_v10'],
			'konten' => $this->v10['tabel_c1'],
			'dekor' => $this->tl_c1->dekor($this->theme_id, $this->aliases['tabel_c1']),
			'tbl_c1' => $this->tl_c1->get_c1_by_field_archive('tabel_c1_field1', $code),
		);

		$this->load_page('tabel_c1', 'layouts/template', $data1);
	}
	
	public function history($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_c1->get_c1_by_field('tabel_c1_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'table_id' => $code,
			'title' => $this->title['tabel_c1_alias_v11'],
			'konten' => $this->v11['tabel_c1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c1']),
			'tbl_c1' => $this->tl_ot->get_by_field_history('tabel_c1', 'tabel_c1_field1', $code),
			'current' => $this->tl_ot->get_by_field('tabel_c1', 'tabel_c1_field1', $code),
		);

		$this->load_page('tabel_c1', 'layouts/template_admin', $data1);
	}

	//Push History Data into current data
	public function push($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_ot->get_by_id_history('tabel_c1', $code)->result();
		$this->check_data($tabel);

		$code = $tabel[0]->id;

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_c1_field2'] => $tabel[0]->{$this->aliases['tabel_c1_field2']},

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_c1->update_c1($data, $code);

		$notif = $this->handle_4c($aksi, 'tabel_c1', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
}

