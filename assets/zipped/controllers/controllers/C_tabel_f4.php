<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_f4 extends Omnitags
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
			'title' => lang('tabel_f4_alias_v3_title'),
			'konten' => $this->v3['tabel_f4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f4']),
			'tbl_f4' => $this->tl_f4->get_all_f4(),
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
		$this->page_session_4();

		$data1 = array(
			'title' => lang('tabel_f4_alias_v4_title'),
			'konten' => $this->v4['tabel_f4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f4']),
			'tbl_f4' => $this->tl_f4->get_all_f4(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
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

		// $id = get_next_code($this->aliases['tabel_e1'], $this->aliases['tabel_e1_field1'], 'FK');
		// $this->aliases['tabel_e1_field1'] => $id,

		$data = array(
			$this->aliases['tabel_f4_field1'] => '',
			$this->aliases['tabel_f4_field2'] => $tabel_f4_field2,
			$this->aliases['tabel_f4_field3'] => $this->v_post['tabel_f4_field3'],
			$this->aliases['tabel_f4_field4'] => $this->v_post['tabel_f4_field4'],
			$this->aliases['tabel_f4_field5'] => $this->v_post['tabel_f4_field5'],
			$this->aliases['tabel_f4_field6'] => $this->v_post['tabel_f4_field6'],
			$this->aliases['tabel_f4_field7'] => $tabel_f4_field7,
		);

		$data2 = array(
			$this->aliases['tabel_e3_field4'] => $this->v_post['tabel_e3_field4'],
		);
		$update_status = $this->tl_e3->update_e3($data2, $tabel_f4_field2);

		$aksi = $this->tl_f4->insert_f4($data);

		$notif = $this->handle_4b($aksi, 'tabel_f4');

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Update data
	public function update() //update tidak diperlukan di sini
	{
		$this->declarew();
		$this->session_4();

		$tabel_f4_field1 = $this->v_post['tabel_f4_field1'];

		$tabel = $this->tl_f4->get_f4_by_f4_field1($tabel_f4_field1)->result();
		$this->check_data($tabel);

		validate_all(
			array(
				$this->v_post['tabel_f4_field1'],
				$this->v_post['tabel_f4_field2'],
				$this->v_post['tabel_f4_field3'],
			),
			$this->views['flash3'],
			'ubah' . $tabel_f4_field1
		);

		$data = array(
			$this->aliases['tabel_f4_field2'] => $this->v_post['tabel_f4_field2'],
			$this->aliases['tabel_f4_field3'] => $this->v_post['tabel_f4_field3'],
		);

		$aksi = $this->tl_f4->update_f4($data, $tabel_f4_field1);

		$notif = $this->handle_4c($aksi, 'tabel_f4', $tabel_f4_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($tabel_f4_field1 = null)
	{
		$this->declarew();
		$this->session_4();

		$tabel = $this->tl_f4->get_f4_by_f4_field1($tabel_f4_field1)->result();
		$this->check_data($tabel);

		$aksi = $this->tl_f4->delete_f4($tabel_f4_field1);

		$notif = $this->handle_4e($aksi, 'tabel_f4', $tabel_f4_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

}
