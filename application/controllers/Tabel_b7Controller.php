<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'OmnitagsController.php';

class Tabel_b7Controller extends OmnitagsController
{
	// Pages
	// Public Pages
	public function detail($code = null)
	{
		$this->declarew();
		$this->page_session_3();

		$tabel = $this->tl_b7->get_b7_by_field('tabel_b7_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => $this->title['tabel_b7_alias_v8'],
			'konten' => $this->v8['tabel_b7'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b7']),
			'tbl_b7' => $this->tl_b7->get_b7_by_field('tabel_b7_field1', $code),
		);

		$this->load_page('tabel_b7', 'layouts/template_admin', $data1);
	}

	// Account Only Pages


	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => $this->title['tabel_b7_alias_v3'],
			'konten' => $this->v3['tabel_b7'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b7']),
			'tbl_b7' => $this->tl_b7->get_all_b7(),
		);

		$this->load_page('tabel_b7', 'layouts/template_admin', $data1);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => $this->title['tabel_b7_alias_v4'],
			'konten' => $this->v4['tabel_b7'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b7']),
			'tbl_b7' => $this->tl_b7->get_all_b7(),
		);

		$this->load_page('tabel_b7', 'layouts/printpage', $data1);
	}

	// Print one data


	// Functions
	// Add data
	public function tambah()
	{
		$this->declarew();
		$this->session_3();

		$param1 = $this->v_post['tabel_b7_field2'];

		$tabel = $this->tl_b7->get_b7_by_field('tabel_b7_field2', $param1)->result();
		$this->check_null($tabel);

		validate_all(
			array(
				$param1,
				$this->v_post['tabel_b7_field6'],
			),
			$this->views['flash2'],
			'tambah'
		);

		// $id = get_next_code($this->aliases['tabel_e1'], 'id', 'FK');
		// 'id' => $id,

		$data = array(
			'id' => '',
			$this->aliases['tabel_b7_field2'] => $param1,
			$this->aliases['tabel_b7_field6'] => htmlspecialchars($this->v_post['tabel_b7_field6']),

			'created_at' => date("Y-m-d\TH:i:s"),
			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_b7->insert_b7($data);
		$this->insert_history('tabel_b7', $data);

		$notif = $this->handle_4b($aksi, 'tabel_b7');

		redirect($_SERVER['HTTP_REFERER']);
	}


	// Update data
	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();
		$this->session_3();

		$code = $this->v_post['tabel_b7_field1'];

		$tabel = $this->tl_b7->get_b7_by_field('tabel_b7_field1', $code)->result();
		$this->check_data($tabel);

		validate_all(
			array(
				$this->v_post['tabel_b7_field1'],
				$this->v_post['tabel_b7_field2'],
				$this->v_post['tabel_b7_field6'],
			),
			$this->views['flash3'],
			'ubah' . $code
		);


		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b7_field2'] => $this->v_post['tabel_b7_field2'],
			$this->aliases['tabel_b7_field6'] => $this->v_post['tabel_b7_field6'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_b7->update_b7($data, $code);
		$this->insert_history('tabel_b7', $data);

		$notif = $this->handle_4c($aksi, 'tabel_b7', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}


	public function update_favicon()
	{
		$this->declarew();
		$this->session_3();

		$code = $this->v_post['tabel_b7_field1'];

		$tabel = $this->tl_b7->get_b7_by_field('tabel_b7_field1', $code)->result();
		$this->check_data($tabel);

		validate_all(
			array(
				$this->v_post['tabel_b7_field1'],
				$this->v_post['tabel_b7_field2'],
			),
			$this->views['flash3'],
			$this->aliases['tabel_b7_field3'] . $code
		);

		$gambar = $this->change_image(
			$this->v_post['tabel_b7_field2'] . "_" . $this->aliases['tabel_b7_field3'],
			$tabel[0]->{$this->aliases['tabel_b7_field3']},
			$this->v_upload_path['tabel_b7'],
			'tabel_b7_field3',
			$this->file_type1,
			$tabel
		);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b7_field3'] => $gambar,

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_b7->update_b7($data, $code);
		$this->insert_history('tabel_b7', $data);

		$notif = $this->handle_4d($aksi, 'tabel_b7_field3', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_logo()
	{
		$this->declarew();
		$this->session_3();

		$code = $this->v_post['tabel_b7_field1'];

		$tabel = $this->tl_b7->get_b7_by_field('tabel_b7_field1', $code)->result();
		$this->check_data($tabel);

		validate_all(
			array(
				$this->v_post['tabel_b7_field1'],
				$this->v_post['tabel_b7_field2'],
			),
			$this->views['flash3'],
			$this->aliases['tabel_b7_field4'] . $code
		);

		$gambar = $this->change_image(
			$this->v_post['tabel_b7_field2'] . "_" . $this->aliases['tabel_b7_field4'],
			$tabel[0]->{$this->aliases['tabel_b7_field4']},
			$this->v_upload_path['tabel_b7'],
			'tabel_b7_field4',
			$this->file_type1,
			$tabel
		);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b7_field4'] => $gambar
		);

		$aksi = $this->tl_b7->update_b7($data, $code);
		$this->insert_history('tabel_b7', $data);

		$notif = $this->handle_4d($aksi, 'tabel_b7_field4', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_foto()
	{
		$this->declarew();
		$this->session_3();

		$code = $this->v_post['tabel_b7_field1'];

		$tabel = $this->tl_b7->get_b7_by_field('tabel_b7_field1', $code)->result();
		$this->check_data($tabel);

		validate_all(
			array(
				$this->v_post['tabel_b7_field1'],
				$this->v_post['tabel_b7_field2'],
			),
			$this->views['flash3'],
			$this->aliases['tabel_b7_field5'] . $code
		);

		$gambar = $this->change_image(
			$this->v_post['tabel_b7_field2'] . "_" . $this->aliases['tabel_b7_field5'],
			$tabel[0]->{$this->aliases['tabel_b7_field5']},
			$this->v_upload_path['tabel_b7'],
			'tabel_b7_field5',
			$this->file_type1,
			$tabel
		);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b7_field5'] => $gambar,

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_b7->update_b7($data, $code);
		$this->insert_history('tabel_b7', $data);

		$notif = $this->handle_4d($aksi, 'tabel_b7_field5', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	//Soft Delete Data
	public function soft_delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_b7->get_b7_by_field('tabel_b7_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_b7->update_b7($data, $code);
		$this->insert_history('tabel_b7', $data);

		$notif = $this->handle_4e($aksi, 'tabel_b7', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Soft Delete data
	public function restore($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_b7->get_b7_by_field_archive('tabel_b7_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => NULL,
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_b7->update_b7($data, $code);
		$this->insert_history('tabel_b7', $data);

		$notif = $this->handle_4e($aksi, 'tabel_b7', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel_b7 = $this->tl_b7->get_b7_field1_archive($code)->result();
		$this->check_data($tabel_b7);

		$tabel_b7_field3 = $tabel_b7[0]->{$this->aliases['tabel_b7_field3']};
		$tabel_b7_field4 = $tabel_b7[0]->{$this->aliases['tabel_b7_field4']};
		$tabel_b7_field5 = $tabel_b7[0]->{$this->aliases['tabel_b7_field5']};
		unlink($this->v_upload_path['tabel_b7'] . $tabel_b7_field3);
		unlink($this->v_upload_path['tabel_b7'] . $tabel_b7_field4);
		unlink($this->v_upload_path['tabel_b7'] . $tabel_b7_field5);

		$aksi = $this->tl_b7->delete_b7_by_field('tabel_b7_field1', $code);
		$tabel_b1 = $this->tl_b1->delete_b1_by_field('tabel_b7_field1', $code);
		$tabel_b2 = $this->tl_b2->delete_b2_by_field('tabel_b7_field1', $code);
		$tabel_b5 = $this->tl_b5->delete_b5_by_field('tabel_b7_field1', $code);
		$tabel_b6 = $this->tl_b6->delete_b6_by_field('tabel_b7_field1', $code);

		$notif = $this->handle_4e($aksi, 'tabel_b7', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => $this->title['tabel_b7_alias_v9'],
			'konten' => $this->v9['tabel_b7'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b7']),
			'tbl_b7' => $this->tl_b7->get_all_b7_archive(),
		);

		$this->load_page('tabel_b7', 'layouts/template', $data1);
	}
	
	public function detai_archive($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_b7->get_b7_by_field('tabel_b7_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => $this->title['tabel_b7_alias_v10'],
			'konten' => $this->v10['tabel_b7'],
			'dekor' => $this->tl_b7->dekor($this->theme_id, $this->aliases['tabel_b7']),
			'tbl_b7' => $this->tl_b7->get_b7_by_field_archive('tabel_b7_field1', $code),
		);

		$this->load_page('tabel_b7', 'layouts/template', $data1);
	}
	
	public function history($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_b7->get_b7_by_field('tabel_b7_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'table_id' => $code,
			'title' => $this->title['tabel_b7_alias_v11'],
			'konten' => $this->v11['tabel_b7'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b7']),
			'tbl_b7' => $this->tl_ot->get_by_field_history('tabel_b7', 'tabel_b7_field1', $code),
			'current' => $this->tl_ot->get_by_field('tabel_b7', 'tabel_b7_field1', $code),
		);

		$this->load_page('tabel_b7', 'layouts/template_admin', $data1);
	}

	//Push History Data into current data
	public function push($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_ot->get_by_id_history('tabel_b7', $code)->result();
		$this->check_data($tabel);

		$code = $tabel[0]->id;

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b7_field2'] => $tabel[0]->{$this->aliases['tabel_b7_field2']},

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_b7->update_b7($data, $code);

		$notif = $this->handle_4c($aksi, 'tabel_b7', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
}

