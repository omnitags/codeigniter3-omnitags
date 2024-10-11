<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';


class C_tabel_f1 extends Omnitags
{
	// Halaman publik
	
	// Halaman khusus akun
	public function daftar()
	{
		$this->declarew();
		// nilai min dan max di sini belum ada
		$param1 = $this->v_filter1_get['tabel_f1_field11'];
		$param2 = $this->v_filter2_get['tabel_f1_field11'];
		$param3 = $this->v_filter1_get['tabel_f1_field12'];
		$param4 = $this->v_filter2_get['tabel_f1_field12'];

		$param5 = $this->session->userdata($this->aliases['tabel_c2_field1']);

		$data1 = array(
			'title' => $this->v2_title['tabel_f1_alias'],
			'konten' => $this->v2['tabel_f1'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_f1'])->result(),
			'tbl_f1' => $this->tl_f1->ambil_tabel_c2_field1($param5)->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'tabel_f1_field11_filter1_value' => $param1,
			'tabel_f1_field11_filter2_value' => $param2,
			'tabel_f1_field12_filter1_value' => $param3,
			'tabel_f1_field12_filter2_value' => $param4,
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}


	public function filter_tabel_c1()
	{
		$this->declarew();

		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->v_filter1_get['tabel_f1_field11'];
		$param2 = $this->v_filter2_get['tabel_f1_field11'];
		$param3 = $this->v_filter1_get['tabel_f1_field12'];
		$param4 = $this->v_filter2_get['tabel_f1_field12'];

		$param5 = $this->session->userdata($this->aliases['tabel_c2_field1']);

		$data1 = array(
			'title' => $this->v2_title['tabel_f1_alias'],
			'konten' => $this->v2['tabel_f1'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_f1'])->result(),
			'tbl_f1' => $this->tl_f1->filter_tabel_c1($param1, $param2, $param3, $param4, $param5)->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'tabel_f1_field11_filter1_value' => $param1,
			'tabel_f1_field11_filter2_value' => $param2,
			'tabel_f1_field12_filter1_value' => $param3,
			'tabel_f1_field12_filter2_value' => $param4,
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	// Halaman admin
	public function admin()
	{
		$this->declarew();

		// nilai min dan max di sini belum ada
		$param1 = $this->v_filter1_get['tabel_f1_field11'];
		$param2 = $this->v_filter2_get['tabel_f1_field11'];
		$param3 = $this->v_filter1_get['tabel_f1_field12'];
		$param4 = $this->v_filter2_get['tabel_f1_field12'];

		$data1 = array(
			'title' => $this->v3_title['tabel_f1_alias'],
			'konten' => $this->v3['tabel_f1'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_f1'])->result(),
			'tbl_f1' => $this->tl_f1->ambildata()->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'tabel_f1_field11_filter1_value' => $param1,
			'tabel_f1_field11_filter2_value' => $param2,
			'tabel_f1_field12_filter1_value' => $param3,
			'tabel_f1_field12_filter2_value' => $param4,
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	// public function hapus($tabel_f1_field1 = null)
	// {
	// 	$this->declarew();

	// 	$aksi = $this->tl_f1->hapus($tabel_f1_field1);
	// 	redirect(site_url('c_tabel_f1/admin'));
	// }

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel_f1_alias'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_f1'])->result(),
			'tbl_f1' => $this->tl_f1->ambildata()->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v4['tabel_f1'], $data);
	}

	public function filter()
	{
		$this->declarew();

		// nilai min dan max sudah diinput sebelumnya
		$param1 = $this->v_filter1_get['tabel_f1_field11'];
		$param2 = $this->v_filter2_get['tabel_f1_field11'];
		$param3 = $this->v_filter1_get['tabel_f1_field12'];
		$param4 = $this->v_filter2_get['tabel_f1_field12'];

		$data1 = array(
			'title' => $this->v3_title['tabel_f1_alias'],
			'konten' => $this->v3['tabel_f1'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_f1'])->result(),
			'tbl_f1' => $this->tl_f1->filter($param1, $param2, $param3, $param4)->result(),
			'tbl_e4' => $this->tl_e4->ambildata()->result(),

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'tabel_f1_field11_filter1_value' => $param1,
			'tabel_f1_field11_filter2_value' => $param2,
			'tabel_f1_field12_filter1_value' => $param3,
			'tabel_f1_field12_filter2_value' => $param4,
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}
}
