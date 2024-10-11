<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class Welcome extends Omnitags
{
	// fungsi pertama yang akan diload oleh website
	public function index()
	{
		$this->declarew();

		// Cache control headers
		header("Cache-Control: no-cache, must-revalidate"); // HTTP 1.1.
		header("Pragma: no-cache"); // HTTP 1.0.
		header("Expires: 0"); // Proxies.

		// mengarahkan pengguna ke halaman masing-masing sesuai level
		switch ($this->session->userdata($this->aliases['tabel_c2_field6'])) {
			case $this->aliases['tabel_c2_field6_value2']:
			case $this->aliases['tabel_c2_field6_value3']:
			case $this->aliases['tabel_c2_field6_value4']:

				$this->session->set_flashdata($this->views['flash1'], $this->views['flash1_note1']);
				$this->session->set_flashdata('toast', $this->views['flash1_func1']);

				redirect(site_url('dashboard'));
				break;

			default:
				$this->session->set_flashdata($this->views['flash1'], $this->views['flash1_note1']);
				$this->session->set_flashdata('toast', $this->views['flash1_func1']);

				// When you're the one who's developing this app, it's quite annoying to see this message over and over again.\
				// The feature below isn't working as expected
				// if ($this->session->userdata($this->aliases['tabel_c2_field7']) < 2) {
				// 	$this->session->set_flashdata($this->views['flash5'], "Anda hanya akan mendapatkan quick tour ini sebanyak 2 kali");
				// 	$this->session->set_flashdata($this->views['flash5'], $this->views['flash5_func1']);
				// } else {
				// }

				$data1 = array(
					$this->declarew(),

					'title' => $this->views['v6_title'],
					'konten' => $this->views['v6'],
					'dekor' => $this->tl_b1->dekor('v6')->result(),
					'tbl_b5' => $this->tl_b5->ambildata()->result(),
					'tbl_b7' => $this->tl_b7->ambildata()->result(),
					'tbl_b2' => $this->tl_b2->ambildata()->result(),
				);

				$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

				$this->load->view($this->views['v1'], $data);
		}
	}

	public function dashboard()
	{
		$this->declarew();

		// $chart_tabel_f1 = $this->tl_e4->getCharttabel_f1();
		// $chart_tabel_f2 = $this->tl_e4->getCharttabel_f2();

		$data1 = array(
			'title' => $this->views['v5_title'],
			'konten' => $this->views['v5'],
			'dekor' => $this->tl_b1->dekor('v5')->result(),
			'tbl_e1' => $this->tl_e1->ambildata()->num_rows(),
			'tbl_e2' => $this->tl_e2->ambildata()->num_rows(),
			'tbl_c1' => $this->tl_c1->ambildata()->num_rows(),
			'tbl_e3' => $this->tl_e3->ambildata()->num_rows(),
			'tbl_e4' => $this->tl_e4->ambildata()->num_rows(),
			'tbl_f2' => $this->tl_f2->ambildata()->num_rows(),
			'tbl_c2' => $this->tl_c2->ambildata()->num_rows(),
			'tbl_f3' => $this->tl_f3->ambildata()->num_rows(),
			'tbl_d3' => $this->tl_d3->ambildata()->num_rows(),

			// 'chart_tabel_f1' => json_encode($chart_tabel_f1),
			// 'chart_tabel_f2' => json_encode($chart_tabel_f2),
		);

		$this->session->set_flashdata($this->views['flash1'], $this->views['flash1_note1']);
		$this->session->set_flashdata('toast', $this->views['flash1_func1']);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v1'], $data);
	}

	// fungsi ketika pengguna mengunjungi halaman yang tidak sesuai dengan level
	public function no_level()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->views['v4_title'],
			'dekor' => $this->tl_b1->dekor('v4')->result(),
			'tbl_a1' => $this->tl_a1->ambil_tabel_a1_field1($this->tabel_a1_field1)->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v4'], $data);
	}

	public function no_page()
	{
		$this->declarew();

		$data1 = array(
			'title' => $this->views['v7_title'],
			'dekor' => $this->tl_b1->dekor('v7')->result(),
		);

		$data = array_merge($data1, $this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old);

		$this->load->view($this->views['v7'], $data);
	}
}
