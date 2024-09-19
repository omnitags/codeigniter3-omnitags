<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_c3 extends Omnitags
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
			'title' => lang('tabel_c3_alias_v3_title'),
			'konten' => $this->v3['tabel_c3'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c3']),
			'tbl_c3' => $this->tl_c3->get_all_c3(),
			'tbl_c1' => $this->tl_c1->get_all_c1(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		$this->track_page();
		load_view_data('_layouts/template', $data);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_4();

		$data1 = array(
			'title' => lang('tabel_c3_alias_v4_title'),
			'konten' => $this->v4['tabel_c3'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_c3']),
			'tbl_c3' => $this->tl_c3->get_all_c3(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		$this->track_page();
		load_view_data('_layouts/printpage', $data);
	}

	// Functions
	// Add data
	public function tambah()
	{
		$this->declarew();
		$this->session_4();

		validate_all(
			array(
				$this->v_post['tabel_c3_field2'],
				$this->v_post['tabel_c3_field3'],
				$this->v_post['tabel_c3_field4'],
				$this->v_post['tabel_c3_field5'],
			),
			$this->views['flash2'],
			''
		);

		// seharusnya fitur ini menggunakan trigger cman saya tidak bisa melakukannya
		$tabel_c3_field7 = date("Y-m-d") . " " . date("h:m:s", time());

		$tabel_c3_field2 = $this->v_post['tabel_c3_field2'];

		// $id = get_next_code($this->aliases['tabel_e1'], $this->aliases['tabel_e1_field1'], 'FK');
		// $this->aliases['tabel_e1_field1'] => $id,

		$data = array(
			$this->aliases['tabel_c3_field1'] => '',
			$this->aliases['tabel_c3_field2'] => $tabel_c3_field2,
			$this->aliases['tabel_c3_field3'] => $this->v_post['tabel_c3_field3'],
			$this->aliases['tabel_c3_field4'] => $this->v_post['tabel_c3_field4'],
			$this->aliases['tabel_c3_field5'] => $this->v_post['tabel_c3_field5'],
			$this->aliases['tabel_c3_field6'] => $this->v_post['tabel_c3_field6'],
			$this->aliases['tabel_c3_field7'] => $tabel_c3_field7,

			$this->aliases['created_at'] => date("Y-m-d\TH:i:s"),
			$this->aliases['updated_at'] => date("Y-m-d\TH:i:s"),
		);

		$data2 = array(
			$this->aliases['tabel_e3_field4'] => $this->v_post['tabel_e3_field4'],
		);
		$update_status = $this->tl_e3->update_e3($data2, $tabel_c3_field2);

		$aksi = $this->tl_c3->insert_c3($data);

		$notif = $this->handle_4b($aksi, 'tabel_c3');

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Update data
	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();
		$this->session_4();

		$tabel_c3_field1 = $this->v_post['tabel_c3_field1'];

		$tabel = $this->tl_c3->get_c3_by_field('tabel_c3_field1', $tabel_c3_field1)->result();
		$this->check_data($tabel);

		validate_all(
			array(
				$this->v_post['tabel_c3_field1'],
				$this->v_post['tabel_c3_field2'],
				$this->v_post['tabel_c3_field3'],
			),
			$this->views['flash3'],
			'ubah' . $tabel_c3_field1
		);

		$data = array(
			$this->aliases['tabel_c3_field2'] => $this->v_post['tabel_c3_field2'],
			$this->aliases['tabel_c3_field3'] => $this->v_post['tabel_c3_field3'],

			$this->aliases['updated_at'] => date("Y-m-d\TH:i:s"),
		);

		$aksi = $this->tl_c3->update_c3($data, $tabel_c3_field1);

		$notif = $this->handle_4c($aksi, 'tabel_c3', $tabel_c3_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($tabel_c3_field1 = null)
	{
		$this->declarew();
		$this->session_4();

		$tabel = $this->tl_c3->get_c3_by_field('tabel_c3_field1', $tabel_c3_field1)->result();
		$this->check_data($tabel);

		$aksi = $this->tl_c3->delete_c3_by_field('tabel_c3_field1', $tabel_c3_field1);

		$notif = $this->handle_4e($aksi, 'tabel_c3', $tabel_c3_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

}
