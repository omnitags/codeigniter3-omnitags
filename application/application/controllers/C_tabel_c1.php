<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_c1 extends Omnitags
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
			'title' => lang('tabel_c1_alias_v3_title'),
			'konten' => $this->v3['tabel_c1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c1']),
			'tbl_c1' => $this->tl_c1->get_all_c1(),
			'tbl_e3' => $this->tl_e3->get_all_e3(),
			'tbl_e4' => $this->tl_e4->get_all_e4(),
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
			'title' => lang('tabel_c1_alias_v4_title'),
			'konten' => $this->v4['tabel_c1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c1']),
			'tbl_c1' => $this->tl_c1->get_all_c1(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/printpage', $data);
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

		$tabel_c1_field1 = userdata($this->aliases['tabel_c1_field1']);
		$data1 = array(
			'title' => lang('tabel_c1_alias2_v6_title'),
			'konten' => $this->v6['tabel_c1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c1']),
			'tbl_c1' => $this->tl_c1->get_c1_by_c1_field1($tabel_c1_field1),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}

	// Login page
	public function login()
	{
		$this->declarew();
		$this->page_session_all();

		$data1 = array(
			'title' => 'Login Sebagai ' . $this->aliases['tabel_c1_alias'],
			'konten' => '_contents/tabel_c1/login',
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c1']),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/logpage', $data);
	}

	// Signup page
	public function signup()
	{
		$this->declarew();
		$this->page_session_all();

		$data1 = array(
			'title' => 'Create an Account',
			'konten' => 'signup',
			'dekor' => $this->tl_b1->dekor($this->theme_id, 'signup'),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/logpage', $data);
	}

	// Functions
	// Add data
	public function tambah()
	{
		$this->declarew();
		$this->session_all();

		$param2 = $this->v_post['tabel_c1_field2'];

		validate_all(
			array(
				$this->v_post['tabel_c1_field2'],
				$this->v_post['tabel_c1_field3'],
				$this->v_post['tabel_c1_field4'],
				$this->v_post['tabel_c1_field4_confirm'],
				$this->v_post['tabel_c1_field5'],
				$this->v_post['tabel_c1_field6'],
				$this->v_post['tabel_c1_field7'],
			),
			$this->views['flash2'],
			'tambah'
		);

		$new_name = $this->v_post['tabel_c1_field2'];
		$path = $this->v_upload_path['tabel_c1'];

		$config['upload_path'] = $path;
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $new_name;
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);
		$upload = $this->upload->do_upload($this->v_input['tabel_c1_field6_input']);

		if (!$upload) {
			// Di sini seharusnya ada notifikasi modal kalau upload tidak berhasil
			// Tapi karena formnya sudah required saya rasa tidak perlu
			set_flashdata($this->views['flash2'], $this->flash_msg2['tabel_c1_field6_alias']);
			set_flashdata('modal', $this->views['flash2_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			// Di bawah ini adalah method untuk mengambil informasi dari hasil upload data
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$method2 = $this->tl_c1->get_c1_by_c1_field2($param2);
		$param4 = $this->v_post['tabel_c1_field4'];

		// mencari apakah jumlah data kurang dari 1
		if ($method2->num_rows() < 1) {

			// jika input konfirm sama dengan input password
			if ($this->v_post['tabel_c1_field4_confirm'] === $param4) {
				$this->load->library('encryption');

				// $id = get_next_code($this->aliases['tabel_c1'], $this->aliases['tabel_c1_field1'], 'USR');

				$data = array(
					// $this->aliases['tabel_c1_field1'] => $id,
					$this->aliases['tabel_c1_field1'] => '',
					$this->aliases['tabel_c1_field2'] => $param2,
					$this->aliases['tabel_c1_field3'] => $this->v_post['tabel_c1_field3'],
					$this->aliases['tabel_c1_field5'] => $this->v_post['tabel_c1_field5'],
					$this->aliases['tabel_c1_field6'] => $gambar,
					$this->aliases['tabel_c1_field7'] => $this->v_post['tabel_c1_field7'],

					// mengubah password menjadi password berenkripsi
					$this->aliases['tabel_c1_field4'] => password_hash($param4, PASSWORD_DEFAULT),

				);

				$aksi = $this->tl_c1->insert_c1($data);

				// mengarahkan pengguna ke halaman yang berbeda sesuai dengan session masing-masing
				if (userdata($this->aliases['tabel_c1_field3'])) {
					redirect(site_url($this->language_code . '/' . $this->aliases['tabel_c1'] . '/login'));
				} else {
					redirect($_SERVER['HTTP_REFERER']);

				}

				// jika input konfirm tidak sama dengan input password
			} else {

				// menampilkan flashdata dalam bentuk teks
				set_flashdata($this->views['flash1'], 'Konfirmasi ' . $this->aliases['tabel_c1_field4'] . ' salah!');

				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data lebih dari 0
		} else {

			set_flashdata($this->views['flash1'], $this->aliases['tabel_c1_field2'] . 'telah digunakan!');
			redirect($_SERVER['HTTP_REFERER']);
		}
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

		$tabel_c1_field1 = $this->v_post['tabel_c1_field1'];

		$tabel_c1 = $this->tl_c1->get_c1_by_c1_field1($tabel_c1_field1)->result();
		$this->check_data($tabel_c1);

		validate_all(
			array(
				$this->v_post['tabel_c1_field1'],
				$this->v_post['tabel_c1_field2'],
				$this->v_post['tabel_c1_field3'],
				$this->v_post['tabel_c1_field5'],
				$this->v_post['tabel_c1_field6_old'],
				$this->v_post['tabel_c1_field7'],
			),
			$this->views['flash3'],
			'ubah' . $tabel_c1_field1
		);

		$tabel_c1 = $this->tl_c1->get_c1_by_c1_field1($tabel_c1_field1)->result();
		$new_name = $this->v_post['tabel_c1_field2'];
		$path = $this->v_upload_path['tabel_c1'];
		$img = $this->v_post['tabel_c1_field6_old'];
		$extension = '.' . getExtension($path . $img);

		$config['upload_path'] = $path;
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['file_name'] = $new_name;
		$config['allowed_types'] = $this->file_type1;
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);
		$upload = $this->upload->do_upload($this->v_input['tabel_c1_field6_input']);

		if (!$upload) {
			if ($new_name != $tabel_c1[0]->nama) {
				rename($path . $img, $path . str_replace(' ', '_', $new_name) . $extension);
				$gambar = str_replace(' ', '_', $new_name) . $extension;
			} else {
				$gambar = $img;
			}
		} else {
			if ($new_name != $tabel_c1[0]->nama) {
				// File upload is successful, delete the old file
				if (file_exists($path . $img)) {
					unlink($path . $img);
				}
				$upload = $this->upload->data();
				$gambar = $upload['file_name'];
			} else {
				$gambar = $img;
			}
		}

		$data = array(
			$this->aliases['tabel_c1_field1'] => $this->v_post['tabel_c1_field1'],
			$this->aliases['tabel_c1_field2'] => $this->v_post['tabel_c1_field2'],
			$this->aliases['tabel_c1_field3'] => $this->v_post['tabel_c1_field3'],
			$this->aliases['tabel_c1_field5'] => $this->v_post['tabel_c1_field5'],
			$this->aliases['tabel_c1_field6'] => $gambar,
			$this->aliases['tabel_c1_field7'] => $this->v_post['tabel_c1_field7'],
		);

		$aksi = $this->tl_c1->update_c1($data, $tabel_c1_field1);

		$notif = $this->handle_4c($aksi, 'tabel_c1', $tabel_c1_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($tabel_c1_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_c1->get_c1_by_c1_field1($tabel_c1_field1)->result();
		$this->check_data($tabel);
		$tabel_c1_field5 = $tabel[0]->foto;
		unlink($this->v_upload_path['tabel_c1'] . $tabel_c1_field5);

		$aksi = $this->tl_c1->delete_c1($tabel_c1_field1);

		$notif = $this->handle_4e($aksi, 'tabel_c1', $tabel_c1_field1);

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

		$tabel_c1_field1 = $this->v_post['tabel_c1_field1'];

		$tabel = $this->tl_c1->get_c1_by_c1_field1($tabel_c1_field1)->result();
		$this->check_data($tabel);

		$data = array(
			$this->aliases['tabel_c1_field2'] => $this->v_post['tabel_c1_field2'],
			$this->aliases['tabel_c1_field3'] => $this->v_post['tabel_c1_field3'],
			$this->aliases['tabel_c1_field5'] => $this->v_post['tabel_c1_field5'],
			$this->aliases['tabel_c1_field7'] => $this->v_post['tabel_c1_field7'],
		);

		$aksi = $this->tl_c1->update_c1($data, $tabel_c1_field1);

		$notif = $this->handle_4d($aksi, 'tabel_c1', $tabel_c1_field1);

		// mengambil data profil yang baru dirubah
		$tabel_c1 = $this->tl_c1->get_c1_by_c1_field1($tabel_c1_field1)->result();

		$tabel_c1_field2 = $tabel_c1[0]->nama;
		$tabel_c1_field3 = $tabel_c1[0]->email;
		$tabel_c1_field5 = $tabel_c1[0]->hp;
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

		$tabel_c1_field1 = $this->v_post['tabel_c1_field1'];

		$cek_id = $this->tl_c1->get_c1_by_c1_field1($tabel_c1_field1);

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

					$aksi = $this->tl_c1->update_c1($data, $tabel_c1_field1);

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

		$tabel_c1_field1 = $this->v_post['tabel_c1_field1'];
		$param8 = $this->v_post['tabel_c1_field8'];

		$method1 = $this->tl_c1->get_c1_by_c1_field1($tabel_c1_field1);

		// mencari apakah jumlah data kurang dari 0
		if ($method1->num_rows() > 0) {
			$tabel_c1 = $method1->result();
			$method8 = $tabel_c1[0]->password;

			// memverifikasi password dengan password di database
			if (password_verify($param8, $method8)) {
				$tabel_c1_field1 = $tabel_c1[0]->id_petugas;
				$tabel_c1_field2 = $tabel_c1[0]->nama;
				$tabel_c1_field3 = $tabel_c1[0]->email;
				$tabel_c1_field5 = $tabel_c1[0]->hp;
				$tabel_c1_field7 = $tabel_c1[0]->role;
				// $tabel_c2_field6 = $this->aliases['tabel_c2_field6_value5'];

				set_userdata($this->aliases['tabel_c1_field1'], $tabel_c1_field1);
				set_userdata($this->aliases['tabel_c1_field2'], $tabel_c1_field2);
				set_userdata($this->aliases['tabel_c1_field3'], $tabel_c1_field3);
				set_userdata($this->aliases['tabel_c1_field5'], $tabel_c1_field5);
				set_userdata($this->aliases['tabel_c1_field7'], $tabel_c1_field7);
				// set_userdata($this->aliases['tabel_c2_field6'], $tabel_c2_field6);


				redirect(site_url($this->language_code . '/' . 'home'));

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
				redirect(site_url($this->language_code . '/' . $this->aliases['tabel_c1'] . '/login'));
			}

			// jika jumlah data lebih dari 0
		} else {

			set_flashdata($this->views['flash1'], $this->aliases['tabel_c1_field1_alias'] . ' tidak tersedia!');
			redirect(site_url($this->language_code . '/' . $this->aliases['tabel_c1'] . '/login'));
		}

		// // mencari apakah jumlah data kurang dari 0
		// if ($cekemail->num_rows() > 0) {
		// 	$tabel_c1 = $cekemail->result();
		// 	$cekpass = $tabel_c1[0]->password;

		// 	// memverifikasi password dengan password di database
		// 	if (password_verify($password, $cekpass)) {
		// 		$tabel_c1_field1user = $tabel_c1[0]->id_petugas;
		// 		$nama = $tabel_c1[0]->nama;
		// 		$tabel_c1_field1 = $tabel_c1[0]->email;
		// 		$hp = $tabel_c1[0]->hp;
		// 		$level = $tabel_c1[0]->level;

		// 		set_userdata('id_petugas', $tabel_c1_field1user);
		// 		set_userdata('nama', $nama);
		// 		set_userdata('email', $tabel_c1_field1);
		// 		set_userdata('hp', $hp);
		// 		set_userdata('level', $level);

		// 		redirect($_SERVER['HTTP_REFERER']); 
		redirect(site_url($this->language_code . '/' . 'home'));

		// 		// jika password salah
		// 	} else {

		// 		set_flashdata($this->views['flash1'], 'Password Salah!');
		// 		redirect($_SERVER['HTTP_REFERER']); 
		redirect(site_url($this->language_code . '/login'));
		// 	}

		// 	// jika jumlah data lebih dari 0
		// } else {

		// 	set_flashdata($this->views['flash1'], 'Email tidak tersedia!');
		// 	redirect($_SERVER['HTTP_REFERER']); 
		redirect(site_url($this->language_code . '/login'));
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
		redirect(site_url($this->language_code . '/' . 'home'));
	}
}
