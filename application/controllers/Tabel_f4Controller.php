<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'OmnitagsController.php';

class Tabel_f4Controller extends OmnitagsController
{
	// Pages
	// Public Pages


	// Account Only Pages


	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_4();

		$data1 = array(
			'title' => $this->title['tabel_f4_alias_v3'],
			'konten' => $this->v3['tabel_f4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f4']),
			'tbl_f4' => $this->tl_f4->get_all_f4(),
			'tbl_c1' => $this->tl_c1->get_all_c1(),
		);

		$this->load_page('tabel_f4', 'layouts/template_admin', $data1);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_4();

		$data1 = array(
			'title' => $this->title['tabel_f4_alias_v4'],
			'konten' => $this->v4['tabel_f4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f4']),
			'tbl_f4' => $this->tl_f4->get_all_f4(),
		);

		$this->load_page('tabel_f4', 'layouts/printpage', $data1);
	}

	// Functions
	// Add data
	public function tambah()
	{
		$this->declarew();
		$this->session_4();

		validate_all(
			array(
				$this->v_post['tabel_f4_field2'],
				$this->v_post['tabel_f4_field3'],
				$this->v_post['tabel_f4_field4'],
				$this->v_post['tabel_f4_field5'],
			),
			$this->views['flash2'],
			''
		);

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tabel_f4_field7 = date("Y-m-d") . " " . date("h:m:s", time());

		$tabel_f4_field2 = $this->v_post['tabel_f4_field2'];

		// $id = get_next_code($this->aliases['tabel_e1'], 'id', 'FK');
		// 'id' => $id,

		$data = array(
			'id' => '',
			$this->aliases['tabel_f4_field2'] => $tabel_f4_field2,
			$this->aliases['tabel_f4_field3'] => $this->v_post['tabel_f4_field3'],
			$this->aliases['tabel_f4_field4'] => $this->v_post['tabel_f4_field4'],
			$this->aliases['tabel_f4_field5'] => $this->v_post['tabel_f4_field5'],
			$this->aliases['tabel_f4_field6'] => $this->v_post['tabel_f4_field6'],
			$this->aliases['tabel_f4_field7'] => $tabel_f4_field7,

			'created_at' => date("Y-m-d\TH:i:s"),
			'updated_at' => date("Y-m-d\TH:i:s"),
		);

		$data2 = array(
			$this->aliases['tabel_e3_field4'] => $this->v_post['tabel_e3_field4'],
		);
		$update_status = $this->tl_e3->update_e3($data2, $tabel_f4_field2);

		$aksi = $this->tl_f4->insert_f4($data);
		$this->insert_history('tabel_f4', $data);

		$notif = $this->handle_4b($aksi, 'tabel_f4');

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Update data
	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();
		$this->session_4();

		$code = $this->v_post['tabel_f4_field1'];

		$tabel = $this->tl_f4->get_f4_by_field('tabel_f4_field1', $code)->result();
		$this->check_data($tabel);

		validate_all(
			array(
				$this->v_post['tabel_f4_field1'],
				$this->v_post['tabel_f4_field2'],
				$this->v_post['tabel_f4_field3'],
			),
			$this->views['flash3'],
			'ubah' . $code
		);

		$data = array(
			$this->aliases['tabel_f4_field2'] => $this->v_post['tabel_f4_field2'],
			$this->aliases['tabel_f4_field3'] => $this->v_post['tabel_f4_field3'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_f4->update_f4($data, $code);
		$this->insert_history('tabel_f4', $data);

		$notif = $this->handle_4c($aksi, 'tabel_f4', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
	
	//Soft Delete Data
	public function soft_delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_f4->get_f4_by_field('tabel_f4_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_f4->update_f4($data, $code);
		$this->insert_history('tabel_f4', $data);

		$notif = $this->handle_4e($aksi, 'tabel_f4', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Soft Delete data
	public function restore($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_f4->get_f4_by_field_archive('tabel_f4_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => NULL,
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_f4->update_f4($data, $code);
		$this->insert_history('tabel_f4', $data);

		$notif = $this->handle_4e($aksi, 'tabel_f4', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($code = null)
	{
		$this->declarew();
		$this->session_4();

		$tabel = $this->tl_f4->get_f4_by_field_archive('tabel_f4_field1', $code)->result();
		$this->check_data($tabel);

		$aksi = $this->tl_f4->delete_f4_by_field('tabel_f4_field1', $code);

		$notif = $this->handle_4e($aksi, 'tabel_f4', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => $this->title['tabel_f4_alias_v9'],
			'konten' => $this->v9['tabel_f4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f4']),
			'tbl_f4' => $this->tl_f4->get_all_f4_archive(),
		);

		$this->load_page('tabel_f4', 'layouts/template', $data1);
	}
	
	public function detai_archive($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_f4->get_f4_by_field('tabel_f4_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => $this->title['tabel_f4_alias_v10'],
			'konten' => $this->v10['tabel_f4'],
			'dekor' => $this->tl_f4->dekor($this->theme_id, $this->aliases['tabel_f4']),
			'tbl_f4' => $this->tl_f4->get_f4_by_field_archive('tabel_f4_field1', $code),
		);

		$this->load_page('tabel_f4', 'layouts/template', $data1);
	}
	
	public function history($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_f4->get_f4_by_field('tabel_f4_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'table_id' => $code,
			'title' => $this->title['tabel_f4_alias_v11'],
			'konten' => $this->v11['tabel_f4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f4']),
			'tbl_f4' => $this->tl_ot->get_by_field_history('tabel_f4', 'tabel_f4_field1', $code),
			'current' => $this->tl_ot->get_by_field('tabel_f4', 'tabel_f4_field1', $code),
		);

		$this->load_page('tabel_f4', 'layouts/template_admin', $data1);
	}

	//Push History Data into current data
	public function push($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_ot->get_by_id_history('tabel_f4', $code)->result();
		$this->check_data($tabel);

		$code = $tabel[0]->id;

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_f4_field2'] => $tabel[0]->{$this->aliases['tabel_f4_field2']},

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_f4->update_f4($data, $code);

		$notif = $this->handle_4c($aksi, 'tabel_f4', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
}

