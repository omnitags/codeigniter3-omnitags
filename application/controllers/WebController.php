<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Calling the Omnitags file
include 'OmnitagsController.php';

// Using encapsulation
class WebController extends OmnitagsController
{
	// First loaded function
	public function index()
	{
		// Calling all variables from Omnitags
		$this->declarew();

		// Loading page for all session levels
		$this->page_session_all();

		// Load your URLs dynamically here (e.g., from database)
		$urls = array(
			base_url('home'),
		);

		// Load XML helper
		$this->load->helper('xml');

		// Load the sitemap view passing URLs
		$data['urls'] = $urls;

		// Cache control headers
		header("Cache-Control: no-cache, must-revalidate"); // HTTP 1.1.
		header("Pragma: no-cache"); // HTTP 1.0.
		header("Expires: 0"); // Proxies.

		// Forward users based on their roles in their session
		switch (userdata('role')) {
			case $this->aliases['tabel_c2_field6_value2']:
			case $this->aliases['tabel_c2_field6_value3']:
			case $this->aliases['tabel_c2_field6_value4']:

				set_flashdata($this->views['flash1'], $this->views['flash1_note1']);
				set_flashdata('toast', $this->views['flash1_func1']);

				redirect(site_url('dashboard'));
				break;

			default:
				set_flashdata($this->views['flash1'], $this->views['flash1_note1']);
				set_flashdata('toast', $this->views['flash1_func1']);

				// When you're the one who's developing this app, it's quite annoying to see this message over and over again.\
				// The feature below isn't working as expected
				// if (userdata($this->aliases['tabel_c2_field7']) < 2) {
				// 	set_flashdata($this->views['flash5'], "Anda hanya akan mendapatkan quick tour ini sebanyak 2 kali");
				// 	set_flashdata($this->views['flash5'], $this->views['flash5_func1']);
				// } else {
				// }

				// Preparing data to be loaded 
				$data1 = array(
					'title' => "Welcome!",
					'konten' => 'home',
					'dekor' => $this->tl_b1->dekor($this->theme_id, 'home'),
					'tbl_b2' => $this->tl_b2->get_b2_by_field(['tabel_b2_field7', 'tabel_b2_field6'], [$this->theme_id, $this->aliases['tabel_b2_field6_value1']]),
				);

				$this->load_page('', 'layouts/template', $data1);
				break;
		}
	}

	// Dashboard page
	public function dashboard()
	{
		// call declarew from Omnitags
		$this->declarew();

		// showing all sessions that can be loaded in this controller
		$allowed_values = [
			$this->aliases['tabel_c2_field6_value2'],
			$this->aliases['tabel_c2_field6_value3'],
			$this->aliases['tabel_c2_field6_value4']
		];
		$this->page_session_check($allowed_values);

		// initialize the charts from each table with specific model function
		// $chart_tabel_f1 = $this->tl_e4->getCharttabel_f1();
		// $chart_tabel_f2 = $this->tl_e4->getCharttabel_f2();

		// setting the array for data1
		$data1 = array(
			'title' => "Dashboard",
			'konten' => 'dashboard',
			'dekor' => $this->tl_b1->dekor($this->theme_id, 'dashboard'),
			// 'tbl_e1' => $this->tl_e1->get_all_e1()->num_rows(),
			// 'tbl_e2' => $this->tl_e2->get_all_e2()->num_rows(),
			// 'tbl_c1' => $this->tl_c1->get_all_c1()->num_rows(),
			// 'tbl_e3' => $this->tl_e3->get_all_e3()->num_rows(),
			'tbl_e4' => $this->tl_e4->get_all_e4()->num_rows(),
			// 'tbl_f1' => $this->tl_f1->get_all_f1()->num_rows(),
			// 'tbl_f2' => $this->tl_f2->get_all_f2()->num_rows(),
			'tbl_c2' => $this->tl_c2->get_all_c2()->num_rows(),
			// 'tbl_f3' => $this->tl_f3->get_all_f3()->num_rows(),
			'tbl_d3' => $this->tl_d3->get_all_d3()->num_rows(),

			// 'chart_tabel_f1' => json_encode($chart_tabel_f1),
			// 'chart_tabel_f2' => json_encode($chart_tabel_f2),
		);

		// setting the flashdata
		set_flashdata($this->views['flash1'], $this->views['flash1_note1']);
		set_flashdata('toast', $this->views['flash1_func1']);

		$notif = $this->handle_2a();		
		
		$this->load_page('', 'layouts/template_admin', $data1);
	}

	// Page that will be loaded if a function is performed by a user with the wrong level
	public function invalid()
	{
		$this->declarew();

		$data1 = array(
			'title' => "Cannot perform action!",
			'dekor' => $this->tl_b1->dekor($this->theme_id, 'invalid'),
		);

		$this->load_page_error('', 'errors/invalid', $data1);
	}

	// Page that will be loaded if a page is visisted by a user with the wrong level
	public function overloaded()
	{
		$this->declarew();

		$data1 = array(
			'title' => "Website Overloaded",
			'dekor' => "",
		);

		$this->load_page_error('', 'errors/overload', $data1);
	}

	// Page that will be loaded if a page is visisted by a user with the wrong level
	public function no_level()
	{
		$this->declarew();

		$data1 = array(
			'title' => "You don't have access to this page!",
			'dekor' => $this->tl_b1->dekor($this->theme_id, 'no_level'),
		);

		$this->load_page_error('', 'errors/no_level', $data1);
	}

	// Page that will be loaded when the page is not found/404
	public function no_page()
	{
		$this->declarew();

		$data1 = array(
			'title' => "Page Not Found!",
			'dekor' => $this->tl_b1->dekor($this->theme_id, '404'),
		);

		$this->load_page_error('', 'errors/404', $data1);
	}
}
 