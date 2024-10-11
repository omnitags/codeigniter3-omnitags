<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_e3 extends Omnitags
{
	// Halaman publik


	// Halaman khusus akun
	public function daftar()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v2_title['tabel_e3_alias'],
			'konten' => $this->v2['tabel_e3'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_e3'])->result(),
			'tbl_e1' => $this->tl_e1->ambildata()->result(),
			'tbl_e2' => $this->tl_e2->ambildata()->result(),
			'tbl_e3' => $this->tl_e3->ambil_tabel_c1_field1($this->session->userdata($this->aliases['tabel_c2_field1']))->result(),
			'tbl_e4' => $this->tl_e4->ambil_tabel_c1_field1($this->session->userdata($this->aliases['tabel_c2_field1']))->result(),
			'tbl_c1' => $this->tl_c1->ambildata()->result(),
			'tbl_f2' => $this->tl_f2->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v3_title['tabel_e3_alias'],
			'konten' => $this->v3['tabel_e3'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_e3'])->result(),
			'tbl_e1' => $this->tl_e1->ambildata()->result(),
			'tbl_e2' => $this->tl_e2->ambildata()->result(),
			'tbl_e3' => $this->tl_e3->ambildata()->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result(),
			'tbl_c1' => $this->tl_c1->ambildata()->result(),
			'tbl_f2' => $this->tl_f2->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	// Halaman detail
	public function detail($tabel_e3_field1 = null)
	{
		$this->declarew();

		$tabel_e3 = $this->tl_e3->ambil_tabel_e3_field1($tabel_e3_field1)->result();

		$param1 = $tabel_e3[0]->tgl_persetujuan;
		$param2 = $tabel_e3[0]->tgl_kedaluwarsa;

		switch ($tabel_e3[0]->status) {
			case $this->aliases['tabel_e3_field4_value0']:
				$data2 = array(
					$this->aliases['tabel_e3_field6'] => NULL,
					$this->aliases['tabel_e3_field7'] => NULL
				);
				$update = $this->tl_e3->update($data2, $tabel_e3_field1);
				$delete = $this->tl_e2->hapus_tabel_e3_field1($tabel_e3_field1);
				$value = '';
				$value2 = '';

				break;

			case $this->aliases['tabel_e3_field4_value1']:
				$value = '';
				$value2 = '';

				break;
			case $this->aliases['tabel_e3_field4_value2']:

				if ($param2 < date('Y-m-d H:i:s')) {
					$data2 = array(
						$this->aliases['tabel_e3_field4'] => $this->aliases['tabel_e3_field4_value0'],
						$this->aliases['tabel_e3_field6'] => NULL,
						$this->aliases['tabel_e3_field7'] => NULL
					);
					$delete = $this->tl_e2->hapus_tabel_e3_field1($tabel_e3_field1);
					$update = $this->tl_e3->update($data2, $tabel_e3_field1);

					$value = '';
					$value2 = '';
				} else {
					$StartTimeStamp = strtotime($param1);
					$EndTimeStamp = strtotime($param2);

					$TimeStamp = $EndTimeStamp - $StartTimeStamp;

					$numberdays = $TimeStamp / 60 / 60 / 24;

					$value = ($numberdays * $this->aliases['tabel_f2_field8_value1']);
					$value2 = '';
				}

				break;
			case $this->aliases['tabel_e3_field4_value3']:
				if ($param2 < date('Y-m-d H:i:s')) {
					$data2 = array(
						$this->aliases['tabel_e3_field4'] => $this->aliases['tabel_e3_field4_value4'],
					);
					$update = $this->tl_e3->update($data2, $tabel_e3_field1);

					$value = '';
					$value2 = '';
				} else {
					$value = '';
					$value2 = '';
				}

				break;
			case $this->aliases['tabel_e3_field4_value4']:
				$value = '';
				$value2 = '';
				break;
			case $this->aliases['tabel_e3_field4_value5']:
				if ($param2 < date('Y-m-dH:i:s')) {
					$data2 = array(
						$this->aliases['tabel_e3_field4'] => $this->aliases['tabel_e3_field4_value0'],
						$this->aliases['tabel_e3_field6'] => NULL,
						$this->aliases['tabel_e3_field7'] => NULL
					);
					$delete = $this->tl_e1->hapus_tabel_e3_field1($tabel_e3_field1);
					$delete = $this->tl_e2->hapus_tabel_e3_field1($tabel_e3_field1);
					$update = $this->tl_e3->update($data2, $tabel_e3_field1);

					$value = '';
					$value2 = '';
				} else {
					$StartTimeStamp = strtotime($param1);
					$EndTimeStamp = strtotime($param2);

					$TimeStamp = $EndTimeStamp - $StartTimeStamp;

					$numberdays = $TimeStamp / 60 / 60 / 24;

					$value = ($numberdays * $this->aliases['tabel_f2_field8_value1']);
					$value2 = '';
				}



				break;
			default:
				$value = 'tidak valid';
				$value2 = '';
		}

		$data1 = array(
			'title' => $this->v8_title['tabel_e3_alias'],
			'konten' => $this->v8['tabel_e3'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_e3'])->result(),

			'tbl_e1' => $this->tl_e1->ambil_tabel_e3_field1($tabel_e3_field1)->result(),
			'tbl_e2' => $this->tl_e2->ambil_tabel_e3_field1($tabel_e3_field1)->result(),
			'tbl_e3' => $this->tl_e3->ambil_tabel_e3_field1($tabel_e3_field1)->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result(),
			'tbl_c1' => $this->tl_c1->ambildata()->result(),
			'tbl_f2' => $this->tl_f2->ambil_tabel_e3_field1($tabel_e3_field1)->result(),

			'count1' => $this->tl_e1->ambil_tabel_e3_field1($tabel_e3_field1)->num_rows(),
			'count8' => $this->tl_f2->ambil_tabel_e3_field1($tabel_e3_field1)->num_rows(),

			// Value ini adalah nilai unik yang dapat digunakan untuk masing-masing proses
			'valueku' => $value,
			'value2' => $value2
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$data = array(
			$this->aliases['tabel_e3_field1'] => '',
			$this->aliases['tabel_e3_field2'] => $this->v_post['tabel_e3_field2'],
			$this->aliases['tabel_e3_field3'] => $this->v_post['tabel_e3_field3'],
			$this->aliases['tabel_e3_field4'] => $this->v_post['tabel_e3_field4'],
		);

		$aksi = $this->tl_e3->simpan($data);

		$notif = $this->handle_1($aksi, 'tabel_e3');

		redirect(site_url('c_tabel_e3/admin'));
	}

	public function update()
	{
		$this->declarew();

		$tabel_e3_field1 = $this->v_post['tabel_e3_field1'];
		$data = array(
			$this->aliases['tabel_e3_field2'] => $this->v_post['tabel_e3_field2'],
			$this->aliases['tabel_e3_field3'] => $this->v_post['tabel_e3_field3'],
			$this->aliases['tabel_e3_field4'] => $this->v_post['tabel_e3_field4'],
			$this->aliases['tabel_e3_field5'] => $this->v_post['tabel_e3_field5'],
		);

		$aksi = $this->tl_e3->update($data, $tabel_e3_field1);

		$notif = $this->handle_2($aksi, 'tabel_e3', $tabel_e3_field1);

		redirect(site_url('c_tabel_e3/admin'));
	}

	public function update_status()
	{
		$this->declarew();

		$param1 = $this->v_post['tabel_e3_field1'];

		$param2 = date("Y-m-d H:i:s");

		$limit = date("Y-m-d H:i:s", strtotime(" ". $this->aliases['tabel_e3_field7_limit1']));

		$data = array(
			$this->aliases['tabel_e3_field4'] => $this->v_post['tabel_e3_field4'],
			$this->aliases['tabel_e3_field6'] => $param2,
			$this->aliases['tabel_e3_field7'] => $limit
		);

		$aksi = $this->tl_e3->update($data, $param1);

		$notif = $this->handle_2($aksi, 'tabel_e3', $param1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function hapus($tabel_e3_field1 = null)
	{
		$this->declarew();

		$aksi = $this->tl_e3->hapus($tabel_e3_field1);

		$notif = $this->handle_3($aksi, 'tabel_e3_field1', $tabel_e3_field1);

		redirect(site_url('c_tabel_e3/admin'));
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel_e3_alias'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_e3'])->result(),
			'tbl_e3' => $this->tl_e3->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v4['tabel_e3'], $data);
	}

	// Cetak satu data
	public function print($tabel_e3_field1 = null)
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v5_title['tabel_e3_alias'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_e3'])->result(),
			'tbl_e3' => $this->tl_e3->ambil_tabel_e3_field1($tabel_e3_field1)->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v5['tabel_e3'], $data);
	}

}
