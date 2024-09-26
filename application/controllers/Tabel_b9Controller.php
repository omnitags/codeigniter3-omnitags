<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'OmnitagsController.php';

class Tabel_b9Controller extends OmnitagsController
{
	// Pages
	// Public Pages
	public function detail($code = NULL)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel_b9 = $this->tl_b9->get_b9_by_field(['tabel_b9_field1', 'tabel_b9_field2'], [$code, userdata($this->aliases['tabel_c2_field1'])])->result();

		if ($tabel_b9) {
			$tabel_b9_field2 = userdata($this->aliases['tabel_c2_field1']);

			// menggunakan nama khusus sama dengan konfigurasi
			$notif = array(
				'read_at' => date("Y-m-d\TH:i:s"),
			);

			$aksi = $this->tl_b9->update_satu($notif, $code, $tabel_b9_field2);

			if ($aksi) {
				$data1 = array(
					'title' => lang('tabel_b9_alias_v8_title'),
					'konten' => $this->v8['tabel_b9'],
					'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b9']),
					'tbl_b9' => $this->tl_b9->get_b9_by_field('tabel_b9_field1', $code),
				);


				if (get('refresh') !== 'true') {
					// Redirect to the same method with a refresh parameter
					$this->load_page('tabel_b9', '_layouts/template', $data1);
					redirect(current_url() . '?refresh=true');
				} else {
					$this->load_page('tabel_b9', '_layouts/template', $data1);
				}

			} else {
				redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			redirect(site_url($this->views['language'] . '/no_level'));
		}
	}

	// Account Only Pages
	public function daftar()
	{
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value2'],
			$this->aliases['tabel_c2_field6_value3'],
			$this->aliases['tabel_c2_field6_value4'],
			$this->aliases['tabel_c2_field6_value5']
		];
		$this->page_session_check($allowed_values);

		$tabel_b9_field2 = userdata($this->aliases['tabel_c2_field1']);

		$data1 = array(
			'title' => lang('tabel_b9_alias_v2_title'),
			'konten' => $this->v2['tabel_b9'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b9']),
			'tbl_b9' => $this->tl_b9->get_b9_with_b8_by_b9_field2($tabel_b9_field2),
		);

		$this->load_page('tabel_b9', '_layouts/template', $data1);
	}

	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_b9_alias_v3_title'),
			'konten' => $this->v3['tabel_b9'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b9']),
			'tbl_b9' => $this->tl_b9->get_all_b9(),
		);

		$this->load_page('tabel_b9', '_layouts/template', $data1);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_b9_alias_v4_title'),
			'konten' => $this->v4['tabel_b9'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b9']),
			'tbl_b9' => $this->tl_b9->get_all_b9(),
		);

		$this->load_page('tabel_b9', '_layouts/printpage', $data1);
	}

	// Print one data

	// Functions
	// Read the notification
	public function lihat($code = NULL)
	{
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value2'],
			$this->aliases['tabel_c2_field6_value3'],
			$this->aliases['tabel_c2_field6_value4'],
			$this->aliases['tabel_c2_field6_value5']
		];
		$this->session_check($allowed_values);

		$tabel_b9 = $this->tl_b9->get_b9_by_field(['tabel_b9_field1', 'tabel_b9_field2'], [$code, userdata($this->aliases['tabel_c2_field1'])])->result();

		if ($tabel_b9) {

			$tabel_b9_field2 = userdata($this->aliases['tabel_c2_field1']);

			// menggunakan nama khusus sama dengan konfigurasi
			$notif = array(
				'read_at' => date("Y-m-d\TH:i:s"),
			);

			$aksi = $this->tl_b9->update_satu($notif, $code, $tabel_b9_field2);
			redirect($_SERVER['HTTP_REFERER']);

		} else {
			redirect(site_url($this->views['language'] . '/invalid'));
		}
	}

	// Add data
	public function tambah()
	{
		$this->declarew();
		$this->session_3();

		// $id = get_next_code($this->aliases['tabel_e1'], $this->aliases['tabel_e1_field1'], 'FK');
		// $this->aliases['tabel_e1_field1'] => $id,

		$data = array(
			$this->aliases['tabel_b9_field1'] => '',
			$this->aliases['tabel_b9_field2'] => $this->v_post['tabel_b9_field2'],

			'created_at' => date("Y-m-d\TH:i:s"),
			'read_at' => date("Y-m-d\TH:i:s"),
		);

		$aksi = $this->tl_b9->insert_b9($data);
		$this->insert_history('tabel_b9', $data);

		$notif = $this->handle_4b($aksi, 'tabel_b9');

		redirect($_SERVER['HTTP_REFERER']);
	}


	// Update data
	public function update()
	{
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value2'],
			$this->aliases['tabel_c2_field6_value3'],
			$this->aliases['tabel_c2_field6_value4'],
			$this->aliases['tabel_c2_field6_value5']
		];
		$this->session_check($allowed_values);

		$tabel_b9_field2 = userdata($this->aliases['tabel_c2_field1']);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'read_at' => date("Y-m-d\TH:i:s"),
		);

		$aksi = $this->tl_b9->update_null($data, $tabel_b9_field2);

		redirect($_SERVER['HTTP_REFERER']);
	}

	//Soft Delete Data
	public function soft_delete($code = null)
	{
		$this->declarew();
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value2'],
			$this->aliases['tabel_c2_field6_value3'],
			$this->aliases['tabel_c2_field6_value4'],
			$this->aliases['tabel_c2_field6_value5']
		];

		$tabel = $this->tl_b9->get_b9_by_field('tabel_b9_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_b9->update_b9($data, $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	//Push History Data into current data
	public function push($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_ot->get_by_id_history('tabel_b9', $code)->result();
		$this->check_data($tabel);

		$code = $tabel[0]->{$this->aliases['tabel_b9_field1']};

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_b9_field2'] => $tabel[0]->{$this->aliases['tabel_b9_field2']},

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_b9->update_b9($data, $code);

		$notif = $this->handle_4c($aksi, 'tabel_b9', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Soft Delete data
	public function restore($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_b9->get_b9_by_field_archive('tabel_b9_field1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'deleted_at' => NULL,
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_b9->update_b9($data, $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_b9->get_b9_by_field_archive('tabel_b9_field1', $code);
		$this->check_data($tabel);
		$aksi = $this->tl_b9->delete_b9_by_field('tabel_b9_field1', $code);

		$notif = $this->handle_4e($aksi, 'tabel_b9', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_b9_alias_v9_title'),
			'konten' => $this->v9['tabel_b9'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b9']),
			'tbl_b9' => $this->tl_b9->get_all_b9_archive(),
		);

		$this->load_page('tabel_b9', '_layouts/template', $data1);
	}

	// Public Pages
	public function detail_archive($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_b9->get_b9_by_field('tabel_b9_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => lang('tabel_b9_alias_v10_title'),
			'konten' => $this->v10['tabel_b9'],
			'dekor' => $this->tl_b9->dekor($this->theme_id, $this->aliases['tabel_b9']),
			'tbl_b9' => $this->tl_b9->get_b9_by_field_archive('tabel_b9_field1', $code),
		);

		$this->load_page('tabel_b9', '_layouts/template', $data1);
	}

	public function history($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_b9->get_b9_by_field('tabel_b9_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'table_id' => $code,
			'title' => lang('tabel_b9_alias_v11_title'),
			'konten' => $this->v11['tabel_b9'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b9']),
			'tbl_b9' => $this->tl_ot->get_by_field_history('tabel_b9', 'tabel_b9_field1', $code),
			'current' => $this->tl_ot->get_by_field('tabel_b9', 'tabel_b9_field1', $code),
		);

		$this->load_page('tabel_b9', '_layouts/template', $data1);
	}
}
