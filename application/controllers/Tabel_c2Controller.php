<?php
defined('BASEPATH') or exit('No direct script access allowed');
include 'OmnitagsController.php';

class Tabel_c2Controller extends OmnitagsController
{
	// Pages
	// Public Pages


	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => $this->title['tabel_c2_alias_v3'],
			'konten' => $this->v3['tabel_c2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c2']),
			'tbl_c2' => $this->tl_c2->get_all_c2(),
		);

		$this->load_page('tabel_c2', 'layouts/template_admin', $data1);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => $this->title['tabel_c2_alias_v4'],
			'konten' => $this->v4['tabel_c2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c2']),
			'tbl_c2' => $this->tl_c2->get_all_c2(),
		);

		$this->load_page('tabel_c2', 'layouts/printpage', $data1);
	}

	// Profile page
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
			'title' => $this->title['tabel_c2_alias_v6'],
			'konten' => $this->v6['tabel_c2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c2']),
			'tbl_c2' => $this->tl_c2->get_c2_by_field('id', $code),
			'tbl_d3' => $this->tl_d3->get_d3_by_field('tabel_d3_field2', $code),
		);

		$this->load_page('tabel_c2', 'layouts/template_admin', $data1);
	}

	// Login Page
	public function login()
	{
		$this->declarew();
		$this->page_session_all();

		$data1 = array(
			'title' => "Login",
			'konten' => 'login',
			'dekor' => $this->tl_b1->dekor($this->theme_id, 'login'),
		);

		$this->load_page('', 'layouts/logpage', $data1);
	}

	// Sign Up Page
	public function signup()
	{
		$this->declarew();
		$this->page_session_all();

		$data1 = array(
			'title' => "Sign Up",
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

		validate_all(
			array(
				$this->v_post['tabel_c2_field2'],
				$this->v_post['tabel_c2_field3'],
				$this->v_post['tabel_c2_field4_new'],
				$this->v_post['tabel_c2_field4_confirm'],
				$this->v_post['tabel_c2_field5'],
				$this->v_post['tabel_c2_field6'],
			),
			$this->views['flash2'],
			'tambah'
		);

		$tabel_c2_field3 = $this->v_post['tabel_c2_field3'];
		$tabel_c2_field4 = $this->v_post['tabel_c2_field4_new'];

		$method3 = $this->tl_c2->get_c2_by_field('email', $tabel_c2_field3);

		// mencari apakah jumlah data kurang dari 1
		if ($method3->num_rows() < 1) {

			// jika input konfirm sama dengan input password
			if ($this->v_post['tabel_c2_field4_confirm'] === $tabel_c2_field4) {
				$this->load->library('encryption');

				$code = get_next_code($this->aliases['tabel_c2'], 'id', '32');

				$data = array(
					'id' => $code,
					$this->aliases['tabel_c2_field2'] => $this->v_post['tabel_c2_field2'],
					'email' => $this->v_post['tabel_c2_field3'],

					// mengubah password menjadi password berenkripsi
					'password' => password_hash($tabel_c2_field4, PASSWORD_DEFAULT),

					'phone' => $this->v_post['tabel_c2_field5'],
					'role' => $this->v_post['tabel_c2_field6'],

					'created_at' => date("Y-m-d\TH:i:s"),
					'updated_at' => date("Y-m-d\TH:i:s"),
				);

				$aksi = $this->tl_c2->insert_c2($data);

				// mengarahkan pengguna ke halaman yang berbeda sesuai dengan session masing-masing
				if (userdata('email')) {

					redirect($_SERVER['HTTP_REFERER']);
				} else {

					redirect(site_url('login'));
				}

				// jika input konfirm tidak sama dengan input password
			} else {

				// menampilkan flashdata dalam bentuk teks
				set_flashdata($this->views['flash1'], 'Konfirmasi ' . 'password' . ' salah!');

				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data lebih dari 0
		} else {

			set_flashdata($this->views['flash1'], 'email' . ' telah digunakan!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	// Update data
	public function update()
	{
		$this->declarew();
		$this->session_3();

		$code = $this->v_post['tabel_c2_field1'];

		$tabel_c2 = $this->tl_c2->get_c2_by_field('id', $code)->result();
		$this->check_data($tabel_c2);

		validate_all(
			array(
				$this->v_post['tabel_c2_field1'],
				$this->v_post['tabel_c2_field2'],
				$this->v_post['tabel_c2_field3'],
				$this->v_post['tabel_c2_field5'],
				$this->v_post['tabel_c2_field6'],
			),
			$this->views['flash3'],
			'ubah' . $code
		);

		$data = array(
			$this->aliases['tabel_c2_field2'] => $this->v_post['tabel_c2_field2'],
			'email' => $this->v_post['tabel_c2_field3'],
			'phone' => $this->v_post['tabel_c2_field5'],
			'role' => $this->v_post['tabel_c2_field6'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_c2->update_c2($data, $code);
		$this->insert_history('tabel_c2', $data);

		$notif = $this->handle_4c($aksi, 'tabel_c2', $code);

		// kembali ke halaman sebelumnya
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	//Soft Delete Data
	public function soft_delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_c2->get_c2_by_field('id', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_c2->update_c2($data, $code);
		$this->insert_history('tabel_c2', $data);

		$notif = $this->handle_4e($aksi, 'tabel_c2', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Soft Delete data
	public function restore($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_c2->get_c2_by_field_archive('tabel_c2_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => NULL,
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_c2->update_c2($data, $code);
		$this->insert_history('tabel_c2', $data);

		$notif = $this->handle_4e($aksi, 'tabel_c2', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_c2->get_c2_by_field_archive('tabel_c2_field1', $code)->result();
		$this->check_data($tabel);
		$aksi = $this->tl_c2->delete_c2_by_field('tabel_c2_field1', $code);

		$notif = $this->handle_4e($aksi, 'tabel_c2', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_profil()
	{
		$this->declarew();
		$this->session_3();

		$code = $this->v_post['tabel_c2_field1'];

		$tabel = $this->tl_c2->get_c2_by_field('id', $code)->result();
		$this->check_data($tabel);

		validate_all(
			array(
				$this->v_post['tabel_c2_field1'],
				$this->v_post['tabel_c2_field2'],
				$this->v_post['tabel_c2_field3'],
				$this->v_post['tabel_c2_field5'],
			),
			$this->views['flash1'],
			'ubah' . $code
		);

		$data = array(
			$this->aliases['tabel_c2_field2'] => $this->v_post['tabel_c2_field2'],
			'email' => $this->v_post['tabel_c2_field3'],
			'phone' => $this->v_post['tabel_c2_field5'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_c2->update_c2($data, $code);
		$this->insert_history('tabel_c2', $data);

		$notif = $this->handle_4c($aksi, 'tabel_c2', $code);

		// mengambil data profil yang baru dirubah
		$tabel_c2 = $this->tl_c2->get_c2_by_field('id', $code)->result();
		$tabel_c2_field2 = $tabel_c2[0]->{$this->aliases['tabel_c2_field2']};
		$tabel_c2_field3 = $tabel_c2[0]->email;
		$tabel_c2_field5 = $tabel_c2[0]->phone;

		// membuat session baru berdasarkan data yang telah diupdate
		set_userdata($this->aliases['tabel_c2_field2'], $tabel_c2_field2);
		set_userdata('email', $tabel_c2_field3);

		// kembali ke halaman sebelumnya sesuai dengan masing-masing user dengan level yang berbeda
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

		$code = $this->v_post['tabel_c2_field1'];

		validate_all(
			array(
				$this->v_post['tabel_c2_field1'],
				$this->v_post['tabel_c2_field4_old'],
				$this->v_post['tabel_c2_field4_new'],
				$this->v_post['tabel_c2_field4_confirm'],
			),
			$this->views['flash1'],
			'password' . $code
		);


		$cek_id = $this->tl_c2->get_c2_by_field('id', $code);

		// mencari apakah jumlah data lebih dari 0
		if ($cek_id->num_rows() > 0) {
			$tabel_c2 = $cek_id->result();
			$cek_tabel_c2_field4 = $tabel_c2[0]->{'password'};

			$old_tabel_c2_field4 = $this->v_post['tabel_c2_field4_old'];

			// memverifikasi password lama dengan password di database
			if (password_verify($old_tabel_c2_field4, $cek_tabel_c2_field4)) {
				$tabel_c2_field4 = $this->v_post['tabel_c2_field4_new'];

				// jika konfirmasi password sama dengan password baru
				if ($this->v_post['tabel_c2_field4_confirm'] === $tabel_c2_field4) {
					$this->load->library('encryption');

					$data = array(
						// mengubah password menjadi password berenkripsi
						'password' => password_hash($tabel_c2_field4, PASSWORD_BCRYPT),
					);

					$aksi = $this->tl_c2->update_c2($data, $code);

					redirect($_SERVER['HTTP_REFERER']);

					// jika konfirmasi password tidak sama dengan password baru
				} else {

					set_flashdata($this->flash['tabel_c2_field4'], $this->flash_msg3_alt2['tabel_c2_field4_alias']);
					set_flashdata('modal', $this->flash_func['tabel_c2_field4']);
					redirect($_SERVER['HTTP_REFERER']);
				}

				// jika password lama salah
			} else {

				set_flashdata($this->flash['tabel_c2_field4'], $this->flash_msg3_alt1['tabel_c2_field4_alias']);
				set_flashdata('modal', $this->flash_func['tabel_c2_field4']);
				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data kurang dari 0
		} else {

			set_flashdata($this->flash['tabel_c2_field4'], $this->flash_msg5['tabel_c2_alias2']);
			set_flashdata('modal', $this->flash_func['tabel_c2_field4']);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function ceklogin()
	{
		// Ensure that necessary dependencies are loaded
		$this->declarew();
		$this->session_all();

		validate_all(
			array(
				$this->v_post['tabel_c2_field3'],
				$this->v_post['tabel_c2_field4'],
			),
			$this->views['flash1'],
			''
		);

		$tabel_c2_field3 = xss_clean($this->v_post['tabel_c2_field3']);
		$tabel_c2_field4 = xss_clean($this->v_post['tabel_c2_field4']);

		// Get user data based on email
		$method3 = $this->tl_c2->get_c2_by_field('email', $tabel_c2_field3);

		// Check if user data exists
		if ($method3->num_rows() > 0) {
			$tabel_c2 = $method3->result();
			$method4 = $tabel_c2[0]->{'password'};

			// Verify password
			if (password_verify($tabel_c2_field4, $method4)) {
				// Set user session data
				$code = $tabel_c2[0]->id;
				$tabel_c2_field2 = $tabel_c2[0]->nama;
				$tabel_c2_field3 = $tabel_c2[0]->email;
				$tabel_c2_field5 = $tabel_c2[0]->phone;
				$tabel_c2_field6 = $tabel_c2[0]->role;

				set_userdata('id', $code);
				set_userdata('nama', $tabel_c2_field2);
				set_userdata('email', $tabel_c2_field3);
				set_userdata('phone', $tabel_c2_field5);
				set_userdata('role', $tabel_c2_field6);

				// Record login history
				$userAgent = $_SERVER['HTTP_USER_AGENT'];
				$deviceType = getDeviceTypeAndOS($userAgent);
				$loginh = array(
					'id' => '',
					$this->aliases['tabel_d3_field2'] => userdata('id'),
					$this->aliases['tabel_d3_field3'] => $deviceType,

					'created_at' => date("Y-m-d\TH:i:s"),
					'updated_at' => date("Y-m-d\TH:i:s"),
				);
				$login_history = $this->tl_d3->insert_d3($loginh);

				// Handle notifications
				$notif = $this->handle_2a();

				// Redirect to home page after successful login
				redirect(site_url('home'));
			} else {
				// Set flash message for incorrect password
				set_flashdata($this->views['flash1'], 'Incorrect email or password.');
				redirect(site_url('login'));
			}
		} else {
			// Set flash message for non-existent email
			set_flashdata($this->views['flash1'], 'Email not found.');
			redirect(site_url('login'));
		}
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
		redirect(site_url('home'));
	}

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => $this->title['tabel_c2_alias_v9'],
			'konten' => $this->v9['tabel_c2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c2']),
			'tbl_c2' => $this->tl_c2->get_all_c2_archive(),
		);

		$this->load_page('tabel_c2', 'layouts/template', $data1);
	}
	
	public function detai_archive($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_c2->get_c2_by_field('id', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => $this->title['tabel_c2_alias_v10'],
			'konten' => $this->v10['tabel_c2'],
			'dekor' => $this->tl_c2->dekor($this->theme_id, $this->aliases['tabel_c2']),
			'tbl_c2' => $this->tl_c2->get_c2_by_field_archive('tabel_c2_field1', $code),
		);

		$this->load_page('tabel_c2', 'layouts/template', $data1);
	}
	
	public function history($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_c2->get_c2_by_field('id', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'table_id' => $code,
			'title' => $this->title['tabel_c2_alias_v11'],
			'konten' => $this->v11['tabel_c2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c2']),
			'tbl_c2' => $this->tl_ot->get_by_field_history('tabel_c2', 'tabel_c2_field1', $code),
			'current' => $this->tl_ot->get_by_field('tabel_c2', 'tabel_c2_field1', $code),
		);

		$this->load_page('tabel_c2', 'layouts/template_admin', $data1);
	}

	//Push History Data into current data
	public function push($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_ot->get_by_id_history('tabel_c2', $code)->result();
		$this->check_data($tabel);

		$code = $tabel[0]->id;

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_c2_field2'] => $tabel[0]->{$this->aliases['tabel_c2_field2']},

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_c2->update_c2($data, $code);

		$notif = $this->handle_4c($aksi, 'tabel_c2', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
}

