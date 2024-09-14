<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_e4 extends Omnitags
{
	// Halaman publik
	public function index()
	{
		$this->declarew();
		$this->session_all();

		$data1 = array(
			'title' => lang('tabel_e4_alias_v1_title'),
			'konten' => $this->v1['tabel_e4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e4']),
			'tbl_e4' => $this->tl_e4->get_all_e4(),
			'tbl_e1' => $this->tl_e1->get_all_e1(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}

	// Halaman khusus akun

	// Halaman admin
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

	/**
	 * Handles the submission of the form for adding new data to the 'tabel_e4' table.
	 *
	 * This function validates the form input and if successful, inserts the data into the 'tabel_e4' table.
	 * It then redirects the user back to the previous page with a notification message.
	 *
	 * @return void
	 */
	public function tambah()
	{
		$this->declarew();
		$this->session_3();

		validate_all(
			array(
				$this->v_post['tabel_e4_field2'],
				$this->v_post['tabel_e4_field3'],
				$this->v_post['tabel_e4_field4'],
				$this->v_post['tabel_e4_field5'],
			),
			$this->views['flash2'],
			'tambah'
		);

		// Define the full path to the folder
		$upload_path = $this->v_upload_path['tabel_e4'] . '/';

		// Check if the folder exists, if not, create it
		if (!is_dir($upload_path)) {
			mkdir($upload_path, 0755, TRUE);
		}

		// Set the configuration for the upload
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->v_post['tabel_e4_field2'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		// Load the upload library with the new configuration
		$upload = $this->upload->do_upload($this->v_input['tabel_e4_field3_input']);

		if (!$upload) {
			// Notification if upload failed
			// Form is required so this might not be necessary

			set_flashdata($this->views['flash2'], $this->flash_msg2['tabel_e4_field3_alias']);
			set_flashdata('modal', $this->views['flash2_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			// Get upload data
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$data = array(
			$this->aliases['tabel_e4_field2'] => post('tabel_e4_field2'),
			$this->aliases['tabel_e4_field3'] => $gambar,
			$this->aliases['tabel_e4_field5'] => post('tabel_e4_field5'),
		);

		$aksi = $this->tl_e4->insert_e4($data);

		$notif = $this->handle_4b($aksi, 'tabel_e4');

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update()
	{
		// Di sini aku masih ada perdebatan apakah akan menggunakan gambar dengan nama file yang sama atau tidak
		// Atau menggunakan menggunakan data dari field lain sebagai nama gambar
		// Hal itu tentunya tergantung preferensi user
		// Fitur update gambar di bawah sudah selesai
		// Bisa mengupload gambar dengan tulisan yang dihapus, tentunya dengan minim data double

		$this->declarew();
		$this->session_3();

		$tabel_e4_field1 = $this->v_post['tabel_e4_field1'];

		$tabel_e4 = $this->tl_e4->get_e4_by_e4_field1($tabel_e4_field1)->result();
		$this->check_data($tabel_e4);

		validate_all(
			array(
				$this->v_post['tabel_e4_field1'],
				$this->v_post['tabel_e4_field2'],
				$this->v_post['tabel_e4_field3'],
				$this->v_post['tabel_e4_field4'],
				$this->v_post['tabel_e4_field4_old'],
				$this->v_post['tabel_e4_field5'],
			),
			$this->views['flash3'],
			'ubah' . $tabel_e4_field1
		);

		$tabel_e4 = $this->tl_e4->get_e4_by_e4_field1($tabel_e4_field1)->result();
		$new_name = $this->v_post['tabel_e4_field2'];
		$path = $this->v_upload_path['tabel_e4'];
		$img = $this->v_post['tabel_e4_field4_old'];
		$extension = '.' . getExtension($path . $img);

		$config['upload_path'] = $path;
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['file_name'] = $new_name;
		$config['allowed_types'] = $this->file_type1;
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);
		$upload = $this->upload->do_upload($this->v_input['tabel_e4_field4_input']);

		if (!$upload) {
			if ($new_name != $tabel_e4[0]->tipe) {
				rename($path . $img, $path . str_replace(' ', '_', $new_name) . $extension);
				$gambar = str_replace(' ', '_', $new_name) . $extension;
			} else {
				$gambar = $img;
			}
		} else {
			if ($new_name != $tabel_e4[0]->tipe) {
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
			$this->aliases['tabel_e4_field2'] => $this->v_post['tabel_e4_field2'],
			$this->aliases['tabel_e4_field3'] => $gambar,
			$this->aliases['tabel_e4_field4'] => $this->v_post['tabel_e4_field4'],
			$this->aliases['tabel_e4_field5'] => $this->v_post['tabel_e4_field5'],
		);

		$aksi = $this->tl_e4->update_e4($data, $tabel_e4_field1);

		$notif = $this->handle_4c($aksi, 'tabel_e4', $tabel_e4_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete($tabel_e4_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel_e4 = $this->tl_e4->get_e4_by_e4_field1($tabel_e4_field1)->result();
		$this->check_data($tabel_e4);

		$tabel_e4_field3 = $tabel_e4[0]->img;

		unlink($this->v_upload_path['tabel_e4'] . $tabel_e4_field3);
		$aksi = $this->tl_e4->delete_e4($tabel_e4_field1);

		$notif = $this->handle_4e($aksi, 'tabel_e4', $tabel_e4_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Cetak semua data
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

	// Cetak satu data

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
