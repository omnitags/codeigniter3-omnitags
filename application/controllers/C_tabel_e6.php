<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_e6 extends Omnitags
{
	// Pages
	// Public Pages
	public function index()
	{
		$this->declarew();
		$this->session_all();

		$data1 = array(
			'title' => lang('tabel_e6_alias_v1_title'),
			'konten' => $this->v1['tabel_e6'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e6']),
			'tbl_e6' => firebase_get_data($$this->aliases['tabel_e6']),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}

	// Account Only Pages

	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_e6_alias_v3_title'),
			'konten' => $this->v3['tabel_e6'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e6']),
			'tbl_e6' => firebase_get_data($this->aliases['tabel_e6']),
			'tbl_e7' => firebase_get_data($this->aliases['tabel_e7']),
			'tbl_e1' => firebase_get_data($this->aliases['tabel_e1']),
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
			'title' => lang('tabel_e6_alias_v4_title'),
			'konten' => $this->v4['tabel_e6'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e6']),
			'tbl_e6' => $this->tl_e6->get_all_e6(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/printpage', $data);
	}

	/**
	 * Handles the submission of the form for adding new data to the 'tabel_e6' table.
	 *
	 * This function validates the form input and if successful, inserts the data into the 'tabel_e6' table.
	 * It then redirects the user back to the previous page with a notification message.
	 *
	 * @return void
	 */
	// Functions
	// Add data
	public function tambah()
	{
		$this->declarew();
		$this->session_3();

		validate_all(
			array(
				$this->v_post['tabel_e6_field2'],
			),
			$this->views['flash2'],
			'tambah'
		);

		$code = $this->add_code('tabel_e6', $this->aliases['tabel_e6_field1'], 5, '06');

		$data = array(
			$this->aliases['tabel_e6_field1'] => $code,
			$this->aliases['tabel_e6_field2'] => $this->v_post['tabel_e6_field2'],
			$this->aliases['tabel_e6_field3'] => $this->v_post['tabel_e6_field3'],
			$this->aliases['tabel_e6_field4'] => $this->v_post['tabel_e6_field4'],
			$this->aliases['tabel_e6_field5'] => $this->v_post['tabel_e6_field5'],
			$this->aliases['tabel_e6_field6'] => $this->v_post['tabel_e6_field6'],
			$this->aliases['tabel_e6_field7'] => $this->v_post['tabel_e6_field7'],
			$this->aliases['tabel_e6_field8'] => $this->v_post['tabel_e6_field8'],

			'created_at' => date("Y-m-d\TH:i:s"),
			'updated_at' => date("Y-m-d\TH:i:s"),
		);

		$aksi = $this->tl_e6->insert_e6($data);

		$notif = $this->handle_4b($aksi, 'tabel_e6');

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
		$this->session_3();

		$tabel_e6_field1 = $this->v_post['tabel_e6_field1'];

		$tabel_e6 = $this->tl_e6->get_e6_by_field('tabel_e6_field1', $tabel_e6_field1)->result();
		$this->check_data($tabel_e6);

		validate_all(
			array(
				$this->v_post['tabel_e6_field1'],
				$this->v_post['tabel_e6_field2'],
			),
			$this->views['flash3'],
			'ubah' . $tabel_e6_field1
		);

		$data = array(
			$this->aliases['tabel_e6_field2'] => $this->v_post['tabel_e6_field2'],
			$this->aliases['tabel_e6_field3'] => $this->v_post['tabel_e6_field3'],
			$this->aliases['tabel_e6_field4'] => $this->v_post['tabel_e6_field4'],
			$this->aliases['tabel_e6_field5'] => $this->v_post['tabel_e6_field5'],
			$this->aliases['tabel_e6_field6'] => $this->v_post['tabel_e6_field6'],
			$this->aliases['tabel_e6_field7'] => $this->v_post['tabel_e6_field7'],
			$this->aliases['tabel_e6_field8'] => $this->v_post['tabel_e6_field8'],

			'updated_at' => date("Y-m-d\TH:i:s"),
		);

		$aksi = $this->tl_e6->update_e6($data, $tabel_e6_field1);

		$notif = $this->handle_4c($aksi, 'tabel_e6', $tabel_e6_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($tabel_e6_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel_e6 = $this->tl_e6->get_e6_by_field('tabel_e6_field1', $tabel_e6_field1)->result();
		$this->check_data($tabel_e6);

		$aksi = $this->tl_e6->delete_e6_by_field('tabel_e6_field1', $tabel_e6_field1);

		$notif = $this->handle_4e($aksi, 'tabel_e6', $tabel_e6_field1);

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
