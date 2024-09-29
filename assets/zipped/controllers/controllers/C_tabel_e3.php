<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_e3 extends Omnitags
{
	// Pages
	// Public Pages


	// Account Only Pages


	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_e3_alias_v3_title'),
			'konten' => $this->v3['tabel_e3'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e3']),
			'tbl_e3' => $this->tl_e3->get_all_e3(),
			'tbl_c1' => $this->tl_c1->get_all_c1(),
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
			'title' => lang('tabel_e3_alias_v4_title'),
			'konten' => $this->v4['tabel_e3'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e3']),
			'tbl_e3' => $this->tl_e3->get_all_e3(),
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

		validate_all(
			array(
				$this->v_post['tabel_e3_field2'],
				$this->v_post['tabel_e3_field3'],
				$this->v_post['tabel_e3_field4'],
			),
			$this->views['flash2'],
			'tambah'
		);

		// $id = get_next_code($this->aliases['tabel_e1'], $this->aliases['tabel_e1_field1'], 'FK');
		// $this->aliases['tabel_e1_field1'] => $id,

		$data = array(
			$this->aliases['tabel_e3_field1'] => '',
			$this->aliases['tabel_e3_field2'] => $this->v_post['tabel_e3_field2'],
			$this->aliases['tabel_e3_field3'] => $this->v_post['tabel_e3_field3'],
			$this->aliases['tabel_e3_field4'] => $this->v_post['tabel_e3_field4'],
		);

		$aksi = $this->tl_e3->insert_e3($data);

		$notif = $this->handle_4b($aksi, 'tabel_e3');

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Update data
	public function update()
	{
		$this->declarew();
		$this->session_3();

		$tabel_e3_field1 = $this->v_post['tabel_e3_field1'];

		$tabel = $this->tl_e3->get_e3_by_e3_field1($tabel_e3_field1)->result();
		$this->check_data($tabel);

		validate_all(
			array(
				$this->v_post['tabel_e3_field1'],
				$this->v_post['tabel_e3_field2'],
				$this->v_post['tabel_e3_field3'],
				$this->v_post['tabel_e3_field4'],
			),
			$this->views['flash3'],
			'ubah' . $tabel_e3_field1
		);

		$data = array(
			$this->aliases['tabel_e3_field2'] => $this->v_post['tabel_e3_field2'],
			$this->aliases['tabel_e3_field3'] => $this->v_post['tabel_e3_field3'],
			$this->aliases['tabel_e3_field4'] => $this->v_post['tabel_e3_field4'],
		);

		$aksi = $this->tl_e3->update_e3($data, $tabel_e3_field1);

		$notif = $this->handle_4c($aksi, 'tabel_e3', $tabel_e3_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($tabel_e3_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_e3->get_e3_by_e3_field1($tabel_e3_field1)->result();
		$this->check_data($tabel);

		$aksi = $this->tl_e3->delete_e3($tabel_e3_field1);

		$notif = $this->handle_4e($aksi, 'tabel_e3', $tabel_e3_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}
}
