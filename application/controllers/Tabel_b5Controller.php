<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'OmnitagsController.php';

class Tabel_b5Controller extends OmnitagsController
{
	// Pages
	// Public Pages
	public function detail($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_b5->get_b5_by_field('tabel_b5_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => $this->title['tabel_b5_alias_v8'],
			'konten' => $this->v8['tabel_b5'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b5']),
			'tbl_b5' => $this->tl_b5->get_b5_by_field('tabel_b5_field1', $code),
		);

		$this->load_page('tabel_b5', 'layouts/template', $data1);
	}

	// Account Only Pages


	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_3();

		$param1 = $this->v_get['tabel_b5_field7'];

		$filter = $this->tl_b5->get_b5_by_field('tabel_b5_field7', $param1);

		if (empty($param1)) {
			$result = $this->tl_b5->get_all_b5();
		} else {
			$result = $filter;
		}

		$data1 = array(
			'title' => $this->title['tabel_b5_alias_v3'],
			'konten' => $this->v3['tabel_b5'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b5']),
			'tbl_b5' => $result,
			'tbl_b7' => $this->tl_b7->get_all_b7(),
			'tabel_b5_field7_value' => $param1,
		);

		$this->load_page('tabel_b5', 'layouts/template_admin', $data1);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => $this->title['tabel_b5_alias_v4'],
			'konten' => $this->v4['tabel_b5'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b5']),
			'tbl_b5' => $this->tl_b5->get_all_b5(),
		);

		$this->load_page('tabel_b5', 'layouts/printpage', $data1);
	}

	// Print one data


	// Functions
	// Add data
	public function tambah()
	{
		$this->declarew();
		$this->session_3();

		validate_all(
			array(
				$this->v_post['tabel_b5_field2'],
				$this->v_post['tabel_b5_field3'],
				$this->v_post['tabel_b5_field4'],
				$this->v_post['tabel_b5_field5'],
				$this->v_post['tabel_b5_field7'],
			),
			$this->views['flash2'],
			'tambah'
		);

		$tabel_b5_field2 = $this->v_post['tabel_b5_field2'];
		$method = $this->tl_c2->get_b5_by_field('tabel_b5_field2', $tabel_b5_field2);

		// mencari apakah jumlah data kurang dari 1
		if ($method->num_rows() < 1) {

			$gambar = $this->upload_new_image(
				$this->v_post['tabel_b5_field2'],
				$this->v_upload_path['tabel_b5'],
				'tabel_b5_field4',
				$this->file_type1,
				$method
			);

			$code = $this->add_code('tabel_b5', 'id', 5, '05');

			$data = array(
				'id' => $code,
				$this->aliases['tabel_b5_field2'] => $this->v_post['tabel_b5_field2'],
				$this->aliases['tabel_b5_field3'] => htmlspecialchars($this->v_post['tabel_b5_field3']),
				$this->aliases['tabel_b5_field4'] => $gambar,
				$this->aliases['tabel_b5_field5'] => $this->v_post['tabel_b5_field5'],
				$this->aliases['tabel_b5_field6'] => $this->aliases['tabel_b5_field6_value2'],
				$this->aliases['tabel_b5_field7'] => $this->v_post['tabel_b5_field7'],

				'created_at' => date("Y-m-d\TH:i:s"),
				'updated_at' => date("Y-m-d\TH:i:s"),
				'updated_by' => userdata('id'),
			);

			$aksi = $this->tl_b5->insert_b5($data);

			$notif = $this->handle_4b($aksi, 'tabel_b5');

			redirect($_SERVER['HTTP_REFERER']);
		} else {

			set_flashdata($this->views['flash1'], $this->aliases['tabel_b5_field2'] . ' telah digunakan!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	// Update data
	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();
		$this->session_3();

		$code = $this->v_post['tabel_b5_field1'];

		$tabel = $this->tl_b5->get_b5_by_field('tabel_b5_field1', $code)->result();
		$this->check_data($tabel);

		validate_all(
			array(
				$this->v_post['tabel_b5_field1'],
				$this->v_post['tabel_b5_field2'],
				$this->v_post['tabel_b5_field3'],
				$this->v_post['tabel_b5_field4_old'],
				$this->v_post['tabel_b5_field5'],
				$this->v_post['tabel_b5_field7'],
			),
			$this->views['flash3'],
			'ubah' . $code
		);

		$gambar = $this->change_image_advanced(
			'tabel_b5_field2',
			$this->v_upload_path['tabel_b5'],
			'tabel_b5_field4',
			$this->file_type1,
			$tabel
		);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b5_field2'] => $this->v_post['tabel_b5_field2'],
			$this->aliases['tabel_b5_field3'] => htmlspecialchars($this->v_post['tabel_b5_field3']),
			$this->aliases['tabel_b5_field4'] => $gambar,
			$this->aliases['tabel_b5_field5'] => $this->v_post['tabel_b5_field5'],
			$this->aliases['tabel_b5_field7'] => $this->v_post['tabel_b5_field7'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_b5->update_b5($data, $code);
		$this->insert_history('tabel_b5', $data);

		$notif = $this->handle_4c($aksi, 'tabel_b5', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function sync_theme($tabel_b5_field7 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_b7->get_b7_by_field('tabel_b7_field1', $tabel_b5_field7)->result();
		$this->check_data($tabel);

		$data = array(
			$this->aliases['tabel_b5_field7'] => $tabel_b5_field7,

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_b5->update_all_b5($data);
		$this->insert_history('tabel_b5', $data);

		$notif = $this->handle_4c($aksi, 'tabel_b5', $tabel_b5_field7);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function aktifkan($code = null) //update tidak diperlukan di sini
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_b5->get_b5_by_field('tabel_b5_field1', $code)->result();
		$this->check_data($tabel);
		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b5_field6'] => $this->aliases['tabel_b5_field6_value1'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_b5->update_b5($data, $code);
		$this->insert_history('tabel_b5', $data);

		$notif = $this->handle_4c($aksi, 'tabel_b5_field6', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function nonaktifkan($code = null) //update tidak diperlukan di sini
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_b5->get_b5_by_field('tabel_b5_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b5_field6'] => $this->aliases['tabel_b5_field6_value2'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_b5->update_b5($data, $code);
		$this->insert_history('tabel_b5', $data);

		$notif = $this->handle_4c($aksi, 'tabel_b5_field6', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Soft Delete data
	public function restore($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_b5->get_b5_by_field_archive('tabel_b5_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => NULL,
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_b5->update_b5($data, $code);
		$this->insert_history('tabel_b5', $data);

		$notif = $this->handle_4e($aksi, 'tabel_b5', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	//Soft Delete Data
	public function soft_delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_b5->get_b5_by_field('tabel_b5_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_b5->update_b5($data, $code);
		$this->insert_history('tabel_b5', $data);

		$notif = $this->handle_4e($aksi, 'tabel_b5', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel_b5 = $this->tl_b5->get_b5_by_field_archive('tabel_b5_field1', $code)->result();
		$this->check_data($tabel_b5);
		$img = $tabel_b5[0]->{$this->aliases['tabel_b5_field4']};

		unlink($this->v_upload_path['tabel_b5'] . $img);

		$aksi = $this->tl_b5->delete_b5_by_field('tabel_b5_field1', $code);

		$notif = $this->handle_4e($aksi, 'tabel_b5', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => $this->title['tabel_b5_alias_v9'],
			'konten' => $this->v9['tabel_b5'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b5']),
			'tbl_b5' => $this->tl_b5->get_all_b5_archive(),
		);

		$this->load_page('tabel_b5', 'layouts/template', $data1);
	}
	
	public function detai_archive($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_b5->get_b5_by_field('tabel_b5_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => $this->title['tabel_b5_alias_v10'],
			'konten' => $this->v10['tabel_b5'],
			'dekor' => $this->tl_b5->dekor($this->theme_id, $this->aliases['tabel_b5']),
			'tbl_b5' => $this->tl_b5->get_b5_by_field_archive('tabel_b5_field1', $code),
		);

		$this->load_page('tabel_b5', 'layouts/template', $data1);
	}
	
	public function history($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_b5->get_b5_by_field('tabel_b5_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'table_id' => $code,
			'title' => $this->title['tabel_b5_alias_v11'],
			'konten' => $this->v11['tabel_b5'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b5']),
			'tbl_b5' => $this->tl_ot->get_by_field_history('tabel_b5', 'tabel_b5_field1', $code),
			'current' => $this->tl_ot->get_by_field('tabel_b5', 'tabel_b5_field1', $code),
		);

		$this->load_page('tabel_b5', 'layouts/template_admin', $data1);
	}

	//Push History Data into current data
	public function push($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_ot->get_by_id_history('tabel_b5', $code)->result();
		$this->check_data($tabel);

		$code = $tabel[0]->id;

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b5_field2'] => $tabel[0]->{$this->aliases['tabel_b5_field2']},

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_b5->update_b5($data, $code);

		$notif = $this->handle_4c($aksi, 'tabel_b5', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
}

