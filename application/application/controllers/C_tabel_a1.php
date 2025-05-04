<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_a1 extends Omnitags
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
			'konten' => '_contents/tabel_a1/testing',
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_a1']),
		);

		$data = array_merge($data1, $this->package);

		// Set previous URL in session
		set_userdata('previous_url', current_url());
		// Load view data with template
		load_view_data('_layouts/template', $data);
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
			'title' => lang('tabel_a1_alias_v6_title'),
			'konten' => $this->v6['tabel_a1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_a1']),
			'tbl_b7' => $this->tl_b7->get_all_b7(),
		);

		$data = array_merge($data1, $this->package);

		// Set previous URL in session
		set_userdata('previous_url', current_url());
		// Load view data with template
		load_view_data('_layouts/template', $data);
	}

	// Functions
	// Update data
	public function update()
	{
		// Call to declarew method
		$this->declarew();
		// Call to session_3 method
		$this->session_3();

		$tabel_a1_field1 = $this->v_post['tabel_a1_field1'];

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
			'ubah' . $tabel_a1_field1
		);

		$data = array(
			$this->aliases['tabel_a1_field2'] => $this->v_post['tabel_a1_field2'],
			$this->aliases['tabel_a1_field3'] => $this->v_post['tabel_a1_field3'],
			$this->aliases['tabel_a1_field4'] => $this->v_post['tabel_a1_field4'],
			$this->aliases['tabel_a1_field5'] => $this->v_post['tabel_a1_field5'],
		);

		$aksi = $this->tl_a1->update_a1($data, $tabel_a1_field1);

		$notif = $this->handle_4c($aksi, 'tabel_a1', $tabel_a1_field1);

		// Redirect to previous page
		redirect($_SERVER['HTTP_REFERER']);
	}

	// Update Theme ID
	public function update_id_tema()
	{
		// Call to declarew method
		$this->declarew();
		// Call to session_3 method
		$this->session_3();

		$tabel_a1_field1 = $this->v_post['tabel_a1_field1'];

		// Validate fields
		validate_all(
			array(
				$this->v_post['tabel_a1_field1'],
				$this->v_post['tabel_a1_field6'],
			),
			$this->views['flash3'],
			'tema' . $tabel_a1_field1
		);

		$data = array(
			$this->aliases['tabel_a1_field6'] => $this->v_post['tabel_a1_field6'],
		);

		$aksi = $this->tl_a1->update_a1($data, $tabel_a1_field1);

		$notif = $this->handle_4d($aksi, 'tabel_b7', $tabel_a1_field1);

		 // Redirect to previous page
		redirect($_SERVER['HTTP_REFERER']);
	}

}
