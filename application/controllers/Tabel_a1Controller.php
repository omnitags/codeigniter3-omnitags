<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'OmnitagsController.php';

class Tabel_a1Controller extends OmnitagsController
{
	// Pages
	// Public Pages

	//Admin page and functions
	public function admin()
	{
		// Call to declarew method
		$this->declarew();
		// Call to page_session_3 method
		$this->page_session_3();

		$data1 = array(
			'title' => 'Testing Page',
			'konten' => 'contents/tabel_a1/testing',
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_a1']),
		);

		$this->load_page('tabel_a1', 'layouts/template_admin', $data1);
	}

	// Page for 1 data
	public function profil()
	{
		// Cache control headers
		header("Cache-Control: no-cache, must-revalidate"); // HTTP 1.1.
		header("Pragma: no-cache"); // HTTP 1.0.
		header("Expires: 0"); // Proxies.

		// Call to declarew method
		$this->declarew();
		// Call to page_session_3 method
		$this->page_session_3();

		$data1 = array(
			'title' => $this->title['tabel_a1_alias_v6'],
			'konten' => $this->v6['tabel_a1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_a1']),
			'tbl_a1_alt' => $this->tl_ot->get_by_field('tabel_a1', 'tabel_a1_field1', $this->tabel_a1_field1),
			'tbl_b7' => $this->tl_b7->get_all_b7(),
		);

		$this->load_page('tabel_a1', 'layouts/template_admin', $data1);
	}

	// Functions
	// Update data
	public function update()
	{
		// Call to declarew method
		$this->declarew();
		// Call to session_3 method
		$this->session_3();

		$code = $this->v_post['tabel_a1_field1'];

		// Validate fields
		validate_all(
			array(
				$this->v_post['tabel_a1_field1'],
				$this->v_post['tabel_a1_field2'],
				$this->v_post['tabel_a1_field3'],
				$this->v_post['tabel_a1_field4'],
				$this->v_post['tabel_a1_field5'],
			),
			$this->views['flash3'],
			'ubah' . $code
		);

		$data = array(
			$this->aliases['tabel_a1_field2'] => $this->v_post['tabel_a1_field2'],
			$this->aliases['tabel_a1_field3'] => $this->v_post['tabel_a1_field3'],
			$this->aliases['tabel_a1_field4'] => $this->v_post['tabel_a1_field4'],
			$this->aliases['tabel_a1_field5'] => $this->v_post['tabel_a1_field5'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_a1->update_a1($data, $code);
		$this->insert_history('tabel_a1', $data);

		$notif = $this->handle_4c($aksi, 'tabel_a1', $code);

		// Redirect to previous page
		redirect($_SERVER['HTTP_REFERER']);
	}

	// Update Theme ID
	public function update_id_theme()
	{
		// Call to declarew method
		$this->declarew();
		// Call to session_3 method
		$this->session_3();

		$code = $this->v_post['tabel_a1_field1'];

		// Validate fields
		validate_all(
			array(
				$this->v_post['tabel_a1_field1'],
				$this->v_post['tabel_a1_field6'],
			),
			$this->views['flash3'],
			'tema' . $code
		);

		$data = array(
			$this->aliases['tabel_a1_field6'] => $this->v_post['tabel_a1_field6'],

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_a1->update_a1($data, $code);
		$this->insert_history('tabel_a1', $data);

		$notif = $this->handle_4d($aksi, 'tabel_b7', $code);

		 // Redirect to previous page
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function history($code = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_a1->get_a1_by_field('tabel_a1_field1', $code)->result();
		$this->check_data($tabel);

		$data1 = array(
			'table_id' => $code,
			'title' => $this->title['tabel_a1_alias_v11'],
			'konten' => $this->v11['tabel_a1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_a1']),
			'tbl_a1_alt' => $this->tl_ot->get_by_field_history('tabel_a1', 'tabel_a1_field1', $code),
			'current' => $this->tl_ot->get_by_field('tabel_a1', 'tabel_a1_field1', $code),
		);

		$this->load_page('tabel_a1', 'layouts/template_admin', $data1);
	}

	//Push History Data into current data
	public function push($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_ot->get_by_id_history('tabel_a1', $code)->result();
		$this->check_data($tabel);

		$code = $tabel[0]->id;

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_a1_field2'] => $tabel[0]->{$this->aliases['tabel_a1_field2']},

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata('id'),
		);

		$aksi = $this->tl_a1->update_a1($data, $code);

		$notif = $this->handle_4c($aksi, 'tabel_a1', $code);

		redirect($_SERVER['HTTP_REFERER']);
	}

}
