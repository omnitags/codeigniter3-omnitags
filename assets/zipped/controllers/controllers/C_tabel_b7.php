<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_b7 extends Omnitags
{
	// Pages
	// Public Pages
	public function detail($param1 = null)
	{
		$this->declarew();
		$this->page_session_3();

		$tabel = $this->tl_b7->get_b7_by_b7_field1($param1)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => lang('tabel_b7_alias_v8_title'),
			'konten' => $this->v8['tabel_b7'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b7']),
			'tbl_b7' => $this->tl_b7->get_b7_by_b7_field1($param1),
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
			'title' => lang('tabel_b7_alias_v3_title'),
			'konten' => $this->v3['tabel_b7'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b7']),
			'tbl_b7' => $this->tl_b7->get_all_b7(),
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
			'title' => lang('tabel_b7_alias_v4_title'),
			'konten' => $this->v4['tabel_b7'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b7']),
			'tbl_b7' => $this->tl_b7->get_all_b7(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/printpage', $data);
	}

	// Print one data


	// Functions
	// Add data
	public function tambah()
	{
		$this->declarew();
		$this->session_3();

		$param1 = $this->v_post['tabel_b7_field2'];

		$tabel = $this->tl_b7->get_b7_by_b7_field2($param1)->result();
		$this->check_availability($tabel);

		validate_all(
			array(
				$param1,
				$this->v_post['tabel_b7_field6'],
			),
			$this->views['flash2'],
			'tambah'
		);

		// $id = get_next_code($this->aliases['tabel_e1'], $this->aliases['tabel_e1_field1'], 'FK');
		// $this->aliases['tabel_e1_field1'] => $id,

		$data = array(
			$this->aliases['tabel_b7_field1'] => '',
			$this->aliases['tabel_b7_field2'] => $param1,
			$this->aliases['tabel_b7_field6'] => htmlspecialchars($this->v_post['tabel_b7_field6']),
		);

		$aksi = $this->tl_b7->insert_b7($data);

		$notif = $this->handle_4b($aksi, 'tabel_b7');

		redirect($_SERVER['HTTP_REFERER']);
	}


	// Update data
	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();
		$this->session_3();

		$tabel_b7_field1 = $this->v_post['tabel_b7_field1'];

		$tabel = $this->tl_b7->get_b7_by_b7_field1($tabel_b7_field1)->result();
		$this->check_data($tabel);

		validate_all(
			array(
				$this->v_post['tabel_b7_field1'],
				$this->v_post['tabel_b7_field2'],
				$this->v_post['tabel_b7_field6'],
			),
			$this->views['flash3'],
			'ubah' . $tabel_b7_field1
		);


		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b7_field2'] => $this->v_post['tabel_b7_field2'],
			$this->aliases['tabel_b7_field6'] => $this->v_post['tabel_b7_field6'],
		);

		$aksi = $this->tl_b7->update_b7($data, $tabel_b7_field1);

		$notif = $this->handle_4c($aksi, 'tabel_b7', $tabel_b7_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}


	public function update_favicon()
	{
		$this->declarew();
		$this->session_3();

		$tabel_b7_field1 = $this->v_post['tabel_b7_field1'];

		$tabel = $this->tl_b7->get_b7_by_b7_field1($tabel_b7_field1)->result();
		$this->check_data($tabel);

		validate_all(
			array(
				$this->v_post['tabel_b7_field1'],
				$this->v_post['tabel_b7_field2'],
			),
			$this->views['flash3'],
			$this->aliases['tabel_b7_field3'] . $tabel_b7_field1
		);


		$param = $this->v_post['tabel_b7_field2'] . "_";

		$config['upload_path'] = $this->v_upload_path['tabel_b7'];
		// nama file dan ekstensi telah ditetapkan dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $param . $this->aliases['tabel_b7_field3'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);
		$upload = $this->upload->do_upload($this->v_input['tabel_b7_field3_input']);

		if (!$upload) {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		} else {
			$table = $this->tl_b7->get_b7_by_b7_field1($tabel_b7_field1)->result();
			$tabel_b7_field3 = $table[0]->favicon;
			unlink($this->v_upload_path['tabel_b7'] . $tabel_b7_field3);

			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b7_field3'] => $gambar,
		);

		$aksi = $this->tl_b7->update_b7($data, $tabel_b7_field1);

		$notif = $this->handle_4d($aksi, 'tabel_b7_field3', $tabel_b7_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_logo()
	{
		$this->declarew();
		$this->session_3();

		$tabel_b7_field1 = $this->v_post['tabel_b7_field1'];

		$tabel = $this->tl_b7->get_b7_by_b7_field1($tabel_b7_field1)->result();
		$this->check_data($tabel);

		validate_all(
			array(
				$this->v_post['tabel_b7_field1'],
				$this->v_post['tabel_b7_field2'],
			),
			$this->views['flash3'],
			$this->aliases['tabel_b7_field4'] . $tabel_b7_field1
		);


		$param = $this->v_post['tabel_b7_field2'] . "_";

		$config['upload_path'] = $this->v_upload_path['tabel_b7'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $param . $this->aliases['tabel_b7_field4'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);
		$upload = $this->upload->do_upload($this->v_input['tabel_b7_field4_input']);

		if (!$upload) {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		} else {
			$table = $this->tl_b7->get_b7_by_b7_field1($tabel_b7_field1)->result();
			$tabel_b7_field4 = $table[0]->logo;
			unlink($this->v_upload_path['tabel_b7'] . $tabel_b7_field4);

			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}


		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b7_field4'] => $gambar
		);

		$aksi = $this->tl_b7->update_b7($data, $tabel_b7_field1);

		$notif = $this->handle_4d($aksi, 'tabel_b7_field4', $tabel_b7_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_foto()
	{
		$this->declarew();
		$this->session_3();

		$tabel_b7_field1 = $this->v_post['tabel_b7_field1'];

		$tabel = $this->tl_b7->get_b7_by_b7_field1($tabel_b7_field1)->result();
		$this->check_data($tabel);

		validate_all(
			array(
				$this->v_post['tabel_b7_field1'],
				$this->v_post['tabel_b7_field2'],
			),
			$this->views['flash3'],
			$this->aliases['tabel_b7_field5'] . $tabel_b7_field1
		);


		$param = $this->v_post['tabel_b7_field2'] . "_";

		$config['upload_path'] = $this->v_upload_path['tabel_b7'];
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $param . $this->aliases['tabel_b7_field5'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);
		$upload = $this->upload->do_upload($this->v_input['tabel_b7_field5_input']);

		if (!$upload) {
			$gambar = $this->v_post['tabel_b7_field4_old'];
		} else {
			$table = $this->tl_b7->get_b7_by_b7_field1($tabel_b7_field1)->result();
			$tabel_b7_field5 = $table[0]->foto;
			unlink($this->v_upload_path['tabel_b7'] . $tabel_b7_field5);

			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b7_field5'] => $gambar,
		);

		$aksi = $this->tl_b7->update_b7($data, $tabel_b7_field1);

		$notif = $this->handle_4d($aksi, 'tabel_b7_field5', $tabel_b7_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}


	// Delete data
	public function delete($tabel_b7_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel_b7 = $this->tl_b7->get_b7_field1($tabel_b7_field1)->result();
		$this->check_data($tabel_b7);

		$tabel_b7_field3 = $tabel_b7[0]->favicon;
		$tabel_b7_field4 = $tabel_b7[0]->logo;
		$tabel_b7_field5 = $tabel_b7[0]->foto;
		unlink($this->v_upload_path['tabel_b7'] . $tabel_b7_field3);
		unlink($this->v_upload_path['tabel_b7'] . $tabel_b7_field4);
		unlink($this->v_upload_path['tabel_b7'] . $tabel_b7_field5);

		$aksi = $this->tl_b7->delete_b7($tabel_b7_field1);
		$tabel_b1 = $this->tl_b1->delete_b1_by_b1_field7($tabel_b7_field1);
		$tabel_b2 = $this->tl_b2->delete_b2_by_b2_field7($tabel_b7_field1);
		$tabel_b5 = $this->tl_b5->delete_b5_by_b5_field7($tabel_b7_field1);
		$tabel_b6 = $this->tl_b6->delete_b6_by_b6_field7($tabel_b7_field1);

		$notif = $this->handle_4e($aksi, 'tabel_b7', $tabel_b7_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}
}
