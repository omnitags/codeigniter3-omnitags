<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_f4 extends Omnitags
{
	// Halaman publik


	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v3_title['tabel_f4_alias'],
			'konten' => $this->v3['tabel_f4'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_f4'])->result(),
			'tbl_f4' => $this->tl_f4->ambildata()->result(),
			'tbl_c1' => $this->tl_c1->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tabel_f4_field7 = date("Y-m-d") . " " . date("h:m:s", time());

		$tabel_f4_field2 = $this->v_post['tabel_f4_field2'];
		$data = array(
			$this->aliases['tabel_f4_field1'] => '',
			$this->aliases['tabel_f4_field2'] => $tabel_f4_field2,
			$this->aliases['tabel_f4_field3'] => $this->v_post['tabel_f4_field3'],
			$this->aliases['tabel_f4_field4'] => $this->v_post['tabel_f4_field4'],
			$this->aliases['tabel_f4_field5'] => $this->v_post['tabel_f4_field5'],
			$this->aliases['tabel_f4_field6'] => $this->v_post['tabel_f4_field6'],
			$this->aliases['tabel_f4_field7'] => $tabel_f4_field7,
		);

		$status = array(
			$this->aliases['tabel_e3_field4'] => $this->v_post['tabel_e3_field4'],
		);
		$update_status = $this->tl_e3->update($status, $tabel_f4_field2);

		$aksi = $this->tl_f4->simpan($data);

		$notif = $this->handle_1($aksi, 'tabel_f4');

		redirect(site_url('c_tabel_e3/admin'));
	}

	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();

		$tabel_f4_field1 = $this->v_post['tabel_f4_field1'];
		$data = array(
			$this->aliases['tabel_f4_field2'] => $this->v_post['tabel_f4_field2'],
			$this->aliases['tabel_f4_field3'] => $this->v_post['tabel_f4_field3'],
		);

		$aksi = $this->tl_f4->update($data, $tabel_f4_field1);

		$notif = $this->handle_2($aksi, 'tabel_f4', $tabel_f4_field1);

		redirect(site_url('c_tabel_f4/admin'));
	}

	public function hapus($tabel_f4_field1 = null)
	{
		$this->declarew();

		$aksi = $this->tl_f4->hapus($tabel_f4_field1);

		$notif = $this->handle_3($aksi, 'tabel_f4_field1', $tabel_f4_field1);

		redirect(site_url('c_tabel_f4/admin'));
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel_f4_alias'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_f4'])->result(),
			'tbl_f4' => $this->tl_f4->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v4['tabel_f4'], $data);
	}
}
