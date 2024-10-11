<?php
defined('BASEPATH') or exit('No direct script access allowed');
include 'Omnitags.php';

class C_tabel_c2 extends Omnitags
{
	// Halaman publik


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v3_title['tabel_c2_alias'],
			'konten' => $this->v3['tabel_c2'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_c2'])->result(),
			'tbl_c2' => $this->tl_c2->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$tabel_c2_field3 = $this->v_post['tabel_c2_field3'];
		$tabel_c2_field4 = $this->v_post['tabel_c2_field4'];

		$method3 = $this->tl_c2->cek_tabel_c2_field3($tabel_c2_field3);

		// mencari apakah jumlah data kurang dari 1
		if ($method3->num_rows() < 1) {

			// jika input konfirm sama dengan input password
			if ($this->input->post('konfirm') === $tabel_c2_field4) {
				$this->load->library('encryption');

				$data = array(
					$this->aliases['tabel_c2_field1'] => '',
					$this->aliases['tabel_c2_field2'] => $this->v_post['tabel_c2_field2'],
					$this->aliases['tabel_c2_field3'] => $this->v_post['tabel_c2_field3'],

					// mengubah password menjadi password berenkripsi
					$this->aliases['tabel_c2_field4'] => password_hash($tabel_c2_field4, PASSWORD_DEFAULT),

					$this->aliases['tabel_c2_field5'] => $this->v_post['tabel_c2_field5'],
					$this->aliases['tabel_c2_field6'] => $this->v_post['tabel_c2_field6'],
				);

				$aksi = $this->tl_c2->simpan($data);

				// mengarahkan pengguna ke halaman yang berbeda sesuai dengan session masing-masing
				if ($this->session->userdata($this->aliases['tabel_c2_field3'])) {

					redirect(site_url('c_tabel_c2/admin'));
				} else {

					redirect(site_url('c_tabel_c2/login'));
				}

				// jika input konfirm tidak sama dengan input password
			} else {

				// menampilkan flashdata dalam bentuk teks
				$this->session->set_flashdata($this->views['flash1'], 'Konfirmasi ' . $this->aliases['tabel_c2_field4'] . ' salah!');

				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data lebih dari 0
		} else {

			$this->session->set_flashdata($this->views['flash1'], $this->aliases['tabel_c2_field3'] . 'telah digunakan!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function update()
	{
		$this->declarew();

		$tabel_c2_field1 = $this->v_post['tabel_c2_field1'];
		$data = array(
			$this->aliases['tabel_c2_field2'] => $this->v_post['tabel_c2_field2'],
			$this->aliases['tabel_c2_field3'] => $this->v_post['tabel_c2_field3'],
			$this->aliases['tabel_c2_field5'] => $this->v_post['tabel_c2_field5'],
		);

		$aksi = $this->tl_c2->update($data, $tabel_c2_field1);

		$notif = $this->handle_2($aksi, 'tabel_c2', $tabel_c2_field1);

		// kembali ke halaman sebelumnya
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function hapus($tabel_c2_field1 = null)
	{
		$this->declarew();

		$aksi = $this->tl_c2->hapus($tabel_c2_field1);

		$notif = $this->handle_3($aksi, 'tabel_c2_field1', $tabel_c2_field1);

		redirect(site_url('c_tabel_c2/admin'));
	}


	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel_c2_alias'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_c2'])->result(),
			'tbl_c2' => $this->tl_c2->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v4['tabel_c2'], $data);
	}


	public function profil()
	{
		$this->declarew();

		$tabel_c2_field1 = $this->session->userdata($this->aliases['tabel_c2_field1']);
		$data1 = array(
			'title' => $this->v6_title['tabel_c2_alias2'],
			'konten' => $this->v6['tabel_c2'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_c2'])->result(),
			'tbl_c2' => $this->tl_c2->ambil_tabel_c2_field1($tabel_c2_field1)->result(),
			'tbl_d3' => $this->tl_d3->ambil_tabel_c2_field1($tabel_c2_field1)->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function login()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->views['v2_title'],
			'dekor' => $this->tl_b1->dekor('v2')->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v2'], $data);
	}

	public function signup()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->views['v3_title'],
			'dekor' => $this->tl_b1->dekor('v3')->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v3'], $data);
	}

	public function update_profil()
	{
		$this->declarew();

		$tabel_c2_field1 = $this->v_post['tabel_c2_field1'];
		$data = array(
			$this->aliases['tabel_c2_field2'] => $this->v_post['tabel_c2_field2'],
			$this->aliases['tabel_c2_field3'] => $this->v_post['tabel_c2_field3'],
			$this->aliases['tabel_c2_field5'] => $this->v_post['tabel_c2_field5'],
		);

		$aksi = $this->tl_c2->update($data, $tabel_c2_field1);

		if ($aksi) {

			$this->session->set_flashdata($this->views['flash1'], 'Profil berhasil diubah!');
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		} else {

			$this->session->set_flashdata($this->views['flash1'], 'Profil gagal diubah!');
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		// mengambil data profil yang baru dirubah
		$tabel_c2 = $this->tl_c2->ambil_tabel_c2_field1($tabel_c2_field1)->result();
		$tabel_c2_field2 = $tabel_c2[0]->nama;
		$tabel_c2_field3 = $tabel_c2[0]->email;
		$tabel_c2_field4 = $tabel_c2[0]->hp;

		// membuat session baru berdasarkan data yang telah diupdate
		$this->session->set_userdata($this->aliases['tabel_c2_field2'], $tabel_c2_field2);
		$this->session->set_userdata($this->aliases['tabel_c2_field3'], $tabel_c2_field3);

		// kembali ke halaman sebelumnya sesuai dengan masing-masing user dengan level yang berbeda
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_password()
	{
		$this->declarew();

		$tabel_c2_field1 = $this->v_post['tabel_c2_field1'];

		$cek_id = $this->tl_c2->ambil_tabel_c2_field1($tabel_c2_field1);

		// mencari apakah jumlah data lebih dari 0
		if ($cek_id->num_rows() > 0) {
			$tabel_c2 = $cek_id->result();
			$cek_tabel_c2_field4 = $tabel_c2[0]->password;

			$old_tabel_c2_field4 = $this->v_post_old['tabel_c2_field4'];

			// memverifikasi password lama dengan password di database
			if (password_verify($old_tabel_c2_field4, $cek_tabel_c2_field4)) {
				$tabel_c2_field4 = $this->v_post['tabel_c2_field4'];

				// jika konfirmasi password sama dengan password baru
				if ($this->input->post('konfirm') === $this->v_post['tabel_c2_field4']) {
					$this->load->library('encryption');

					$data = array(
						// mengubah password menjadi password berenkripsi
						$this->aliases['tabel_c2_field4'] => password_hash($tabel_c2_field4, PASSWORD_DEFAULT),
					);

					$aksi = $this->tl_c2->update($data, $tabel_c2_field1);

					redirect($_SERVER['HTTP_REFERER']);

					// jika konfirmasi password tidak sama dengan password baru
				} else {

					$this->session->set_flashdata($this->flash['tabel_c2_field4'], $this->flash_msg3_alt2['tabel_c2_field4_alias']);
					$this->session->set_flashdata('modal', $this->flash_func['tabel_c2_field4']);
					redirect($_SERVER['HTTP_REFERER']);
				}

				// jika password lama salah
			} else {

				$this->session->set_flashdata($this->flash['tabel_c2_field4'], $this->flash_msg3_alt1['tabel_c2_field4_alias']);
				$this->session->set_flashdata('modal', $this->flash_func['tabel_c2_field4']);
				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data kurang dari 0
		} else {

			$this->session->set_flashdata($this->flash['tabel_c2_field4'], $this->flash_msg5['tabel_c2_alias2']);
			$this->session->set_flashdata('modal', $this->flash_func['tabel_c2_field4']);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function ceklogin()
	{
		$this->declarew();

		$tabel_c2_field3 = $this->v_post['tabel_c2_field3'];
		$tabel_c2_field4 = $this->v_post['tabel_c2_field4'];

		$method3 = $this->tl_c2->cek_tabel_c2_field3($tabel_c2_field3);

		// mencari apakah jumlah data kurang dari 0
		if ($method3->num_rows() > 0) {
			$tabel_c2 = $method3->result();
			$method4 = $tabel_c2[0]->password;

			// memverifikasi password dengan password di database
			if (password_verify($tabel_c2_field4, $method4)) {
				$tabel_c2_field1 = $tabel_c2[0]->id_user;
				$tabel_c2_field2 = $tabel_c2[0]->nama;
				$tabel_c2_field3 = $tabel_c2[0]->email;
				$tabel_c2_field5 = $tabel_c2[0]->hp;
				$tabel_c2_field6 = $tabel_c2[0]->level;


				$this->session->set_userdata($this->aliases['tabel_c2_field1'], $tabel_c2_field1);
				$this->session->set_userdata($this->aliases['tabel_c2_field2'], $tabel_c2_field2);
				$this->session->set_userdata($this->aliases['tabel_c2_field3'], $tabel_c2_field3);
				$this->session->set_userdata($this->aliases['tabel_c2_field5'], $tabel_c2_field5);
				$this->session->set_userdata($this->aliases['tabel_c2_field6'], $tabel_c2_field6);

				// Function to get the device type
				// Function to get the device type and operating system
				function getDeviceTypeAndOS($userAgent)
				{
					// List of common mobile device strings
					$mobileDevices = array(
						'iPhone',
						'iPad',
						'iPod',
						'Android',
						'Windows Phone',
						'BlackBerry',
					);

					// List of common desktop operating system strings
					$desktopOS = array(
						'Windows',
						'Linux',
						'Macintosh',
						'Mac OS X',
						'Mac OS'
					);

					// Check if the user agent contains any of the mobile device strings
					foreach ($mobileDevices as $device) {
						if (stripos($userAgent, $device) !== false) {
							return $device . ' (Mobile)';
						}
					}

					// Check if the user agent contains any of the desktop operating system strings
					foreach ($desktopOS as $os) {
						if (stripos($userAgent, $os) !== false) {
							return 'Desktop on ' . $os;
						}
					}

					// If no specific device category is found, consider it as a desktop with unknown OS
					return 'Desktop (Unknown OS)';
				}


				// Get the user agent string
				$userAgent = $_SERVER['HTTP_USER_AGENT'];

				// Get the device type
				$deviceType = getDeviceTypeAndOS($userAgent);

				$loginh = array(
					$this->aliases['tabel_d3_field1'] => '',
					$this->aliases['tabel_d3_field2'] => $this->session->userdata($this->aliases['tabel_c2_field1']),
					$this->aliases['tabel_d3_field3'] => date("Y-m-d H:i:s"),
					$this->aliases['tabel_d3_field4'] => date("Y-m-d H:i:s"),
					$this->aliases['tabel_d3_field5'] => $deviceType,
				);

				$login_history = $this->tl_d3->simpan($loginh);

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
				// Kalau tidak bisa merusak experience dari user

				$this->session->set_flashdata($this->views['flash1'], $this->flash_msg3['tabel_c2_field4_alias']);
				redirect(site_url('c_tabel_c2/login'));
			}

			// jika jumlah data lebih dari 0
		} else {

			$this->session->set_flashdata($this->views['flash1'], $this->flash_msg4['tabel_c2_field3']);
			redirect(site_url('c_tabel_c2/login'));
		}

		// // mencari apakah jumlah data kurang dari 0
		// if ($cekemail->num_rows() > 0) {
		// 	$tabel_c2 = $cekemail->result();
		// 	$cekpass = $tabel_c2[0]->password;

		// 	// memverifikasi password dengan password di database
		// 	if (password_verify($password, $cekpass)) {
		// 		$tabel_c2_field1 = $tabel_c2[0]->id_user;
		// 		$nama = $tabel_c2[0]->nama;
		// 		$tabel_c2_field1 = $tabel_c2[0]->email;
		// 		$hp = $tabel_c2[0]->hp;
		// 		$level = $tabel_c2[0]->level;

		// 		$this->session->set_userdata('id_user', $tabel_c2_field1);
		// 		$this->session->set_userdata('nama', $nama);
		// 		$this->session->set_userdata('email', $tabel_c2_field1);
		// 		$this->session->set_userdata('hp', $hp);
		// 		$this->session->set_userdata('level', $level);

		// 		redirect(site_url('home'));

		// 		// jika password salah
		// 	} else {

		// 		$this->session->set_flashdata($this->views['flash1'], 'Password Salah!');
		// 		redirect(site_url('c_tabel_c2/login'));
		// 	}

		// 	// jika jumlah data lebih dari 0
		// } else {

		// 	$this->session->set_flashdata($this->views['flash1'], 'Email tidak tersedia!');
		// 	redirect(site_url('c_tabel_c2/login'));
		// }


	}

	public function logout()
	{
		$this->declarew();

		// menghapus session
		session_destroy();
		redirect(site_url('home'));
	}
}
