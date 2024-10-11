<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_b1 extends Omnitags
{
	// Halaman publik


	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v3_title['tabel_b1_alias'],
			'konten' => $this->v3['tabel_b1'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_b1'])->result(),
			'tbl_b1' => $this->tl_b1->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$config['upload_path'] = $this->v_upload_path['tabel_b1'];
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->v_post['tabel_b1_field2'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->v_input['tabel_b1_field4_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->v_input['tabel_b1_field4_input'])) {
			// Di sini seharusnya ada notifikasi modal kalau upload tidak berhasil
			// Tapi karena formnya sudah required saya rasa tidak perlu


			$this->session->set_flashdata($this->views['flash2'], $this->flash_msg2['tabel_b1_field4_alias']);
			$this->session->set_flashdata('modal', $this->views['flash2_func1']);
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			// Di bawah ini adalah method untuk mengambil informasi dari hasil upload data
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$data = array(
			$this->aliases['tabel_b1_field1'] => '',
			$this->aliases['tabel_b1_field2'] => $this->v_post['tabel_b1_field2'],
			$this->aliases['tabel_b1_field3'] => $this->v_post['tabel_b1_field3'],
			$this->aliases['tabel_b1_field4'] => $this->v_post['tabel_b1_field2'] . "." . $file_extension,
			$this->aliases['tabel_b1_field5'] => $this->v_post['tabel_b1_field5'],
		);

		$aksi = $this->tl_b1->simpan($data);

		$notif = $this->handle_1($aksi, 'tabel_b1');

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();

		$config['upload_path'] = $this->v_upload_path['tabel_b1'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $this->v_post['tabel_b1_field2'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->v_input['tabel_b1_field4_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->v_input['tabel_b1_field4_input'])) {
			$gambar = $this->v_post_old['tabel_b1_field4'];
		} else {

			$upload = $this->upload->data();
			$gambar = $this->v_post['tabel_b1_field2'] . "." . $file_extension;
		}

		$tabel_b1_field1 = $this->v_post['tabel_b1_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b1_field2'] => $this->v_post['tabel_b1_field2'],
			$this->aliases['tabel_b1_field3'] => $this->v_post['tabel_b1_field3'],
			$this->aliases['tabel_b1_field4'] => $gambar,
			$this->aliases['tabel_b1_field5'] => $this->v_post['tabel_b1_field5'],
		);

		$aksi = $this->tl_b1->update($data, $tabel_b1_field1);

		$notif = $this->handle_2($aksi, 'tabel_b1', $tabel_b1_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function hapus($tabel_b1_field1 = null)
	{
		$this->declarew();

		$tabel_b1 = $this->tl_b1->ambil_tabel_b1_field1($tabel_b1_field1)->result();
		$img = $tabel_b1[0]->img;

		unlink($this->v_upload_path['tabel_b1'] . $img);

		$aksi = $this->tl_b1->hapus($tabel_b1_field1);

		$notif = $this->handle_3($aksi, 'tabel_b1_field1', $tabel_b1_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel_b1_alias'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_b1'])->result(),
			'tbl_b1' => $this->tl_b1->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v4['tabel_b1'], $data);
	}
}
