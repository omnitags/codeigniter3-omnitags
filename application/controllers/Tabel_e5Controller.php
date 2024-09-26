<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'OmnitagsController.php';

class Tabel_e5Controller extends OmnitagsController
{
	// Pages
	// Public Pages
	public function index()
	{
		$this->declarew();
		$this->session_all();

		$data1 = array(
			'title' => lang('tabel_e5_alias_v1_title'),
			'konten' => $this->v1['tabel_e5'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e5']),
			'tbl_e5' => $this->tl_e5->get_all_e5(),
			'tbl_e7' => $this->tl_e7->get_all_e7(),
			'tbl_e1' => $this->tl_e1->get_all_e1(),
		);

		$this->load_page('tabel_e5', '_layouts/template', $data1);
	}

	// Account Only Pages

	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_e5_alias_v3_title'),
			'konten' => $this->v3['tabel_e5'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e5']),
			'tbl_e5' => $this->tl_e5->get_all_e5(),
			'tbl_e7' => $this->tl_e7->get_all_e7(),
			'tbl_e1' => $this->tl_e1->get_all_e1(),
		);

		$this->load_page('tabel_e5', '_layouts/template', $data1);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_e5_alias_v4_title'),
			'konten' => $this->v4['tabel_e5'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e5']),
			'tbl_e5' => $this->tl_e5->get_all_e5(),
		);

		$data = array_merge($data1, $this->package);

		$this->load_page('tabel_e5', '_layouts/printpage_landscape', $data1);
	}

	/**
	 * Handles the submission of the form for adding new data to the 'tabel_e5' table.
	 *
	 * This function validates the form input and if successful, inserts the data into the 'tabel_e5' table.
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
				$this->v_post['tabel_e5_field2'],
			),
			$this->views['flash2'],
			'tambah'
		);

		$code = $this->add_code('tabel_e5', $this->aliases['tabel_e5_field1'], 5, '05');

		$data = array(
			$this->aliases['tabel_e5_field1'] => $code,
			$this->aliases['tabel_e5_field2'] => $this->v_post['tabel_e5_field2'],
			$this->aliases['tabel_e5_field3'] => $this->v_post['tabel_e5_field3'],
			$this->aliases['tabel_e5_field4'] => $this->v_post['tabel_e5_field4'],
			$this->aliases['tabel_e5_field5'] => $this->v_post['tabel_e5_field5'],
			$this->aliases['tabel_e5_field6'] => $this->v_post['tabel_e5_field6'],
			$this->aliases['tabel_e5_field7'] => $this->v_post['tabel_e5_field7'],
			$this->aliases['tabel_e5_field8'] => $this->v_post['tabel_e5_field8'],

			'created_at' => date("Y-m-d\TH:i:s"),
			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_e5->insert_e5($data);
		$this->insert_history('tabel_e5', $data);

		$notif = $this->handle_4b($aksi, 'tabel_e5');

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

		$code = $this->v_post['tabel_e5_field1'];

		$tabel_e5 = $this->tl_e5->get_e5_by_field('tabel_e5_field1', $code)->result();
		$this->check_data($tabel_e5);

		validate_all(
			array(
				$this->v_post['tabel_e5_field1'],
				$this->v_post['tabel_e5_field2'],
			),
			$this->views['flash3'],
			'ubah' . $code
		);

		$data = array(
			$this->aliases['tabel_e5_field2'] => $this->v_post['tabel_e5_field2'],
			$this->aliases['tabel_e5_field3'] => $this->v_post['tabel_e5_field3'],
			$this->aliases['tabel_e5_field4'] => $this->v_post['tabel_e5_field4'],
			$this->aliases['tabel_e5_field5'] => $this->v_post['tabel_e5_field5'],
			$this->aliases['tabel_e5_field6'] => $this->v_post['tabel_e5_field6'],
			$this->aliases['tabel_e5_field7'] => $this->v_post['tabel_e5_field7'],
			$this->aliases['tabel_e5_field8'] => $this->v_post['tabel_e5_field8'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_e5->update_e5($data, $code);
		$this->insert_history('tabel_e5', $data);

		$notif = $this->handle_4c($aksi, 'tabel_e5', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
	
	//Soft Delete Data
	public function soft_delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_e5->get_e5_by_field('tabel_e5_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_e5->update_e5($data, $code);
		$this->insert_history('tabel_e5', $data);

		$notif = $this->handle_4e($aksi, 'tabel_e5', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Soft Delete data
	public function restore($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_e5->get_e5_by_field_archive('tabel_e5_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => NULL,
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_e5->update_e5($data, $code);
		$this->insert_history('tabel_e5', $data);

		$notif = $this->handle_4e($aksi, 'tabel_e5', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel_e5 = $this->tl_e5->get_e5_by_field_archive('tabel_e5_field1', $code)->result();
		$this->check_data($tabel_e5);

		$aksi = $this->tl_e5->delete_e5_by_field('tabel_e5_field1', $code);

		$notif = $this->handle_4e($aksi, 'tabel_e5', $code);

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

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_e5_alias_v9_title'),
			'konten' => $this->v9['tabel_e5'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e5']),
			'tbl_e5' => $this->tl_e5->get_all_e5_archive(),
		);

		$this->load_page('tabel_e5', '_layouts/template', $data1);
	}

	// Public Pages
	public function detail_archive($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_e5->get_e5_by_field('tabel_e5_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => lang('tabel_e5_alias_v10_title'),
			'konten' => $this->v10['tabel_e5'],
			'dekor' => $this->tl_e5->dekor($this->theme_id, $this->aliases['tabel_e5']),
			'tbl_e5' => $this->tl_e5->get_e5_by_field_archive('tabel_e5_field1', $code),
		);

		$this->load_page('tabel_e5', '_layouts/template', $data1);
	}
	
	public function history($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_e5->get_e5_by_field('tabel_e5_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'table_id' => $code,
			'title' => lang('tabel_e5_alias_v11_title'),
			'konten' => $this->v11['tabel_e5'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e5']),
			'tbl_e5' => $this->tl_ot->get_by_field_history('tabel_e5', 'tabel_e5_field1', $code),
			'current' => $this->tl_ot->get_by_field('tabel_e5', 'tabel_e5_field1', $code),
		);

		$this->load_page('tabel_e5', '_layouts/template', $data1);
	}

	//Push History Data into current data
	public function push($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_ot->get_by_id_history('tabel_e5', $code)->result();
		$this->check_data($tabel);

		$code = $tabel[0]->{$this->aliases['tabel_e5_field1']};

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_e5_field2'] => $tabel[0]->{$this->aliases['tabel_e5_field2']},

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_e5->update_e5($data, $code);

		$notif = $this->handle_4c($aksi, 'tabel_e5', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
}

