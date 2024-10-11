<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_d3 extends Omnitags
{
	// Halaman publik


	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v3_title['tabel_d3_alias'],
			'konten' => $this->v3['tabel_d3'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_d3'])->result(),
			'tbl_d3' => $this->tl_d3->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$data = array(
			$this->aliases['tabel_d3_field1'] => '',
			$this->aliases['tabel_d3_field2'] => $this->session->userdata($this->aliases['tabel_c2_field1']),
			$this->aliases['tabel_d3_field3'] => date("Y-m-d H:i:s"),
			$this->aliases['tabel_d3_field4'] => date("Y-m-d H:i:s"),
		);

		$aksi = $this->tl_d3->simpan($data);
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel_d3_alias'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_d3'])->result(),
			'tbl_d3' => $this->tl_d3->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v4['tabel_d3'], $data);
	}

	// Cetak satu data
}
