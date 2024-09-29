<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_b9 extends Omnitags
{
	// Pages
	// Public Pages
	public function detail($tabel_b9_field1 = NULL)
	{
		$this->declarew();
		$allowed_values = [
                $this->aliases['tabel_c2_field6_value2'],
                $this->aliases['tabel_c2_field6_value3'],
                $this->aliases['tabel_c2_field6_value4'],
                $this->aliases['tabel_c2_field6_value5']
            ];
            $this->page_session_check($allowed_values);

		$tabel_b9 = $this->tl_b9->get_b9_by_b9_field1_by_b9_field2($tabel_b9_field1, userdata($this->aliases['tabel_c2_field1']))->result();

		if ($tabel_b9) {
			$tabel_b9_field2 = userdata($this->aliases['tabel_c2_field1']);

			// menggunakan nama khusus sama dengan konfigurasi
			$notif = array(
				$this->aliases['tabel_b9_field6'] => date("Y-m-d\TH:i:s"),
			);

			$aksi = $this->tl_b9->update_satu($notif, $tabel_b9_field1, $tabel_b9_field2);

			if ($aksi) {
				$data1 = array(
					'title' => lang('tabel_b9_alias_v8_title'),
					'konten' => $this->v8['tabel_b9'],
					'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b9']),
					'tbl_b9' => $this->tl_b9->get_b9_by_b9_field1($tabel_b9_field1),
				);

				$data = array_merge($data1, $this->package);

				if (get('refresh') !== 'true') {
					// Redirect to the same method with a refresh parameter
					load_view_data('_layouts/template', $data);
					redirect(current_url() . '?refresh=true');
				} else {
					load_view_data('_layouts/template', $data);
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

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
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
			'title' => lang('tabel_b9_alias_v4_title'),
			'konten' => $this->v4['tabel_b9'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b9']),
			'tbl_b9' => $this->tl_b9->get_all_b9(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/printpage', $data);
	}

	// Print one data

	// Functions
	// Read the notification
	public function lihat($tabel_b9_field1 = NULL)
	{
		$this->declarew();
		$allowed_values = [
                $this->aliases['tabel_c2_field6_value2'],
                $this->aliases['tabel_c2_field6_value3'],
                $this->aliases['tabel_c2_field6_value4'],
                $this->aliases['tabel_c2_field6_value5']
            ];
            $this->session_check($allowed_values);

		$tabel_b9 = $this->tl_b9->get_b9_by_b9_field1_by_b9_field2($tabel_b9_field1, userdata($this->aliases['tabel_c2_field1']))->result();

		if ($tabel_b9) {

			$tabel_b9_field2 = userdata($this->aliases['tabel_c2_field1']);

			// menggunakan nama khusus sama dengan konfigurasi
			$notif = array(
				$this->aliases['tabel_b9_field6'] => date("Y-m-d\TH:i:s"),
			);

			$aksi = $this->tl_b9->update_satu($notif, $tabel_b9_field1, $tabel_b9_field2);
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
			$this->aliases['tabel_b9_field6'] => htmlspecialchars($this->v_post['tabel_b9_field6']),
		);

		$aksi = $this->tl_b9->insert_b9($data);

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
			$this->aliases['tabel_b9_field6'] => date("Y-m-d\TH:i:s"),
		);

		$aksi = $this->tl_b9->update_null($data, $tabel_b9_field2);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($tabel_b9_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_b9->get_b1_by_b1_field1($tabel_b9_field1);
		$this->check_data($tabel);
		$aksi = $this->tl_b9->delete_b9($tabel_b9_field1);

		$notif = $this->handle_4e($aksi, 'tabel_b9', $tabel_b9_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}
}
