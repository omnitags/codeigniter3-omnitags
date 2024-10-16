<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'OmnitagsController.php';

class Tabel_e1Controller extends OmnitagsController
{
	// Account Only Pages / 帐户特定页面


	// Admin Pages / 管理页面
	public function admin()
	{
		$this->declarew();
		$this->page_session_3();

		$param1 = $this->v_get['tabel_e1_field5'];

		$filter = $this->tl_e1->get_e1_by_field('tabel_e1_field5', $param1);

		if (empty($param1)) {
			$result = $this->tl_e1->get_all_e1();
		} else {
			$result = $filter;
		}

		$data1 = array(
			'title' => $this->title['tabel_e1_alias_v3'],
			'konten' => $this->v3['tabel_e1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e1']),
			'tbl_e1' => $result,
			'tbl_e4' => $this->tl_e4->get_all_e4(),
			'tabel_e1_field5_value' => $param1
		);

		$this->load_page('tabel_e1', 'layouts/template_admin', $data1);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => $this->title['tabel_e1_alias_v4'],
			'konten' => $this->v4['tabel_e1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e1']),
			'tbl_e1' => $this->tl_e1->get_all_e1(),
		);

		$this->load_page('tabel_e1', 'layouts/printpage', $data1);
	}

	function tambah()
	{
		// Functional requirement: Declare necessary configurations
		$this->declarew();
		$this->session_3();

		validate_all(
			array(
				$this->v_post['tabel_e1_field2'],
				$this->v_post['tabel_e1_field3'],
				$this->v_post['tabel_e1_field4'],
				$this->v_post['tabel_e1_field5'],
			),
			$this->views['flash2'],
			'tambah'
		);

		$code = $this->add_code('tabel_e1', 'id', 5, '01');

		// Functional requirement: Construct data array from validated view inputs
		$data = array(
			'id' => $code,
			$this->aliases['tabel_e1_field2'] => $this->v_post['tabel_e1_field2'],
			$this->aliases['tabel_e1_field3'] => $this->v_post['tabel_e1_field3'],
			$this->aliases['tabel_e1_field4'] => $this->v_post['tabel_e1_field4'],
			$this->aliases['tabel_e1_field5'] => $this->v_post['tabel_e1_field5'],

			'created_at' => date("Y-m-d\TH:i:s"),
			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_e1->insert_e1($data);
		$this->insert_history('tabel_e1', $data);

		$notif = $this->handle_4b($aksi, 'tabel_e1');

		// Functional requirement: Redirect user to 'tabel_e1' page
		redirect($_SERVER['HTTP_REFERER']);
	}



	// Update data
	public function update()
	{
		// Functional requirement: Declare necessary configurations
		$this->declarew();
		$this->session_3();

		$code = $this->v_post['tabel_e1_field1'];

		$tabel_e1 = $this->tl_e1->get_e1_by_field('tabel_e1_field1', $code)->result();
		$this->check_data($tabel_e1);

		validate_all(
			array(
				$this->v_post['tabel_e1_field1'],
				$this->v_post['tabel_e1_field2'],
				$this->v_post['tabel_e1_field3'],
				$this->v_post['tabel_e1_field4'],
				$this->v_post['tabel_e1_field5'],
			),
			$this->views['flash3'],
			'ubah' . $code
		);

		// Functional requirement: Construct data array from validated view inputs
		$data = array(
			$this->aliases['tabel_e1_field2'] => $this->v_post['tabel_e1_field2'],
			$this->aliases['tabel_e1_field3'] => $this->v_post['tabel_e1_field3'],
			$this->aliases['tabel_e1_field4'] => $this->v_post['tabel_e1_field4'],
			$this->aliases['tabel_e1_field5'] => $this->v_post['tabel_e1_field5'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_e1->update_e1($data, $code);
		$this->insert_history('tabel_e1', $data);

		$notif = $this->handle_4c($aksi, 'tabel_e1', $code);

		// Functional requirement: Redirect user to 'tabel_e1' page
		redirect($_SERVER['HTTP_REFERER']);



	}
	
	//Soft Delete Data
	public function soft_delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_e1->get_e1_by_field('tabel_e1_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_e1->update_e1($data, $code);
		$this->insert_history('tabel_e1', $data);

		$notif = $this->handle_4e($aksi, 'tabel_e1', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Soft Delete data
	public function restore($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_e1->get_e1_by_field_archive('tabel_e1_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => NULL,
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_e1->update_e1($data, $code);
		$this->insert_history('tabel_e1', $data);

		$notif = $this->handle_4e($aksi, 'tabel_e1', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}


	// Delete data
	public function delete($code = null)
	{
		// Functional requirement: Declare necessary configurations
		$this->declarew();
		$this->session_3();

		$tabel_e1 = $this->tl_e1->get_e1_by_field_archive('tabel_e1_field1', $code)->result();
		$this->check_data($tabel_e1);

		// Define the folder and file paths
		$folder_name = $tabel_e1[0]->{$this->aliases['tabel_e1_field2']};
		$img = $tabel_e1[0]->{$this->aliases['tabel_e1_field4']};

		$file_path = $this->v_upload_path['tabel_e1'] . '/' . $folder_name . '/' . $img;

		// Delete the image file if it exists
		if (file_exists($file_path)) {
			unlink($file_path);
		}

		try {
			// Functional requirement: Delete data from the database
			$aksi = $this->tl_e1->delete_e1_by_field('tabel_e1_field1', $code);

			$notif = $this->handle_4e($aksi, 'tabel_e1', $code);

		} catch (Exception $e) {
			// Error Handling: Handle database operation errors
			set_flashdata($this->views['flash1'], "Error occurred while processing data: " . $e->getMessage());
			set_flashdata('toast', $this->views['flash1_func1']);
		}

		// Functional requirement: Redirect user to 'tabel_e1' page
		redirect($_SERVER['HTTP_REFERER']);



	}

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => $this->title['tabel_e1_alias_v9'],
			'konten' => $this->v9['tabel_e1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e1']),
			'tbl_e1' => $this->tl_e1->get_all_e1_archive(),
		);

		$this->load_page('tabel_e1', 'layouts/template', $data1);
	}
	
	public function detai_archive($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_e1->get_e1_by_field('tabel_e1_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => $this->title['tabel_e1_alias_v10'],
			'konten' => $this->v10['tabel_e1'],
			'dekor' => $this->tl_e1->dekor($this->theme_id, $this->aliases['tabel_e1']),
			'tbl_e1' => $this->tl_e1->get_e1_by_field_archive('tabel_e1_field1', $code),
		);

		$this->load_page('tabel_e1', 'layouts/template', $data1);
	}
	
	public function history($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_e1->get_e1_by_field('tabel_e1_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'table_id' => $code,
			'title' => $this->title['tabel_e1_alias_v11'],
			'konten' => $this->v11['tabel_e1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e1']),
			'tbl_e1' => $this->tl_ot->get_by_field_history('tabel_e1', 'tabel_e1_field1', $code),
			'current' => $this->tl_ot->get_by_field('tabel_e1', 'tabel_e1_field1', $code),
		);

		$this->load_page('tabel_e1', 'layouts/template_admin', $data1);
	}

	//Push History Data into current data
	public function push($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_ot->get_by_id_history('tabel_e1', $code)->result();
		$this->check_data($tabel);

		$code = $tabel[0]->id;

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_e1_field2'] => $tabel[0]->{$this->aliases['tabel_e1_field2']},

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_e1->update_e1($data, $code);

		$notif = $this->handle_4c($aksi, 'tabel_e1', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}
}

