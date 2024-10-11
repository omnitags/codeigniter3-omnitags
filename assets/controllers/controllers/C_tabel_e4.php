<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_e4 extends Omnitags
{
	// Halaman publik
	public function index()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v1_title['tabel_e4_alias'],
			'konten' => $this->v1['tabel_e4'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_e4'])->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result(),
			'tbl_e1' => $this->tl_e1->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	// Halaman khusus akun

	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v3_title['tabel_e4_alias'],
			'konten' => $this->v3['tabel_e4'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_e4'])->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$data = array(
			$this->aliases['tabel_e4_field1'] => '',
			$this->aliases['tabel_e4_field2'] => $this->v_post['tabel_e4_field2'],
			$this->aliases['tabel_e4_field3'] => $this->v_post['tabel_e4_field3'],
		);

		// $query = 'INSERT INTO tipe_kamar VALUES('.$data.')';

		$aksi = $this->tl_e4->simpan($data);
		// $aksi = $this->tl_e4->simpan($query);

		$notif = $this->handle_1($aksi, 'tabel_e4');

		redirect(site_url('c_tabel_e4/admin'));
	}

	public function update()
	{
		// Di sini aku masih ada perdebatan apakah akan menggunakan gambar dengan nama file yang sama atau tidak
		// Atau menggunakan menggunakan data dari field lain sebagai nama gambar
		// Hal itu tentunya tergantung preferensi user
		// Fitur update gambar di bawah sudah selesai
		// Bisa mengupload gambar dengan tulisan yang dihapus, tentunya dengan minim data double

		$this->declarew();

		$tabel_e4_field1 = $this->v_post['tabel_e4_field1'];
		$data = array(
			$this->aliases['tabel_e4_field2'] => $this->v_post['tabel_e4_field2'],
			$this->aliases['tabel_e4_field3'] => $this->v_post['tabel_e4_field3'],
		);

		$aksi = $this->tl_e4->update($data, $tabel_e4_field1);

		$notif = $this->handle_2($aksi, 'tabel_e4', $tabel_e4_field1);

		redirect(site_url('c_tabel_e4/admin'));
	}

	public function hapus($tabel_e4_field1 = null)
	{
		$this->declarew();

		$tabel_e4 = $this->tl_e4->ambil_tabel_e4_field1($tabel_e4_field1)->result();
		$tabel_e4_field3 = $tabel_e4[0]->img;

		unlink($this->v_upload_path['tabel_e4'] . $tabel_e4_field3);
		$aksi = $this->tl_e4->hapus($tabel_e4_field1);

		$notif = $this->handle_3($aksi, 'tabel_e4_field1', $tabel_e4_field1);

		redirect(site_url('c_tabel_e4/admin'));
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel_e4_alias'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_e4'])->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v4['tabel_e4'], $data);
	}

	// Cetak satu data

	// Import excel
	public function importExcel()
	{
		$this->load->library('spreadsheet_lib');

		// Check if the form was submitted
		if ($this->input->post('submit')) {
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
