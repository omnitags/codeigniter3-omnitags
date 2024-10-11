<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_e1 extends Omnitags
{
	// Halaman publik
	public function index()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v1_title['tabel_e1_alias'],
			'konten' => $this->v1['tabel_e1'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_e1'])->result(),
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
			'title' => $this->v3_title['tabel_e1_alias'],
			'konten' => $this->v3['tabel_e1'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_e1'])->result(),
			'tbl_e1' => $this->tl_e1->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$param1 = $this->v_post['tabel_e1_field2'];
		$param2 = date("Y-m-d H:i:s");
		$param3 = $this->v_post['tabel_e3_field4'];

		$limit = date("Y-m-d H:i:s", strtotime(" ". $this->aliases['tabel_e3_field7_limit1']));
		
		$data = array(
			$this->aliases['tabel_e1_field1'] => '',
			$this->aliases['tabel_e1_field2'] => $param1,
			$this->aliases['tabel_e1_field3'] => $this->v_post['tabel_e1_field3'],
			$this->aliases['tabel_e1_field4'] => NULL,
			$this->aliases['tabel_e1_field5'] => $param2,
		);

		// $query = 'INSERT INTO tabel_e1 VALUES('.$data.')';

		$simpan = $this->tl_e1->simpan($data);
		// $simpan = $this->tl_e1->simpan($query);

		$data2 = array(
			$this->aliases['tabel_e3_field4'] => $param3,
			$this->aliases['tabel_e3_field6'] => $param2,
			$this->aliases['tabel_e3_field7'] => $limit,
		);

		$update = $this->tl_e3->update($data2, $param1);

		$aksi = $simpan & $update;

		$notif = $this->handle_1($aksi, 'tabel_e1');

		redirect($_SERVER['HTTP_REFERER']);

	}



	public function update()
	{
		// Functional requirement: Declare necessary configurations
		$this->declarew();

		// Security: Input Sanitization and Validation
		$inputs = [
			'tabel_e1_field2',
			'tabel_e1_field3'
		];

		foreach ($inputs as $input) {
			$input_value = htmlspecialchars(trim($this->v_post[$input]));
			if (empty($input_value)) {
				// Error Handling: Set error flash message for invalid input
				$this->session->set_flashdata($this->views['flash3'], "Invalid input. Please provide valid data.");
				$this->session->set_flashdata('modal', $this->views['flash3_func1']);
				// Functional requirement: Redirect user to 'tabel_e1' page
				redirect(site_url('c_tabel_e1/admin'));
			}
		}

		$tabel_e1_field1 = htmlspecialchars(trim($this->v_post['tabel_e1_field1']));

		// Functional requirement: Construct data array from validated view inputs
		$data = [
			$this->aliases['tabel_e1_field2'] => $this->v_post['tabel_e1_field2'],
			$this->aliases['tabel_e1_field3'] => $this->v_post['tabel_e1_field3']
		];

		try {
			// Security: Prepared Statements to prevent SQL injection
			// Functional requirement: Update data in the database
			$aksi = $this->tl_e1->update($data, $tabel_e1_field1);

			$notif = $this->handle_2($aksi, 'tabel_e1', $tabel_e1_field1);

		} catch (Exception $e) {
			// Error Handling: Handle database operation errors
			$this->session->set_flashdata($this->views['flash2'], "Error occurred while updating data: " . $e->getMessage());
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		// Functional requirement: Redirect user to 'tabel_e1' page
		redirect(site_url('c_tabel_e1/admin'));
	}



	public function hapus($tabel_e1_field1 = null)
	{
		// Functional requirement: Declare necessary configurations
		$this->declarew();

		$tabel_e1 = $this->tl_e1->ambil_tabel_e1_field1($tabel_e1_field1)->result();
		$tabel_e1_field3 = $tabel_e1[0]->img;

		unlink($this->v_upload_path['tabel_e1'] . $tabel_e1_field3);

		try {
			// Functional requirement: Delete data from the database
			$aksi = $this->tl_e1->hapus($tabel_e1_field1);

			$notif = $this->handle_3($aksi, 'tabel_e1_field1', $tabel_e1_field1);

		} catch (Exception $e) {
			// Error Handling: Handle database operation errors
			$this->session->set_flashdata($this->views['flash1'], "Error occurred while deleting data: " . $e->getMessage());
			$this->session->set_flashdata('toast', $this->views['flash1_func1']);
		}

		// Functional requirement: Redirect user to 'tabel_e1' page
		redirect(site_url('c_tabel_e1/admin'));
	}


	// Halaman cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel_e1_alias'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_e1'])->result(),
			'tbl_e1' => $this->tl_e1->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v4['tabel_e1'], $data);
	}
}
