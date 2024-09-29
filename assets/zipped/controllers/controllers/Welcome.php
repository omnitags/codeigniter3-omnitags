<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Calling the Omnitags file
include 'Omnitags.php';

// Using encapsulation
class Welcome extends Omnitags
{
	// Calling the default language
	public function default_language()
	{
		redirect('/en', 'refresh');
	}

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
		switch (userdata($this->aliases['tabel_c2_field6'])) {
			case $this->aliases['tabel_c2_field6_value2']:
			case $this->aliases['tabel_c2_field6_value3']:
			case $this->aliases['tabel_c2_field6_value4']:

				set_flashdata($this->views['flash1'], $this->views['flash1_note1']);
				set_flashdata('toast', $this->views['flash1_func1']);

				redirect(site_url($this->language_code . '/' . 'dashboard'));
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
					'title' => lang('welcome'),
					'konten' => 'home',
					'dekor' => $this->tl_b1->dekor($this->theme_id, 'home'),
					'tbl_b2' => $this->tl_b2->get_b7_aktif($this->theme_id),
				);

				// Combining data1 with the package
				$data = array_merge($data1, $this->package);

				//Loading the page
				load_view_data('_layouts/template', $data);
				break;
		}
	}

	// Dashboard page
	public function dashboard()
	{
		$this->declarew();
		$allowed_values = [
                $this->aliases['tabel_c2_field6_value2'],
                $this->aliases['tabel_c2_field6_value3'],
                $this->aliases['tabel_c2_field6_value4']
            ];
            $this->page_session_check($allowed_values);

		// $chart_tabel_f1 = $this->tl_e4->getCharttabel_f1();
		// $chart_tabel_f2 = $this->tl_e4->getCharttabel_f2();

		$data1 = array(
			'title' => lang('dashboard'),
			'konten' => 'dashboard',
			'dekor' => $this->tl_b1->dekor($this->theme_id, 'dashboard'),
			// 'tbl_e1' => $this->tl_e1->get_all_e1()->num_rows(),
			// 'tbl_e2' => $this->tl_e2->get_all_e2()->num_rows(),
			'tbl_c1' => $this->tl_c1->get_all_c1()->num_rows(),
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

		set_flashdata($this->views['flash1'], $this->views['flash1_note1']);
		set_flashdata('toast', $this->views['flash1_func1']);

		$data = array_merge($data1, $this->package);

		$notif = $this->handle_2a();

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}

	// Page that will be loaded if a function is performed by a user with the wrong level
	public function invalid()
	{
		$this->declarew();

		$data1 = array(
			'title' => lang('invalid'),
			'dekor' => $this->tl_b1->dekor($this->theme_id, 'invalid'),
		);

		$data = array_merge($data1, $this->package);

		$this->load->view('errors/invalid', $data);
	}

	// Page that will be loaded if a page is visisted by a user with the wrong level
	public function no_level()
	{
		$this->declarew();

		$data1 = array(
			'title' => lang('no_access'),
			'dekor' => $this->tl_b1->dekor($this->theme_id, 'no_level'),
		);

		$data = array_merge($data1, $this->package);

		$this->load->view('errors/no_level', $data);
	}

	// Page that will be loaded when the page is not found/404
	public function no_page()
	{
		$this->declarew();

		$data1 = array(
			'title' => lang('page_not_found'),
			'dekor' => $this->tl_b1->dekor($this->theme_id, '404'),
		);

		$data = array_merge($data1, $this->package);

		$this->load->view('errors/404', $data);
	}

	// Setting the language for the website, pretty complicated indeed
	public function set_language()
	{
		$language = post('language');
		$allowed_languages = ['en', 'fr', 'id', 'zh'];

		// Validate the language input
		if (in_array($language, $allowed_languages)) {
			// Set the selected language in session
			set_userdata('site_lang', $language);

			// Get the HTTP referer
			$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

			// Initialize the controller and function to empty
			$controller_function = '';

			if (!empty($referer)) {
				// Parse the referer URL to get the path component
				$parsed_url = parse_url($referer);
				$path = isset($parsed_url['path']) ? $parsed_url['path'] : '';

				// Get the base URL path without the language segment
				$base_url_path = parse_url(base_url(), PHP_URL_PATH);

				// Extract parts of the path
				$path_parts = explode('/', trim($path, '/'));

				// Remove the base URL parts from the path
				$base_url_parts = explode('/', trim($base_url_path, '/'));

				foreach ($base_url_parts as $part) {
					if (!empty($path_parts) && $path_parts[0] === $part) {
						array_shift($path_parts);
					}
				}

				// Remove the current language segment if it's the first part
				if (!empty($path_parts) && in_array($path_parts[0], $allowed_languages)) {
					array_shift($path_parts);
				}

				// Reconstruct the remaining path as controller/function
				$controller_function = implode('/', $path_parts);
			}

			// Redirect to the desired URL with the new language
			redirect(site_url($language . '/' . $controller_function));
		} else {
			// Handle invalid language selection
			show_error('Invalid language selected.');
		}
	}


}
