<?php
defined('BASEPATH') or exit('No direct script access allowed');
include 'Omnitags.php';

class C_tabel_c2 extends Omnitags
{
	// Pages
	// Public Pages


	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_c2_alias_v3_title'),
			'konten' => $this->v3['tabel_c2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c2']),
			'tbl_c2' => $this->tl_c2->get_all_c2(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		$this->track_page();
		load_view_data('_layouts/template', $data);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_c2_alias_v4_title'),
			'konten' => $this->v4['tabel_c2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c2']),
			'tbl_c2' => $this->tl_c2->get_all_c2(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		$this->track_page();
		load_view_data('_layouts/printpage', $data);
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

		$tabel_c2_field1 = userdata($this->aliases['tabel_c2_field1']);
		$data1 = array(
			'title' => lang('tabel_c2_alias_v6_title'),
			'konten' => $this->v6['tabel_c2'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c2']),
			'tbl_c2' => $this->tl_c2->get_c2_by_field('tabel_c2_field1', $tabel_c2_field1),
			'tbl_d3' => $this->tl_d3->get_d3_by_field('tabel_c2_field1', $tabel_c2_field1),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		$this->track_page();
		load_view_data('_layouts/template', $data);
	}

	// Login Page
	public function login()
	{
		$this->declarew();
		$this->page_session_all();

		$data1 = array(
			'title' => lang('login'),
			'konten' => 'login',
			'dekor' => $this->tl_b1->dekor($this->theme_id, 'login'),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		$this->track_page();
		load_view_data('_layouts/logpage', $data);
	}

	// Sign Up Page
	public function signup()
	{
		$this->declarew();
		$this->page_session_all();

		$data1 = array(
			'title' => lang('signup'),
			'konten' => 'signup',
			'dekor' => $this->tl_b1->dekor($this->theme_id, 'signup'),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		$this->track_page();
		load_view_data('_layouts/logpage', $data);
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

		$method3 = $this->tl_c2->get_c2_by_field('tabel_c2_field3', $tabel_c2_field3);

		// mencari apakah jumlah data kurang dari 1
		if ($method3->num_rows() < 1) {

			// jika input konfirm sama dengan input password
			if ($this->v_post['tabel_c2_field4_confirm'] === $tabel_c2_field4) {
				$this->load->library('encryption');

				// $id = get_next_code($this->aliases['tabel_c2'], $this->aliases['tabel_c2_field1'], 'USR');

				$data = array(
					// $this->aliases['tabel_c2_field1'] => $id,
					$this->aliases['tabel_c2_field1'] => '',
					$this->aliases['tabel_c2_field2'] => $this->v_post['tabel_c2_field2'],
					$this->aliases['tabel_c2_field3'] => $this->v_post['tabel_c2_field3'],

					// mengubah password menjadi password berenkripsi
					$this->aliases['tabel_c2_field4'] => password_hash($tabel_c2_field4, PASSWORD_DEFAULT),

					$this->aliases['tabel_c2_field5'] => $this->v_post['tabel_c2_field5'],
					$this->aliases['tabel_c2_field6'] => $this->v_post['tabel_c2_field6'],

					$this->aliases['created_at'] => date("Y-m-d\TH:i:s"),
					$this->aliases['updated_at'] => date("Y-m-d\TH:i:s"),
				);

				$aksi = $this->tl_c2->insert_c2($data);

				// mengarahkan pengguna ke halaman yang berbeda sesuai dengan session masing-masing
				if (userdata($this->aliases['tabel_c2_field3'])) {

					redirect($_SERVER['HTTP_REFERER']);
				} else {

					redirect(site_url($this->language_code . '/login'));
				}

				// jika input konfirm tidak sama dengan input password
			} else {

				// menampilkan flashdata dalam bentuk teks
				set_flashdata($this->views['flash1'], 'Konfirmasi ' . $this->aliases['tabel_c2_field4'] . ' salah!');

				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data lebih dari 0
		} else {

			set_flashdata($this->views['flash1'], $this->aliases['tabel_c2_field3'] . ' telah digunakan!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	// Update data
	public function update()
	{
		$this->declarew();
		$this->session_3();

		$tabel_c2_field1 = $this->v_post['tabel_c2_field1'];

		$tabel_c2 = $this->tl_c2->get_c2_by_field('tabel_c2_field1', $tabel_c2_field1)->result();
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
			'ubah' . $tabel_c2_field1
		);

		$data = array(
			$this->aliases['tabel_c2_field2'] => $this->v_post['tabel_c2_field2'],
			$this->aliases['tabel_c2_field3'] => $this->v_post['tabel_c2_field3'],
			$this->aliases['tabel_c2_field5'] => $this->v_post['tabel_c2_field5'],
			$this->aliases['tabel_c2_field6'] => $this->v_post['tabel_c2_field6'],

			$this->aliases['updated_at'] => date("Y-m-d\TH:i:s"),
		);

		$aksi = $this->tl_c2->update_c2($data, $tabel_c2_field1);

		$notif = $this->handle_4c($aksi, 'tabel_c2', $tabel_c2_field1);

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
	public function delete($tabel_c2_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_c2->get_c2_by_field('tabel_c2_field1', $tabel_c2_field1)->result();
		$this->check_data($tabel);
		$aksi = $this->tl_c2->delete_c2_by_field('tabel_c2_field1', $tabel_c2_field1);

		$notif = $this->handle_4e($aksi, 'tabel_c2', $tabel_c2_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_profil()
	{
		$this->declarew();
		$this->session_3();

		$tabel_c2_field1 = $this->v_post['tabel_c2_field1'];

		$tabel = $this->tl_c2->get_c2_by_field('tabel_c2_field1', $tabel_c2_field1)->result();
		$this->check_data($tabel);

		validate_all(
			array(
				$this->v_post['tabel_c2_field1'],
				$this->v_post['tabel_c2_field2'],
				$this->v_post['tabel_c2_field3'],
				$this->v_post['tabel_c2_field5'],
			),
			$this->views['flash1'],
			'ubah' . $tabel_c2_field1
		);

		$data = array(
			$this->aliases['tabel_c2_field2'] => $this->v_post['tabel_c2_field2'],
			$this->aliases['tabel_c2_field3'] => $this->v_post['tabel_c2_field3'],
			$this->aliases['tabel_c2_field5'] => $this->v_post['tabel_c2_field5'],

			$this->aliases['updated_at'] => date("Y-m-d\TH:i:s"),
		);

		$aksi = $this->tl_c2->update_c2($data, $tabel_c2_field1);

		$notif = $this->handle_4c($aksi, 'tabel_c2', $tabel_c2_field1);

		// mengambil data profil yang baru dirubah
		$tabel_c2 = $this->tl_c2->get_c2_by_field('tabel_c2_field1', $tabel_c2_field1)->result();
		$tabel_c2_field2 = $tabel_c2[0]->nama;
		$tabel_c2_field3 = $tabel_c2[0]->email;
		$tabel_c2_field4 = $tabel_c2[0]->hp;

		// membuat session baru berdasarkan data yang telah diupdate
		set_userdata($this->aliases['tabel_c2_field2'], $tabel_c2_field2);
		set_userdata($this->aliases['tabel_c2_field3'], $tabel_c2_field3);

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

		$tabel_c2_field1 = $this->v_post['tabel_c2_field1'];

		validate_all(
			array(
				$this->v_post['tabel_c2_field1'],
				$this->v_post['tabel_c2_field4_old'],
				$this->v_post['tabel_c2_field4_new'],
				$this->v_post['tabel_c2_field4_confirm'],
			),
			$this->views['flash1'],
			'password' . $tabel_c2_field1
		);


		$cek_id = $this->tl_c2->get_c2_by_field('tabel_c2_field1', $tabel_c2_field1);

		// mencari apakah jumlah data lebih dari 0
		if ($cek_id->num_rows() > 0) {
			$tabel_c2 = $cek_id->result();
			$cek_tabel_c2_field4 = $tabel_c2[0]->password;

			$old_tabel_c2_field4 = $this->v_post['tabel_c2_field4_old'];

			// memverifikasi password lama dengan password di database
			if (password_verify($old_tabel_c2_field4, $cek_tabel_c2_field4)) {
				$tabel_c2_field4 = $this->v_post['tabel_c2_field4_new'];

				// jika konfirmasi password sama dengan password baru
				if ($this->v_post['tabel_c2_field4_confirm'] === $tabel_c2_field4) {
					$this->load->library('encryption');

					$data = array(
						// mengubah password menjadi password berenkripsi
						$this->aliases['tabel_c2_field4'] => password_hash($tabel_c2_field4, PASSWORD_DEFAULT),
					);

					$aksi = $this->tl_c2->update_c2($data, $tabel_c2_field1);

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
		$method3 = $this->tl_c2->get_c2_by_field('tabel_c2_field3', $tabel_c2_field3);

		// Check if user data exists
		if ($method3->num_rows() > 0) {
			$tabel_c2 = $method3->result();
			$method4 = $tabel_c2[0]->password;

			// Verify password
			if (password_verify($tabel_c2_field4, $method4)) {
				// Set user session data
				$tabel_c2_field1 = $tabel_c2[0]->id_user;
				$tabel_c2_field2 = $tabel_c2[0]->nama;
				$tabel_c2_field3 = $tabel_c2[0]->email;
				$tabel_c2_field5 = $tabel_c2[0]->hp;
				$tabel_c2_field6 = $tabel_c2[0]->level;

				set_userdata($this->aliases['tabel_c2_field1'], $tabel_c2_field1);
				set_userdata($this->aliases['tabel_c2_field2'], $tabel_c2_field2);
				set_userdata($this->aliases['tabel_c2_field3'], $tabel_c2_field3);
				set_userdata($this->aliases['tabel_c2_field5'], $tabel_c2_field5);
				set_userdata($this->aliases['tabel_c2_field6'], $tabel_c2_field6);

				// Record login history
				$userAgent = $_SERVER['HTTP_USER_AGENT'];
				$deviceType = getDeviceTypeAndOS($userAgent);

				$code = $this->add_code('tabel_d3', 'id', 0, '');

				$loginh = array(
					'id' => $code,
					$this->aliases['tabel_d3_field2'] => userdata('id'),
					$this->aliases['tabel_d3_field3'] => $deviceType,

					$this->aliases['created_at'] => date("Y-m-d\TH:i:s"),
					$this->aliases['updated_at'] => date("Y-m-d\TH:i:s"),
				);
				$login_history = $this->tl_d3->insert_d3($loginh);

				// Handle notifications
				$notif = $this->handle_2a();

				// Redirect to home page after successful login
				redirect(site_url($this->language_code . '/' . 'home'));
			} else {
				// Set flash message for incorrect password
				set_flashdata($this->views['flash1'], 'Incorrect email or password.');
				redirect(site_url($this->language_code . '/login'));
			}
		} else {
			// Set flash message for non-existent email
			set_flashdata($this->views['flash1'], 'Email not found.');
			redirect(site_url($this->language_code . '/login'));
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
