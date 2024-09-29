<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_e1 extends Omnitags
{
	// Account Only Pages


	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_3();

		$param1 = $this->v_get['tabel_e1_field2'];

		$filter = $this->tl_e1->filter($param1);

		if (empty($param1)) {
			$result = $this->tl_e1->get_all_e1();
		} else {
			$result = $filter;
		}

		$data1 = array(
			'title' => lang('tabel_e1_alias_v3_title'),
			'konten' => $this->v3['tabel_e1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e1']),
			'tbl_e1' => $result,
			'tbl_e4' => $this->tl_e4->get_all_e4(),
			'tabel_e1_field2_value' => $param1
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
			'title' => lang('tabel_e1_alias_v4_title'),
			'konten' => $this->v4['tabel_e1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e1']),
			'tbl_e1' => $this->tl_e1->get_all_e1(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/printpage', $data);
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
			),
			$this->views['flash2'],
			'tambah'
		);

		// Functional requirement: Construct data array from validated view inputs
		$data = array(
			$this->aliases['tabel_e1_field1'] => '',
			$this->aliases['tabel_e1_field2'] => $this->v_post['tabel_e1_field2'],
			$this->aliases['tabel_e1_field3'] => $this->v_post['tabel_e1_field3'],
			$this->aliases['tabel_e1_field4'] => $this->v_post['tabel_e1_field4'],
		);

		$aksi = $this->tl_e1->insert_e1($data);

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

		$tabel_e1_field1 = $this->v_post['tabel_e1_field1'];

		$tabel_e1 = $this->tl_e1->get_e1_by_e1_field1($tabel_e1_field1)->result();
		$this->check_data($tabel_e1);

		validate_all(
			array(
				$this->v_post['tabel_e1_field1'],
				$this->v_post['tabel_e1_field2'],
				$this->v_post['tabel_e1_field3'],
				$this->v_post['tabel_e1_field4'],
			),
			$this->views['flash3'],
			'ubah' . $tabel_e1_field1
		);

		// Functional requirement: Construct data array from validated view inputs
		$data = array(
			$this->aliases['tabel_e1_field2'] => $this->v_post['tabel_e1_field2'],
			$this->aliases['tabel_e1_field3'] => $this->v_post['tabel_e1_field3'],
			$this->aliases['tabel_e1_field4'] => $this->v_post['tabel_e1_field4'],
		);

		$aksi = $this->tl_e1->update_e1($data, $tabel_e1_field1);

		$notif = $this->handle_4c($aksi, 'tabel_e1', $tabel_e1_field1);

		// Functional requirement: Redirect user to 'tabel_e1' page
		redirect($_SERVER['HTTP_REFERER']);



	}



	// Delete data
	public function delete($tabel_e1_field1 = null)
	{
		// Functional requirement: Declare necessary configurations
		$this->declarew();
		$this->session_3();

		$tabel_e1 = $this->tl_e1->get_e1_by_e1_field1($tabel_e1_field1)->result();
		$this->check_data($tabel_e1);

		try {
			// Functional requirement: Delete data from the database
			$aksi = $this->tl_e1->delete_e1($tabel_e1_field1);

			$notif = $this->handle_4e($aksi, 'tabel_e1', $tabel_e1_field1);

		} catch (Exception $e) {
			// Error Handling: Handle database operation errors
			set_flashdata($this->views['flash1'], "Error occurred while processing data: " . $e->getMessage());
			set_flashdata('toast', $this->views['flash1_func1']);
		}

		// Functional requirement: Redirect user to 'tabel_e1' page
		redirect($_SERVER['HTTP_REFERER']);



	}
}
