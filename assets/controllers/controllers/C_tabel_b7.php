<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_b7 extends Omnitags
{
	// Halaman publik

	
	// Halaman khusus akun


	// Halaman admin
	public function admin()
	{
		$this->declarew();

		 $data1 = array(
			'title' => $this->v3_title['tabel_b7_alias'],
			'konten' => $this->v3['tabel_b7'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_b7'])->result(),
			'tbl_b7' => $this->tl_b7->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	public function tambah()
	{
		$this->declarew();

		$data = array(
			$this->aliases['tabel_b7_field1'] => '',
			$this->aliases['tabel_b7_field2'] => $this->v_post['tabel_b7_field2'],
			$this->aliases['tabel_b7_field6'] => htmlspecialchars($this->v_post['tabel_b7_field6']),
		);

		$aksi = $this->tl_b7->simpan($data);

		$notif = $this->handle_1($aksi, 'tabel_b7');

		redirect(site_url('c_tabel_b7/admin'));
	}


	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();

		$tabel_b7_field1 = $this->v_post['tabel_b7_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b7_field2'] => $this->v_post['tabel_b7_field2'],
			$this->aliases['tabel_b7_field6'] => $this->v_post['tabel_b7_field6'],
		);

		$aksi = $this->tl_b7->update($data, $tabel_b7_field1);

		$notif = $this->handle_2($aksi, 'tabel_b7', $tabel_b7_field1);

		redirect(site_url('c_tabel_b7/admin'));
	}


	public function update_favicon()
	{
		$this->declarew();

		$param = $this->v_post['tabel_b7_field2'] . "_";	

		$table = $this->tl_b7->ambil_tabel_b7_field1($this->v_post['tabel_b7_field1'])->result();
		$tabel_b7_field3 = $table[0]->favicon;
		unlink($this->v_upload_path['tabel_b7'] . $tabel_b7_field3);

		$config['upload_path'] = $this->v_upload_path['tabel_b7'];
		// nama file dan ekstensi telah ditetapkan dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $param . $this->aliases['tabel_b7_field3'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->v_input['tabel_b7_field3_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->v_input['tabel_b7_field3_input'])) {
			$gambar = $this->v_post_old['tabel_b7_field3'];
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$tabel_b7_field1 = $this->v_post['tabel_b7_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b7_field3'] => $param . $this->aliases['tabel_b7_field3'] . "." . $file_extension,
		);

		$aksi = $this->tl_b7->update($data, $tabel_b7_field1);

		$notif = $this->handle_4($aksi, 'tabel_b7_field3', 'tabel_b7_field1');

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_logo()
	{
		$this->declarew();

		$param = $this->v_post['tabel_b7_field2'] . "_";	

		$table = $this->tl_b7->ambil_tabel_b7_field1($this->v_post['tabel_b7_field1'])->result();
		$tabel_b7_field4 = $table[0]->logo;
		unlink($this->v_upload_path['tabel_b7'] . $tabel_b7_field4);

		$config['upload_path'] = $this->v_upload_path['tabel_b7'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $param . $this->aliases['tabel_b7_field4'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->v_input['tabel_b7_field4_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->v_input['tabel_b7_field4_input'])) {
			$gambar = $this->v_post_old['tabel_b7_field4'];
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$tabel_b7_field1 = $this->v_post['tabel_b7_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b7_field4'] => $param . $this->aliases['tabel_b7_field4'] . "." . $file_extension,
		);

		$aksi = $this->tl_b7->update($data, $tabel_b7_field1);

		$notif = $this->handle_4($aksi, 'tabel_b7_field4', 'tabel_b7_field1');

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_foto()
	{
		$this->declarew();

		$param = $this->v_post['tabel_b7_field2'] . "_";		

		$table = $this->tl_b7->ambil_tabel_b7_field1($this->v_post['tabel_b7_field1'])->result();
		$tabel_b7_field5 = $table[0]->foto;
		unlink($this->v_upload_path['tabel_b7'] . $tabel_b7_field5);

		$config['upload_path'] = $this->v_upload_path['tabel_b7'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $param . $this->aliases['tabel_b7_field5'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$file_extension = pathinfo($_FILES[$this->v_input['tabel_b7_field5_input']]['name'], PATHINFO_EXTENSION);

		if (!$this->upload->do_upload($this->v_input['tabel_b7_field5_input'])) {
			$gambar = $this->v_post_old['tabel_b7_field5'];
		} else {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$tabel_b7_field1 = $this->v_post['tabel_b7_field1'];

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b7_field5'] => $param . $this->aliases['tabel_b7_field5'] . "." . $file_extension,
		);

		$aksi = $this->tl_b7->update($data, $tabel_b7_field1);

		$notif = $this->handle_4($aksi, 'tabel_b7_field5', 'tabel_b7_field1');

		redirect(site_url('c_tabel_b7/admin'));
	}


	public function hapus($tabel_b7_field1 = null)
	{
		$this->declarew();

		$aksi = $this->tl_b7->hapus($tabel_b7_field1);

		$notif = $this->handle_3($aksi, 'tabel_b7_field1', $tabel_b7_field1);

		redirect(site_url('c_tabel_b7/admin'));
	}

	// Cetak semua data
	public function laporan()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->v4_title['tabel_b7_alias'],
			'dekor' => $this->tl_b1->dekor($this->aliases['tabel_b7'])->result(),
			'tbl_b7' => $this->tl_b7->ambildata()->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->v4['tabel_b7'], $data);
	}

	// Cetak satu data
}
