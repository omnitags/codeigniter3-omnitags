<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_e4 extends Omnitags
{
	// Pages
	// Public Pages
	public function index()
	{
		$this->declarew();
		$this->session_all();

		$data1 = array(
			'title' => lang('tabel_e4_alias_v1_title'),
			'konten' => $this->v1['tabel_e4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e4']),
			'tbl_e4' => $this->tl_e4->get_e4_by_e4_field9($this->aliases['tabel_e4_field9_value2']),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}

	// Account Only Pages
	public function daftar()
	{
		$this->declarew();
		$this->session_all();

		$tabel_e4_field2 = userdata($this->aliases['tabel_c2_field1']);

		$data1 = array(
			'title' => lang('tabel_e4_alias_v2_title'),
			'konten' => $this->v2['tabel_e4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e4']),
			'tbl_e4' => $this->tl_e4->get_e4_by_e4_field2($tabel_e4_field2),
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
			'title' => lang('tabel_e4_alias_v3_title'),
			'konten' => $this->v3['tabel_e4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e4']),
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
			'title' => lang('tabel_e4_alias_v4_title'),
			'konten' => $this->v4['tabel_e4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e4']),
			'tbl_e4' => $this->tl_e4->get_all_e4(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/printpage', $data);
	}

	/**
	 * Handles the submission of the form for adding new data to the 'tabel_e4' table.
	 *
	 * This function validates the form input and if successful, inserts the data into the 'tabel_e4' table.
	 * It then redirects the user back to the previous page with a notification message.
	 *
	 * @return void
	 */
	// Functions
	// Add data
	public function tambah()
	{
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value3'],
			$this->aliases['tabel_c2_field6_value5'],
		];
		$this->page_session_check($allowed_values);


		validate_all(
			array(
				$this->v_post['tabel_e4_field3'],
				$this->v_post['tabel_e4_field4'],
			),
			$this->views['flash2'],
			'tambah'
		);

		$path = $this->v_upload_path['tabel_e4'];

		$config['upload_path'] = $path;
		$config['file_name'] = $this->v_post['tabel_e4_field3'];
		$config['allowed_types'] = $this->file_type1;
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);
		$upload = $this->upload->do_upload($this->v_input['tabel_e4_field5_input']);

		if (!$upload) {
			// Di sini seharusnya ada notifikasi modal kalau upload tidak berhasil
			// Tapi karena formnya sudah required saya rasa tidak perlu
			set_flashdata($this->views['flash2'], $this->flash_msg2['tabel_e4_field5_alias']);
			set_flashdata('modal', $this->views['flash2_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			// Di bawah ini adalah method untuk mengambil informasi dari hasil upload data
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$date = date('Y-m-d H:i:s');

		$data = array(
			$this->aliases['tabel_e4_field2'] => userdata($this->aliases['tabel_c2_field1']),
			$this->aliases['tabel_e4_field3'] => $this->v_post['tabel_e4_field3'],
			$this->aliases['tabel_e4_field4'] => $this->v_post['tabel_e4_field4'],
			$this->aliases['tabel_e4_field5'] => $gambar,
			$this->aliases['tabel_e4_field6'] => $date,
			$this->aliases['tabel_e4_field8'] => $this->aliases['tabel_e4_field8_value2'],
			$this->aliases['tabel_e4_field9'] => $this->aliases['tabel_e4_field9_value1'],
		);

		$aksi = $this->tl_e4->insert_e4($data);

		$notif = $this->handle_4b($aksi, 'tabel_e4');

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Update data
	public function update()
	{
		// Di sini aku masih ada perdebatan apakah akan menggunakan gambar dengan nama file yang sama atau tidak
		// Atau menggunakan menggunakan data dari field lain sebagai nama gambar
		// Hal itu tentunya tergantung preferensi user
		// Fitur update gambar di bawah sudah selesai
		// Bisa mengupload gambar dengan tulisan yang dihapus, tentunya dengan minim data double

		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value3'],
			$this->aliases['tabel_c2_field6_value5']
		];
		$this->session_check($allowed_values);

		$tabel_e4_field1 = $this->v_post['tabel_e4_field1'];

		validate_all(
			array(
				$this->v_post['tabel_e4_field1'],
				$this->v_post['tabel_e4_field3'],
				$this->v_post['tabel_e4_field4'],
			),
			$this->views['flash3'],
			'ubah' . $tabel_e4_field1
		);


		$tabel_e4 = $this->tl_e4->get_e4_by_e4_field1($tabel_e4_field1)->result();
		$this->check_data($tabel_e4);

		$tabel_e4 = $this->tl_e4->get_e4_by_e4_field1($tabel_e4_field1)->result();
		$new_name = $this->v_post['tabel_e4_field3'];
		$path = $this->v_upload_path['tabel_e4'];
		$img = $this->v_post['tabel_e4_field5_old'];
		$extension = '.' . getExtension($path . $img);

		$config['upload_path'] = $path;
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $new_name;
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);
		$upload = $this->upload->do_upload($this->v_input['tabel_e4_field5_input']);

		if (!$upload) {
			if ($new_name != $tabel_e4[0]->title) {
				rename($path . $img, $path . str_replace(' ', '_', $new_name) . $extension);
				$gambar = str_replace(' ', '_', $new_name) . $extension;
			} else {
				$gambar = $img;
			}
		} else {
			if ($new_name != $tabel_e4[0]->title) {
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
			$this->aliases['tabel_e4_field2'] => userdata($this->aliases['tabel_c2_field1']),
			$this->aliases['tabel_e4_field3'] => $this->v_post['tabel_e4_field3'],
			$this->aliases['tabel_e4_field4'] => $this->v_post['tabel_e4_field4'],
			$this->aliases['tabel_e4_field5'] => $gambar,
			$this->aliases['tabel_e4_field8'] => $this->v_post['tabel_e4_field8'],
		);

		$aksi = $this->tl_e4->update_e4($data, $tabel_e4_field1);

		$notif = $this->handle_4c($aksi, 'tabel_e4', $tabel_e4_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function approve($tabel_e4_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_e4->get_e4_by_e4_field1($tabel_e4_field1)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_e4_field9'] => $this->aliases['tabel_e4_field9_value2'],
		);

		$aksi = $this->tl_e4->update_e4($data, $tabel_e4_field1);

		$notif = $this->handle_4c($aksi, 'tabel_e4_field9', $tabel_e4_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function reject($tabel_e4_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel_e4 = $this->tl_e4->get_e4_by_e4_field1($tabel_e4_field1)->result();
		$this->check_data($tabel_e4);

		$img = $tabel_e4[0]->img;

		unlink($this->v_upload_path['tabel_e4'] . $img);

		$aksi = $this->tl_e4->delete_e4($tabel_e4_field1);

		$notif = $this->handle_4e($aksi, 'tabel_e4', $tabel_e4_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function aktifkan($tabel_e4_field1 = null) //update tidak diperlukan di sini
	{
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value3'],
			$this->aliases['tabel_c2_field6_value5']
		];
		$this->session_check($allowed_values);


		$tabel = $this->tl_e4->get_e4_by_e4_field1($tabel_e4_field1)->result();
		$this->check_data($tabel);

		if ($tabel[0]->status == $this->aliases['tabel_e4_field9_value2']) {
			// menggunakan nama khusus sama dengan konfigurasi
			$data = array(
				$this->aliases['tabel_e4_field8'] => $this->aliases['tabel_e4_field8_value1'],
			);

			$aksi = $this->tl_e4->update_e4($data, $tabel_e4_field1);

			$notif = $this->handle_4c($aksi, 'tabel_e4_field8', $tabel_e4_field1);
		} else {

		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function nonaktifkan($tabel_e4_field1 = null) //update tidak diperlukan di sini
	{
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value3'],
			$this->aliases['tabel_c2_field6_value5']
		];
		$this->session_check($allowed_values);


		$tabel = $this->tl_e4->get_e4_by_e4_field1($tabel_e4_field1)->result();
		$this->check_data($tabel);

		if ($tabel[0]->status == $this->aliases['tabel_e4_field9_value2']) {

			// menggunakan nama khusus sama dengan konfigurasi
			$data = array(
				$this->aliases['tabel_e4_field8'] => $this->aliases['tabel_e4_field8_value2'],
			);

			$aksi = $this->tl_e4->update_e4($data, $tabel_e4_field1);

			$notif = $this->handle_4c($aksi, 'tabel_e4_field8', $tabel_e4_field1);
		} else {

		}
		redirect($_SERVER['HTTP_REFERER']);
	}


	// Delete data
	public function delete($tabel_e4_field1 = null)
	{
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value3'],
			$this->aliases['tabel_c2_field6_value5']
		];
		$this->page_session_check($allowed_values);

		$tabel_e4 = $this->tl_e4->get_e4_by_e4_field1($tabel_e4_field1)->result();
		$this->check_data($tabel_e4);

		$img = $tabel_e4[0]->img;

		unlink($this->v_upload_path['tabel_e4'] . $img);

		$aksi = $this->tl_e4->delete_e4($tabel_e4_field1);

		$notif = $this->handle_4e($aksi, 'tabel_e4', $tabel_e4_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Print one data

	// Import excel
	public function importExcel()
	{
		$this->load->library('spreadsheet_lib');

		// Check if the form was submitted
		if (post('submit')) {
			// Handle file upload
			$file_path = $_FILES['filepegawai']['tmp_name'];

			// Read Excel file using the library
			$excel_data = $this->spreadsheet_lib->readExcel($file_path);

			// Process $excel_data as needed (e.g., insert into database)

			// Redirect or show success message
		} else {
			// Display form view
			$this->load->view('import_excel_form');
		}
	}


}
